<?php
namespace App\Controller\Technical;

use App\Controller\AppController;
use App\Controller\Base\Ce2bsBaseController;

/**
 * Ce2bs Controller
 *
 * @property \App\Model\Table\Ce2bsTable $Ce2bs
 *
 * @method \App\Model\Entity\Ce2b[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class Ce2bsController extends Ce2bsBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users']
    //     ];
    //     $ce2bs = $this->paginate($this->Ce2bs);

    //     $this->set(compact('ce2bs'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Ce2b id.
    //  * @return \Cake\Http\Response|void
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $ce2b = $this->Ce2bs->get($id, [
    //         'contain' => ['Users', 'ReportStages', 'Attachments', 'Reviews', 'Committees', 'RequestReporters', 'RequestEvaluators', 'Reminders']
    //     ]);

    //     $this->set('ce2b', $ce2b);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $ce2b = $this->Ce2bs->newEntity();
    //     if ($this->request->is('post')) {
    //         $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
    //         if ($this->Ce2bs->save($ce2b)) {
    //             $this->Flash->success(__('The ce2b has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The ce2b could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Ce2bs->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('ce2b', 'users'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Ce2b id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $ce2b = $this->Ce2bs->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
    //         if ($this->Ce2bs->save($ce2b)) {
    //             $this->Flash->success(__('The ce2b has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The ce2b could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Ce2bs->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('ce2b', 'users'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Ce2b id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $ce2b = $this->Ce2bs->get($id);
    //     if ($this->Ce2bs->delete($ce2b)) {
    //         $this->Flash->success(__('The ce2b has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The ce2b could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
