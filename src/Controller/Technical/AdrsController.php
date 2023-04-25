<?php
namespace App\Controller\Technical;

use App\Controller\AppController;
use App\Controller\Base\AdrsBaseController;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdrsController extends AdrsBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Designations', 'OriginalAdrs', 'InitialAdrs']
    //     ];
    //     $adrs = $this->paginate($this->Adrs);

    //     $this->set(compact('adrs'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Adr id.
    //  * @return \Cake\Http\Response|void
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $adr = $this->Adrs->get($id, [
    //         'contain' => ['Users', 'Designations', 'OriginalAdrs', 'InitialAdrs', 'AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'ReportStages', 'Attachments', 'Uploads', 'Reminders', 'AdrComments', 'Refids', 'Reviews', 'Committees', 'RequestReporters', 'RequestEvaluators', 'AdrFollowups']
    //     ]);

    //     $this->set('adr', $adr);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $adr = $this->Adrs->newEntity();
    //     if ($this->request->is('post')) {
    //         $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
    //         if ($this->Adrs->save($adr)) {
    //             $this->Flash->success(__('The adr has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The adr could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Adrs->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
    //     $originalAdrs = $this->Adrs->OriginalAdrs->find('list', ['limit' => 200]);
    //     $initialAdrs = $this->Adrs->InitialAdrs->find('list', ['limit' => 200]);
    //     $this->set(compact('adr', 'users', 'designations', 'originalAdrs', 'initialAdrs'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Adr id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $adr = $this->Adrs->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
    //         if ($this->Adrs->save($adr)) {
    //             $this->Flash->success(__('The adr has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The adr could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Adrs->Users->find('list', ['limit' => 200]);
    //     $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
    //     $originalAdrs = $this->Adrs->OriginalAdrs->find('list', ['limit' => 200]);
    //     $initialAdrs = $this->Adrs->InitialAdrs->find('list', ['limit' => 200]);
    //     $this->set(compact('adr', 'users', 'designations', 'originalAdrs', 'initialAdrs'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Adr id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $adr = $this->Adrs->get($id);
    //     if ($this->Adrs->delete($adr)) {
    //         $this->Flash->success(__('The adr has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
