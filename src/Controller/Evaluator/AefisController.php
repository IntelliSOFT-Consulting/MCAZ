<?php
namespace App\Controller\Evaluator;

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

        if($this->request->getQuery('status')) {$aefis = $this->paginate($this->Aefis->find('all')->where(['status' => $this->request->getQuery('status'), 'ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Aefis.id' => 'desc']]); }
        else {$aefis = $this->paginate($this->Aefis->find('all')->where(['ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Aefis.id' => 'desc']]);}

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
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 'Committees', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ]);

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $aefi->reference_number.'.pdf'
                ]
            ]);
        }

        $evaluators = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'evaluators', 'users'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);
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


    public function assignEvaluator() {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi->assigned_by = $this->Auth->user('id');
            $aefi->assigned_to = $this->request->getData('evaluator');
            $aefi->assigned_date = date("Y-m-d H:i:s");
            $aefi->status = 'Assigned';
            $evaluator = $this->Aefis->Users->get($this->request->getData('evaluator'));
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');                
                $data['vars']['user_message'] = $this->request->getData('user_message');
                $data['vars']['name'] = $evaluator->name;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                if ($this->request->getData('user_message')) {
                  $data['type'] = 'manager_assign_evaluator_message';
                  $data['user_message'] = $this->request->getData('user_message');
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                
                //notify manager                
                $data = ['user_id' => $aefi->assigned_by, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Evaluator '.$evaluator->name.' assigned AEFI '.$aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
                $this->Flash->error(__('Unknown AEFI Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }


    public function requestEvaluator() {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());

            $aefi->status = 'RequestEvaluator';
            $aefi->request_evaluators[0]->user_id = $aefi->assigned_to;
            $aefi->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $aefi->request_evaluators[0]->type = 'request_evaluator_info';
            $aefi->request_evaluators[0]->model = 'Aefis';
            $aefi->request_evaluators[0]->foreign_key = $aefi->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_evaluator_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $aefi->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.')); 
                    return $this->redirect($this->referer());
                }

                //end 
                
               $this->Flash->success('Request successfully sent to evaluator for Aefi '.$aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Aefi Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function requestReporter() {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pk_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->status = 'RequestReporter';
            $aefi->request_reporters[0]->user_id = $aefi->user_id;
            $aefi->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $aefi->request_reporters[0]->type = 'request_reporter_info';
            $aefi->request_reporters[0]->model = 'Aefis';
            $aefi->request_reporters[0]->foreign_key = $aefi->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($aefi->user_id)) {
                    $reporter = $this->Aefis->Users->get($aefi->user_id);
                    $data = [
                      'email_address' => $reporter->email, 'user_id' => $reporter->id,
                      'type' => 'manager_request_reporter_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['user_message'] = $aefi->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate reporter.')); 
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if(!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $aefi->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                }          
                //manager does not get a notificatoin
                //end 
                
               $this->Flash->success('Request successfully sent to reporter for Aefi '.$aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Aefi Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function committeeReview() {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->status = (!empty($this->request->data['status'])) ? $this->request->data['status'] : 'Committee';
            $aefi->committees[0]->user_id = $this->Auth->user('id');
            $aefi->committees[0]->model = 'Aefis';
            $aefi->committees[0]->category = 'committee';
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_committee_assigned_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if(!empty($aefi->committees[0]->literature_review) && $aefi->status == 'Approved') {
                    $reporter = $this->Aefis->Users->get($aefi->user_id);
                    $data = [
                      'email_address' => $aefi->reporter_email, 'user_id' => $aefi->user_id,
                      'type' => 'reporter_committee_comments_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['literature_review'] = $aefi->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Committee Review successfully done for Aefi '.$aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Aefi Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
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
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
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
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.'));
                return $this->redirect(['action' => 'view', $aefi->id]);
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
