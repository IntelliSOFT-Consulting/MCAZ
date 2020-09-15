<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;
use Cake\View\Helper\HtmlHelper; 
use Cake\Log\Log;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ce2bs = $this->paginate($this->Ce2bs->find()->where(['user_id' => $this->Auth->user('id')]));

        $this->set(compact('ce2bs'));
        $this->set('_serialize', ['ce2bs']);
    }

    /**
     * View method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => $this->ce2b_contain,
            'conditions' => ['Ce2bs.user_id' => $this->Auth->user('id')]
        ]);


        // $this->viewBuilder()->setLayout('pdf/default');
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $ce2b->reference_number.'.pdf'
                ]
            ]);
        }

        $this->set('ce2b', $ce2b);
        // $this->set('e2b_content', Xml::toArray(Xml::build($ce2b->e2b_content)));
        $this->set('_serialize', ['ce2b']);
    }

    
    public function vigibase($id = null) {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => [],
        ]);

        // render to a variable
        $payload = $ce2b->e2b_file;
        
        $http = new Client();

        //Log::write('debug', 'Payload :: '.$payload);
        $umc = $http->post(Configure::read('vigi_post_url'), 
            (string)$payload,
            ['headers' => Configure::read('vigi_headers')]);  

        if ($umc->isOK()) {
            $messageid = $umc->json;
 
            $stage1  = $this->Ce2bs->ReportStages->newEntity();
            $stage1->model = 'Ce2bs';
            $stage1->stage = 'VigiBase';
            $stage1->description = 'Stage 9';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $ce2b->report_stages = [$stage1];
            $ce2b->messageid = $messageid['MessageId'];
            $ce2b->status = 'VigiBase';
            $this->Ce2bs->save($ce2b);

            $this->set([
                    'umc' => $umc->json, 
                    'status' => 'Successfull integration with vigibase', 
                    '_serialize' => ['umc', 'status']]);
        } else {
            $this->response->body('Failure');
            $this->response->statusCode($umc->getStatusCode());
            $this->set([
                'umc' => $umc->json, 
                'status' => 'Failed', 
                '_serialize' => ['umc', 'status']]);
            return;
        }
    }

    public function add()
    {
        $ce2b = $this->Ce2bs->newEntity();
        if ($this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            //Attachments
            if (!empty($ce2b->attachments)) {
                  for ($i = 0; $i <= count($ce2b->attachments)-1; $i++) { 
                    $ce2b->attachments[$i]->model = 'Ce2bs';
                    $ce2b->attachments[$i]->category = 'attachments';
                  }
                }

            //Get file contents
            $this->loadModel('Imports');
            //Check if file has been loaded before 
            $import = $this->Imports->findByFilename($this->request->data['e2b_file']['name']);
            if (!$import->isEmpty()) {
                $import_dates = implode(', ', Hash::extract($import->toArray(), '{n}.created'));
                $this->Flash->warning('The file <b>'.$this->request->data['e2b_file']['name'].'</b> has been imported before on '.$import_dates.'. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
                return $this->redirect(['action' => 'add']);
            } else {
                $file = new File($this->request->data['e2b_file']['tmp_name']);
                $xmlString = $file->read();
                //End file contents

                //new stage
                $stage1  = $this->Ce2bs->ReportStages->newEntity();
                $stage1->model = 'Ce2bs';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $ce2b->report_stages = [$stage1];

                $ce2b->e2b_content = $xmlString;
                $var = (date("Y") == 2019) ? 28 : 1;
                // $ref = $this->Ce2bs->find()->count() + 1;
                //$ref = $this->Ce2bs->find('all', ['conditions' => ['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null]])->count() + $var;
                $ref = $this->Ce2bs->find()->select(['Ce2bs.reference_number'])->distinct(['Ce2bs.reference_number'])->where(['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null])->count() + $var;
                $ce2b->reference_number = (($ce2b->reference_number)) ?? 'CE2B'.$ref.'/'.date('Y');
                if ($this->Ce2bs->save($ce2b)) {

                    $datum = $this->Imports->newEntity(['filename' => $this->request->data['e2b_file']['name']]);
                    $this->Imports->save($datum);

                    $this->Flash->success(__('The E2B File has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The E2B File could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ce2b'));
        $this->set('_serialize', ['ce2b']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            if ($this->Ce2bs->save($ce2b)) {
                $this->Flash->success(__('The ce2b has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ce2b could not be saved. Please, try again.'));
        }
        $this->set(compact('ce2b'));
        $this->set('_serialize', ['ce2b']);
    }

}
