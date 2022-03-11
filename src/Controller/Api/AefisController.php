<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Cake\View\Helper\HtmlHelper; 

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

    // public function initialize() {
    //    parent::initialize();
    //    $this->Auth->allow(['add', 'edit']);       
    // }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //debug($this->request->data);
        if (isset($this->request->data['date_of_birth'])) {
            $this->request->data['date_of_birth'] = implode('-', $this->request->data['date_of_birth']);
        } 
        //date_of_onset_of_reaction
        if (isset($this->request->data['date_of_onset_of_reaction'])) {
            $this->request->data['date_of_onset_of_reaction'] = implode('-', $this->request->data['date_of_onset_of_reaction']);
        }
        //date_of_end_of_reaction
        if (isset($this->request->data['date_of_end_of_reaction'])) {
            $this->request->data['date_of_end_of_reaction'] = implode('-', $this->request->data['date_of_end_of_reaction']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ];
        $aefis = $this->paginate($this->Aefis->find('all')->where(['user_id' => $this->Auth->user('id')]));

        $this->set(compact('aefis'));
        $this->set('_serialize', ['aefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $id = base64_decode($id);
        $aefi = $this->Aefis->find('all', [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ])->where(['reference_number' => $id])->first();

        if (!empty($aefi)) {
            if ($aefi->user_id == $this->Auth->user('id')) {
                $this->set('aefi', $aefi);
                $this->set('_serialize', ['aefi']);
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
                $this->request->data['attachments'][$i]['model'] = 'Aefis';
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

    public function add() {
        $aefi = $this->Aefis->newEntity();
        if ($this->request->is('post')) {
            $this->_attachments();
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData(),[
                'associated' => ['AefiListOfVaccines', 'Attachments', 'ReportStages']
            ]);
                //new stage
                $stage1  = $this->Aefis->ReportStages->newEntity();
                $stage1->model = 'Aefis';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $aefi->report_stages = [$stage1];

            $aefi->user_id = $this->Auth->user('id');            
            $aefi->submitted_date = date("Y-m-d H:i:s");
            $aefi->status = 'Submitted';
            if(!empty($aefi->id)) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'New report error', 
                    'message' => 'Error: only new records without ID here!!', 
                    '_serialize' => ['errors', 'message']]);
                return;
            } 
            elseif ($this->Aefis->save($aefi, [
                'validate' => true,
                'associated' => [
                    'AefiListOfVaccines' => ['validate' => true ],
                    'Attachments' => ['validate' => false ],
                    'ReportStages' => ['validate' => false ],
                ]
            ])) {
                //update field
                // $query = $this->Aefis->query();
                // $query->update()
                //     ->set(['reference_number' => 'AEFI'.$aefi->id.'/'.$aefi->created->i18nFormat('yyyy')])
                //     ->where(['id' => $aefi->id])
                //     ->execute();
                //
                //New method to update reference number
                $refid = $this->Aefis->Refids->newEntity(['foreign_key' => $aefi->id, 'model' => 'Aefis', 'year' => date('Y')]);
                $this->Aefis->Refids->save($refid);
                $refid = $this->Aefis->Refids->get($refid->id);
                $aefi->reference_number = (($aefi->reference_number)) ? (($aefi->reference_number)): 'AEFI'.$refid->refid.'/'.$refid->year;
                $this->Aefis->save($aefi);
                //
                $aefi = $this->Aefis->get($aefi->id, [
                    'contain' => ['AefiListOfVaccines', 'Attachments']
                ]);

                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => ($aefi->report_type == 'FollowUp') ? 'applicant_submit_aefi_followup_email' : 'applicant_submit_aefi_email', 
                    'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];                
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'Aefis', 'action' => 'view', $aefi->id, '_ext' => 'pdf',  
                                          '_full' => true, 'prefix' => false]);
                $data['vars']['name'] = $aefi->reporter_name;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = ($aefi->report_type == 'FollowUp') ? 'applicant_submit_aefi_followup_notification' : 'applicant_submit_aefi_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Aefis->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                      'vars' =>  $aefi->toArray()];
                    $data['type'] = ($aefi->report_type == 'FollowUp') ? 'manager_submit_aefi_followup_email' : 'manager_submit_aefi_email';
                    $data['vars']['name'] = $manager->name;
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = ($aefi->report_type == 'FollowUp') ? 'manager_submit_aefi_followup_notification' : 'manager_submit_aefi_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //end

                $this->set(compact('aefi'));
                $this->set('_serialize', ['aefi']);
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $aefi->errors(), 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
                return;
            }
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $aefi = $this->Aefis->get($id, [
            'contain' => ['Users', 'AdrListOfDrugs', 'AdrOtherDrugs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['id'] = $this->Util->reverseXOR($this->request->data['id']);
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            //debug((string)$aefi);
            //debug($this->request->data);
            if ($this->Aefis->save($aefi, ['associated' => ['AdrListOfDrugs', 'AdrOtherDrugs']])) {

                //return $this->redirect(['action' => 'edit', $this->Util->generateXOR($aefi->id)]);
                //generate id
                $aefi->id = $this->Util->generateXOR($aefi->id);
                //
                $this->set('_serialize', ['aefi']);
            }
        }

        //format dates
        if (!empty($aefi->date_of_birth)) {
            if(empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($aefi->date_of_onset_of_reaction)) {
            if(empty($aefi->date_of_onset_of_reaction)) $aefi->date_of_onset_of_reaction = '--';
            $a = explode('-', $aefi->date_of_onset_of_reaction);
            $aefi->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($aefi->date_of_end_of_reaction)) {
            if(empty($aefi->date_of_end_of_reaction)) $aefi->date_of_end_of_reaction = '--';
            $a = explode('-', $aefi->date_of_end_of_reaction);
            $aefi->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $doses = $this->Aefis->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Aefis->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Aefis->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('aefi', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['aefi']);
    }

    //TODO: Add notifications to all API Calls
    public function followup($id = null)
    {
        $this->loadModel('AefiFollowups');
        $id = base64_decode($id);
        $aefi = $this->Aefis->find('all', [
            'contain' => []
        ])->where(['reference_number' => $id])->first();

        $followup = $this->AefiFollowups->newEntity() ;

        if(!empty($aefi) && $aefi->user_id == $this->Auth->user('id')) {
            if ($this->request->is(['patch', 'post', 'put'])) { 
                $followup = $this->AefiFollowups->patchEntity($followup, $this->request->getData());
                
                $followup->report_type = 'FollowUp';
                $followup->messageid = null;
                $followup->submitted_date = date("Y-m-d H:i:s");
                $followup->submitted = 2;
                $followup->aefi_id = $aefi->id;
                //Attachments
                $this->_attachments();
                if (!empty($followup->attachments)) {
                    for ($i = 0; $i <= count($followup->attachments)-1; $i++) { 
                      $followup->attachments[$i]->model = 'AefiFollowups';
                      $followup->attachments[$i]->category = 'attachments';
                    }
                }
                //submit to mcaz button
                $followup->submitted_date = date("Y-m-d H:i:s");
                //!!Important
                if(isset($followup->id)) unset($followup->id);
                
                //TODO: validate linked data here since validate will be false
                if ($this->AefiFollowups->save($followup, ['validate' => false])) {

                    //send email and notification
                    $this->loadModel('Queue.QueuedJobs');    
                    $data = [
                          'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                          'type' => 'applicant_submit_aefi_followup_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                          'vars' =>  $aefi->toArray()
                    ];
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_submit_aefi_followup_notification';
                    $data['vars']['created'] = $followup->created;
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                    //notify managers
                    $managers = $this->Aefis->Users->find('all')->where(['group_id IN' => [2, 4]]);
                    foreach ($managers as $manager) {
                        $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                                 'vars' =>  $aefi->toArray()];
                        $data['type'] = 'manager_submit_aefi_followup_email';
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_submit_aefi_followup_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                    //
                     $this->set(compact('followup'));
                     $this->set('_serialize', ['followup']);
                } else {
                    $this->response->body('Failure');
                    $this->response->statusCode(401);
                    $this->set([
                        'message' => 'Unable to save followup', 
                        '_serialize' => ['message']]);
                    return;
                }
           
          }
        } else {
          $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'message' => 'Report does not exist', 
                    '_serialize' => ['message']]);
                return;
        }

    }
    
    /**
     * Delete method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        if ($this->Aefis->delete($aefi)) {
            $this->Flash->success(__('The aefi has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
