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
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);     
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);  
    }
    
    public function reports($query = null) {
        $llts = $this->Aefis->find('all', ['fields' => ['reference_number', 'id']])->distinct()
                ->where(['user_id' => $this->Auth->user('id'),'reference_number LIKE' => '%'.$this->request->getQuery('term').'%'])
                ->limit(10); 
        
        $codes = array();
        foreach ($llts as $key => $value) {
            $codes[] = array('value' => $value['reference_number'], 'label' => $value['reference_number'], 'dist' => $value['id']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
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
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 'Committees', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ];


        $query = $this->Aefis
            ->find('search', ['search' => $this->request->query])
            ->where([['user_id' => $this->Auth->user('id')]]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('aefis', $query->contain($this->paginate['contain']));
        } else {
            $this->set('aefis', $this->paginate($query));
        }

        $_provinces = $provinces->toArray();
        $_designations = $designations->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id',    'user_id',    'aefi_id',    'province_id',    'reference_number',    'assigned_to',    'assigned_by',    'assigned_date',    'patient_name',    'patient_surname',    'patient_next_of_kin',    'patient_address',    'patient_telephone',    'report_type',    'gender',    'date_of_birth',    'age_at_onset',    'age_at_onset_years',    'age_at_onset_months',    'age_at_onset_days',    'age_at_onset_specify',    'reporter_name',    'designation_id',    'reporter_department',    'reporter_address',    'reporter_institution',    'reporter_district',    'reporter_province',    'reporter_phone',    'reporter_email',    'name_of_vaccination_center',    'adverse_events',    'ae_severe_local_reaction',    'ae_seizures',    'ae_abscess',    'ae_sepsis',    'ae_encephalopathy',    'ae_toxic_shock',    'ae_thrombocytopenia',    'ae_anaphylaxis',    'ae_fever',    'ae_3days',    'ae_febrile',    'ae_beyond_joint',    'ae_afebrile',    'ae_other',    'adverse_events_specify',    'aefi_date',
                'notification_date', 'description_of_reaction',    'treatment_provided',    'serious',    'serious_yes',    'outcome',    'died_date', 
                 'autopsy',    'past_medical_history',    'district_receive_date',  'investigation_needed',    'investigation_date', 'national_receive_date', 
                'comments',    'submitted',    'submitted_date',  'status',    'created',  'modified',
                'aefi_list_of_vaccines.vaccine_name', 'aefi_list_of_vaccines.vaccination_date', 'aefi_list_of_vaccines.vaccination_time',  'aefi_list_of_vaccines.dosage', 'aefi_list_of_vaccines.batch_number', 'aefi_list_of_vaccines.expiry_date', 
                'aefi_followups', 
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                // 'reviews.system_message', 'reviews.user_message', 
                'attachments.file'];
            $_extract = ['id',    'user_id',    'aefi_id',    
                function ($row) use ($_provinces) { return $_provinces[$row['province_id']] ?? ''; }, //provinces    
                'reference_number',    'assigned_to',    'assigned_by',    'assigned_date',    'patient_name',    'patient_surname',    'patient_next_of_kin',    'patient_address',    'patient_telephone',    'report_type',    'gender',    'date_of_birth',    'age_at_onset',    'age_at_onset_years',    'age_at_onset_months',    'age_at_onset_days',    'age_at_onset_specify',    'reporter_name',    
                function ($row) use($_designations) { return $_designations[$row['designation_id']] ?? '' ; }, //designation_id     
               'reporter_department',    'reporter_address',    'reporter_institution',    'reporter_district',    'reporter_province',    'reporter_phone',    'reporter_email',    'name_of_vaccination_center',    'adverse_events',    'ae_severe_local_reaction',    'ae_seizures',    'ae_abscess',    'ae_sepsis',    'ae_encephalopathy',    'ae_toxic_shock',    'ae_thrombocytopenia',    'ae_anaphylaxis',    'ae_fever',    'ae_3days',    'ae_febrile',    'ae_beyond_joint',    'ae_afebrile',    'ae_other',    'adverse_events_specify',    'aefi_date',
                'notification_date', 'description_of_reaction',    'treatment_provided',    'serious',    'serious_yes',    'outcome',    'died_date', 
                 'autopsy',    'past_medical_history',    'district_receive_date',  'investigation_needed',    'investigation_date', 'national_receive_date', 
                'comments',    'submitted',    'submitted_date',  'status',    'created',  'modified',
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccine_name')); }, //'.vaccine_name', 
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccination_date')); }, //'.vaccination_date', 
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccination_time')); }, //'.vaccination_time',  
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.dosage')); }, //'.dosage', 
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.batch_number')); }, //'.batch_number', 
                function ($row) { return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.expiry_date')); }, //'.expiry_date', 
                function ($row) { return implode('|', Hash::extract($row['aefi_followups'], '{n}.id')); }, //'aefi_followups',
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.comments')); }, //'committees.comments', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.literature_review')); }, //'.literature_review', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.references_text')); }, //'.references_text', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.user_message')); }, // '.user_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.user_message', 
                // function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.system_message')); }, //'reviews.system_message', 
                // function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.user_message')); }, //'reviews.user_message', 
                function ($row) { return implode('|', Hash::extract($row['attachments'], '{n}.file')); }, //'attachments.file'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        // $this->set(compact('aefis'));
        // $this->set('_serialize', ['aefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 
                          'Committees', 'Committees.Users', 'Committees.AefiComments', 'Committees.AefiComments.Attachments', 
                          'ReportStages', 
                          'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments', 
                          'OriginalAefis', 'OriginalAefis.AefiListOfVaccines', 'OriginalAefis.Attachments'],
            'conditions' => ['Aefis.user_id' => $this->Auth->user('id')]
        ]);

        if($aefi->submitted !== 2) {
            $this->Flash->warning(__('Kindly submit Report '.$aefi->reference_number.' before viewing.'));
            return $this->redirect(['action' => 'edit', $aefi->id]);
        }

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $aefi->reference_number.'.pdf'
                ]
            ]);
        }
        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);
    }

    public function vigibase($id = null) {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments']
        ]); 

        // create a builder (hint: new ViewBuilder() constructor works too)
        $builder = $this->viewBuilder();

        // configure as needed
        $builder->setLayout(false);
        $builder->template('Aefis/xml/e2b');

        // create a view instance
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $view = $builder->build(compact('aefi', 'designations'));

        // render to a variable
        $payload = $view->render();
        
        $http = new Client();

        //$payload = $this->VigibaseApi->aefi_e2b($aefi, $doses, $routes);
        //Log::write('debug', 'Payload :: '.$payload);
        $umc = $http->post(Configure::read('vigi_post_url'), 
            (string)$payload,
            ['headers' => Configure::read('vigi_headers')]);  

        if ($umc->isOK()) {
            $messageid = $umc->json;

            $vaefi = $this->Aefis->get($id, [
                'contain' => ['AefiListOfVaccines', 'Attachments']
            ]); 
            $stage1  = $this->Aefis->ReportStages->newEntity();
            $stage1->model = 'Aefis';
            $stage1->stage = 'VigiBase';
            $stage1->description = 'Stage 9';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $vaefi->report_stages = [$stage1];
            $vaefi->messageid = $messageid['MessageId'];
            $vaefi->status = 'VigiBase';
            $this->Aefis->save($vaefi);

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
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ]);        
        
        $stage1  = $this->Aefis->ReportStages->newEntity();
        $stage1->model = 'Aefis';
        $stage1->stage = 'VigiBase';
        $stage1->description = 'Stage 9';
        $stage1->stage_date = date("Y-m-d H:i:s");
        $aefi->report_stages = [$stage1];
        $aefi->status = 'VigiBase';
        $this->Aefis->save($aefi);

        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', false);

        $query = $this->Aefis->query();
        $query->update()
                    ->set(['status' => 'E2B'])
                    ->where(['id' => $aefi->id])
                    ->execute();

        $this->response->download(($aefi->submitted==2) ? str_replace('/', '_', $aefi->reference_number).'.xml' : 'AEFI_'.$aefi->created->i18nFormat('dd-MM-yyyy_HHmmss').'.xml');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefi = $this->Aefis->newEntity();
        if ($this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->user_id = $this->Auth->user('id');
            $aefi->designation_id = $this->Auth->user('designation_id');
            $aefi->reporter_institution = $this->Auth->user('name_of_institution');
            $aefi->institution_name = $this->Auth->user('name_of_institution');
            $aefi->reporter_address = $this->Auth->user('institution_address');
            $aefi->reporter_phone = $this->Auth->user('phone_no');
            $aefi->reporter_name = $this->Auth->user('name');

            if ($this->Aefis->save($aefi, ['validate' => false])) {
                
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $aefi->id]);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        }
        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->set(compact('aefi', 'users', 'designations'));
        $this->set('_serialize', ['aefi']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'ReportStages'],
            'conditions' => ['user_id' => $this->Auth->user('id')]
        ]);
        if ($aefi->submitted == 2) {
            $this->Flash->success(__('Report '.$aefi->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $aefi->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData(), [
                'validate' => ($this->request->getData('submitted') == 2) ? true : false, 
                'associated' => [
                    'AefiListOfVaccines' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false ],
                    'Attachments' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false ]
                ]
            ]);
            if (!empty($aefi->attachments)) {
              for ($i = 0; $i <= count($aefi->attachments)-1; $i++) { 
                $aefi->attachments[$i]->model = 'Aefis';
                $aefi->attachments[$i]->category = 'attachments';
              }
            }
            
            if ($aefi->submitted == 1) {
              //save changes button
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == 2) {
                //new stage
                $stage1  = $this->Aefis->ReportStages->newEntity();
                $stage1->model = 'Aefis';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $aefi->report_stages = [$stage1];

              //submit to mcaz button
              $aefi->submitted_date = date("Y-m-d H:i:s");
              $aefi->status = 'Submitted';//($this->Auth->user('is_admin')) ? 'Manual' : 'Submitted';
              $var = (date("Y") == 2019) ? 27 : 1;
              //$count = $this->Aefis->find('all', ['conditions' => ['date_format(Aefis.created,"%Y")' => date("Y"), 'Aefis.reference_number IS NOT' => null]])->count() + $var;
              // $count = $this->Aefis->find()->select(['reference_number'])->distinct()->where(['date_format(Aefis.created,"%Y")' => date("Y"), 'reference_number IS NOT' => null])->count() + $var;
              // $aefi->reference_number = (($aefi->reference_number)) ?? 'AEFI'.$count.'/'.date('Y');
              if ($this->Aefis->save($aefi)) {
                //New method to update reference number
                if(empty($aefi->reference_number)) {
                    $refid = $this->Aefis->Refids->newEntity(['foreign_key' => $aefi->id, 'model' => 'Aefis', 'year' => date('Y')]);
                    $this->Aefis->Refids->save($refid);
                    $refid = $this->Aefis->Refids->get($refid->id);
                    $aefi->reference_number = (($aefi->reference_number)) ?? 'AEFI'.$refid->refid.'/'.$refid->year;
                    $this->Aefis->save($aefi);
                }
                //
                $this->Flash->success(__('Report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.')); 
                //send email and notification
                $this->loadModel('Queue.QueuedJobs');    
                $data = [
                    'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                    'type' => ($aefi->report_type == 'FollowUp') ? 'applicant_submit_aefi_followup_email' : 'applicant_submit_aefi_email', 
                    'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];                
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['pdf_link'] = $html->link('Download', ['controller' => 'Aefis', 'action' => 'view', $aefi->id, '_ext' => 'pdf',  
                                          '_full' => true]);
                $data['vars']['name'] = $aefi->reporter_name;
                //notify applicant
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $data['type'] = ($aefi->report_type == 'FollowUp') ? 'applicant_submit_aefi_followup_notification' : 'applicant_submit_aefi_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //notify managers
                $managers = $this->Aefis->Users->find('all')->where(['Users.group_id IN' => [2, 4]]);
                foreach ($managers as $manager) {
                    $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                      'vars' =>  $aefi->toArray()];
                    $data['type'] = ($aefi->report_type == 'FollowUp') ? 'manager_submit_aefi_followup_email' : 'manager_submit_aefi_email';
                    $data['vars']['name'] = $manager->name;
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = ($aefi->report_type == 'FollowUp') ? 'manager_submit_aefi_followup_notification' : 'manager_submit_aefi_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                return $this->redirect(['action' => 'view', $aefi->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }


        $errors = $aefi->getErrors();
        //format dates
        if (!empty($aefi->date_of_birth)) {
            if(empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        $aefi->setErrors($errors);

        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi']);

    }


    public function aefiFollowup($id) {
        $this->loadModel('AefiFollowups');
        $orig_aefi = $this->Aefis->get($id, ['contain' => []]);
        
        $aefi = $this->AefiFollowups->duplicateEntity($id);
        $aefi->aefi_id = $id;        
        $aefi->user_id = $this->Auth->user('id'); //the report is reassigned to the user
        $aefi->report_type = 'FollowUp'; 

        if ($this->Aefis->save($aefi, ['validate' => false])) {            
            $query = $this->Aefis->query();
            $query->update()
                ->set(['report_type' => 'Initial'])
                ->where(['id' => $orig_aefi->id])
                ->execute();
            $this->Flash->success(__('A follow-up report for the AEFI has been created. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $aefi->id]);
        }
        $this->Flash->error(__('A follow-up report for the AEFI Report could not be created. Please, try again.'));
        return $this->redirect($this->referer());        
    }

    public function followup($id = null, $fid = null)
    {
        //Controller for creating follow up report.. should be able to support both new and edit
        $this->loadModel('AefiFollowups');
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiFollowups', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ]);
        if($fid) {
            $followup = $this->AefiFollowups->get($fid, [
              'contain' => ['AefiListOfVaccines', 'Attachments']
            ]);
        } else {
            //get latest unsubmitted follow up and load that
            $check = $this->AefiFollowups->find('all')->where(['aefi_id' => $aefi->id, 'submitted IS NOT' => 2])->first();
            $followup = (!empty($check)) ? $check : $this->AefiFollowups->newEntity() ;
        }
        if ($aefi->submitted <> 2) {
            $this->Flash->success(__('Report '.$aefi->reference_number.' not submitted. Followups only possible for submitted reports'));
            return $this->redirect(['action' => 'view', $aefi->id]);
        }
        if(!empty($aefi) && $aefi->user_id == $this->Auth->user('id')) {
            if ($this->request->is(['patch', 'post', 'put'])) {          


                $followup = $this->AefiFollowups->patchEntity($followup, $this->request->getData());
                $followup->report_type = 'FollowUp';
                $followup->aefi_id = $aefi->id;
                //Attachments
                if (!empty($followup->attachments)) {
                    for ($i = 0; $i <= count($followup->attachments)-1; $i++) { 
                      $followup->attachments[$i]->model = 'Aefis';
                      $followup->attachments[$i]->category = 'attachments';
                    }
                }
                // debug((string)$aefi);
                // debug($this->request->data);
                if ($followup->submitted == 1) {
                    //save changes button
                    if ($this->AefiFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('The changes to the follow up report for '.$aefi->reference_number.' have been saved.'));
                        // return $this->redirect(['action' => 'edit', $aefi->id]);
                    } else {
                        $this->Flash->error(__('Follow up could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == 2) {
                    //submit to mcaz button
                    $followup->submitted_date = date("Y-m-d H:i:s");
                    
                    //TODO: validate linked data here since validate will be false
                    if ($this->AefiFollowups->save($followup, ['validate' => false])) {
                        $this->Flash->success(__('Follow up for report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.'));

                        //send email and notification
                        $this->loadModel('Queue.QueuedJobs');    
                        $data = [
                              'email_address' => $aefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                              'type' => 'applicant_submit_aefi_followup_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                              'vars' =>  $aefi->toArray()
                        ];
                        //notify applicant
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = 'applicant_submit_aefi_followup_notification';
                        $data['vars']['created'] = $followup->created;
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                        //notify managers
                        $managers = $this->Aefis->Users->find('all')->where(['group_id IN' => [2, 4]]);
                        foreach ($managers as $manager) {
                            $data = ['email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                                     'vars' =>  $aefi->toArray()];
                            $data['vars']['name'] = $manager->name;
                            $data['type'] = 'manager_submit_aefi_followup_email';
                            $this->QueuedJobs->createJob('GenericEmail', $data);
                            $data['type'] = 'manager_submit_aefi_followup_notification';
                            $this->QueuedJobs->createJob('GenericNotification', $data);
                        }
                        //
                        return $this->redirect(['action' => 'view', $aefi->id]);
                    } else {
                        $this->Flash->error(__('Foloow up for report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
                    }
                } elseif ($followup->submitted == -1) {
                    //cancel button              
                    $this->Flash->success(__('Cancel form successful. You may submit follow up for report '.$aefi->reference_number.' later'));
                    return $this->redirect(['controller' => 'Users','action' => 'home']);
                } 
          }
        } else {
          $this->Flash->error(__('Report does not exist.'));
          return $this->redirect(['action' => 'index']);
        }


        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'followup'));
        $this->set('_serialize', ['aefi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $aefi = $this->Aefis->get($id);
        if ($aefi->user_id == $this->Auth->user('id') && ($aefi->submitted == 0 or $aefi->submitted == 1)) {
            if ($this->Aefis->delete($aefi)) {
                $this->Flash->success(__('The aefi has been deleted.'));
            } else {
                $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('You do not have permission to delete the report'));
        } 

        return $this->redirect(['action' => 'index']);
    }
}
