<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\SaefisBaseController;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends SaefisBaseController
{

    public function processAssignment($saefi,$evaluator,$message)
    {
        # code...
          //new stage only once
          if(!in_array("Assigned", Hash::extract($saefi->report_stages, '{n}.stage'))) {
            $stage1  = $this->Saefis->ReportStages->newEntity();
            $stage1->model = 'Saefis';
            $stage1->stage = 'Assigned';
            $stage1->description = 'Stage 2';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $saefi->report_stages = [$stage1];
            $saefi->status = 'Assigned';
        }

        if ($this->Saefis->save($saefi)) {
            //Send email and message (if present!!!) to evaluator
            $this->loadModel('Queue.QueuedJobs');    
            $data = [
                'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                'type' => 'manager_assign_evaluator_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                'vars' =>  $saefi->toArray()
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
    }
    public function assignSelf() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($saefi->id) && $this->request->is('post')) {
            $current=$this->Auth->user('id');
            $saefi->assigned_by = $current;
            $saefi->assigned_to = $current;
            $saefi->assigned_date = date("Y-m-d H:i:s");
            $saefi->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $saefi->status = 'Assigned';
            $evaluator = $this->Saefis->Users->get($current);
            $message=$this->request->getData('reminder_note');

           $this->processAssignment($saefi,$evaluator,$message);
          
        } else {
                $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }
    
    public function assignEvaluator() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi->assigned_by = $this->Auth->user('id');
            $saefi->assigned_to = $this->request->getData('evaluator');
            $saefi->assigned_date = date("Y-m-d H:i:s");
            $saefi->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $saefi->status = 'Assigned';
            $evaluator = $this->Saefis->Users->get($this->request->getData('evaluator'));            
            $message=$this->request->getData('user_message');

            $this->processAssignment($saefi,$evaluator,$message);
          
        } else {
                $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }

    public function changeEvaluator() {
        $saefi = $this->Saefis->get($this->request->getData('id'), ['contain' => 'ReportStages']);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi->assigned_by = $this->Auth->user('id');
            $saefi->assigned_to = $this->request->getData('assigned_to');
            $saefi->assigned_date = date("Y-m-d H:i:s");
            $saefi->action_date = date("Y-m-d H:i:s"); //Updated report action date
            $evaluator = $this->Saefis->Users->get($this->request->getData('assigned_to'));

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
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                //notify manager                
                $data = ['user_id' => $saefi->assigned_by, 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->response->statusCode(200);
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Evaluator '.$evaluator->name.' assigned ADR '.$saefi->reference_number, 
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

}
