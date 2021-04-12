<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Utility\Hash;
use Cake\View\Helper\HtmlHelper; 

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);  
    }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //debug($this->request->data);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                if (isset($this->request->data['date_of_birth'])) {
                    $this->request->data['date_of_birth'] = implode('-', $this->request->data['date_of_birth']);
                } 
            }
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews']
        ];
        $query = $this->Adrs
            ->find('search', ['search' => $this->request->query])
            ->where([['user_id' => $this->Auth->user('id')]]);
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $this->set(compact('designations'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('adrs', $query->contain($this->paginate['contain']));
        } else {
            $this->set('adrs', $this->paginate($query->contain($this->paginate['contain'])));
        }

        $_designations = $designations->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [ 'id', 'user_id', 'adr_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'mrcz_protocol_number', 'mcaz_protocol_number', 'principal_investigator', 'reporter_name', 'reporter_email', 
            'designation_id',
            'reporter_phone', 'name_of_institution', 'institution_code', 'study_title', 'study_sponsor', 'date_of_adverse_event', 'participant_number', 'report_type', 'date_of_site_awareness', 'date_of_birth', 'age', 'gender', 'study_week', 'visit_number', 'adverse_event_type', 'sae_type', 'sae_description', 'toxicity_grade', 'previous_events', 'previous_events_number', 'total_saes', 'location_event', 'location_event_specify', 'research_involves', 'research_involves_specify', 'name_of_drug', 'drug_investigational', 'patient_other_drug', 'report_to_mcaz', 'report_to_mcaz_date', 'report_to_mrcz', 'report_to_mrcz_date', 'report_to_sponsor', 'report_to_sponsor_date', 'report_to_irb', 'report_to_irb_date', 'medical_history', 'diagnosis', 'immediate_cause', 'symptoms', 'investigations', 'results', 'management', 'outcome', 'd1_consent_form', 'd2_brochure', 'd3_changes_sae', 'd4_consent_sae', 'changes_explain', 'assess_risk', 'submitted', 'submitted_date', 'status', 'created', 'modified',   
            'adr_list_of_drugs.drug_name', 'adr_list_of_drugs.dose', 'adr_list_of_drugs.dose_id', 'adr_list_of_drugs.route_id', 'adr_list_of_drugs.frequency_id', 'adr_list_of_drugs.start_date', 'adr_list_of_drugs.taking_drug', 'adr_list_of_drugs.relationship_to_sae',   
            'adr_other_drugs.drug_name', 'adr_other_drugs.start_date', 'adr_other_drugs.stop_date', 'adr_other_drugs.relationship_to_sae',  
            'adr_lab_tests.lab_test', 'adr_lab_tests.abnormal_result', 'adr_lab_tests.site_normal_range', 'adr_lab_tests.collection_date', 'adr_lab_tests.lab_value', 'adr_lab_tests.lab_value_date', 
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                'reviews.system_message', 'reviews.user_message', 
                'attachments.file'
            ];
            $_extract = ['id', 'user_id', 'adr_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'mrcz_protocol_number', 'mcaz_protocol_number', 'principal_investigator', 'reporter_name', 'reporter_email',
            function ($row) use($_designations) { return $_designations[$row['designation_id']] ?? '' ; }, //'designation_id',
            'reporter_phone', 'name_of_institution', 'institution_code', 'study_title', 'study_sponsor', 'date_of_adverse_event', 'participant_number', 'report_type', 'date_of_site_awareness', 'date_of_birth', 'age', 'gender', 'study_week', 'visit_number', 'adverse_event_type', 'sae_type', 'sae_description', 'toxicity_grade', 'previous_events', 'previous_events_number', 'total_saes', 'location_event', 'location_event_specify', 'research_involves', 'research_involves_specify', 'name_of_drug', 'drug_investigational', 'patient_other_drug', 'report_to_mcaz', 'report_to_mcaz_date', 'report_to_mrcz', 'report_to_mrcz_date', 'report_to_sponsor', 'report_to_sponsor_date', 'report_to_irb', 'report_to_irb_date', 'medical_history', 'diagnosis', 'immediate_cause', 'symptoms', 'investigations', 'results', 'management', 'outcome', 'd1_consent_form', 'd2_brochure', 'd3_changes_sae', 'd4_consent_sae', 'changes_explain', 'assess_risk', 'submitted', 'submitted_date', 'status', 'created', 'modified',   
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.drug_name')); }, //'.drug_name', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.dose')); }, //'.dose', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.dose_id')); }, //'.dose_id', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.route_id')); }, //'.route_id', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.frequency_id')); }, //'.frequency_id', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.start_date')); }, //'.start_date', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.taking_drug')); }, //'.taking_drug', 
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.relationship_to_sae')); }, //'.relationship_to_sae',   
                function ($row) { return implode('|', Hash::extract($row['adr_other_drugs'], '{n}.drug_name')); }, //''.drug_name', 
                function ($row) { return implode('|', Hash::extract($row['adr_other_drugs'], '{n}.start_date')); }, //'.start_date', 
                function ($row) { return implode('|', Hash::extract($row['adr_other_drugs'], '{n}.stop_date')); }, //'.stop_date', 
                function ($row) { return implode('|', Hash::extract($row['adr_other_drugs'], '{n}.relationship_to_sae')); }, //'.relationship_to_sae', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.lab_test')); }, //'.lab_test', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.abnormal_result')); }, //'.abnormal_result', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.site_normal_range')); }, //'.site_normal_range', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.collection_date')); }, //'.collection_date', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.lab_value')); }, //'.lab_value', 
                function ($row) { return implode('|', Hash::extract($row['adr_lab_tests'], '{n}.lab_value_date')); }, //'.lab_value_date', 
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
    }

    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators', 
                          'Committees', 'Committees.Users', 'Committees.AdrComments', 'Committees.AdrComments.Attachments', 
                          'ReportStages', 'Reviews', 
                          'OriginalAdrs', 'OriginalAdrs.AdrListOfDrugs', 'OriginalAdrs.AdrOtherDrugs', 'OriginalAdrs.Attachments'],
            'conditions' => ['Adrs.user_id' => $this->Auth->user('id')]
        ]);

        if($adr->submitted !== 2) {
            $this->Flash->warning(__('Kindly submit Report '.$adr->reference_number.' before viewing.'));
            return $this->redirect(['action' => 'edit', $adr->id]);
        }

        // $this->viewBuilder()->setLayout('pdf/default');
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $adr->reference_number.'.pdf'
                ]
            ]);
        }
        
        
        $designations = $this->Adrs->Designations->find('list',array('order'=>'Designations.name ASC'));
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adr']);

        $this->set('adr', $adr);
        $this->set('_serialize', ['adr']);
    }

    public function vigibase($id = null) {
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments']
        ]); 

        // create a builder (hint: new ViewBuilder() constructor works too)
        $builder = $this->viewBuilder();

        // configure as needed
        $builder->setLayout(false);
        $builder->template('Adrs/xml/e2b');

        // create a view instance
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $view = $builder->build(compact('adr', 'designations', 'doses', 'routes', 'frequencies'));

        // render to a variable
        $payload = $view->render();
        
        $http = new Client();

        //$payload = $this->VigibaseApi->aefi_e2b($adr, $doses, $routes);
        //Log::write('debug', 'Payload :: '.$payload);
        $umc = $http->post(Configure::read('vigi_post_url'), 
            (string)$payload,
            ['headers' => Configure::read('vigi_headers')]);  

        if ($umc->isOK()) {
            $messageid = $umc->json;

            $vadr = $this->Adrs->get($id, [
                'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments']
            ]); 
            $stage1  = $this->Adrs->ReportStages->newEntity();
            $stage1->model = 'Adrs';
            $stage1->stage = 'VigiBase';
            $stage1->description = 'Stage 9';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $vadr->report_stages = [$stage1];
            $vadr->messageid = $messageid['MessageId'];
            $vadr->status = 'VigiBase';
            $this->Adrs->save($vadr);

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

    public function e2b($id = null)
    {
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments']
        ]);        
        
        $stage1  = $this->Adrs->ReportStages->newEntity();
        $stage1->model = 'Adrs';
        $stage1->stage = 'VigiBase';
        $stage1->description = 'Stage 9';
        $stage1->stage_date = date("Y-m-d H:i:s");
        $adr->report_stages = [$stage1];
        $adr->status = 'VigiBase';
        $this->Adrs->save($adr);

        $designations = $this->Adrs->Designations->find('list',array('order'=>'Designations.name ASC'));
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list', ['keyField' => 'id', 'valueField' => 'icsr_code']);
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', false);
        $this->response->download(($adr->submitted==2) ? str_replace('/', '_', $adr->reference_number).'.xml' : 'SAEFI_'.$adr->created->i18nFormat('dd-MM-yyyy_HHmmss').'.xml');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adr = $this->Adrs->newEntity();
        if ($this->request->is('post')) {
          $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
          $adr->user_id = $this->Auth->user('id');
          $adr->designation_id = $this->Auth->user('designation_id');
          $adr->institution_code = $this->Auth->user('name_of_institution');
          $adr->reporter_phone = $this->Auth->user('phone_no');
          $adr->reporter_name = $this->Auth->user('name');
            if ($this->Adrs->save($adr, ['validate' => false])) {
                $this->Flash->success(__('The SAE has been saved.'));

                return $this->redirect(['action' => 'edit', $adr->id]);
            }
            $this->Flash->error(__('The SAE could not be saved. Please, try again.'));
        }
        $users = $this->Adrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Adrs->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->set(compact('adr', 'users', 'designations'));
        $this->set('_serialize', ['adr']);
    }



    /**
     * Edit method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    private function format_dates($adr) {
        //format dates
        $errors = $adr->getErrors();
        if (!empty($adr->date_of_birth)) {
            if(empty($adr->date_of_birth)) $adr->date_of_birth = '--';
            $a = explode('-', $adr->date_of_birth);
            $adr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }     
        $adr->setErrors($errors);
        return $adr;
    }

    public function edit($id = null)
    {
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrListOfDrugs', 'AdrOtherDrugs', 'AdrLabTests', 'Attachments', 'ReportStages'],
            'conditions' => ['user_id' => $this->Auth->user('id')]
        ]);
        if ($adr->submitted == 2) {
            $this->Flash->success(__('Report '.$adr->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $adr->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adr = $this->Adrs->patchEntity($adr, $this->request->getData(), [
                'validate' => ($this->request->getData('submitted') == 2) ? true : false, 
                'associated' => [
                    'AdrListOfDrugs' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'AdrOtherDrugs' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'AdrLabTests' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'Attachments' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false ]
                ]
            ]);
            if (!empty($adr->attachments)) {
              for ($i = 0; $i <= count($adr->attachments)-1; $i++) { 
                $adr->attachments[$i]->model = 'Adrs';
                $adr->attachments[$i]->category = 'attachments';
              }
            }
            
            if ($adr->submitted == 1) {
              //save changes button
              if ($this->Adrs->save($adr, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$adr->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $adr->id]);
              } else {
                $this->Flash->error(__('Report '.$adr->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($adr->submitted == 2) {
                //new stage
                $stage1  = $this->Adrs->ReportStages->newEntity();
                $stage1->model = 'Adrs';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $adr->report_stages = [$stage1];

              //submit to mcaz button
              $adr->submitted_date = date("Y-m-d H:i:s");
              $adr->status = 'Submitted';//($this->Auth->user('is_admin')) ? 'Manual' : 'Submitted';
              //$count = $this->Adrs->find('all', ['conditions' => ['date_format(Adrs.created,"%Y")' => date("Y"), 'Adrs.reference_number IS NOT' => null]])->count() + 1;
              // $var = (date("Y") == 2019) ? 10 : 1;
              // $count = $this->Adrs->find()->select(['reference_number'])->distinct()->where(['date_format(Adrs.created,"%Y")' => date("Y"), 'reference_number IS NOT' => null])->count() + $var;
              // $adr->reference_number = (($adr->reference_number)) ?? 'SAE'.$count.'/'.$date('Y');
              if ($this->Adrs->save($adr, ['validate' => false])) {
                //New method to update reference number
                if(empty($adr->reference_number)) {
                    $refid = $this->Adrs->Refids->newEntity(['foreign_key' => $adr->id, 'model' => 'Adrs', 'year' => date('Y')]);
                    $this->Adrs->Refids->save($refid);
                    $refid = $this->Adrs->Refids->get($refid->id);
                    $adr->reference_number = (($adr->reference_number)) ?? 'SAE'.$refid->refid.'/'.$refid->year;
                    $this->Adrs->save($adr);
                }
                //

                $this->Flash->success(__('Report '.$adr->reference_number.' has been successfully submitted to MCAZ for review.'));                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $adr->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => ($adr->report_type == 'FollowUp') ? 'applicant_submit_adr_followup_email' : 'applicant_submit_adr_email', 
                    'model' => 'Adrs', 'foreign_key' => $adr->id,
                    'vars' =>  $adr->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'Adrs', 'action' => 'view', $adr->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                $data['vars']['name'] = $adr->reporter_name;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = ($adr->report_type == 'FollowUp') ? 'applicant_submit_adr_followup_notification' : 'applicant_submit_adr_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Adrs->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Adrs', 'foreign_key' => $adr->id,
                      'vars' =>  $adr->toArray()];
                    $data['type'] = ($adr->report_type == 'FollowUp') ? 'manager_submit_adr_followup_email' : 'manager_submit_adr_email';
                    $data['vars']['name'] = $manager->name;
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = ($adr->report_type == 'FollowUp') ? 'manager_submit_adr_followup_notification' : 'manager_submit_adr_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                return $this->redirect(['action' => 'view', $adr->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($adr->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Adrs->save($adr, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report have been saved.'));
                return $this->redirect(['action' => 'edit', $adr->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
           }
           
        }
        

        $adr = $this->format_dates($adr);

        $users = $this->Adrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Adrs->Designations->find('list',array('order'=>'Designations.name ASC'));
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        // $this->set(compact('adr', 'users', 'designations'));
        $this->set('_serialize', ['adr']);
    }

    public function adrFollowup($id) {
        $this->loadModel('AdrFollowups');
        $orig_adr = $this->Adrs->get($id, ['contain' => []]);

        $adr = $this->AdrFollowups->duplicateEntity($id);
        $adr->adr_id = $id;        
        $adr->user_id = $this->Auth->user('id'); //the report is reassigned to the user
        $adr->report_type = 'FollowUp';

        if ($this->Adrs->save($adr, ['validate' => false])) {            
            $query = $this->Adrs->query();
            $query->update()
                ->set(['report_type' => 'Initial'])
                ->where(['id' => $orig_adr->id])
                ->execute();
            $this->Flash->success(__('A follow-up report for the SAE report has been created. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $adr->id]);
        }
        $this->Flash->error(__('A follow-up report for the SAE Report could not be created. Please, try again.'));
        return $this->redirect($this->referer());        
    }

    /**
     * Delete method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $adr = $this->Adrs->get($id);
        if ($adr->user_id == $this->Auth->user('id') && ($adr->submitted == 0 or $adr->submitted == 1)) {
          if ($this->Adrs->delete($adr)) {
              $this->Flash->success(__('The adr has been deleted.'));
          } else {
              $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
          }
        } else {
            $this->Flash->error(__('You do not have permission to delete the report'));
        } 

        return $this->redirect(['action' => 'index']);
    }
}
