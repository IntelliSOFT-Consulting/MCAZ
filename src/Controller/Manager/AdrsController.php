<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\AdrsBaseController;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AdrsBaseController
{

    public function processAssignment($adr,$evaluator,$message)
    {
          //new stage only once
          if(!in_array("Assigned", Hash::extract($adr->report_stages, '{n}.stage'))) {
            $stage1  = $this->Adrs->ReportStages->newEntity();
            $stage1->model = 'Adrs';
            $stage1->stage = 'Assigned';
            $stage1->description = 'Stage 2';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $adr->report_stages = [$stage1];
            $adr->status = 'Assigned';
        }

        if ($this->Adrs->save($adr)) {
            //Send email and message (if present!!!) to evaluator
            $this->loadModel('Queue.QueuedJobs');    
            $data = [
                'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                'type' => 'manager_assign_evaluator_email', 'model' => 'Adrs', 'foreign_key' => $adr->id,
                'vars' =>  $adr->toArray()
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
            $data = ['user_id' => $adr->assigned_by, 'model' => 'Adrs', 'foreign_key' => $adr->id,
                'vars' =>  $adr->toArray()];
            $data['vars']['assigned_to_name'] = $evaluator->name;
            $data['type'] = 'manager_assign_notification';
            $this->QueuedJobs->createJob('GenericNotification', $data);
            //end 
            
           $this->Flash->success('Evaluator '.$evaluator->name.' assigned SAE '.$adr->reference_number);

            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Unable to assign evaluator. Please, try again.')); 
            return $this->redirect($this->referer());
        }
    }
    public function assignSelf() {
        
        $adr = $this->Adrs->get($this->request->getData('adr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($adr->id) && $this->request->is('post')) {
            $current=$this->Auth->user('id');
            $adr->assigned_by =  $current;
            $adr->assigned_to =  $current;
            $adr->assigned_date = date("Y-m-d H:i:s");
            $evaluator = $this->Adrs->Users->get($current);
            $message=$this->request->getData('reminder_note');
           
            $this->processAssignment($adr,$evaluator,$message);
       
        } else {
                $this->Flash->error(__('Unknown SAE Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }
    public function assignEvaluator() {

        $adr = $this->Adrs->get($this->request->getData('adr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($adr->id) && $this->request->is('post')) {
            $adr->assigned_by = $this->Auth->user('id');
            $adr->assigned_to = $this->request->getData('evaluator');
            $adr->assigned_date = date("Y-m-d H:i:s");
            $evaluator = $this->Adrs->Users->get($this->request->getData('evaluator'));
            $message=$this->request->getData('user_message');
            
            $this->processAssignment($adr,$evaluator,$message);
          
        } else {
                $this->Flash->error(__('Unknown SAE Report. Please correct.')); 
                return $this->redirect($this->referer());
        }
    }

    public function changeEvaluator() {
        $adr = $this->Adrs->get($this->request->getData('id'), ['contain' => 'ReportStages']);
        if (isset($adr->id) && $this->request->is('post')) {
            $adr->assigned_by = $this->Auth->user('id');
            $adr->assigned_to = $this->request->getData('assigned_to');
            $adr->assigned_date = date("Y-m-d H:i:s");
            $evaluator = $this->Adrs->Users->get($this->request->getData('assigned_to'));

            if ($this->Adrs->save($adr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'manager_assign_evaluator_email', 'model' => 'Adrs', 'foreign_key' => $adr->id,
                    'vars' =>  $adr->toArray()
                ];
                $data['vars']['assigned_by_name'] = $this->Auth->user('name');                
                $data['vars']['user_message'] = $this->request->getData('user_message');
                $data['vars']['name'] = $evaluator->name;
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'manager_assign_evaluator_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                
                //notify manager                
                $data = ['user_id' => $adr->assigned_by, 'model' => 'Adrs', 'foreign_key' => $adr->id,
                    'vars' =>  $adr->toArray()];
                $data['vars']['assigned_to_name'] = $evaluator->name;
                $data['type'] = 'manager_assign_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->response->statusCode(200);
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Evaluator '.$evaluator->name.' assigned SAE '.$adr->reference_number, 
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
        $adr = $this->Adrs->get($id);
        if ($this->Adrs->delete($adr)) {
            $this->Flash->success(__('The adr has been deleted.'));
        } else {
            $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
