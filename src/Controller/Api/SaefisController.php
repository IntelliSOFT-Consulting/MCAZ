<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Cake\View\Helper\HtmlHelper; 

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SaefiListOfVaccines', 'Designations', 'Attachments', 'Reports', 'AefiListOfVaccines', 'RequestReporters', 'RequestEvaluators', 'Committees', 
                          'SaefiComments', 'SaefiComments.Attachments',  
                          'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments', 
                          'ReportStages', 'AefiCausalities', 'AefiCausalities.Users']
        ];
        $saefis = $this->paginate($this->Saefis->find('all')->where(['user_id' => $this->Auth->user('id')]));

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
        $id = base64_decode($id);
        $saefi = $this->Saefis->find('all', [
            'contain' => ['SaefiListOfVaccines', 'Designations', 'Attachments', 'Reports', 'AefiListOfVaccines', 'RequestReporters', 'RequestEvaluators', 'Committees', 
                          'SaefiComments', 'SaefiComments.Attachments',  
                          'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments', 
                          'ReportStages', 'AefiCausalities', 'AefiCausalities.Users']
        ])->where(['reference_number' => $id])->first();

        if (!empty($saefi)) {
            if ($saefi->user_id == $this->Auth->user('id')) {
                $this->set('saefi', $saefi);
                $this->set('_serialize', ['saefi']);
                return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'You don\'t have permissions to access report '.$id, 
                    '_serialize' => ['message']]);
                return;
            } 
        } else {
            $this->response->body('Failed to get Report');
            $this->response->statusCode(404);
            $this->set([
                'message' => 'Report '.$id.' does not exist', 
                '_serialize' => ['message']]);
            return;
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    protected function _attachments(){
        if (!empty($this->request->data['attachments'])) {
            for ($i = 0; $i <= count($this->request->data['attachments'])-1; $i++) { 
                $this->request->data['attachments'][$i]['model'] = 'Saefis';
                $this->request->data['attachments'][$i]['category'] = 'attachments';

                $file = explode(',', $this->request->data['attachments'][$i]['file']);
                //data:image/jpeg;base64
                $mystring = $file[0];
                $end = strpos($mystring, ';');
                $start2 = strpos($mystring, '/');
                $start3 = strpos($mystring, ':');
                $fileExt = substr($mystring, $start2+1, $end - $start2-1); //jpeg
                $fileType = substr($mystring, $start3+1, $end - $start3-1); //image/jpeg

                //decode it
                $data = base64_decode($file[1]);

                $filename =  (isset($this->request->data['attachments'][$i]['filename'])) ? uniqid().'-'.$this->request->data['attachments'][$i]['filename'] :  uniqid().'.' . $fileExt;
                $file_dir = WWW_ROOT . DS. 'files' .DS. 'Attachments' .DS. 'file' .DS. $filename;
                //file create
                file_put_contents($file_dir, $data);

                //not necessarily. I write it for use delete function this plugin
                $filesize = filesize($file_dir);

                //after base64 decode ,file delete
                $this->request->data['attachments'][$i]['file'] = null;

                $this->request->data['attachments'][$i]['file']['name'] = $filename;
                $this->request->data['attachments'][$i]['file']['type'] = $fileType;
                $this->request->data['attachments'][$i]['file']['tmp_name'] = $file_dir;
                $this->request->data['attachments'][$i]['file']['error'] = 0;
                $this->request->data['attachments'][$i]['file']['size'] = $filesize;
           }
        }        
    }

    public function add()
    {
        $saefi = $this->Saefis->newEntity();
        if ($this->request->is('post')) {
            $this->_attachments();
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData(),[
              'associated' => ['SaefiListOfVaccines', 'AefiListOfVaccines',  'Attachments', 'Reports', 'ReportStages']
            ]);

                //new stage
                $stage1  = $this->Saefis->ReportStages->newEntity();
                $stage1->model = 'Saefis';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $saefi->report_stages = [$stage1];

            $saefi->user_id = $this->Auth->user('id');
            $saefi->submitted_date = date("Y-m-d H:i:s");
            $saefi->status = 'Submitted';

            if(!empty($saefi->id)) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $sadr->errors(), 
                    'message' => 'Error: only new records without ID here!!', 
                    '_serialize' => ['errors', 'message']]);
                return;
            } 
            elseif ($this->Saefis->save($saefi, [
              'validate' => true,
              'associated' => [
                    'AefiListOfVaccines' => ['validate' => true ],
                    'ReportStages' => ['validate' => false ],
                ]
              ])) {
                //update field
                // $query = $this->Saefis->query();
                // $query->update()
                //     ->set(['reference_number' => 'SAEFI'.$saefi->id.'/'.$saefi->created->i18nFormat('yyyy')])
                //     ->where(['id' => $saefi->id])
                //     ->execute();
                //
                //New method to update reference number
                $refid = $this->Saefis->Refids->newEntity(['foreign_key' => $saefi->id, 'model' => 'Saefis', 'year' => date('Y')]);
                $this->Saefis->Refids->save($refid);
                $refid = $this->Saefis->Refids->get($refid->id);
                $saefi->reference_number = (($saefi->reference_number)) ?? 'SAEFI'.$refid->refid.'/'.$refid->year;
                $this->Saefis->save($saefi);
                //
                $saefi = $this->Saefis->get($saefi->id, [
                    'contain' => ['SaefiListOfVaccines', 'Attachments']
                ]);
                
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $saefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => ($saefi->report_type == 'FollowUp') ? 'applicant_submit_saefi_followup_email' : 'applicant_submit_saefi_email', 
                    'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'Saefis', 'action' => 'view', $saefi->id, '_ext' => 'pdf',  
                                          '_full' => true, 'prefix' => false]);
                $data['vars']['name'] = $saefi->reporter_name;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = ($saefi->report_type == 'FollowUp') ? 'applicant_submit_saefi_followup_notification' : 'applicant_submit_saefi_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Saefis->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                      'vars' =>  $saefi->toArray()];
                    $data['type'] = ($saefi->report_type == 'FollowUp') ? 'manager_submit_saefi_followup_email' : 'manager_submit_saefi_email';
                    $data['vars']['name'] = $manager->name;
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = ($saefi->report_type == 'FollowUp') ? 'manager_submit_saefi_followup_notification' : 'manager_submit_saefi_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                $this->set(compact('saefi'));
                $this->set('_serialize', ['saefi']);                
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $saefi->errors(), 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
                return;
            }
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
            $this->set([
                    'errors' => 'report already submitted', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
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
                $this->set([
                    'success' => 'success', 
                    'message' => 'successfully submitted report', 
                    '_serialize' => ['errors', 'message']]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == 2) {
              //submit to mcaz button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$saefi->reference_number.' has been successfully submitted to MCAZ for review.'));
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$saefi->reference_number.' later'));

           } else {
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
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
            $this->Flash->success(__('The saefi has been deleted.'));
        } else {
            $this->Flash->error(__('The saefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
