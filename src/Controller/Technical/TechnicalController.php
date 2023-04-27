<?php
namespace App\Controller\Technical;

use App\Controller\AppController;

/**
 * Technical Controller
 *
 * @property \App\Model\Table\TechnicalTable $Technical
 *
 * @method \App\Model\Entity\Technical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TechnicalController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $technical = $this->paginate($this->Technical);

        $this->set(compact('technical'));
    }

    /**
     * View method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $technical = $this->Technical->get($id, [
            'contain' => []
        ]);

        $this->set('technical', $technical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $technical = $this->Technical->newEntity();
        if ($this->request->is('post')) {
            $technical = $this->Technical->patchEntity($technical, $this->request->getData());
            if ($this->Technical->save($technical)) {
                $this->Flash->success(__('The technical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technical could not be saved. Please, try again.'));
        }
        $this->set(compact('technical'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $technical = $this->Technical->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $technical = $this->Technical->patchEntity($technical, $this->request->getData());
            if ($this->Technical->save($technical)) {
                $this->Flash->success(__('The technical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technical could not be saved. Please, try again.'));
        }
        $this->set(compact('technical'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $technical = $this->Technical->get($id);
        if ($this->Technical->delete($technical)) {
            $this->Flash->success(__('The technical has been deleted.'));
        } else {
            $this->Flash->error(__('The technical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
