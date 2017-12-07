<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 *
 * @method \App\Model\Entity\Attachment[] paginate($object = null, array $settings = [])
 */
class AttachmentsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        // $this->Auth->allow(); 
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $attachments = $this->paginate($this->Attachments);

        $this->set(compact('attachments'));
        $this->set('_serialize', ['attachments']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);

        $this->set('attachment', $attachment);
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /*$this->autoRender = false;
        // $this->request->onlyAllow('ajax');

        if ($this->request->is('post')) {

            define('UPLOAD_DIR', 'files/messages/');
            $img = $this->request->data['Attachment']['file'];
            if (empty($img) || !$img) {
                $this->response->body('Failure in checking img');
                $this->response->statusCode(403);
                return;
            }

            $this->Attachment->create();

            $img = explode(',', $img);

            $data = base64_decode($img[0]);
            $filename = uniqid() . '.png';
            $file_dir = UPLOAD_DIR . $filename;


            $this->request->data['file'] = $filename;

            if ($this->Attachment->save($this->request->data)) {
                $success = file_put_contents($file_dir, $data);
                $this->response->body('Failure');
                $this->response->statusCode(200);
                $this->set(compact('attachment'));
                $this->set('_serialize', ['attachment']);
                return;
            }
            $this->response->body('Failure in saving img');
            $this->response->statusCode(400);
            return;
        }*/
          // debug($this->request->data);
         //target file before decode
          $img = Hash::get($this->request->data,"file");

          $img = explode(',', $img);
          $start = strlen('data:image/');

          //to get filetype [0] => data:image/jpeg;base64
          $mystring = $img[0];
          //to get filetype
          $end = strpos($mystring, ';');
          $start2 = strpos($mystring, '/');
          $start3 = strpos($mystring, ':');
          // $fileType = substr($mystring, $start, $end - $start);
          // $fileExt = substr($mystring, $start2+1, $end - $start2);
          // substr($mystring, 0, $start2+1); //data:image/
          $fileExt = substr($mystring, $start2+1, $end - $start2-1); //jpeg
          $fileType = substr($mystring, $start3+1, $end - $start3-1); //image/jpeg

          //decode it
          $data = base64_decode($img[1]);
          
          $filename = uniqid().'.' . $fileExt;
          $file_dir = WWW_ROOT . DS. 'files' .DS. 'Attachments' .DS. 'file' .DS. $filename;
          //file create
          file_put_contents($file_dir, $data);
          
          //not necessarily. I write it for use delete function this plugin
          $filesize = filesize($file_dir);

          //after base64 decode ,file delete
          $this->request->data['file'] = null;

          // $this->request->data['attachment']['file']['foreign_key'] = 2; //hardcoded remove
          $this->request->data['file']['name'] = $filename;
          $this->request->data['file']['type'] = $fileType;
          $this->request->data['file']['tmp_name'] = $file_dir;
          $this->request->data['file']['error'] = 0;
          $this->request->data['file']['size'] = $filesize;
          // $this->Attachment->save($this->request->data)

         $attachment = $this->Attachments->newEntity();
         if ($this->request->is('post')) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->getData());
            // debug($attachment);
            // return;
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));
                $this->set(compact('attachment'));
                $this->set('_serialize', ['attachment']);
                // return $this->redirect(['action' => 'index']);
            }
            $this->set([
                    'error' => 'error', 
                    'message' => 'unable to  submit report', 
                    '_serialize' => ['errors', 'message']]);
            $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
        }
        $this->set(compact('attachment'));
        $this->set('_serialize', ['attachment']); 
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            pr($this->request->data);
            debug($attachment);
            return;
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->getData());
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
        }
        $this->set(compact('attachment'));
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($id);
        if ($this->Attachments->delete($attachment)) {
            $this->Flash->success(__('The attachment has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
