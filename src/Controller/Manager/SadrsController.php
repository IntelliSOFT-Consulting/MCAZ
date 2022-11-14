<?php
namespace App\Controller\Manager;

use App\Controller\Base\SadrsBaseController;
use Cake\Utility\Hash;
use Cake\Event\Event;
use App\Controller\AppController;

class SadrsController extends SadrsBaseController
{

    public function processAssignment($sadr,$evaluator,$message)
    {
         //new stage only once
         if(!in_array("Assigned", Hash::extract($sadr->report_stages, '{n}.stage'))) {
            $stage1  = $this->Sadrs->ReportStages->newEntity();
            $stage1->model = 'Sadrs';
            $stage1->stage = 'Assigned';
            $stage1->description = 'Stage 2';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $sadr->report_stages = [$stage1];
            $sadr->status = 'Assigned';
        }

        if ($this->Sadrs->save($sadr)) {
            //Send email and message (if present!!!) to evaluator
            $this->loadModel('Queue.QueuedJobs');    
            $data = [
                'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                'type' => 'manager_assign_evaluator_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                'vars' =>  $sadr->toArray()
            ];
            $data['vars']['assigned_by_name'] = $this->Auth->user('name');                
            $data['vars']['user_message'] = $message;
            $data['vars']['name'] = $evaluator->name;
            //notify applicant
            $this->QueuedJobs->createJob('GenericEmail', $data); //create the alert
            $data['type'] = 'manager_assign_evaluator_notification';  //select the template for the notification
            $this->QueuedJobs->createJob('GenericNotification', $data); //prepare data to be saved in the notifications table
            if ($message) {
              $data['type'] = 'manager_assign_evaluator_message';
              $data['user_message'] = $message;
              $this->QueuedJobs->createJob('GenericNotification', $data);
            }
            
            //notify manager
            $data = ['user_id' => $sadr->assigned_by, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                'vars' =>  $sadr->toArray()];
            $data['vars']['assigned_to_name'] = $evaluator->name;
            $data['type'] = 'manager_assign_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
            //end 
            
           $this->Flash->success('Evaluator '.$evaluator->name.' assigned ADR '.$sadr->reference_number);


            if($this->request->is('json')) {
                $this->set([
                    'message' => 'Evaluator '.$evaluator->name.' assigned ADR '.$sadr->reference_number, 
                    '_serialize' => ['message']]);
                return;
            }

            return $this->redirect($this->referer());
        }
         else {
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
    }
    public function assignSelf()
    {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($sadr->id) && $this->request->is('post')) {

            $current_user= $this->Auth->user('id'); //retrieve the current user
            $sadr->assigned_by = $current_user;
            $sadr->assigned_to =  $current_user;  //update the assigned_to field and mark the report as assigned
            $sadr->assigned_date = date("Y-m-d H:i:s");
            $sadr->status = 'Assigned';
            $evaluator = $this->Sadrs->Users->get($current_user);            
            $message=$this->request->getData('reminder_note');   // get the note added by the manager

           $this->processAssignment($sadr,$evaluator,$message);

        } else {
            if($this->request->is('json')) {
              $this->response->body('Failure');
              $this->response->statusCode(403);
              $this->set([
                'errors' => 'Unable to locate ADR', 
                'message' => 'Validation errors', 
                  '_serialize' => ['errors', 'message']]);
              return;
            } else {
                $this->Flash->error(__('Unknown ADR Report. Please correct.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    public function assignEvaluator() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr->assigned_by = $this->Auth->user('id');
            $sadr->assigned_to = $this->request->getData('evaluator');
            $sadr->assigned_date = date("Y-m-d H:i:s");
            $sadr->status = 'Assigned';
            $evaluator = $this->Sadrs->Users->get($this->request->getData('evaluator'));
            $message=$this->request->getData('user_message');

           $this->processAssignment($sadr,$evaluator,$message);
           
        } else {
            if($this->request->is('json')) {
              $this->response->body('Failure');
              $this->response->statusCode(403);
              $this->set([
                'errors' => 'Unable to locate ADR', 
                'message' => 'Validation errors', 
                  '_serialize' => ['errors', 'message']]);
              return;
            } else {
                $this->Flash->error(__('Unknown ADR Report. Please correct.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    public function changeEvaluator() {
        $sadr = $this->Sadrs->get($this->request->getData('id'), ['contain' => 'ReportStages']);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr->assigned_by = $this->Auth->user('id');
            $sadr->assigned_to = $this->request->getData('assigned_to');
            $sadr->assigned_date = date("Y-m-d H:i:s");
            $evaluator = $this->Sadrs->Users->get($this->request->getData('assigned_to'));

            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');                
                $data['vars']['user_message'] = $this->request->getData('user_message');
                $data['vars']['name'] = $evaluator->name;
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                //notify manager                
                $data = ['user_id' => $sadr->assigned_by, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->response->statusCode(200);
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Evaluator '.$evaluator->name.' assigned ADR '.$sadr->reference_number, 
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
                'errors' => 'Unable to locate ADR', 
                'message' => 'Validation errors', 
                  '_serialize' => ['errors', 'message']]);
              return;
            } else {
                $this->Flash->error(__('Unknown ADR Report. Please correct.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $sadr = $this->Sadrs->get($id);
        if ($this->Sadrs->delete($sadr)) {
            $this->Flash->success(__('The ADR has been deleted.'));
        } else {
            $this->Flash->error(__('The ADR could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
