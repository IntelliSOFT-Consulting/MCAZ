<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisBaseController extends AppController
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
            'contain' => ['SaefiListOfVaccines', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews']
        ];
        $query = $this->Saefis
            ->find('search', ['search' => $this->request->query])
            ->where(['status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy']);
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('designations', 'provinces'));
        $this->set('saefis', $this->paginate($query));

        $_designations = $designations->toArray();
        $_provinces = $provinces->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [ 'id', 'user_id', 'saefi_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'place_vaccination', 'place_vaccination_other', 'site_type', 'site_type_other', 'vaccination_in', 'vaccination_in_other', 'reporter_name', 'report_date', 'start_date', 'complete_date', 
                'designation_id', 
                'province_id', 
                'telephone', 'mobile', 'reporter_email', 'patient_name', 'gender', 'hospitalization_date', 'status_on_date', 'died_date', 'autopsy_done', 'autopsy_done_date', 'autopsy_planned', 'autopsy_planned_date', 'past_history', 'past_history_remarks', 'adverse_event', 'adverse_event_remarks', 'allergy_history', 'allergy_history_remarks', 'existing_illness', 'existing_illness_remarks', 'hospitalization_history', 'hospitalization_history_remarks', 'medication_vaccination', 'medication_vaccination_remarks', 'faith_healers', 'faith_healers_remarks', 'family_history', 'family_history_remarks', 'pregnant', 'pregnant_weeks', 'breastfeeding', 'infant', 'birth_weight', 'delivery_procedure', 'delivery_procedure_specify', 'source_examination', 'source_documents', 'source_verbal', 'verbal_source', 'source_other', 'source_other_specify', 'examiner_name', 'other_sources', 'signs_symptoms', 'person_details', 'person_designation', 'person_date', 'medical_care', 'not_medical_care', 'final_diagnosis', 'when_vaccinated', 'when_vaccinated_specify', 'prescribing_error', 'prescribing_error_specify', 'vaccine_unsterile', 'vaccine_unsterile_specify', 'vaccine_condition', 'vaccine_condition_specify', 'vaccine_reconstitution', 'vaccine_reconstitution_specify', 'vaccine_handling', 'vaccine_handling_specify', 'vaccine_administered', 'vaccine_administered_specify', 'vaccinated_vial', 'vaccinated_session', 'vaccinated_locations', 'vaccinated_locations_specify', 'vaccinated_cluster', 'vaccinated_cluster_number', 'vaccinated_cluster_vial', 'vaccinated_cluster_vial_number', 'syringes_used', 'syringes_used_specify', 'syringes_used_other', 'syringes_used_findings', 'reconstitution_multiple', 'reconstitution_different', 'reconstitution_vial', 'reconstitution_syringe', 'reconstitution_vaccines', 'reconstitution_observations', 'cold_temperature', 'cold_temperature_deviation', 'cold_temperature_specify', 'procedure_followed', 'other_items', 'partial_vaccines', 'unusable_vaccines', 'unusable_diluents', 'additional_observations', 'cold_transportation', 'vaccine_carrier', 'coolant_packs', 'transport_findings', 'similar_events', 'similar_events_describe', 'similar_events_episodes', 'affected_vaccinated', 'affected_not_vaccinated', 'affected_unknown', 'community_comments', 'relevant_findings', 'created', 'modified', 'submitted', 'submitted_date', 'status', 'reports file', 
                'saefi_list_of_vaccines.vaccine_name', 'saefi_list_of_vaccines.vaccination_doses',
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                'reviews.system_message', 'reviews.user_message', 
                'attachments.file'];
            $_extract = [ 'id', 'user_id', 'saefi_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'place_vaccination', 'place_vaccination_other', 'site_type', 'site_type_other', 'vaccination_in', 'vaccination_in_other', 'reporter_name', 'report_date', 'start_date', 'complete_date', 
                function ($row) use($_designations) { return $_designations[$row['designation_id']] ?? '' ; }, //'designation_id', 
                function ($row) use($_provinces) { return $_provinces[$row['province_id']] ?? '' ; },  
                'telephone', 'mobile', 'reporter_email', 'patient_name', 'gender', 'hospitalization_date', 'status_on_date', 'died_date', 'autopsy_done', 'autopsy_done_date', 'autopsy_planned', 'autopsy_planned_date', 'past_history', 'past_history_remarks', 'adverse_event', 'adverse_event_remarks', 'allergy_history', 'allergy_history_remarks', 'existing_illness', 'existing_illness_remarks', 'hospitalization_history', 'hospitalization_history_remarks', 'medication_vaccination', 'medication_vaccination_remarks', 'faith_healers', 'faith_healers_remarks', 'family_history', 'family_history_remarks', 'pregnant', 'pregnant_weeks', 'breastfeeding', 'infant', 'birth_weight', 'delivery_procedure', 'delivery_procedure_specify', 'source_examination', 'source_documents', 'source_verbal', 'verbal_source', 'source_other', 'source_other_specify', 'examiner_name', 'other_sources', 'signs_symptoms', 'person_details', 'person_designation', 'person_date', 'medical_care', 'not_medical_care', 'final_diagnosis', 'when_vaccinated', 'when_vaccinated_specify', 'prescribing_error', 'prescribing_error_specify', 'vaccine_unsterile', 'vaccine_unsterile_specify', 'vaccine_condition', 'vaccine_condition_specify', 'vaccine_reconstitution', 'vaccine_reconstitution_specify', 'vaccine_handling', 'vaccine_handling_specify', 'vaccine_administered', 'vaccine_administered_specify', 'vaccinated_vial', 'vaccinated_session', 'vaccinated_locations', 'vaccinated_locations_specify', 'vaccinated_cluster', 'vaccinated_cluster_number', 'vaccinated_cluster_vial', 'vaccinated_cluster_vial_number', 'syringes_used', 'syringes_used_specify', 'syringes_used_other', 'syringes_used_findings', 'reconstitution_multiple', 'reconstitution_different', 'reconstitution_vial', 'reconstitution_syringe', 'reconstitution_vaccines', 'reconstitution_observations', 'cold_temperature', 'cold_temperature_deviation', 'cold_temperature_specify', 'procedure_followed', 'other_items', 'partial_vaccines', 'unusable_vaccines', 'unusable_diluents', 'additional_observations', 'cold_transportation', 'vaccine_carrier', 'coolant_packs', 'transport_findings', 'similar_events', 'similar_events_describe', 'similar_events_episodes', 'affected_vaccinated', 'affected_not_vaccinated', 'affected_unknown', 'community_comments', 'relevant_findings', 'created', 'modified', 'submitted', 'submitted_date', 'status', 
                    'reports.0.file', 
                function ($row) { return implode('|', Hash::extract($row['saefi_list_of_vaccines'], '{n}.vaccine_name')); }, //'.vaccine_name', 
                function ($row) { return implode('|', Hash::extract($row['saefi_list_of_vaccines'], '{n}.vaccination_doses')); }, //'.doses no.', 
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

        $this->render('/Base/Saefis/index');
    }
    public function restore() {
        $this->paginate = [
            'contain' => []
        ];
        
        $query = $this->Saefis
            ->find('search', ['search' => $this->request->query, 'withDeleted'])
            ->where(['deleted IS NOT' =>  null]);
            
        $this->set('saefis', $this->paginate($query));
    }
    public function restoreDeleted($id = null)
    {

        $this->request->allowMethod(['post', 'delete', 'get']);
        $saefi = $this->Saefis->get($id, ['withDeleted']);
        if ($this->Saefis->restore($saefi)) {
            $this->Flash->success(__('The SAEFI has been restored.'));
        } else {
            $this->Flash->error(__('The SAEFI could not be restored. Please, try again.'));
        }

        return $this->redirect(['action' => 'restore']);
    }

    /**
     * View method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => $this->saefi_contain, 
                          'withDeleted'
        ]);
        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($saefi->aefi_causalities as $key => $value) {
                if($value['id'] == $this->request->getData('causality_id')) {
                    $ekey = $key;
                }
            } 
        }

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => (isset($saefi->reference_number)) ? $saefi->reference_number.'.pdf' : 'saefi_'.$saefi->id.'.pdf'
                ]
            ]);
        }
        $evaluators = $this->Saefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Saefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        

        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations', 'provinces', 'evaluators', 'users', 'ekey'));
        $this->set('_serialize', ['saefi', 'designations']);

        $this->render('/Base/Saefis/view');
    }
    public function download($id = null, $part = null)
    {
        //Method to download specific part of form
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines', 'AefiListOfVaccines', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 
                          'SaefiComments', 'SaefiComments.Attachments',  
                          'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments', 
                          'ReportStages', 'AefiCausalities', 'AefiCausalities.Users', 'Reports',
                          'OriginalSaefis', 'OriginalSaefis.SaefiListOfVaccines', 'OriginalSaefis.Attachments', 'OriginalSaefis.Reports'], 
                          'withDeleted'
        ]);
        $ekey = 100;
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => (isset($saefi->reference_number)) ? $saefi->reference_number.'.pdf' : 'saefi_'.$saefi->id.'.pdf'
                ]
            ]);
        }
        $evaluators = $this->Saefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Saefis->Users->find('list', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        

        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations', 'provinces', 'evaluators', 'users', 'ekey', 'part'));
        $this->set('_serialize', ['saefi', 'designations']);

        $this->render('/Base/Saefis/pdf/download');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $saefi = $this->Saefis->newEntity();
        if ($this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->user_id = $this->Auth->user('id');
            if ($this->Saefis->save($saefi, ['validate' => false])) {
                //update field
                $query = $this->Saefis->query();
                $query->update()
                    ->set(['reference_number' => 'SAEFI'.$saefi->id.'/'.$saefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $saefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The saefi has been saved.'));

                return $this->redirect(['action' => 'edit', $saefi->id]);
            }
            $this->Flash->error(__('The AEFI Investigation Report could not be saved. Please, try again.'));
        }
        $users = $this->Saefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'users', 'designations', 'provinces'));
        $this->set('_serialize', ['saefi']);
    }


    public function requestEvaluator() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->request_evaluators[0]->user_id = $saefi->assigned_to;
            $saefi->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $saefi->request_evaluators[0]->type = 'request_evaluator_info';
            $saefi->request_evaluators[0]->model = 'Saefis';
            $saefi->request_evaluators[0]->foreign_key = $saefi->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_evaluator_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $saefi->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.')); 
                    return $this->redirect($this->referer());
                }

                //end 
                
               $this->Flash->success('Request successfully sent to evaluator for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function causality() {
        //debug($this->request->getData());
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());

            //new stage only once
            if(!in_array("Evaluated", Hash::extract($saefi->report_stages, '{n}.stage'))) {
                $stage1  = $this->Saefis->ReportStages->newEntity();
                $stage1->model = 'Saefis';
                $stage1->stage = 'Evaluated';
                $stage1->description = 'Stage 3';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $saefi->report_stages = [$stage1];
                $saefi->status = 'Evaluated';
            }
                        //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_review_assigned_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 
                
               $this->Flash->success('Review successfully done for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }    

    public function requestReporter() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pk_id'), []);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->request_reporters[0]->user_id = $saefi->user_id;
            $saefi->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $saefi->request_reporters[0]->type = 'request_reporter_info';
            $saefi->request_reporters[0]->model = 'Saefis';
            $saefi->request_reporters[0]->foreign_key = $saefi->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->user_id)) {
                    $reporter = $this->Saefis->Users->get($saefi->user_id);
                    $data = [
                      'email_address' => $reporter->email, 'user_id' => $reporter->id,
                      'type' => 'manager_request_reporter_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['user_message'] = $saefi->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } else {
                    $this->Flash->error(__('Unable to locate reporter.')); 
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $saefi->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                }          
                //manager does not get a notificatoin
                //end 
                
               $this->Flash->success('Request successfully sent to reporter for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }

    public function committeeReview() {
        $saefi = $this->Saefis->get($this->request->getData('saefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($saefi->id) && $this->request->is('post')) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            $saefi->committees[0]->user_id = $this->Auth->user('id');
            $saefi->committees[0]->model = 'Saefis';
            $saefi->committees[0]->category = 'committee';

            /**
             * Committee decision 
             * If decision is Approved, the status is set to Committee or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */
            if(!empty($this->request->getData('committees.100.status'))) {
                $stage1  = $this->Saefis->ReportStages->newEntity();
                $stage1->model = 'Saefis';
                $stage1->stage = 'FinalFeedback';
                $stage1->description = 'Stage 8';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $saefi->committees[0]->outcome_date;
                $saefi->report_stages = [$stage1];
                $saefi->status = 'FinalFeedback';
            } else {
                //If Coming from Stage 6 then stage 4
                $stage1  = $this->Saefis->ReportStages->newEntity();
                $stage1->model = 'Saefis';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $saefi->committees[0]->outcome_date;
                if(in_array("Correspondence", Hash::extract($saefi->report_stages, '{n}.stage'))) {                    
                    $stage1->stage = 'Presented';
                    $stage1->description = 'Stage 7: PVCT';
                    $saefi->status = 'Presented';
                    $saefi->report_stages = [$stage1];
                } else {                 
                    $stage1->stage = 'Committee';
                    $stage1->description = 'Stage 4: PVCT';
                    $saefi->status = 'Committee';                    
                    $saefi->report_stages = [$stage1];
                }
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Saefis->save($saefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');    
                if(!empty($saefi->assigned_to)) {
                    $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                    $data = [
                      'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                      'type' => 'manager_committee_assigned_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);                
                } 

                //notify manager                
                $data = ['user_id' => $this->Auth->user('id'), 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if(!empty($saefi->committees[0]->literature_review) && !empty($saefi->status)) {
                    $reporter = $this->Saefis->Users->get($saefi->user_id);
                    $data = [
                      'email_address' => $saefi->reporter_email, 'user_id' => $saefi->user_id,
                      'type' => 'reporter_committee_comments_email', 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $data['vars']['literature_review'] = $saefi->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);     
                }
                //end 
                
               $this->Flash->success('Committee Review successfully done for AEFI Investigation Report '.$saefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.')); 
                return $this->redirect($this->referer());
            }
        } else {
               $this->Flash->error(__('Unknown AEFI Investigation Report. Please correct.')); 
               return $this->redirect($this->referer());
        }
    }


    /**
     * Edit method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */    
    public function clean($id = null) {
        //ensure only one 
        $this->loadModel('OriginalSaefis');
        $orig_saefi = $this->OriginalSaefis->get($id, ['contain' => ['Saefis']]);
        if ($orig_saefi->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_saefi['Saefi']['id']]);
        }
        $saefi = $this->Saefis->duplicateEntity($id);
        $saefi->saefi_id = $id;        
        $saefi->user_id = $this->Auth->user('id'); //the report is reassigned to the evaluator... the reporter should only have original report

        if ($this->Saefis->save($saefi, ['validate' => false])) {            
            $query = $this->Saefis->query();
            $query->update()
                ->set(['copied' => 'old copy'])
                ->where(['id' => $orig_saefi->id])
                ->execute();
            $this->Flash->success(__('The SAEFI has been successfully copied. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $saefi->id]);
        }
        $this->Flash->error(__('The AEFI Investigation Report could not be copied. Please, try again.'));
        return $this->redirect($this->referer());        
    }

    public function edit($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines', 'AefiListOfVaccines', 'Attachments', 'Reports']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            if (!empty($saefi->attachments)) {
              for ($i = 0; $i <= count($saefi->attachments)-1; $i++) { 
                $saefi->attachments[$i]->model = 'Saefis';
                $saefi->attachments[$i]->category = 'attachments';
              }
            }
            // reports
            if (!empty($saefi->reports)) {
              for ($i = 0; $i <= count($saefi->reports)-1; $i++) { 
                $saefi->reports[$i]->model = 'Saefis';
                $saefi->reports[$i]->category = 'reports';
              }
            }
            
            if ($saefi->submitted == 1) {
              //save changes button
              $saefi->submitted = 2;
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == 2) {
              //submit to mcaz button
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$saefi->reference_number.' has been successfully saved and is ready for review.'));
                return $this->redirect(['action' => 'view', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($saefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$saefi->reference_number.' later'));
                return $this->redirect(['action' => 'index']);

           } else {
              if ($this->Saefis->save($saefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$saefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $saefi->id]);
              } else {
                $this->Flash->error(__('Report '.$saefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations', 'provinces'));
        $this->set('_serialize', ['saefi']);
    }

    public function attachSignature($id = null) {
        $aefi_causality = $this->Saefis->AefiCausalities->get($id, ['contain' => ['Saefis']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi_causality = $this->Saefis->AefiCausalities->patchEntity($aefi_causality, ['chosen' => 1, 'saefi' => ['signature' => 1]], ['associated' => ['Saefis']]);
            if ($this->Saefis->AefiCausalities->save($aefi_causality)) {
                $this->Flash->success('Signature successfully attached to assessment');
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
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function archive($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $saefi = $this->Saefis->get($id);
        //update field
        $query = $this->Saefis->query();
        $query->update()
            ->set(['status' => 'Archived'])
            ->where(['id' => $saefi->id])
            ->execute();
        $this->Flash->success(__('The SAEFI has been archived.'));
        //

        return $this->redirect(['action' => 'index']);
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saefi = $this->Saefis->get($id);
        if ($this->Saefis->delete($saefi)) {
            $this->Flash->success(__('The AEFI Investigation Report has been deleted.'));
        } else {
            $this->Flash->error(__('The AEFI Investigation Report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
