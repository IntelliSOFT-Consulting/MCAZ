<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WhoDrugs Controller
 *
 * @property \App\Model\Table\WhoDrugsTable $WhoDrugs
 *
 * @method \App\Model\Entity\WhoDrug[] paginate($object = null, array $settings = [])
 */
class WhoDrugsController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->Auth->allow(['drugName']);       
    }
    
    public function drugName($query = null) {
        $drugs = $this->WhoDrugs->find('all', ['fields' => ['drug_name']])->distinct()
                ->where(['drug_name LIKE' => '%'.$this->request->getQuery('term').'%'])
                //->distinct(['drug_name'])
                ->limit(10); 
        
        $codes = array();
        foreach ($drugs as $key => $value) {
            $codes[] = array('value' => $value['drug_name'], 'label' => $value['drug_name']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $whoDrugs = $this->paginate($this->WhoDrugs);

        $this->set(compact('whoDrugs'));
        $this->set('_serialize', ['whoDrugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Who Drug id.
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
                $this->Flash->success(__('The who drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The who drug could not be saved. Please, try again.'));
        }
        $this->set(compact('whoDrug'));
        $this->set('_serialize', ['whoDrug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Who Drug id.
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
                $this->Flash->success(__('The who drug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The who drug could not be saved. Please, try again.'));
        }
        $this->set(compact('whoDrug'));
        $this->set('_serialize', ['whoDrug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Who Drug id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $whoDrug = $this->WhoDrugs->get($id);
        if ($this->WhoDrugs->delete($whoDrug)) {
            $this->Flash->success(__('The who drug has been deleted.'));
        } else {
            $this->Flash->error(__('The who drug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
