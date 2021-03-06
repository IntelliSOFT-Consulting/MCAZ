<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Meddras Controller
 *
 * @property \App\Model\Table\MeddrasTable $Meddras
 *
 * @method \App\Model\Entity\Meddra[] paginate($object = null, array $settings = [])
 */
class MeddrasController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }
    
    public function index()
    {
        $this->paginate = [
            'contain' => [],
            'fields' => ['id', 'terminology']
        ];

        $query = $this->Meddras
            ->find('search', ['search' => $this->request->query]);

        $this->set('meddras', $this->paginate($query));

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'terminology'];
            $_extract = ['id', 'terminology'];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Meddra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meddra = $this->Meddras->get($id, [
            'contain' => []
        ]);

        $this->set('meddra', $meddra);
        $this->set('_serialize', ['meddra']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function import()
    {
        if ($this->request->is('post')) {
            //confirm file is .csv and correct format
            //insert records without checking duplicates
            //run query to delete duplicates on drug names
            
            if ($this->request->data['terminology_files']['type'] !== 'text/csv') {
                $this->Flash->error('Only csv files with the medDRA LLT as the first column allowed');
                return $this->redirect(['action' => 'import']);
            }

            $this->loadModel('Imports');
            $entity = $this->Meddras;
            
            //Check if file has been loaded before 
            $import = $this->Imports->findByFilename($this->request->data['terminology_files']['name']);
            if (!$import->isEmpty()) {
                $import_dates = implode(', ', Hash::extract($import->toArray(), '{n}.created'));
                $this->Flash->warning('The file <b>'.$this->request->data['terminology_files']['name'].'</b> has been imported before on '.$import_dates.'. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
                return $this->redirect(['action' => 'import']);
            } else {
                $datum = $this->Imports->newEntity(['filename' => $this->request->data['terminology_files']['name']]);
                $this->Imports->save($datum);
            }
            //
            //debug($this->request->data);
            // $file = new File($this->request->data['terminology_files']['tmp_name']);
            $handle = fopen($this->request->data['terminology_files']['tmp_name'], "r");
            $data = [];
            while (($line = fgetcsv($handle)) !== FALSE) {
                $data[] = ['terminology' => $line[0]];
            }
            
            $entities = $this->Meddras->newEntities($data);
            if($this->Meddras->saveMany($entities)) {                
                $this->Flash->success('Inserted '.count($data).' medDRA terminologies');
                // debug($result);            

                $this->loadModel('Queue.QueuedJobs');    
                $this->QueuedJobs->createJob('ImportTerminologies');
            } else {
                $this->Flash->error(__('The drug(s) could not be imported. Please, try again.'));
            }
            
        } 
    }

    public function add()
    {
        $meddra = $this->Meddras->newEntity();
        if ($this->request->is('post')) {
            $meddra = $this->Meddras->patchEntity($meddra, $this->request->getData());
            if ($this->Meddras->save($meddra)) {
                $this->Flash->success(__('The meddra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meddra could not be saved. Please, try again.'));
        }
        $this->set(compact('meddra'));
        $this->set('_serialize', ['meddra']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meddra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meddra = $this->Meddras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meddra = $this->Meddras->patchEntity($meddra, $this->request->getData());
            if ($this->Meddras->save($meddra)) {
                $this->Flash->success(__('The meddra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meddra could not be saved. Please, try again.'));
        }
        $this->set(compact('meddra'));
        $this->set('_serialize', ['meddra']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meddra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meddra = $this->Meddras->get($id);
        if ($this->Meddras->delete($meddra)) {
            $this->Flash->success(__('The meddra has been deleted.'));
        } else {
            $this->Flash->error(__('The meddra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
