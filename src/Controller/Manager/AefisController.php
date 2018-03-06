<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\AefisBaseController;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AefisBaseController
{
    
    public function assignEvaluator() {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi->assigned_by = $this->Auth->user('id');
            $aefi->assigned_to = $this->request->getData('evaluator');
            $aefi->assigned_date = date("Y-m-d H:i:s");
            $aefi->status = 'Assigned';
            $evaluator = $this->Aefis->Users->get($this->request->getData('evaluator'));

            //new stage only once
            if(!in_array("Assigned", Hash::extract($aefi->report_stages, '{n}.stage'))) {
                $stage1  = $this->Sadrs->ReportStages->newEntity();
                $stage1->model = 'Aefis';
                $stage1->stage = 'Assigned';
                $stage1->description = 'Stage 2';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $aefi->report_stages = [$stage1];
                $aefi->status = 'Assigned';
            }

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
    
}
