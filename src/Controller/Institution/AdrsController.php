<?php
namespace App\Controller\Institution;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AppController
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
                //date_of_onset_of_reaction
                if (isset($this->request->data['date_of_onset_of_reaction'])) {
                    $this->request->data['date_of_onset_of_reaction'] = implode('-', $this->request->data['date_of_onset_of_reaction']);
                }
                //date_of_end_of_reaction
                if (isset($this->request->data['date_of_end_of_reaction'])) {
                    $this->request->data['date_of_end_of_reaction'] = implode('-', $this->request->data['date_of_end_of_reaction']);
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
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrListOfDrugs.Doses', 'AdrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews', 'Reviews.Users']
        ];
        $query = $this->Adrs
            ->find('search', ['search' => $this->request->query])
            // ->order(['created' => 'DESC'])
            ->where(['status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy', 'Adrs.name_of_institution' => $this->Auth->user('name_of_institution')]);
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $users = $this->Adrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $this->set(compact('designations', 'query', 'doses', 'users'));
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
                function ($row) { return implode('|', Hash::extract($row['adr_list_of_drugs'], '{n}.dose.name')); }, //'.dose', 
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


        if(strpos($this->request->url, 'pdf')) {
            // $this->viewBuilder()->setLayout('pdf/default');            
            $query->where([['Adrs.active' => '1']]);
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'summary_saes.pdf'
                ]
            ]);
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
        //ensure only one 
        $this->loadModel('OriginalAdrs');
        $orig_adr = $this->OriginalAdrs->get($id, ['contain' => ['Adrs']]);
        if ($orig_adr->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_adr['adr']['id']]);
        }

        $adr = $this->Adrs->get($id, [
            'contain' => $this->adr_contain, 'withDeleted'
        ]);

        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($adr->reviews as $key => $value) {
                if($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            } 
        }

        // $this->viewBuilder()->setLayout('pdf/default');
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $adr->reference_number.'.pdf'
                ]
            ]);
        }
        
        $evaluators = $this->Adrs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Adrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'designations', 'doses', 'routes', 'frequencies', 'evaluators', 'users', 'ekey'));
        $this->set('_serialize', ['adr']);

        $this->set('adr', $adr);
        $this->set('_serialize', ['adr']);


    }


    private function format_dates($adr) {
        //format dates
        if (!empty($adr->date_of_birth)) {
            if(empty($adr->date_of_birth)) $adr->date_of_birth = '--';
            $a = explode('-', $adr->date_of_birth);
            $adr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        } 
        if (!empty($adr->date_of_onset_of_reaction)) {
            if(empty($adr->date_of_onset_of_reaction)) $adr->date_of_onset_of_reaction = '--';
            $a = explode('-', $adr->date_of_onset_of_reaction);
            $adr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($adr->date_of_end_of_reaction)) {
            if(empty($adr->date_of_end_of_reaction)) $adr->date_of_end_of_reaction = '--';
            $a = explode('-', $adr->date_of_end_of_reaction);
            $adr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }        
        return $adr;
    }

}
