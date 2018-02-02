<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Xml;
use Cake\Filesystem\File;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersBaseController extends AppController
{
    public $paginate = [
            // 'limit' => 2,
            'Sadrs' => ['scope' => 'sadr'],
            'Adrs' => ['scope' => 'adr'],
            'Aefis' => ['scope' => 'aefi'],
            'Saefis' => ['scope' => 'saefi']
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->loadModel('Users');     
    }
    
    public function dashboard() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
        ];

        // pr($user);

        $sadrs = $this->paginate($this->Sadrs->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'sadr', 'order' => ['Sadrs.status' => 'asc', 'Sadrs.id' => 'desc'],
                                    'fields' => ['Sadrs.id', 'Sadrs.created', 'Sadrs.reference_number', 'Sadrs.submitted']]);
        $adrs = $this->paginate($this->Adrs->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'adr', 'order' => ['Adrs.status' => 'asc', 'Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created', 'Adrs.reference_number']]);
        $aefis = $this->paginate($this->Aefis->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'aefi', 'order' => ['Aefis.status' => 'asc', 'Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created', 'Aefis.reference_number']]);
        $saefis = $this->paginate($this->Saefis->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'saefi', 'order' => ['Saefis.status' => 'asc', 'Saefis.id' => 'desc'],
                                    'fields' => ['Saefis.id', 'Saefis.created', 'Saefis.reference_number']]);

        $this->set(compact('sadrs', 'adrs', 'aefis', 'saeifs'));
        $this->set(compact('saefis'));
        $this->render('/Base/Users/dashboard');
    }

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
    public function imports() {
        if ($this->request->is('post')) {

            $this->loadModel('Sadrs');
            $this->loadModel('Adrs');
            $this->loadModel('Aefis');
            $this->loadModel('Saefis');

            if ($this->request->getData('submitted') === 'sadrs') {
                $entity = $this->Sadrs;
                $pre = 'ADR';
            } elseif ($this->request->getData('submitted') == 'adrs') {
                $entity = $this->Adrs;
                $pre = 'SAE';
            } elseif ($this->request->getData('submitted') == 'aefis') {
                $entity = $this->Aefis;
                $pre = 'AEFIS';
            } elseif ($this->request->getData('submitted') == 'saefis') {
                $entity = $this->Saefis;
                $pre = 'SAEFIS';
            } else {
                $this->Flash->error(__('Unable to process request. Please, try again.')); 
                return $this->redirect($this->referer());
            }

            $file = new File($this->request->data['sadr_files']['tmp_name']);
            $xmlString = $file->read();
            $xmlArray = Xml::toArray(Xml::build($xmlString, array('return' => 'domdocument')));
            // debug($xmlArray);
            // return;
            if(array_key_exists(0, $xmlArray['response'][$this->request->getData('submitted')])) {
                // debug("array key exists");
                $retVal = $xmlArray['response'][$this->request->getData('submitted')];
            } else {
                // debug("array key does not exists");
                $retVal[] = $xmlArray['response'][$this->request->getData('submitted')];
            } 
                          
            // debug(count($xmlArray['response'][$this->request->getData('submitted')]));
            // debug($retVal);
            // return;
            foreach ($retVal as $sadrArr) {       
                $sadr = $entity->newEntity();
                if ($this->request->is('post')) {
                    $this->_attachments();
                    // debug($sadrArr);
                    // return;
                    $sadr = $entity->patchEntity($sadr, $sadrArr, ['validate' => false]);
                    // debug($sadr->errors());
                    // return;
                    $sadr->user_id = $this->Auth->user('id');
                    $sadr->submitted_date = date("Y-m-d H:i:s");
                    $sadr->status = 'Imported';
                    if ($entity->save($sadr)) {
                        //update field
                        $query = $entity->query();
                        $query->update()
                            ->set(['reference_number' => $pre.$sadr->id.'/'.$sadr->created->i18nFormat('yyyy')])
                            ->where(['id' => $sadr->id])
                            ->execute();
                        
                        $this->Flash->success(__('The '.$pre.'(s) have been imported.'));
                    } else {                
                        $this->Flash->error(__('The '.$pre.'(s) could not be imported. Please, try again.'));
                    }
                }
            }
            //return $this->redirect(['controller' => 'UsersBase', 'action' => 'imports', 'prefix' => 'base']);
        } 
        $this->render('/Base/Users/imports');
    }
}
