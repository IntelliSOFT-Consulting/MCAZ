<?php
namespace App\Controller\Manager;

use App\Controller\Base\SadrsBaseController;

class SadrsController extends SadrsBaseController
{

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
