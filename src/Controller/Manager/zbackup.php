<?php
//Initial attempt at followups... abandoned
public function followup($id = null)
    {
        //$this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'SadrFollowups']
        ]);
        if ($sadr->submitted <> 2) {
            $this->Flash->success(__('Report '.$sadr->reference_number.' not submitted. Followups only possible for submitted reports'));
            return $this->redirect(['action' => 'view', $sadr->id]);
        }
        $findex = count($sadr->followups);
        if(!empty($sadr)) {
          if ($this->request->is(['patch', 'post', 'put'])) {
              $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
              //Attachments
              if (!empty($sadr->followups->attachments)) {
                    for ($i = 0; $i <= count($sadr->followups[0]->attachments)-1; $i++) { 
                      $sadr->followups[$findex]->attachments[$i]->model = 'Sadrs';
                      $sadr->followups[$findex]->attachments[$i]->category = 'attachments';
                    }
                  }
              // debug((string)$sadr);
              // debug($this->request->data);
              if ($sadr->followups[$findex]->submitted == 2) {
                //submit to mcaz button
                $sadr->followups[$findex]->submitted_date = date("Y-m-d H:i:s");
                $sadr->followups[$findex]->report_type = 'FollowUp';
                $sadr->status = 'FollowUp';
                //TODO: validate linked data here since validate will be false
                if ($this->Sadrs->save($sadr, ['validate' => false])) {
                  $this->Flash->success(__('Followup for report '.$sadr->reference_number.' has been successfully submitted to MCAZ for review.'));
                  //send email and notification
                  $this->loadModel('Queue.QueuedJobs');    
                  $data = [
                      'email_address' => $sadr->reporter_email, 'user_id' => $this->Auth->user('id'),
                      'type' => 'applicant_submit_sadr_followup_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                      'vars' =>  $sadr->toArray()
                  ];
                  //notify applicant
                  $this->QueuedJobs->createJob('GenericEmail', $data);
                  $data['type'] = 'applicant_submit_sadr_followup_notification';
                  $data['vars']['created'] = $sadr->followups[$findex]->created;
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                  //notify managers
                  $managers = $this->Sadrs->Users->find('all')->where(['group_id IN' => [2, 4]]);
                  foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                      'vars' =>  $sadr->toArray()];
                    $data['type'] = 'manager_submit_sadr_followup_email';
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_submit_sadr_followup_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                  }
                  //
                  return $this->redirect(['action' => 'view', $sadr->id]);
                } else {
                  $this->Flash->error(__('Report '.$sadr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
                }
              } elseif ($sadr->submitted == -1) {
                 //cancel button              
                  $this->Flash->success(__('Cancel form successful. You may submit follow up for report '.$sadr->reference_number.' later'));
                  return $this->redirect(['controller' => 'Users','action' => 'home']);

              } 
          }
        } else {
          $this->Flash->error(__('Report does not exist.'));
          return $this->redirect(['action' => 'index']);
        }

        $sadr = $this->format_dates($sadr);

        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'designations', 'provinces', 'doses', 'routes', 'frequencies', 'findex'));
        $this->set('_serialize', ['sadr', 'provinces']);
    }