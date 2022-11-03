<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReportSettings Controller
 *
 * @property \App\Model\Table\ReportSettingsTable $ReportSettings
 *
 * @method \App\Model\Entity\ReportSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportSettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reportSettings = $this->paginate($this->ReportSettings);

        $this->set(compact('reportSettings'));
    }

    /**
     * View method
     *
     * @param string|null $id Report Setting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reportSetting = $this->ReportSettings->get($id, [
            'contain' => []
        ]);

        $this->set('reportSetting', $reportSetting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reportSetting = $this->ReportSettings->newEntity();
        if ($this->request->is('post')) {
            $reportSetting = $this->ReportSettings->patchEntity($reportSetting, $this->request->getData());
            if ($this->ReportSettings->save($reportSetting)) {
                $this->Flash->success(__('The report setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report setting could not be saved. Please, try again.'));
        }
        $this->set(compact('reportSetting'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reportSetting = $this->ReportSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reportSetting = $this->ReportSettings->patchEntity($reportSetting, $this->request->getData());
            if ($this->ReportSettings->save($reportSetting)) {
                $this->Flash->success(__('The report setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report setting could not be saved. Please, try again.'));
        }
        $this->set(compact('reportSetting'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report Setting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reportSetting = $this->ReportSettings->get($id);
        if ($this->ReportSettings->delete($reportSetting)) {
            $this->Flash->success(__('The report setting has been deleted.'));
        } else {
            $this->Flash->error(__('The report setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
