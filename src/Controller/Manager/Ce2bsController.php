<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;
use App\Controller\Base\Ce2bsBaseController;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsController extends Ce2bsBaseController
{
    public function processAssignment($ce2b,$evaluator,$message)
    {
        //new stage only once
        if(!in_array("Assigned", Hash::extract($ce2b->report_stages, '{n}.stage'))) {
            $stage1  = $this->Ce2bs->ReportStages->newEntity();
            $stage1->model = 'Ce2bs';
            $stage1->stage = 'Assigned';
            $stage1->description = 'Stage 2';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $ce2b->report_stages = [$stage1];
            $ce2b->status = 'Assigned';
        }

        if ($this->Ce2bs->save($ce2b)) {
            //Send email and message (if present!!!) to evaluator
            $this->loadModel('Queue.QueuedJobs');    
            $data = [
                'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                'type' => 'manager_assign_evaluator_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                'vars' =>  $ce2b->toArray()
            ];
            $data['vars']['assigned_by_name'] = $this->Auth->user('name');
            $data['vars']['user_message'] = $message;
            $data['vars']['name'] = $evaluator->name;
            //notify evaluator
            $this->QueuedJobs->createJob('GenericEmail', $data);
            $data['type'] = 'manager_assign_evaluator_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
            if ($message) {
              $data['type'] = 'manager_assign_evaluator_message';
              $data['user_message'] = $message;
              $this->QueuedJobs->createJob('GenericNotification', $data);
            }
            
            //notify manager                
            $data = ['user_id' => $ce2b->assigned_by, 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                'vars' =>  $ce2b->toArray()];
            $data['vars']['assigned_to_name'] = $evaluator->name;
            $data['type'] = 'manager_assign_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
            //end 
            
           $this->Flash->success('Evaluator '.$evaluator->name.' assigned Company E2B '.$ce2b->reference_number);

            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
            return $this->redirect($this->referer());
        }
    }
    public function assignSelf() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), ['contain' => 'ReportStages']);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $current=$this->Auth->user('id');
            $ce2b->assigned_by = $current;
            $ce2b->assigned_to = $current;
            $ce2b->assigned_date = date("Y-m-d H:i:s");
            $ce2b->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $evaluator = $this->Ce2bs->Users->get($current);
            $message=$this->request->getData('reminder_note');
            
           $this->processAssignment($ce2b,$evaluator,$message);
        } else {
                $this->Flash->error(__('Unknown Company E2B Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }
    public function assignEvaluator() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), ['contain' => 'ReportStages']);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b->assigned_by = $this->Auth->user('id');
            $ce2b->assigned_to = $this->request->getData('evaluator');
            $ce2b->assigned_date = date("Y-m-d H:i:s");
            $ce2b->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $evaluator = $this->Ce2bs->Users->get($this->request->getData('evaluator'));
            $message=$this->request->getData('user_message');
            
           $this->processAssignment($ce2b,$evaluator,$message);
          
        } else {
                $this->Flash->error(__('Unknown Company E2B Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }

    public function changeEvaluator() {
        $ce2b = $this->Ce2bs->get($this->request->getData('id'), ['contain' => 'ReportStages']);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b->assigned_by = $this->Auth->user('id');
            $ce2b->assigned_to = $this->request->getData('assigned_to');
            $ce2b->assigned_date = date("Y-m-d H:i:s");
            $ce2b->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $evaluator = $this->Ce2bs->Users->get($this->request->getData('assigned_to'));

            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');                
                $data['vars']['user_message'] = $this->request->getData('user_message');
                $data['vars']['name'] = $evaluator->name;
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                //notify manager                
                $data = ['user_id' => $ce2b->assigned_by, 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->response->statusCode(200);
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Evaluator '.$evaluator->name.' assigned SAE '.$ce2b->reference_number, 
                        '_serialize' => ['message']]);
                    return;
                }

                return $this->redirect($this->referer());
            } else {
              if($this->request->is('json')) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to assign Sce2b to '.$evaluator->name, 
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
                'errors' => 'Unable to locate ce2b', 
                'message' => 'Validation errors', 
                  '_serialize' => ['errors', 'message']]);
              return;
            } else {
                $this->Flash->error(__('Unknown ce2b Report. Please correct.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ce2b = $this->Ce2bs->get($id);
        if ($this->Ce2bs->delete($ce2b)) {
            $this->Flash->success(__('The ce2b has been deleted.'));
        } else {
            $this->Flash->error(__('The ce2b could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
