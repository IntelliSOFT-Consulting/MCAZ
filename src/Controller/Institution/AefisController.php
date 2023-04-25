<?php
namespace App\Controller\Institution;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
{

    public $paginate = [
        'limit' => 25,
        'maxLimit' => 100
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Search.Prg', [
            'actions' => ['index', 'restore']
        ]);
        // $this->loadComponent('RequestHandler', ['viewClassMap' => ['csv' => 'CsvView.Csv']]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiCausalities.Users', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 'Committees', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments']
        ];


        $query = $this->Aefis
            ->find('search', ['search' => $this->request->query])
            // ->order(['created' => 'DESC'])
            ->where(['status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy', 'Aefis.reporter_institution' => $this->Auth->user('name_of_institution')]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $users = $this->Aefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations', 'query', 'users'));
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
        //ensure only one 
        $this->loadModel('OriginalAefis');
        $orig_aefi = $this->OriginalAefis->get($id, ['contain' => ['Aefis']]);
        if ($orig_aefi->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_aefi['aefi']['id']]);
        }
        
        $aefi = $this->Aefis->get($id, [
            'contain' => $this->aefi_contain, 'withDeleted'
        ]);

        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($aefi->aefi_causalities as $key => $value) {
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
                    'filename' => $aefi->reference_number.'.pdf'
                ]
            ]);
        }

        $evaluators = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Aefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'evaluators', 'users', 'ekey'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);

    }
    public function download($id = null, $part = null)
    {
        //Method to download specific part of form
        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 
                          'AefiCausalities.Users', 'AefiComments', 'AefiComments.Attachments',  
                          'Committees', 'Committees.Users', 'Committees.AefiComments', 'Committees.AefiComments.Attachments', 
                          'ReportStages', 
                          'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments', 
                          'OriginalAefis', 'OriginalAefis.AefiListOfVaccines', 'OriginalAefis.Attachments'], 
                          'withDeleted'
        ]);

        $ekey = 100;
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => (isset($aefi->reference_number)) ? $aefi->reference_number.'.pdf' : 'aefi_'.$aefi->id.'.pdf'
                ]
            ]);
        }
        $evaluators = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Aefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        

        $designations = $this->Aefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'evaluators', 'users', 'ekey', 'part'));
        $this->set('_serialize', ['aefi', 'designations']);

    }

    
}
