<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ce2bs = $this->paginate($this->Ce2bs->find()->where(['user_id' => $this->Auth->user('id')]));

        $this->set(compact('ce2bs'));
        $this->set('_serialize', ['ce2bs']);
    }

    /**
     * View method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => []
        ]);

        $this->set('ce2b', $ce2b);
        $this->set('_serialize', ['ce2b']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ce2b = $this->Ce2bs->newEntity();
        if ($this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            //Attachments
            if (!empty($ce2b->attachments)) {
                  for ($i = 0; $i <= count($ce2b->attachments)-1; $i++) { 
                    $ce2b->attachments[$i]->model = 'Ce2bs';
                    $ce2b->attachments[$i]->category = 'attachments';
                  }
                }

            //Get file contents
            $this->loadModel('Imports');
            //Check if file has been loaded before 
            $import = $this->Imports->findByFilename($this->request->data['e2b_file']['name']);
            if (!$import->isEmpty()) {
                $import_dates = implode(', ', Hash::extract($import->toArray(), '{n}.created'));
                $this->Flash->warning('The file <b>'.$this->request->data['e2b_file']['name'].'</b> has been imported before on '.$import_dates.'. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
                return $this->redirect(['action' => 'add']);
            } else {
                $file = new File($this->request->data['e2b_file']['tmp_name']);
                $xmlString = $file->read();
                //End file contents

                $ce2b->e2b_content = $xmlString;
                $ref = $this->Ce2bs->find()->count() + 1;
                $ce2b->reference_number = (($ce2b->reference_number)) ?? 'CE2B'.$ref.'/'.date('Y');
                if ($this->Ce2bs->save($ce2b)) {

                    $datum = $this->Imports->newEntity(['filename' => $this->request->data['e2b_file']['name']]);
                    $this->Imports->save($datum);

                    $this->Flash->success(__('The E2B File has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The E2B File could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ce2b'));
        $this->set('_serialize', ['ce2b']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            if ($this->Ce2bs->save($ce2b)) {
                $this->Flash->success(__('The ce2b has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ce2b could not be saved. Please, try again.'));
        }
        $this->set(compact('ce2b'));
        $this->set('_serialize', ['ce2b']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ce2b = $this->Ce2bs->get($id);
        if ($this->Ce2bs->delete($ce2b)) {
            $this->Flash->success(__('The ce2b has been deleted.'));
        } else {
            $this->Flash->error(__('The ce2b could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
