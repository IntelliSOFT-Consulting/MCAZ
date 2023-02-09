<?php
namespace App\Controller\Institution;

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
class SaefisController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'maxLimit' => 100
    ];

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
            // ->order(['created' => 'DESC'])
            ->where(['status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy', 'Saefis.name_of_vaccination_site' => $this->Auth->user('name_of_institution')]);
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $users = $this->Saefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('designations', 'provinces', 'users'));
        
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('saefis', $query->contain($this->paginate['contain']));
        } else {
            $this->set('saefis', $this->paginate($query));
        }

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

}
