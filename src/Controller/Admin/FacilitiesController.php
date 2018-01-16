<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Facilities Controller
 *
 * @property \App\Model\Table\FacilitiesTable $Facilities
 *
 * @method \App\Model\Entity\Facility[] paginate($object = null, array $settings = [])
 */
class FacilitiesController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->Auth->allow(['index', 'facilityName', 'facilityCode']);       
    }
    
    public function facilityName($query = null) {
        $facilities = $this->Facilities->find('all')
                ->where(['facility_name LIKE' => '%'.$this->request->getQuery('term').'%'])
                ->limit(10); 
        
        $codes = array();
        foreach ($facilities as $key => $value) {
            $codes[] = array('value' => $value['facility_code'], 'label' => $value['facility_name'], 'dist' => $value['district']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

    public function facilityCode($query = null) {
        $facilities = $this->Facilities->find('all')
                ->where(['facility_code LIKE' => '%'.$this->request->getQuery('term').'%'])
                ->limit(10); 
        
        $codes = array();
        foreach ($facilities as $key => $value) {
            $codes[] = array('value' => $value['facility_name'], 'label' => $value['facility_code'], 'dist' => $value['district']);
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
        $facilities = $this->paginate($this->Facilities);

        $this->set(compact('facilities'));
        $this->set('_serialize', ['facilities']);
    }

    /**
     * View method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => []
        ]);

        $this->set('facility', $facility);
        $this->set('_serialize', ['facility']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facility = $this->Facilities->newEntity();
        if ($this->request->is('post')) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->getData());
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $this->set(compact('facility'));
        $this->set('_serialize', ['facility']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->getData());
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $this->set(compact('facility'));
        $this->set('_serialize', ['facility']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facility = $this->Facilities->get($id);
        if ($this->Facilities->delete($facility)) {
            $this->Flash->success(__('The facility has been deleted.'));
        } else {
            $this->Flash->error(__('The facility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
