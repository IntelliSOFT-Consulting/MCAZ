<?php
namespace App\Controller\Institution;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Cake\View\Helper\HtmlHelper; 


class SadrsController extends AppController
{  
    
    public $paginate = [
        'limit' => 25,
        'maxLimit' => 100
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Search.Prg', [
            // This is default config. You can modify "actions" as needed to make
            // the PRG component work only for specified methods.
            'actions' => ['index', 'restore']
        ]);
        $this->loadModel('Sadrs');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SadrListOfDrugs', 'SadrListOfDrugs.Doses', 'SadrOtherDrugs', 'Attachments',  'Reviews', 'Reviews.Users', 'RequestReporters', 'RequestEvaluators', 'Committees', 'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments', 'ReportStages', 'Reactions']
        ];
        
        $query = $this->Sadrs
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            // ->order(['created' => 'DESC'])
            ->where(['Sadrs.status !=' =>  (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy', 'Sadrs.name_of_institution' => $this->Auth->user('name_of_institution')]);
            // You can add extra things to the query if you need to
            //->where([['ifnull(report_type,-1) !=' => 'FollowUp']]);
        // if($this->Auth->user('group_id') == 5) $query->where(['Sadrs.name_of_institution' => $this->Auth->user('name_of_institution')]);
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $users = $this->Sadrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations', 'query', 'users'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('sadrs', $query->contain($this->paginate['contain']));
        } else {
            $this->set('sadrs', $this->paginate($query));
        }        

        // $this->set(compact('sadrs'));
        // $this->set('_serialize', ['sadrs']);
        $_provinces = $provinces->toArray();
        $_designations = $designations->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'user_id', 'sadr_id', 'messageid', 'assigned_to', 'assigned_by', 'assigned_date', 'Province', 'reference_number', 'Designation', 'report_type', 'name_of_institution', 'institution_code', 'institution_name', 'institution_address', 'patient_name', 'ip_no', 'date_of_birth', 'age_group', 'gender', 'weight', 'height', 'date_of_onset_of_reaction', 'date_of_end_of_reaction', 'duration_type', 'duration', 'description_of_reaction', 'severity', 'severity_reason', 'medical_history', 'past_drug_therapy', 'outcome', 'lab_test_results', 'reporter_name', 'reporter_email', 'reporter_phone', 'submitted', 'submitted_date', 'action_taken', 'relatedness', 'status', 'emails', 'active', 'device', 'notified', 'created', 'modified', 
                'sadr_list_of_drugs.drug_name', 'sadr_list_of_drugs.brand_name', 'sadr_list_of_drugs.dose',  'sadr_list_of_drugs.dose_id', 'sadr_list_of_drugs.route_id', 'sadr_list_of_drugs.frequency_id', 
                'sadr_followups', 
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                'reviews.system_message', 'reviews.user_message', 
                'attachments.file'];
            $_extract = ['id', 'user_id', 'sadr_id', 'messageid', 'assigned_to', 'assigned_by', 'assigned_date', 
                function ($row) use ($_provinces) { return $_provinces[$row['province_id']] ?$_provinces[$row['province_id']]: ''; }, //provinces
                'reference_number', 
                function ($row) use($_designations) { return $_designations[$row['designation_id']] ?$_designations[$row['designation_id']]: '' ; }, //designation_id 
                'report_type', 'name_of_institution', 'institution_code', 'institution_name', 'institution_address', 'patient_name', 'ip_no', 'date_of_birth', 'age_group', 'gender', 'weight', 'height', 'date_of_onset_of_reaction', 'date_of_end_of_reaction', 'duration_type', 'duration', 'description_of_reaction', 'severity', 'severity_reason', 'medical_history', 'past_drug_therapy', 'outcome', 'lab_test_results', 'reporter_name', 'reporter_email', 'reporter_phone', 'submitted', 'submitted_date', 'action_taken', 'relatedness', 'status', 'emails', 'active', 'device', 'notified', 'created', 'modified', 
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.drug_name')); }, // 'drug_name', 
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.brand_name')); }, //'.brand_name', 
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.dose')); }, //'.dose',  
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.dose_id')); }, //'sadr_list_of_drugs.dose_id', 
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.route_id')); },//'.route_id', 
                function ($row) { return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.frequency_id')); }, //'.frequency_id', 
                function ($row) { return implode('|', Hash::extract($row['sadr_followups'], '{n}.id')); }, //'sadr_followups', 
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

    public function view($id = null) {
        //ensure only one 
        $this->loadModel('OriginalSadrs');
        $orig_sadr = $this->OriginalSadrs->get($id, ['contain' => ['Sadrs']]);
        if ($orig_sadr->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_sadr['sadr']['id']]);
        }
        
        $sadr = $this->Sadrs->get($id, [
            'contain' => $this->sadr_contain, 'withDeleted'
        ]);


        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($sadr->reviews as $key => $value) {
                if($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            } 
        }

        if(strpos($this->request->url, 'pdf')) {
            // $this->viewBuilder()->setLayout('pdf/default');
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $sadr->reference_number.'.pdf'
                ]
            ]);
        }
        
        
        $evaluators = $this->Sadrs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Sadrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Sadrs->Designations->find('list',array('order'=>'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'evaluators', 'users', 'designations', 'provinces', 'doses', 'routes', 'frequencies', 'ekey'));
        $this->set('_serialize', ['sadr']);

    }
}
