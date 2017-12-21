<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AppController
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
        $adrs = $this->paginate($this->Adrs->find('all')->where(['user_id' => $this->Auth->user('id')]));

        $this->set(compact('adrs'));
        $this->set('_serialize', ['adrs']);
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
        $adr = $this->Adrs->find('all', [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments']
        ])->where(['reference_number' => $id])->first();

        if (!empty($adr)) {
            if ($adr->user_id == $this->Auth->user('id')) {
                $this->set('adr', $adr);
                $this->set('_serialize', ['adr']);
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
                $this->request->data['attachments'][$i]['model'] = 'Adrs';
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
        $adr = $this->Adrs->newEntity();
        if ($this->request->is('post')) {
            $this->_attachments();
            $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
            $adr->user_id = $this->Auth->user('id');
            if ($this->Adrs->save($adr, ['validate' => false])) {
                //update field
                $query = $this->Adrs->query();
                $query->update()
                    ->set(['reference_number' => 'SAE'.$adr->id.'/'.$adr->created->i18nFormat('yyyy')])
                    ->where(['id' => $adr->id])
                    ->execute();
                //
                $adr = $this->Adrs->get($adr->id, [
                    'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments']
                ]);
                $this->set(compact('adr'));
                $this->set('_serialize', ['adr']);
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $adr->errors(), 
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

        $adr = $this->Adrs->get($id, [
            'contain' => ['Users', 'AdrListOfDrugs', 'AdrOtherDrugs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['id'] = $this->Util->reverseXOR($this->request->data['id']);
            $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
            //debug((string)$adr);
            //debug($this->request->data);
            if ($this->Adrs->save($adr, ['associated' => ['AdrListOfDrugs', 'AdrOtherDrugs']])) {

                //return $this->redirect(['action' => 'edit', $this->Util->generateXOR($adr->id)]);
                //generate id
                $adr->id = $this->Util->generateXOR($adr->id);
                //
                $this->set('_serialize', ['adr']);
            }
        }

        //format dates
        if (!empty($adr->date_of_birth)) {
            if(empty($adr->date_of_birth)) $adr->date_of_birth = '--';
            $a = explode('-', $adr->date_of_birth);
            $adr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($adr->date_of_onset_of_reaction)) {
            if(empty($adr->date_of_onset_of_reaction)) $adr->date_of_onset_of_reaction = '--';
            $a = explode('-', $adr->date_of_onset_of_reaction);
            $adr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($adr->date_of_end_of_reaction)) {
            if(empty($adr->date_of_end_of_reaction)) $adr->date_of_end_of_reaction = '--';
            $a = explode('-', $adr->date_of_end_of_reaction);
            $adr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Adrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adr']);
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
        $adr = $this->Adrs->get($id);
        if ($this->Adrs->delete($adr)) {
            $this->Flash->success(__('The adr has been deleted.'));
        } else {
            $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
