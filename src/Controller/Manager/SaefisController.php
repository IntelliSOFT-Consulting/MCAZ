<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);       
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

        if($this->request->getQuery('status')) {$saefis = $this->paginate($this->Saefis->find('all')->where(['status' => $this->request->getQuery('status')]), ['order' => ['Saefis.id' => 'desc']]); }
        else {$saefis = $this->paginate($this->Saefis->find('all'), ['order' => ['Saefis.id' => 'desc']]);}

        $this->set(compact('saefis'));
        $this->set('_serialize', ['saefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews']
        ]);

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $saefi->reference_number.'.pdf'
                ]
            ]);
        }
        $evaluators = $this->Saefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Saefis->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        

        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->set(compact('saefi', 'designations', 'evaluators', 'users'));
        $this->set('_serialize', ['saefi', 'designations']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saefi = $this->Saefis->newEntity();
        if ($this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->user_id = $this->Auth->user('id');
            if ($this->Saefis->save($saefi, ['validate' => false])) {
                //update field
                $query = $this->Saefis->query();
                $query->update()
                    ->set(['reference_number' => 'SAEFI'.$saefi->id.'/'.$saefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $saefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The saefi has been saved.'));

                return $this->redirect(['action' => 'edit', $saefi->id]);
            }
            $this->Flash->error(__('The AEFI Investigation Report could not be saved. Please, try again.'));
        }
        $users = $this->Saefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->set(compact('saefi', 'users', 'designations'));
        $this->set('_serialize', ['saefi']);
    }


    public function assignEvaluator() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi->assigned_by = $this->Auth->user('id');
            $saefi->assigned_to = $this->request->getData('evaluator');
            $saefi->assigned_date = date("Y-m-d H:i:s");
            $saefi->status = 'Assigned';
            $evaluator = $this->Saefis->Users->get($this->request->getData('evaluator'));
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                $data['vars']['user_message'] = $this->request->getData('user_message');
                $data['vars']['name'] = $evaluator->name;
                //notify evaluator
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                if ($this->request->getData('user_message')) {
                  $data['type'] = 'manager_assign_evaluator_message';
                  $data['user_message'] = $this->request->getData('user_message');
                  $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                
                //notify manager                
                $data = ['user_id' => $saefi->assigned_by, 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Evaluator '.$evaluator->name.' assigned AEFI '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
                $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }


    public function requestEvaluator() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());

            $saefi->status = 'RequestEvaluator';
            $saefi->request_evaluators[0]->user_id = $saefi->assigned_to;
            $saefi->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $saefi->request_evaluators[0]->type = 'request_evaluator_info';
            $saefi->request_evaluators[0]->model = 'Saefis';
            $saefi->request_evaluators[0]->foreign_key = $saefi->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_evaluator_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $saefi->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.')); 
                    return $this->redirect($this->referer());
                }

                //end 
                
               $this->Flash->success('Request successfully sent to evaluator for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function causality() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->status = 'Evaluated';
            $saefi->reviews[0]->user_id = $this->Auth->user('id');
            $saefi->reviews[0]->model = 'Saefis';
            $saefi->reviews[0]->category = 'causality';
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_review_assigned_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Review successfully done for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }


    public function requestReporter() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pk_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->status = 'RequestReporter';
            $saefi->request_reporters[0]->user_id = $saefi->user_id;
            $saefi->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $saefi->request_reporters[0]->type = 'request_reporter_info';
            $saefi->request_reporters[0]->model = 'Saefis';
            $saefi->request_reporters[0]->foreign_key = $saefi->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->user_id)) {
                    $reporter = $this->Saefis->Users->get($saefi->user_id);
                    $data = [
                      'email_address' => $reporter->email, 'user_id' => $reporter->id,
                      'type' => 'manager_request_reporter_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['user_message'] = $saefi->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate reporter.')); 
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $saefi->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                }          
                //manager does not get a notificatoin
                //end 
                
               $this->Flash->success('Request successfully sent to reporter for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function committeeReview() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->status = (!empty($this->request->data['status'])) ? $this->request->data['status'] : 'Committee';
            $saefi->committees[0]->user_id = $this->Auth->user('id');
            $saefi->committees[0]->model = 'Saefis';
            $saefi->committees[0]->category = 'committee';
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_committee_assigned_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if(!empty($saefi->committees[0]->literature_review) && $saefi->status == 'Approved') {
                    $reporter = $this->Saefis->Users->get($saefi->user_id);
                    $data = [
                      'email_address' => $saefi->reporter_email, 'user_id' => $saefi->user_id,
                      'type' => 'reporter_committee_comments_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['literature_review'] = $saefi->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Committee Review successfully done for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }



    /**
     * Edit method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines',  'Attachments', 'Reports']
        ]);
        if ($saefi->submitted == 2) {
            $this->Flash->success(__('Report '.$saefi->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $saefi->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            if (!empty($saefi->attachments)) {
              for ($i = 0; $i <= count($saefi->attachments)-1; $i++) { 
                $saefi->attachments[$i]->model = 'Saefis';
                $saefi->attachments[$i]->category = 'attachments';
              }
            }
            // reports
            if (!empty($saefi->reports)) {
              for ($i = 0; $i <= count($saefi->reports)-1; $i++) { 
                $saefi->reports[$i]->model = 'Saefis';
                $saefi->reports[$i]->category = 'reports';
              }
            }
            
            if ($saefi->submitted == 1) {
              //save changes button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == 2) {
              //submit to mcaz button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$saefi->reference_number.' has been successfully submitted to MCAZ for review.'));
                return $this->redirect(['action' => 'view', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$saefi->reference_number.' later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->set(compact('saefi', 'designations'));
        $this->set('_serialize', ['saefi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saefi = $this->Saefis->get($id);
        if ($this->Saefis->delete($saefi)) {
            $this->Flash->success(__('The AEFI Investigation Report has been deleted.'));
        } else {
            $this->Flash->error(__('The AEFI Investigation Report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
