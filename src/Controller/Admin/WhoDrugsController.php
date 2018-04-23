<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;

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
