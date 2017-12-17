<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);       
    }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                if (isset($this->request->data['date_of_birth'])) {
                    $this->request->data['date_of_birth'] = implode('-', $this->request->data['date_of_birth']);
                } 
                //date_of_onset_of_reaction
                if (isset($this->request->data['date_of_onset_of_reaction'])) {
                    $this->request->data['date_of_onset_of_reaction'] = implode('-', $this->request->data['date_of_onset_of_reaction']);
                }
                //date_of_end_of_reaction
                if (isset($this->request->data['date_of_end_of_reaction'])) {
                    $this->request->data['date_of_end_of_reaction'] = implode('-', $this->request->data['date_of_end_of_reaction']);
                }
            }
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Designations']
        ];
        $aefis = $this->paginate($this->Aefis);

        $this->set(compact('aefis'));
        $this->set('_serialize', ['aefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments', 'AefiFollowups', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ]);

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $aefi->reference_number.'.pdf'
                ]
            ]);
        }
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);
    }

    public function e2b($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ]);        
        

        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', false);
        $this->response->download(($aefi->submitted==2) ? str_replace('/', '_', $aefi->reference_number).'.xml' : 'AEFI_'.$aefi->created->i18nFormat('dd-MM-yyyy_HHmmss').'.xml');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefi = $this->Aefis->newEntity();
        if ($this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->user_id = $this->Auth->user('id');
            if ($this->Aefis->save($aefi, ['validate' => false])) {
                //update field
                $query = $this->Aefis->query();
                $query->update()
                    ->set(['reference_number' => 'AEFI'.$aefi->id.'/'.$aefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $aefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $aefi->id]);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        }
        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'users', 'designations'));
        $this->set('_serialize', ['aefi']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments']
        ]);
        if ($aefi->submitted == 2) {
            $this->Flash->success(__('Report '.$aefi->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $aefi->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            if (!empty($aefi->attachments)) {
              for ($i = 0; $i <= count($aefi->attachments)-1; $i++) { 
                $aefi->attachments[$i]->model = 'Aefis';
                $aefi->attachments[$i]->category = 'attachments';
              }
            }
            
            if ($aefi->submitted == 1) {
              //save changes button
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$aefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == 2) {
              //submit to mcaz button
              $aefi->submitted_date = date("Y-m-d H:i:s");
              $aefi->status = 'Submitted';
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.'));
                return $this->redirect(['action' => 'view', $aefi->id]);
;
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_aefi_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_aefi_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Aefis->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                      'vars' =>  $aefi->toArray()];
                    $data['type'] = 'manager_submit_aefi_email';
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_submit_aefi_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$aefi->reference_number.' later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$aefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        //format dates
        if (!empty($aefi->date_of_birth)) {
            if(empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi']);

    }

    public function followup($id = null, $fid = null)
    {
        //Controller for creating follow up report.. should be able to support both new and edit
        $this->loadModel('AefiFollowups');
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiFollowups', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ]);
        if($fid) {
            $followup = $this->AefiFollowups->get($fid, [
              'contain' => ['AefiListOfVaccines', 'Attachments']
            ]);
        } else {
            //get latest unsubmitted follow up and load that
            $check = $this->AefiFollowups->find('all')->where(['aefi_id' => $aefi->id, 'submitted IS NOT' => 2])->first();
            $followup = (!empty($check)) ? $check : $this->AefiFollowups->newEntity() ;
        }
        if ($aefi->submitted <> 2) {
            $this->Flash->success(__('Report '.$aefi->reference_number.' not submitted. Followups only possible for submitted reports'));
            return $this->redirect(['action' => 'view', $aefi->id]);
        }
        if(!empty($aefi) && $aefi->user_id == $this->Auth->user('id')) {
            if ($this->request->is(['patch', 'post', 'put'])) {          


                $followup = $this->AefiFollowups->patchEntity($followup, $this->request->getData());
                $followup->report_type = 'FollowUp';
                $followup->aefi_id = $aefi->id;
                //Attachments
                if (!empty($followup->attachments)) {
                    for ($i = 0; $i <= count($followup->attachments)-1; $i++) { 
                      $followup->attachments[$i]->model = 'Aefis';
                      $followup->attachments[$i]->category = 'attachments';
                    }
                }
                // debug((string)$aefi);
                // debug($this->request->data);
                if ($followup->submitted == 1) {
                    //save changes button
                    if ($this->AefiFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('The changes to the follow up report for '.$aefi->reference_number.' have been saved.'));
                        // return $this->redirect(['action' => 'edit', $aefi->id]);
                    } else {
                        $this->Flash->error(__('Follow up could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == 2) {
                    //submit to mcaz button
                    $followup->submitted_date = date("Y-m-d H:i:s");
                    
                    //TODO: validate linked data here since validate will be false
                    if ($this->AefiFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('Follow up for report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.'));

                        //update Initial SADR report status
                        $aefi->status = 'FollowUp';
                        $this->Aefis->save($aefi, ['validate' => false]);

                        //send email and notification
                        $this->loadModel('Queue.QueuedJobs');    
                        $data = [
                              'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                              'type' => 'applicant_submit_aefi_followup_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                              'vars' =>  $aefi->toArray()
                        ];
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'applicant_submit_aefi_followup_notification';
                        $data['vars']['created'] = $followup->created;
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                        //notify managers
                        $managers = $this->Aefis->Users->find('all')->where(['group_id IN' => [2, 4]]);
                        foreach ($managers as $manager) {
                            $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                                     'vars' =>  $aefi->toArray()];
                            $data['type'] = 'manager_submit_aefi_followup_email';
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_submit_aefi_followup_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }
                        //
                        return $this->redirect(['action' => 'view', $aefi->id]);
                    } else {
                        $this->Flash->error(__('Foloow up for report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == -1) {
                    //cancel button              
                    $this->Flash->success(__('Cancel form successful. You may submit follow up for report '.$aefi->reference_number.' later'));
                    return $this->redirect(['controller' => 'Users','action' => 'home']);
                } 
          }
        } else {
          $this->Flash->error(__('Report does not exist.'));
          return $this->redirect(['action' => 'index']);
        }


        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'followup'));
        $this->set('_serialize', ['aefi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        if ($this->Aefis->delete($aefi)) {
            $this->Flash->success(__('The aefi has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
