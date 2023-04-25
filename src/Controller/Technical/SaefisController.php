<?php
namespace App\Controller\Technical;

use App\Controller\AppController;
use App\Controller\Base\SaefisBaseController;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaefisController extends SaefisBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Designations', 'Provinces', 'OriginalSaefis', 'InitialSaefis']
    //     ];
    //     $saefis = $this->paginate($this->Saefis);

    //     $this->set(compact('saefis'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Saefi id.
    //  * @return \Cake\Http\Response|void
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $saefi = $this->Saefis->get($id, [
    //         'contain' => ['Users', 'Designations', 'Provinces', 'OriginalSaefis', 'InitialSaefis', 'SaefiComments', 'SaefiListOfVaccines', 'AefiListOfVaccines', 'AefiCausalities', 'ReportStages', 'Attachments', 'Uploads', 'Reports', 'Reminders', 'Refids', 'Reviews', 'Committees', 'RequestReporters', 'RequestEvaluators', 'SaefiReactions']
    //     ]);

    //     $this->set('saefi', $saefi);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $saefi = $this->Saefis->newEntity();
    //     if ($this->request->is('post')) {
    //         $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
    //         if ($this->Saefis->save($saefi)) {
    //             $this->Flash->success(__('The saefi has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The saefi could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Saefis->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
    //     $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
    //     $originalSaefis = $this->Saefis->OriginalSaefis->find('list', ['limit' => 200]);
    //     $initialSaefis = $this->Saefis->InitialSaefis->find('list', ['limit' => 200]);
    //     $this->set(compact('saefi', 'users', 'designations', 'provinces', 'originalSaefis', 'initialSaefis'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Saefi id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $saefi = $this->Saefis->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
    //         if ($this->Saefis->save($saefi)) {
    //             $this->Flash->success(__('The saefi has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The saefi could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Saefis->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
    //     $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
    //     $originalSaefis = $this->Saefis->OriginalSaefis->find('list', ['limit' => 200]);
    //     $initialSaefis = $this->Saefis->InitialSaefis->find('list', ['limit' => 200]);
    //     $this->set(compact('saefi', 'users', 'designations', 'provinces', 'originalSaefis', 'initialSaefis'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Saefi id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $saefi = $this->Saefis->get($id);
    //     if ($this->Saefis->delete($saefi)) {
    //         $this->Flash->success(__('The saefi has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The saefi could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
