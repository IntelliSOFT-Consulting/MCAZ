<?php

namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[] paginate($object = null, array $settings = [])
 */
class CommentsBaseController extends AppController
{

    public function addFromCommittee($parm)
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {

            $model=null;
            $this->loadModel('Sadrs');
            $this->loadModel('Adrs');
            $this->loadModel('Aefis');
            $this->loadModel('Saefis');
            $this->loadModel('Ce2bs');

            if ($parm === 'sadrs') {
                $entity = $this->Sadrs;
                $model = "Sadrs";
            } elseif ($parm == 'adrs') {
                $entity = $this->Adrs;
                $model = "Adrs";
            } elseif ($parm == 'aefis') {
                $entity = $this->Aefis;
                $model = "Aefis";
            } elseif ($parm == 'saefis') {
                $entity = $this->Saefis;
                $model = "Saefis";
            } elseif ($parm == 'ce2bs') {
                $entity = $this->Ce2bs;
                $model = "Ce2bs";
            } else {
                $this->Flash->error(__('Unable to process request. Please, try again.'));
                return $this->redirect($this->referer());
            }

            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $report = $entity->get($this->request->getData('model_id'), []);

            /**
             * Committee raises query to applicant after decision
             * If decision is Approved comments/queries should not appear
             * 
             */
            $pparm = ['adrs' => 'Adrs', 'sadrs' => 'Sadrs', 'aefis' => 'Aefis', 'saefis' => 'Saefis', 'ce2bs' => 'Ce2bs'];
            $stage1  = $entity->ReportStages->newEntity();
            $stage1->model = $pparm[$parm];
            $stage1->stage = 'Correspondence';
            $stage1->description = 'Stage 5: Correspondence';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $report->report_stages = [$stage1];
            $report->status = 'Correspondence';
            $report->action_date = date("Y-m-d H:i:s");

            if ($this->Comments->save($comment) && $entity->save($report)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = [$this->Auth->user('id'), $report->assigned_to];
                $managers = $entity->Users->find('all', ['limit' => 200])->Where(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs');

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_' . $parm . '_reporter_query_email', 'model' => $pparm[$parm], 'foreign_key' => $report->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['reference_number'] = $report->reference_number;
                    $data['vars']['subject'] = $comment->subject;
                    $data['vars']['content'] = $comment->content;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_' . $parm . '_reporter_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //Notify Applicant 
                $applicant = $entity->Users->get($report->user_id);
                $data = [
                    'email_address' => $report->email_address, 'user_id' => $report->user_id,
                    'type' => 'applicant_pvct_query_email', 'model' => 'Applications', 'foreign_key' => $report->id,
                ];
                $data['vars']['reference_number'] = $report->reference_number;
                $data['vars']['name'] = $applicant->name;
                $data['vars']['subject'] = $comment->subject;
                $data['vars']['content'] = $comment->content;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = 'applicant_pvct_query_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                $message = "The comment has been sent to the user";
                $this->generate_audit_trail($report->id, $message,$model);

                $this->Flash->success(__('The comment has been sent to the user.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
    }

    public function addFromCausality($parm)
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {

            $model = null;
            $this->loadModel('Sadrs');
            $this->loadModel('Adrs');
            $this->loadModel('Aefis');
            $this->loadModel('Saefis');
            $this->loadModel('Ce2bs');

            if ($parm === 'sadrs') {
                $entity = $this->Sadrs;
                $model = "Sadrs";
            } elseif ($parm == 'adrs') {
                $entity = $this->Adrs;
                $model = "Adrs";
            } elseif ($parm == 'aefis') {
                $entity = $this->Aefis;
                $model = "Aefis";
            } elseif ($parm == 'saefis') {
                $entity = $this->Saefis;
                $model = "Saefis";
            } elseif ($parm == 'ce2bs') {
                $entity = $this->Ce2bs;
                $model = "Ce2bs";
            } else {
                $this->Flash->error(__('Unable to process request. Please, try again.'));
                return $this->redirect($this->referer());
            }

            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $report = $entity->get($this->request->getData('model_id'), []);

            /**
             * Committee raises query to evaluator after assessment
             * Should fire notification to evaluator
             * 
             */
            $pparm = ['adrs' => 'Adrs', 'sadrs' => 'Sadrs', 'aefis' => 'Aefis', 'saefis' => 'Saefis', 'ce2bs' => 'Ce2bs'];

            if ($this->Comments->save($comment)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = [$this->Auth->user('id'), $report->assigned_to];
                $managers = $entity->Users->find('all', ['limit' => 200])->Where(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs');

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_evaluator_query_email', 'model' => $pparm[$parm], 'foreign_key' => $report->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['reference_number'] = $report->reference_number;
                    $data['vars']['subject'] = $comment->subject;
                    $data['vars']['content'] = $comment->content;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_evaluator_query_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                $message = "The internal comment has been successfully raised";
                $this->generate_audit_trail($report->id, $message, $model);

                $this->Flash->success(__('The internal comment has been successfully raised.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The internal comment could not be saved. Please, try again.'));
        }
    }
    public function generate_audit_trail($id, $message, $model)

    {
        $logsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('AuditTrails');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $name = $this->Auth->user('email');
        $time = date('Y-m-d H:i:s');
        $message = $message . " at {$time} by {$name}";
        $logsTable->createLogEntry($id, $model, $message, $ipAddress);
    }
}
