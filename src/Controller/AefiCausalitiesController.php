<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AefiCausalities Controller
 *
 * @property \App\Model\Table\AefiCausalitiesTable $AefiCausalities
 *
 * @method \App\Model\Entity\AefiCausality[] paginate($object = null, array $settings = [])
 */
class AefiCausalitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Aefis', 'Saefis']
        ];
        $aefiCausalities = $this->paginate($this->AefiCausalities);

        $this->set(compact('aefiCausalities'));
        $this->set('_serialize', ['aefiCausalities']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi Causality id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefiCausality = $this->AefiCausalities->get($id, [
            'contain' => ['Aefis', 'Saefis']
        ]);

        $this->set('aefiCausality', $aefiCausality);
        $this->set('_serialize', ['aefiCausality']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefiCausality = $this->AefiCausalities->newEntity();
        if ($this->request->is('post')) {
            $aefiCausality = $this->AefiCausalities->patchEntity($aefiCausality, $this->request->getData());
            if ($this->AefiCausalities->save($aefiCausality)) {
                $this->Flash->success(__('The aefi causality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi causality could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiCausalities->Aefis->find('list', ['limit' => 200]);
        $saefis = $this->AefiCausalities->Saefis->find('list', ['limit' => 200]);
        $this->set(compact('aefiCausality', 'aefis', 'saefis'));
        $this->set('_serialize', ['aefiCausality']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi Causality id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aefiCausality = $this->AefiCausalities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefiCausality = $this->AefiCausalities->patchEntity($aefiCausality, $this->request->getData());
            if ($this->AefiCausalities->save($aefiCausality)) {
                $this->Flash->success(__('The aefi causality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi causality could not be saved. Please, try again.'));
        }
        $aefis = $this->AefiCausalities->Aefis->find('list', ['limit' => 200]);
        $saefis = $this->AefiCausalities->Saefis->find('list', ['limit' => 200]);
        $this->set(compact('aefiCausality', 'aefis', 'saefis'));
        $this->set('_serialize', ['aefiCausality']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi Causality id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefiCausality = $this->AefiCausalities->get($id);
        if ($this->AefiCausalities->delete($aefiCausality)) {
            $this->Flash->success(__('The aefi causality has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi causality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
