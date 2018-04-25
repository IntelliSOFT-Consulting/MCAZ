<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Utility\Hash;

/**
 * WhoDrugs Controller
 *
 * @property \App\Model\Table\whoDrugsTable $WhoDrugs
 *
 * @method \App\Model\Entity\whoDrug[] paginate($object = null, array $settings = [])
 */
class WhoDrugsController extends AppController
{
    
    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       // $this->Auth->allow('logout', 'activate', 'view');       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [],
            'fields' => ['id', 'drug_name']
        ];

        $query = $this->WhoDrugs
            ->find('search', ['search' => $this->request->query]);

        $this->set('whoDrugs', $this->paginate($query));

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'drug_name'];
            $_extract = ['id', 'drug_name'];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
    }
    /**
     * View method
     *
     * @param string|null $id whoDrug id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $whoDrug = $this->WhoDrugs->get($id, [
            'contain' => []
        ]);

        $this->set('whoDrug', $whoDrug);
        $this->set('_serialize', ['whoDrug']);
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

            if ($this->request->data['drug_files']['type'] !== 'text/csv') {
                $this->Flash->error('Only csv files with the drug name as the first column allowed');
                return $this->redirect(['action' => 'import']);
            }
            
            $this->loadModel('Imports');
            $entity = $this->WhoDrugs;
            
            //Check if file has been loaded before 
            $import = $this->Imports->findByFilename($this->request->data['drug_files']['name']);
            if (!$import->isEmpty()) {
                $import_dates = implode(', ', Hash::extract($import->toArray(), '{n}.created'));
                $this->Flash->warning('The file <b>'.$this->request->data['drug_files']['name'].'</b> has been imported before on '.$import_dates.'. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
                return $this->redirect(['action' => 'import']);
            } else {
                $datum = $this->Imports->newEntity(['filename' => $this->request->data['drug_files']['name']]);
                $this->Imports->save($datum);
            }
            //
            // debug($this->request->data); return;
            // $file = new File($this->request->data['drug_files']['tmp_name']);
            $handle = fopen($this->request->data['drug_files']['tmp_name'], "r");
            $data = [];
            while (($line = fgetcsv($handle)) !== FALSE) {
                $data[] = ['drug_name' => $line[0]];
            }
            
            $entities = $this->WhoDrugs->newEntities($data);
            if($this->WhoDrugs->saveMany($entities)) {                
                $this->Flash->success('Inserted '.count($data).' drugs');
                // debug($result);            

                $this->loadModel('Queue.QueuedJobs');    
                $this->QueuedJobs->createJob('ImportDrugs');
            } else {
                $this->Flash->error(__('The drug(s) could not be imported. Please, try again.'));
            }
            
        } 
    }

    public function add()
    {
        $whoDrug = $this->WhoDrugs->newEntity();
        if ($this->request->is('post')) {
            $whoDrug = $this->WhoDrugs->patchEntity($whoDrug, $this->request->getData());
            if ($this->WhoDrugs->save($whoDrug)) {
                $this->Flash->success(__('The whoDrug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The whoDrug could not be saved. Please, try again.'));
        }
        $this->set(compact('whoDrug'));
        $this->set('_serialize', ['whoDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id whoDrug id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $whoDrug = $this->WhoDrugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $whoDrug = $this->WhoDrugs->patchEntity($whoDrug, $this->request->getData());
            if ($this->WhoDrugs->save($whoDrug)) {
                $this->Flash->success(__('The whoDrug has been saved.'));

                return $this->redirect(['action' => 'view', $whoDrug->id]);
            }
            $this->Flash->error(__('The whoDrug could not be saved. Please, try again.'));
        }
        $this->set(compact('whoDrug'));
        $this->set('_serialize', ['whoDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id whoDrug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $whoDrug = $this->WhoDrugs->get($id);
        if ($this->WhoDrugs->delete($whoDrug)) {
            $this->Flash->success(__('The whoDrug has been deleted.'));
        } else {
            $this->Flash->error(__('The whoDrug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
