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

            $this->loadModel('Sadrs');
            $this->loadModel('Adrs');
            $this->loadModel('Aefis');
            $this->loadModel('Saefis');

            if ($parm === 'sadrs') {
                $entity = $this->Sadrs;
            } elseif ($parm == 'adrs') {
                $entity = $this->Adrs;
            } elseif ($parm == 'aefis') {
                $entity = $this->Aefis;
            } elseif ($parm == 'saefis') {
                $entity = $this->Saefis;
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
            $pparm = ['adrs' => 'Adrs', 'sadrs' => 'Sadrs', 'aefis' => 'Aefis', 'saefis' => 'Saefis'];
            $stage1  = $entity->ReportStages->newEntity();
            $stage1->model = $pparm[$parm];
            $stage1->stage = 'Correspondence';
            $stage1->description = 'Stage 5: Correspondence';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $report->report_stages = [$stage1];
            $report->status = 'Correspondence';

            if ($this->Comments->save($comment) && $entity->save($report)) {
                //Send email, notification and message to managers and assigned evaluators
                $filt = [1, $report->assigned_to];
                $managers = $entity->Users->find('all', ['limit' => 200])->where(['group_id' => 2])->orWhere(['id IN' => $filt]);

                $this->loadModel('Queue.QueuedJobs'); 

                foreach ($managers as $manager) {
                    //Notify managers  
                    $data = [
                        'email_address' => $manager->email, 'user_id' => $manager->id,
                        'type' => 'manager_'.$parm.'_reporter_query_email', 'model' => $pparm[$parm], 'foreign_key' => $report->id,
                    ];
                    $data['vars']['name'] = $manager->name;
                    $data['vars']['reference_number'] = $report->reference_number;
                    $data['vars']['subject'] = $comment->subject;  
                    $data['vars']['content'] = $comment->content;              
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_'.$parm.'_reporter_query_notification';
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

                $this->Flash->success(__('The comment has been sent to the user.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        
    }

}
