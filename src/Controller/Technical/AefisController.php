<?php
namespace App\Controller\Technical;

use App\Controller\AppController;
use App\Controller\Base\AefisBaseController;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AefisController extends AefisBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Designations', 'Provinces', 'OriginalAefis', 'InitialAefis']
    //     ];
    //     $aefis = $this->paginate($this->Aefis);

    //     $this->set(compact('aefis'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Aefi id.
    //  * @return \Cake\Http\Response|void
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $aefi = $this->Aefis->get($id, [
    //         'contain' => ['Users', 'Designations', 'Provinces', 'OriginalAefis', 'InitialAefis', 'AefiListOfVaccines', 'AefiListOfDiluents', 'AefiCausalities', 'AefiComments', 'ReportStages', 'Attachments', 'Uploads', 'Reminders', 'Refids', 'Reviews', 'Committees', 'RequestReporters', 'RequestEvaluators', 'AefiFollowups', 'AefiReactions']
    //     ]);

    //     $this->set('aefi', $aefi);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $aefi = $this->Aefis->newEntity();
    //     if ($this->request->is('post')) {
    //         $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
    //         if ($this->Aefis->save($aefi)) {
    //             $this->Flash->success(__('The aefi has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Aefis->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
    //     $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
    //     $originalAefis = $this->Aefis->OriginalAefis->find('list', ['limit' => 200]);
    //     $initialAefis = $this->Aefis->InitialAefis->find('list', ['limit' => 200]);
    //     $this->set(compact('aefi', 'users', 'designations', 'provinces', 'originalAefis', 'initialAefis'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Aefi id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $aefi = $this->Aefis->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
    //         if ($this->Aefis->save($aefi)) {
    //             $this->Flash->success(__('The aefi has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Aefis->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
    //     $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
    //     $originalAefis = $this->Aefis->OriginalAefis->find('list', ['limit' => 200]);
    //     $initialAefis = $this->Aefis->InitialAefis->find('list', ['limit' => 200]);
    //     $this->set(compact('aefi', 'users', 'designations', 'provinces', 'originalAefis', 'initialAefis'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Aefi id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $aefi = $this->Aefis->get($id);
    //     if ($this->Aefis->delete($aefi)) {
    //         $this->Flash->success(__('The aefi has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
