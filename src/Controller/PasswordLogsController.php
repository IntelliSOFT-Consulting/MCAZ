<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PasswordLogs Controller
 *
 * @property \App\Model\Table\PasswordLogsTable $PasswordLogs
 *
 * @method \App\Model\Entity\PasswordLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PasswordLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $passwordLogs = $this->paginate($this->PasswordLogs);

        $this->set(compact('passwordLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Password Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passwordLog = $this->PasswordLogs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('passwordLog', $passwordLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passwordLog = $this->PasswordLogs->newEntity();
        if ($this->request->is('post')) {
            $passwordLog = $this->PasswordLogs->patchEntity($passwordLog, $this->request->getData());
            if ($this->PasswordLogs->save($passwordLog)) {
                $this->Flash->success(__('The password log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password log could not be saved. Please, try again.'));
        }
        $users = $this->PasswordLogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('passwordLog', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Password Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passwordLog = $this->PasswordLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passwordLog = $this->PasswordLogs->patchEntity($passwordLog, $this->request->getData());
            if ($this->PasswordLogs->save($passwordLog)) {
                $this->Flash->success(__('The password log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password log could not be saved. Please, try again.'));
        }
        $users = $this->PasswordLogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('passwordLog', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Password Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passwordLog = $this->PasswordLogs->get($id);
        if ($this->PasswordLogs->delete($passwordLog)) {
            $this->Flash->success(__('The password log has been deleted.'));
        } else {
            $this->Flash->error(__('The password log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
