<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsBaseController extends AppController
{

    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);   
       $this->loadComponent('Search.Prg', [
            'actions' => ['index', 'restore']
        ]);    
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews', 'Reviews.Users']
        ];
        $query = $this->Ce2bs
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['IFNULL(copied, "N") !=' => 'old copy']);
        $users = $this->Ce2bs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $this->set(compact('query', 'users'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('ce2bs', $query->contain($this->paginate['contain']));
        } else {
            $this->set('ce2bs', $this->paginate($query));
        } 

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [ 
                'id', 'user_id', 'messageid', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'company_name', 'reporter_email',
                'status', 'created', 'modified',  
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                'reviews.system_message', 'reviews.user_message', 
                'attachments.file'
            ];
            $_extract = [
                'id', 'user_id', 'messageid', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'company_name', 'reporter_email',
                'status', 'created', 'modified',                 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.comments')); }, //'committees.comments', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.literature_review')); }, //'.literature_review', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.references_text')); }, //'.references_text', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.user_message')); }, // '.user_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.user_message', 
                function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.system_message')); }, //'reviews.system_message', 
                function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.user_message')); }, //'reviews.user_message', 
                function ($row) { return implode('|', Hash::extract($row['attachments'], '{n}.file')); }, //'attachments.file'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        /*if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'summary_ce2bs.pdf'
                ]
            ]);
        }*/

        if ($this->request->params['_ext'] === 'pdf') {
            $this->render('/Base/Ce2bs/pdf/index');
        } else {
            $this->render('/Base/Ce2bs/index');
        }
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
            'contain' => $this->ce2b_contain, 'withDeleted'
        ]);


        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($ce2b->reviews as $key => $value) {
                if($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            } 
        }

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $ce2b->reference_number.'.pdf'
                ]
            ]);
        }

        $evaluators = $this->Ce2bs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Ce2bs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);

        $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
        $arr = Hash::flatten($xml);

        $this->set(compact('ce2b', 'evaluators', 'users', 'ekey', 'arr'));
        $this->set('_serialize', ['ce2b']);
        $this->render('/Base/Ce2bs/view');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
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

                try {
                    $xmlObject = Xml::build($xmlString); // Here will throw an exception
                } catch (\Cake\Utility\Exception\XmlException $e) {
                    $this->Flash->error('Not a valid E2B file. '.$e->getMessage());
                    return $this->redirect(['action' => 'add']);
                }
                $ce2b->e2b_content = iconv(
                    mb_detect_encoding($xmlString, mb_detect_order(), true), 'utf-8//IGNORE', $xmlString); //iconv(mb_detect_encoding($xmlString), "UTF-8", $xmlString);
                $var = (date("Y") == 2019) ? 28 : 1;
                // $ref = $this->Ce2bs->find()->count() + 1;
                //$ref = $this->Ce2bs->find('all', ['conditions' => ['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null]])->count() + $var;
                $ref = $this->Ce2bs->find()->select(['Ce2bs.reference_number'])->distinct(['Ce2bs.reference_number'])->where(['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null])->count() + $var;
                $ce2b->reference_number = (($ce2b->reference_number)) ?? 'CE2B'.$ref.'/'.date('Y');
                try {                    
                    if ($this->Ce2bs->save($ce2b)) {
                        $datum = $this->Imports->newEntity(['filename' => $this->request->data['e2b_file']['name']]);
                        $this->Imports->save($datum);

                        $this->Flash->success(__('The E2B File has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                } catch (\PDOException $e) {                    
                    $this->Flash->error('The E2B File was not saved. '.$e->getMessage());
                    return $this->redirect(['action' => 'add']);
                } 
                
                $this->Flash->error(__('The E2B File could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ce2b'));
        $this->set('_serialize', ['ce2b']);
        $this->render('/Base/Ce2bs/add');
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
        $this->render('/Base/Ce2bs/edit');
    }


    public function requestEvaluator() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), []);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());

            $ce2b->request_evaluators[0]->user_id = $ce2b->assigned_to;
            $ce2b->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $ce2b->request_evaluators[0]->type = 'request_evaluator_info';
            $ce2b->request_evaluators[0]->model = 'Ce2bs';
            $ce2b->request_evaluators[0]->foreign_key = $ce2b->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($ce2b->assigned_to)) {
                    $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_evaluator_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $ce2b->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.')); 
                    return $this->redirect($this->referer());
                }

                //end 
                
               $this->Flash->success('Request successfully sent to evaluator for Adr '.$ce2b->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Adr Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function causality() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), ['contain' => ['ReportStages']]);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            $ce2b->reviews[0]->user_id = $this->Auth->user('id');
            $ce2b->reviews[0]->model = 'Ce2bs';
            $ce2b->reviews[0]->category = 'causality';

            //new stage only once
            if(!in_array("Evaluated", Hash::extract($ce2b->report_stages, '{n}.stage'))) {
                $stage1  = $this->Ce2bs->ReportStages->newEntity();
                $stage1->model = 'Ce2bs';
                $stage1->stage = 'Evaluated';
                $stage1->description = 'Stage 3';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $ce2b->report_stages = [$stage1];
                $ce2b->status = 'Evaluated';
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($ce2b->assigned_to)) {
                    $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_review_assigned_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Review successfully done for SAE '.$ce2b->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown SAE Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }


    public function requestReporter() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pk_id'), []);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            $ce2b->request_reporters[0]->user_id = $ce2b->user_id;
            $ce2b->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $ce2b->request_reporters[0]->type = 'request_reporter_info';
            $ce2b->request_reporters[0]->model = 'Ce2bs';
            $ce2b->request_reporters[0]->foreign_key = $ce2b->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($ce2b->user_id)) {
                    $reporter = $this->Ce2bs->Users->get($ce2b->user_id);
                    $data = [
                      'email_address' => $reporter->email, 'user_id' => $reporter->id,
                      'type' => 'manager_request_reporter_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['user_message'] = $ce2b->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate reporter.')); 
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if(!empty($ce2b->assigned_to)) {
                    $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $ce2b->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                }          
                //manager does not get a notificatoin
                //end 
                
               $this->Flash->success('Request successfully sent to reporter for Adr '.$ce2b->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Adr Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function committeeReview() {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), ['contain' => 'ReportStages']);
        if (isset($ce2b->id) && $this->request->is('post')) {
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            $ce2b->committees[0]->user_id = $this->Auth->user('id');
            $ce2b->committees[0]->model = 'Ce2bs';
            $ce2b->committees[0]->category = 'committee';

            /**
             * Committee decision 
             * If decision is Approved, the status is set to Committee or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */
            if(!empty($this->request->getData('committees.100.status'))) {
                $stage1  = $this->Ce2bs->ReportStages->newEntity();
                $stage1->model = 'Ce2bs';
                $stage1->stage = 'FinalFeedback';
                $stage1->description = 'Stage 8';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $ce2b->committees[0]->outcome_date;
                $ce2b->report_stages = [$stage1];
                $ce2b->status = 'FinalFeedback';
            } else {
                //If Coming from Stage 6 then stage 4
                $stage1  = $this->Ce2bs->ReportStages->newEntity();
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $ce2b->committees[0]->outcome_date;
                if(in_array("Correspondence", Hash::extract($ce2b->report_stages, '{n}.stage'))) {    
                    $stage1->model = 'Ce2bs';                
                    $stage1->stage = 'Presented';
                    $stage1->description = 'Stage 7: PVCT';
                    $ce2b->status = 'Presented';
                    $ce2b->report_stages = [$stage1];
                } else {                 
                    $stage1->model = 'Ce2bs';
                    $stage1->stage = 'Committee';
                    $stage1->description = 'Stage 4: PVCT';
                    $ce2b->status = 'Committee';                    
                    $ce2b->report_stages = [$stage1];
                }
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($ce2b->assigned_to)) {
                    $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_committee_assigned_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if(!empty($ce2b->committees[0]->literature_review) && !empty($ce2b->status)) {
                    $reporter = $this->Ce2bs->Users->get($ce2b->user_id);
                    $data = [
                      'email_address' => $ce2b->reporter_email, 'user_id' => $ce2b->user_id,
                      'type' => 'reporter_committee_comments_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['literature_review'] = $ce2b->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Committee Review successfully done for Adr '.$ce2b->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown Adr Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function attachSignature($id = null) {
        $this->loadModel('Ce2bs');
        $review = $this->Ce2bs->Reviews->get($id, ['contain' => ['Ce2bs']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Ce2bs->Reviews->patchEntity($review, ['chosen' => 1, 'ce2b' => ['signature' => 1]], ['associated' => ['Ce2bs']]);
            if ($this->Ce2bs->Reviews->save($review)) {
                $this->Flash->success('Signature successfully attached to review');
                return $this->redirect($this->referer());
            } else {             
                $this->Flash->error(__('Unable to attach signature. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        }
    }

    /**
     * Archive method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function archive($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $ce2b = $this->Ce2bs->get($id);
        //update field
        $query = $this->Ce2bs->query();
        $query->update()
            ->set(['status' => 'Archived'])
            ->where(['id' => $ce2b->id])
            ->execute();
        $this->Flash->success(__('The SAE has been archived.'));
        //

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ce2b = $this->Ce2bs->get($id);
        if ($this->Ce2bs->delete($ce2b)) {
            $this->Flash->success(__('The ce2b has been deleted.'));
        } else {
            $this->Flash->error(__('The ce2b could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
