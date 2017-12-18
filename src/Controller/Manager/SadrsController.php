<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Entity;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class SadrsController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Designations', 'Reviews']
        ];
        // $sadrs = $this->paginate($this->Sadrs,['finder' => ['status' => $id]]);
        if($this->request->getQuery('status')) {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['status' => $this->request->getQuery('status'), 'ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]); }
        else {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]);}
        // debug($this->request->data);
        // debug($id);

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
            'contain' => //['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'Reviews', 'RequestReporters']
                         ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments',  'Reviews', 'RequestReporters', 'RequestEvaluators', 'Committees', 'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments']
        ]);

        if(strpos($this->request->url, 'pdf')) {
            // $this->viewBuilder()->setLayout('pdf/default');
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $sadr->reference_number.'.pdf'
                ]
            ]);
        }
        
        
        $evaluators = $this->Sadrs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Sadrs->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'evaluators', 'users', 'designations', 'provinces', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
        // $this->set('sadr', $sadr);
        // $this->set('_serialize', ['sadr']);
    }

    public function assignEvaluator() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr->assigned_by = $this->Auth->user('id');
            $sadr->assigned_to = $this->request->getData('evaluator');
            $sadr->assigned_date = date("Y-m-d H:i:s");
            $sadr->status = 'Assigned';
            $evaluator = $this->Sadrs->Users->get($this->request->getData('evaluator'));
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');
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
                $data = ['user_id' => $sadr->assigned_by, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Evaluator '.$evaluator->name.' assigned SADR '.$sadr->reference_number);


                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Evaluator '.$evaluator->name.' assigned SADR '.$sadr->reference_number, 
                        '_serialize' => ['message']]);
                    return;
                }

                return $this->redirect($this->referer());
            } else {
              if($this->request->is('json')) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to assign SADR to '.$evaluator->name, 
                    'message' => 'Validation errors', 
                      '_serialize' => ['errors', 'message']]);
                return;         
              } else {
                $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
              }
            }
        } else {
            if($this->request->is('json')) {
              $this->response->body('Failure');
              $this->response->statusCode(403);
              $this->set([
                'errors' => 'Unable to locate SADR', 
                'message' => 'Validation errors', 
                  '_serialize' => ['errors', 'message']]);
              return;
            } else {
                $this->Flash->error(__('Unknown SADR Report. Please correct.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    public function causality() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->status = 'Evaluated';
            $sadr->reviews[0]->user_id = $this->Auth->user('id');
            $sadr->reviews[0]->model = 'Sadrs';
            $sadr->reviews[0]->category = 'causality';
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_review_assigned_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Review successfully done for SADR '.$sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown SADR Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    /*public function requestReporter() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_id'), []);
        debug((string)$sadr);
        debug($this->request->data);
    }*/

    public function requestReporter() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pk_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->status = 'RequestReporter';
            $sadr->request_reporters[0]->user_id = $sadr->user_id;
            $sadr->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $sadr->request_reporters[0]->type = 'request_reporter_info';
            $sadr->request_reporters[0]->model = 'Sadrs';
            $sadr->request_reporters[0]->foreign_key = $sadr->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($sadr->user_id)) {
                    $reporter = $this->Sadrs->Users->get($sadr->user_id);
                    $data = [
                      'email_address' => $reporter->email, 'user_id' => $reporter->id,
                      'type' => 'manager_request_reporter_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['user_message'] = $sadr->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate reporter.')); 
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if(!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $sadr->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                }          
                //manager does not get a notificatoin
                //end 
                
               $this->Flash->success('Request successfully sent to reporter for SADR '.$sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown SADR Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    // public function requestEvaluator() {
    //     $sadr = $this->Sadrs->get($this->request->getData('sadr_id'), []);
    //     debug((string)$sadr);
    //     debug($this->request->data);
    // }

    public function requestEvaluator() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
        //     debug((string)$sadr);
        // debug($this->request->data);
        // return;
            $sadr->status = 'RequestEvaluator';
            $sadr->request_evaluators[0]->user_id = $sadr->assigned_to;
            $sadr->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $sadr->request_evaluators[0]->type = 'request_evaluator_info';
            $sadr->request_evaluators[0]->model = 'Sadrs';
            $sadr->request_evaluators[0]->foreign_key = $sadr->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_evaluator_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $sadr->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.')); 
                    return $this->redirect($this->referer());
                }

                //end 
                
               $this->Flash->success('Request successfully sent to evaluator for SADR '.$sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown SADR Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }


    public function committeeReview() {
        // $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        // debug((string)$sadr);
        // debug($this->request->data);
        // $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
        // debug((string)$sadr);
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->status = (!empty($this->request->data['status'])) ? $this->request->data['status'] : 'Committee';
            $sadr->committees[0]->user_id = $this->Auth->user('id');
            $sadr->committees[0]->model = 'Sadrs';
            $sadr->committees[0]->category = 'committee';
            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_committee_assigned_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if(!empty($sadr->committees[0]->literature_review) && $sadr->status == 'Approved') {
                    $reporter = $this->Sadrs->Users->get($sadr->user_id);
                    $data = [
                      'email_address' => $sadr->reporter_email, 'user_id' => $sadr->user_id,
                      'type' => 'reporter_committee_comments_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['literature_review'] = $sadr->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Committee Review successfully done for SADR '.$sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown SADR Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
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
        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
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
              if ($this->Sadrs->save($sadr, ['validate' => false])) {
                $this->Flash->success(__('Report '.$sadr->reference_number.' has been successfully submitted to MCAZ for review.'));
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

        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
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
