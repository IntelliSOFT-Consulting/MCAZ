<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class SadrsController extends AppController
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
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ];
        $sadrs = $this->paginate($this->Sadrs->find('all')->where(['user_id' => $this->Auth->user('id')]));

        $this->set(compact('sadrs'));
        $this->set('_serialize', ['sadrs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {           
        $id = base64_decode($id);
        $sadr = $this->Sadrs->find('all', [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ])->where(['reference_number' => $id])->first();

        // $this->set('sadr', $sadr);
        //         $this->set('_serialize', ['sadr']);
        //         return;

        if (!empty($sadr)) {
            if ($sadr->user_id == $this->Auth->user('id')) {
                $this->set('sadr', $sadr);
                $this->set('_serialize', ['sadr']);
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
                $this->request->data['attachments'][$i]['model'] = 'Sadrs';

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

                $filename =  (isset($this->request->data['attachments'][$i]['filename'])) ? uniqid().'-'. $this->request->data['attachments'][$i]['filename'] :  uniqid().'.' . $fileExt;
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
                $this->request->data['attachments'][$i]['category'] = 'attachments';
           }
        }        
    }

    public function add()
    {
        // $sadr = $this->Sadrs->get(3, [
        //     'contain' => ['Users', 'SadrListOfDrugs', 'SadrOtherDrugs']
        // ]);
        $sadr = $this->Sadrs->newEntity();
        if ($this->request->is('post')) {
            $this->_attachments();
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->user_id = $this->Auth->user('id');
            $sadr->submitted_date = date("Y-m-d H:i:s");
            $sadr->status = 'Submitted';
            if ($this->Sadrs->save($sadr, ['validate' => false])) {
                //update field
                $query = $this->Sadrs->query();
                $query->update()
                    ->set(['reference_number' => 'ADR'.$sadr->id.'/'.$sadr->created->i18nFormat('yyyy')])
                    ->where(['id' => $sadr->id])
                    ->execute();
                //
                $sadr = $this->Sadrs->get($sadr->id, [
                    'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
                ]);
                $this->set(compact('sadr'));
                $this->set('_serialize', ['sadr']);
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $sadr->errors(), 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
                return;
            }
        }

        // $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        // $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        // $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        // $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr'));
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
       
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $this->request->data['id'] = $this->Util->reverseXOR($this->request->data['id']);
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            //debug((string)$sadr);
            //debug($this->request->data);
            if ($this->Sadrs->save($sadr, ['associated' => ['SadrListOfDrugs', 'SadrOtherDrugs']])) {

                //return $this->redirect(['action' => 'edit', $this->Util->generateXOR($sadr->id)]);
                //generate id
                // $sadr->id = $this->Util->generateXOR($sadr->id);
                //
                $this->set('_serialize', ['sadr']);
            }
        }

        //format dates
        if (!empty($sadr->date_of_birth)) {
            if(empty($sadr->date_of_birth)) $sadr->date_of_birth = '--';
            $a = explode('-', $sadr->date_of_birth);
            $sadr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($sadr->date_of_onset_of_reaction)) {
            if(empty($sadr->date_of_onset_of_reaction)) $sadr->date_of_onset_of_reaction = '--';
            $a = explode('-', $sadr->date_of_onset_of_reaction);
            $sadr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($sadr->date_of_end_of_reaction)) {
            if(empty($sadr->date_of_end_of_reaction)) $sadr->date_of_end_of_reaction = '--';
            $a = explode('-', $sadr->date_of_end_of_reaction);
            $sadr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
    }

    //TODO: Add notifications to all API Calls
    public function followup($id = null)
    {
        $this->loadModel('SadrFollowups');
        $id = base64_decode($id);
        $sadr = $this->Sadrs->find('all', [
            'contain' => []
        ])->where(['reference_number' => $id])->first();

        $followup = $this->SadrFollowups->newEntity() ;

        if(!empty($sadr) && $sadr->user_id == $this->Auth->user('id')) {
            if ($this->request->is(['patch', 'post', 'put'])) { 
                $followup = $this->SadrFollowups->patchEntity($followup, $this->request->getData());
                $followup->report_type = 'FollowUp';
                $followup->submitted_date = date("Y-m-d H:i:s");
                $followup->submitted = 2;
                $followup->sadr_id = $sadr->id;
                //Attachments
                $this->_attachments();
                if (!empty($followup->attachments)) {
                    for ($i = 0; $i <= count($followup->attachments)-1; $i++) { 
                      $followup->attachments[$i]->model = 'SadrFollowups';
                      $followup->attachments[$i]->category = 'attachments';
                    }
                }
                //submit to mcaz button
                $followup->submitted_date = date("Y-m-d H:i:s");
                
                //TODO: validate linked data here since validate will be false
                if ($this->SadrFollowups->save($followup, ['validate' => false])) {
                    
                    //update Initial SADR report status
                    $sadr->status = 'FollowUp';
                    $this->Sadrs->save($sadr, ['validate' => false]);

                    //send email and notification
                    $this->loadModel('Queue.QueuedJobs');    
                    $data = [
                          'email_address' => $sadr->reporter_email, 'user_id' => $this->Auth->user('id'),
                          'type' => 'applicant_submit_sadr_followup_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                          'vars' =>  $sadr->toArray()
                    ];
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'applicant_submit_sadr_followup_notification';
                    $data['vars']['created'] = $followup->created;
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                    //notify managers
                    $managers = $this->Sadrs->Users->find('all')->where(['group_id IN' => [2, 4]]);
                    foreach ($managers as $manager) {
                        $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                                 'vars' =>  $sadr->toArray()];
                        $data['type'] = 'manager_submit_sadr_followup_email';
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'manager_submit_sadr_followup_notification';
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

    //TODO: Enable softdelete for all controllers and remove delete action from most
    /**
     * Delete method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $sadr = $this->Sadrs->get($id);
        if ($this->Sadrs->delete($sadr)) {
            $this->Flash->success(__('The sadr has been deleted.'));
        } else {
            $this->Flash->error(__('The sadr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
