<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Entity;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Log\Log;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class SadrsController extends AppController
{
    public function initialize() {
       parent::initialize();
       // $this->Auth->allow(['view']);       
       $this->loadComponent('VigibaseApi');
    }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->data);
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
        $sadrs = $this->paginate($this->Sadrs);

        $this->set(compact('sadrs'));
        $this->set('_serialize', ['sadrs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments']
        ]);

        if($sadr->submitted !== 2) {
            $this->Flash->warning(__('Kindly submit Report '.$sadr->reference_number.' before viewing.'));
            return $this->redirect(['action' => 'edit', $sadr->id]);
        }

        if(strpos($this->request->url, 'pdf')) {
            // $this->viewBuilder()->setLayout('pdf/default');
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $sadr->reference_number.'.pdf'
                ]
            ]);
        }
        
        
        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'provinces','doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr','provinces']);
        // $this->set('sadr', $sadr);
        // $this->set('_serialize', ['sadr']);
    }

    public function e2b($id = null)
    {
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ]);        
        

        $designations = $this->Sadrs->Designations->find('list', array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list', ['limit' => 200]);
        $this->set('_serialize', false);
        $this->set(compact('sadr', 'doses', 'routes'));
        $this->response->download(($sadr->submitted==2) ? str_replace('/', '_', $sadr->reference_number).'.xml' : 'ADR_'.$sadr->created->i18nFormat('dd-MM-yyyy_HHmmss').'.xml');
    }

    public function vigibase($id = null)
    {
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'Attachments']
        ]);                   

        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list', ['limit' => 200]);
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list', ['limit' => 200]);
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list', ['limit' => 200]);

        $http = new Client();

        // Simple get
        /*$umc = $http->get('https://api.who-umc.org/demo/vigibase/icsrs/messagestatus/555180', [], [
            'headers' => ['umc-client-key' => 'a6321b34-1cd6-46e5-af28-5e6edf49bedc',
                          'Authorization' => 'Basic NDUwRUVFN0QtQTQ1Qi00MDNELUE5RTktRjExMENDQ0UzMzdBIA==']]); */ 
        // Simple get
        // $umc = $http->get(Configure::read('vigi_get_url'), [], [
        //     'headers' => Configure::read('vigi_headers')]);  
        // Post

        // $sadr->messageid = 555283;
        // $this->Sadrs->save($sadr, ['validate' => false]);

        $payload = $this->VigibaseApi->sadr_e2b($sadr, $doses, $routes);
        Log::write('debug', 'Payload :: '.$payload);
        $umc = $http->post(Configure::read('vigi_post_url'), 
            (string)$payload,
            ['headers' => Configure::read('vigi_headers')]);  

        if ($umc->isOK()) {
            $messageid = $umc->json;
            // Log::write('error', $messageid['MessageId']); 

            $query = $this->Sadrs->query();
            $query->update()
                    ->set(['messageid' => $messageid['MessageId']])
                    ->where(['id' => $sadr->id])
                    ->execute();

            $this->set([
                    'umc' => $umc->json, 
                    'status' => 'Successfull integration with vigibase', 
                    '_serialize' => ['umc', 'status']]);
        } else {
            $this->response->body('Failure');
            $this->response->statusCode($umc->getStatusCode());
            $this->set([
                'umc' => $umc->json, 
                'status' => 'Failed', 
                '_serialize' => ['umc', 'status']]);
            return;
        }
        
        // $this->set(compact('sadr', 'result'));
        // $this->set('_serialize', ['umc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadr = $this->Sadrs->newEntity();
        if ($this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->user_id = $this->Auth->user('id');
            $sadr->designation_id = $this->Auth->user('designation_id');
            $sadr->name_of_institution = $this->Auth->user('name_of_institution');
            $sadr->institution_name = $this->Auth->user('name_of_institution');
            $sadr->institution_code = $this->Auth->user('institution_code');
            $sadr->institution_address = $this->Auth->user('institution_address');
            $sadr->reporter_phone = $this->Auth->user('phone_no');
            $sadr->reporter_name = $this->Auth->user('name');
            if ($this->Sadrs->save($sadr, ['validate' => false])) {
                //update field
                $query = $this->Sadrs->query();
                $query->update()
                    ->set(['reference_number' => 'ADR'.$sadr->id.'/'.$sadr->created->i18nFormat('yyyy')])
                    ->where(['id' => $sadr->id])
                    ->execute();
                //

                $this->Flash->success(__('The changes to the ADR have been saved.'));

                return $this->redirect(['action' => 'edit', $sadr->id]);
            }
            $this->Flash->error(__('The sadr could not be saved. Kindly correct the errors below and retry.'));
        }
        
        $this->set(compact('sadr'));
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    private function format_dates($sadr) {
        //format dates
        if (!empty($sadr->date_of_birth)) {
            if(empty($sadr->date_of_birth)) $sadr->date_of_birth = '--';
            $a = explode('-', $sadr->date_of_birth);
            $sadr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        } 
        if (!empty($sadr->date_of_onset_of_reaction)) {
            if(empty($sadr->date_of_onset_of_reaction)) $sadr->date_of_onset_of_reaction = '--';
            $a = explode('-', $sadr->date_of_onset_of_reaction);
            $sadr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($sadr->date_of_end_of_reaction)) {
            if(empty($sadr->date_of_end_of_reaction)) $sadr->date_of_end_of_reaction = '--';
            $a = explode('-', $sadr->date_of_end_of_reaction);
            $sadr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }        
        return $sadr;
    }

    public function edit($id = null)
    {
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ]);
        if ($sadr->submitted == 2) {
            $this->Flash->success(__('Report '.$sadr->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $sadr->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            //Attachments
            if (!empty($sadr->attachments)) {
                  for ($i = 0; $i <= count($sadr->attachments)-1; $i++) { 
                    $sadr->attachments[$i]->model = 'Sadrs';
                    $sadr->attachments[$i]->category = 'attachments';
                  }
                }
            // debug((string)$sadr);
            // debug($this->request->data);
            if ($sadr->submitted == 1) {
              //save changes button
              if ($this->Sadrs->save($sadr, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$sadr->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $sadr->id]);
              } else {
                $this->Flash->error(__('Report '.$sadr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($sadr->submitted == 2) {
              //submit to mcaz button
              $sadr->submitted_date = date("Y-m-d H:i:s");
              $sadr->status = 'Submitted';
              if ($this->Sadrs->save($sadr, ['validate' => false])) {
                $this->Flash->success(__('Report '.$sadr->reference_number.' has been successfully submitted to MCAZ for review.'));
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $sadr->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => 'applicant_submit_sadr_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_submit_sadr_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Sadrs->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                  $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()];
                  $data['type'] = 'manager_submit_sadr_email';
                  $this->QueuedJobs->createJob('GenericEmail', $data);
                  $data['type'] = 'manager_submit_sadr_notification';
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //
                return $this->redirect(['action' => 'view', $sadr->id]);
              } else {
                $this->Flash->error(__('Report '.$sadr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($sadr->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$sadr->reference_number.' later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Sadrs->save($sadr, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$sadr->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $sadr->id]);
              } else {
                $this->Flash->error(__('Report '.$sadr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }
        
        $sadr = $this->format_dates($sadr);

        $designations = $this->Sadrs->Designations->find('list', array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'designations', 'provinces', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr', 'provinces']);
    }

    public function followup($id = null, $fid = null)
    {
        //Controller for creating follow up report.. should be able to support both new and edit
        $this->loadModel('SadrFollowups');
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments']
        ]);
        if($fid) {
            $followup = $this->SadrFollowups->get($fid, [
              'contain' => ['SadrListOfDrugs', 'Attachments']
            ]);
        } else {
            //get latest unsubmitted follow up and load that
            $check = $this->SadrFollowups->find('all')->where(['sadr_id' => $sadr->id, 'submitted IS NOT' => 2])->first();
            $followup = (!empty($check)) ? $check : $this->SadrFollowups->newEntity() ;
        }
        if ($sadr->submitted <> 2) {
            $this->Flash->success(__('Report '.$sadr->reference_number.' not submitted. Followups only possible for submitted reports'));
            return $this->redirect(['action' => 'view', $sadr->id]);
        }
        if(!empty($sadr) && $sadr->user_id == $this->Auth->user('id')) {
            if ($this->request->is(['patch', 'post', 'put'])) {          


                $followup = $this->SadrFollowups->patchEntity($followup, $this->request->getData());
                $followup->report_type = 'FollowUp';
                $followup->sadr_id = $sadr->id;
                //Attachments
                if (!empty($followup->attachments)) {
                    for ($i = 0; $i <= count($followup->attachments)-1; $i++) { 
                      $followup->attachments[$i]->model = 'Sadrs';
                      $followup->attachments[$i]->category = 'attachments';
                    }
                }
                // debug((string)$sadr);
                // debug($this->request->data);
                if ($followup->submitted == 1) {
                    //save changes button
                    if ($this->SadrFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('The changes to the follow up report for '.$sadr->reference_number.' have been saved.'));
                        // return $this->redirect(['action' => 'edit', $sadr->id]);
                    } else {
                        $this->Flash->error(__('Follow up could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == 2) {
                    //submit to mcaz button
                    $followup->submitted_date = date("Y-m-d H:i:s");
                    
                    //TODO: validate linked data here since validate will be false
                    if ($this->SadrFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('Follow up for report '.$sadr->reference_number.' has been successfully submitted to MCAZ for review.'));

                        //update Initial SADR report status
                        $sadr->status = 'FollowUp';
                        $this->Sadrs->save($sadr, ['validate' => false]);

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
                        $data['vars']['created'] = $followup->created;
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
                        $this->Flash->error(__('Follow up for report '.$sadr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == -1) {
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

        $designations = $this->Sadrs->Designations->find('list', array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'designations', 'provinces', 'doses', 'routes', 'frequencies', 'followup'));
        $this->set('_serialize', ['sadr', 'provinces']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $sadr = $this->Sadrs->get($id);
        if ($this->Sadrs->delete($sadr)) {
            $this->Flash->success(__('The sadr has been deleted.'));
        } else {
            $this->Flash->error(__('The sadr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>