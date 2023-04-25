<?php

namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use DateTime;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisBaseController extends AppController
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
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiCausalities.Users', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 'Committees', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments', 'ReportStages']
        ];


        $query = $this->Aefis
            ->find('search', ['search' => $this->request->query])
            ->order(['id' => 'DESC'])
            ->where(['status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy']);
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

        // debug($this->request->params['_ext']);
        // exit;


        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [
                'id',    'user_id',    'aefi_id',    'province_id',    'reference_number',    'assigned_to',    'assigned_by',    'assigned_date',    'patient_name',    'patient_surname',    'patient_next_of_kin',    'patient_address',    'patient_telephone',    'report_type',    'gender',    'date_of_birth',    'age_at_onset',    'age_at_onset_years',    'age_at_onset_months',    'age_at_onset_days',    'age_at_onset_specify',    'reporter_name',    'designation_id',    'reporter_department',    'reporter_address',    'reporter_institution',    'reporter_district',    'reporter_province',    'reporter_phone',    'reporter_email',    'name_of_vaccination_center',    'adverse_events',    'ae_severe_local_reaction',    'ae_seizures',    'ae_abscess',    'ae_sepsis',    'ae_encephalopathy',    'ae_toxic_shock',    'ae_thrombocytopenia',    'ae_anaphylaxis',    'ae_fever',    'ae_3days',    'ae_febrile',    'ae_beyond_joint',    'ae_afebrile',    'ae_other',    'adverse_events_specify',    'aefi_date',
                'notification_date', 'description_of_reaction',    'treatment_provided',    'serious',    'serious_yes',    'outcome',    'died_date',
                'autopsy',    'past_medical_history',    'district_receive_date',  'investigation_needed',    'investigation_date', 'national_receive_date',
                'comments',    'submitted',    'submitted_date',  'status',    'created',  'modified',
                'aefi_list_of_vaccines.vaccine_name', 'aefi_list_of_vaccines.vaccination_date', 'aefi_list_of_vaccines.vaccination_time',  'aefi_list_of_vaccines.dosage', 'aefi_list_of_vaccines.batch_number', 'aefi_list_of_vaccines.expiry_date',
                'aefi_followups',
                'committees.comments', 'committees.literature_review', 'committees.references_text',
                'request_evaluators.system_message', 'request_evaluators.user_message',
                'request_reporters.system_message', 'request_reporters.user_message',
                // 'reviews.system_message', 'reviews.user_message', 
                'attachments.file'
            ];
            $_extract = [
                'id',    'user_id',    'aefi_id',
                function ($row) use ($_provinces) {
                    return (!empty($_provinces[$row['province_id']])) ? $_provinces[$row['province_id']] : '';
                }, //provinces    
                'reference_number',    'assigned_to',    'assigned_by',    'assigned_date',    'patient_name',    'patient_surname',    'patient_next_of_kin',    'patient_address',    'patient_telephone',    'report_type',    'gender',    'date_of_birth',    'age_at_onset',    'age_at_onset_years',    'age_at_onset_months',    'age_at_onset_days',    'age_at_onset_specify',    'reporter_name',
                function ($row) use ($_designations) {
                    return (!empty($_designations[$row['designation_id']])) ? $_designations[$row['designation_id']] : '';
                }, //designation_id     
                'reporter_department',    'reporter_address',    'reporter_institution',    'reporter_district',    'reporter_province',    'reporter_phone',    'reporter_email',    'name_of_vaccination_center',    'adverse_events',    'ae_severe_local_reaction',    'ae_seizures',    'ae_abscess',    'ae_sepsis',    'ae_encephalopathy',    'ae_toxic_shock',    'ae_thrombocytopenia',    'ae_anaphylaxis',    'ae_fever',    'ae_3days',    'ae_febrile',    'ae_beyond_joint',    'ae_afebrile',    'ae_other',    'adverse_events_specify',    'aefi_date',
                'notification_date', 'description_of_reaction',    'treatment_provided',    'serious',    'serious_yes',    'outcome',    'died_date',
                'autopsy',    'past_medical_history',    'district_receive_date',  'investigation_needed',    'investigation_date', 'national_receive_date',
                'comments',    'submitted',    'submitted_date',  'status',    'created',  'modified',
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccine_name'));
                }, //'.vaccine_name', 
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccination_date'));
                }, //'.vaccination_date', 
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.vaccination_time'));
                }, //'.vaccination_time',  
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.dosage'));
                }, //'.dosage', 
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.batch_number'));
                }, //'.batch_number', 
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_list_of_vaccines'], '{n}.expiry_date'));
                }, //'.expiry_date', 
                function ($row) {
                    return implode('|', Hash::extract($row['aefi_followups'], '{n}.id'));
                }, //'aefi_followups',
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.comments'));
                }, //'committees.comments', 
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.literature_review'));
                }, //'.literature_review', 
                function ($row) {
                    return implode('|', Hash::extract($row['committees'], '{n}.references_text'));
                }, //'.references_text', 
                function ($row) {
                    return implode('|', Hash::extract($row['request_evaluators'], '{n}.system_message'));
                }, //'.system_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['request_evaluators'], '{n}.user_message'));
                }, // '.user_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message'));
                }, //'.system_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message'));
                }, //'.user_message', 
                // function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.system_message')); }, //'reviews.system_message', 
                // function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.user_message')); }, //'reviews.user_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['attachments'], '{n}.file'));
                }, //'attachments.file'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
        if ($this->request->params['_ext'] === 'pdf') {
            $query->where([['Aefis.active' => '1']]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'AEFIS_' . date('d-m-Y') . '.pdf'
                ]
            ]);
            $this->render('/Base/Aefis/pdf/index');
        } else {
            $this->render('/Base/Aefis/index');
        }
    }

    public function time()
    {
        $this->paginate = [
            'contain' => ['AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiCausalities.Users', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators', 'Committees', 'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments', 'ReportStages']
        ];


        $query = $this->Aefis
            ->find('search', ['search' => $this->request->query])
            // ->order(['created' => 'DESC'])
            ->where(['status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy']);

        $query->where([['Aefis.active' => '1']]);
        $query->contain($this->paginate['contain']);

        $time_line_data = [];
        $report_count = 0;
        $total_reports_time = 0;
        $single_report_total_time_array = array();
        foreach ($query as $application) {

            // dd($application);
            $report_count++;
            // Get a single stage time
            $days_array = array();
            $prev_date = null;
            $total_days = 0;
            $stage_days_array = array();
            $mcaz_time = 0;
            $applicant_time = 0;
            $total_mcaz_time = 0;

            foreach ($application->report_stages as $application_stage) {
                $curr_date = (($application_stage->alt_date)) ?? $application_stage->stage_date;
                $stage_name = '<b>' . $application_stage->stage . '</b> : <br>';

                if (!empty($curr_date) && !empty($prev_date)) {
                    //get the days between the two dates
                    $date1 = new DateTime($prev_date);
                    $date2 = new DateTime($curr_date);
                    $count = $date1->diff($date2)->days;
                    //get the day name 
                    $name = $date1->format('l');
                    //get the date in the format of 2017-01-01
                    $prev_date = $date1->format('Y-m-d');
                    $curr_date = $date2->format('Y-m-d');
                    //get the number of days between the two dates
                    $count = $date1->diff($date2)->days;
                    //loop through the dates and get the number of days
                    $dates = array();
                    $dates[] = $prev_date;

                    if ($count > 0) {
                        for ($i = 1; $i < $count; $i++) {
                            $date1->modify('+1 day');
                            $name = $date1->format('l');
                            //add a flag to the date to indicate if it is a weekend
                            if ($name == 'Saturday' || $name == 'Sunday') {
                                $dates[] = $date1->format('Y-m-d') . ' Weekend';
                            } else {
                                $dates[] = $date1->format('Y-m-d');
                            }
                            //remove the weekends from the array
                            $dates = array_filter($dates, function ($value) {
                                return strpos($value, 'Weekend') === false;
                            });
                        }
                    }
                    $dates[] = $curr_date;
                    //remove duplicates from the array and make it unique
                    $dates = array_unique($dates);

                    //for each date in the array, echo the date and the day name

                    //count the number of days in the array
                    $days = count($dates);
                    //if days==1 then return 0
                    if ($days == 1) {
                        $days = 0;
                    }
                    $stage_days =  $days;
                    $total_days += $days;
                } else {
                    $stage_days =  '0';
                    $total_days += 0;
                }

                //applicant time = days under correspondence stage
                if ($application_stage->stage == 'ApplicantResponse') {
                    $applicant_time += $days;
                }

                $mcaz_time = $total_days - $applicant_time;

                //add the stage name and days to the array
                $stage_days_array[] = $stage_name . $stage_days . ' Days<br>';
                $days_array[] = $stage_days;
                $prev_date = $curr_date;
            }
            $total_mcaz_time += $mcaz_time;
            $total_reports_time += $total_mcaz_time;
            $single_report_total_time_array[] = $total_days;

            $time_line_data[] = [
                'reference_no' => (($application->submitted == 2) ? $application->reference_number : $application->created),
                'approval_time' => $total_days . " Days",
                'mcaz_time' => $total_mcaz_time . " Days",
                'applicant_time' => $applicant_time . " Days",
                'stage_time' => $stage_days_array,
            ];
        }
        //divide the total mcaz days by the number of reports
        $average_time_per_reports = $total_reports_time / $report_count;
        // limit the number of decimal places to 2
        $average_time_per_reports = number_format($average_time_per_reports, 0);
        // dd($single_report_total_time_array);

        // Median Calculation::::order days_array in ascending order
        sort($single_report_total_time_array);
        // split the array into two halves
        $half = count($days_array) / 2;
        //if the array has an odd number of elements, then get the middle element
        if (count($days_array) % 2) {
            $median = $days_array[$half];
        } else {
            //if the array has an even number of elements, then get the average of the two middle elements
            $median = ($days_array[$half - 1] + $days_array[$half]) / 2;
        }

        $today = date("Y-m-d");
        $this->set(['applications' => $time_line_data, 'total_time' => $total_reports_time . ' Days', 'mean_time' => $average_time_per_reports . ' Days', 'median_time' => $median . ' Days', 'report_count' => $report_count]);

        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'landscape',
                'filename' => 'AEFIS_' . date('d-m-Y') . 'Timeline.pdf'
            ]
        ]);
        $this->render('/Base/Aefis/pdf/timeline');
    }
    public function restore()
    {
        $this->paginate = [
            'contain' => []
        ];

        $query = $this->Aefis
            ->find('search', ['search' => $this->request->query, 'withDeleted'])
            ->where(['deleted IS NOT' =>  null]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations'));
        $this->set('aefis', $this->paginate($query));
    }
    public function restoreDeleted($id = null)
    {

        $this->request->allowMethod(['post', 'delete', 'get']);
        $aefi = $this->Aefis->get($id, ['withDeleted']);
        if ($this->request->getData('purpose') == 'active') {
            $aefi->active = $this->request->getData('value');
            $this->Aefis->save($aefi);
        } else {
            if ($this->Aefis->restore($aefi)) {
                $this->Flash->success(__('The AEFI has been restored.'));
            } else {
                $this->Flash->error(__('The AEFI could not be restored. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'restore']);
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

        // dd($aefi);
        // exit;

        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($aefi->aefi_causalities as $key => $value) {
                if ($value['id'] == $this->request->getData('causality_id')) {
                    $ekey = $key;
                }
            }
        }

        if (strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $aefi->reference_number . '.pdf'
                ]
            ]);
        }

        $current_id = $this->Auth->user('id');
        $assignees = $this->Aefis->Users
            ->find('list', ['limit' => 200])
            ->where(['group_id' => 4])
            ->orWhere(['id' => $aefi->assigned_to ? $aefi->assigned_to : $current_id]); //use current id if unassigned else assigned user

        $evaluators = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4,'deactivated'=>0]);
        $users = $this->Aefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4],'deactivated'=>0]);

        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'assignees', 'designations', 'provinces', 'evaluators', 'users', 'ekey'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);

        $this->render('/Base/Aefis/view');
    }
    public function download($id = null, $part = null)
    {
        //Method to download specific part of form
        $aefi = $this->Aefis->get($id, [
            'contain' => [
                'AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators',
                'AefiCausalities.Users', 'AefiComments', 'AefiComments.Attachments',
                'Committees', 'Committees.Users', 'Committees.AefiComments', 'Committees.AefiComments.Attachments',
                'ReportStages',
                'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments',
                'OriginalAefis', 'OriginalAefis.AefiListOfVaccines', 'OriginalAefis.Attachments'
            ],
            'withDeleted'
        ]);

        $ekey = 100;
        if (strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => (isset($aefi->reference_number)) ? $aefi->reference_number . '.pdf' : 'aefi_' . $aefi->id . '.pdf'
                ]
            ]);
        }
        $evaluators = $this->Aefis->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Aefis->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);


        $designations = $this->Aefis->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces', 'evaluators', 'users', 'ekey', 'part'));
        $this->set('_serialize', ['aefi', 'designations']);

        $this->render('/Base/Aefis/pdf/download');
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
            if ($this->Aefis->save($aefi, ['validate' => false])) {
                //update field
                $query = $this->Aefis->query();
                $query->update()
                    ->set(['reference_number' => 'AEFI' . $aefi->id . '/' . $aefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $aefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $aefi->id]);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        }
        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'users', 'designations'));
        $this->set('_serialize', ['aefi']);
    }

    public function causality()
    {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($aefi->id) && $this->request->is('post')) {


            // Only Allowed Evaluators
            if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $aefi->assigned_to)) {
                $this->Flash->error('You have not been assigned the report for review!');
                return $this->redirect($this->referer());
            }
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());

            // update action date  
            $aefi->action_date = date("Y-m-d H:i:s");
            //new stage only once
            if (!in_array("Evaluated", Hash::extract($aefi->report_stages, '{n}.stage'))) {
                $stage1  = $this->Aefis->ReportStages->newEntity();
                $stage1->model = 'Aefis';
                $stage1->stage = 'Evaluated';
                $stage1->description = 'Stage 3';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $aefi->report_stages = [$stage1];
                $aefi->status = 'Evaluated';
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $assigner = $this->Aefis->Users->get($aefi->assigned_by);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_review_assigned_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $assigner->name;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //notify manager                
                $data = [
                    'user_id' => $this->Auth->user('id'), 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->Flash->success('Review successfully done for AEFI ' . $aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown AEFI Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    public function requestEvaluator()
    {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());

            $aefi->request_evaluators[0]->user_id = $aefi->assigned_to;
            $aefi->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $aefi->request_evaluators[0]->type = 'request_evaluator_info';
            $aefi->request_evaluators[0]->model = 'Aefis';
            $aefi->request_evaluators[0]->foreign_key = $aefi->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_request_evaluator_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $aefi->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.'));
                    return $this->redirect($this->referer());
                }

                //end 

                $this->Flash->success('Request successfully sent to evaluator for Aefi ' . $aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown Aefi Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    public function requestReporter()
    {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pk_id'), []);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->request_reporters[0]->user_id = $aefi->user_id;
            $aefi->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $aefi->request_reporters[0]->type = 'request_reporter_info';
            $aefi->request_reporters[0]->model = 'Aefis';
            $aefi->request_reporters[0]->foreign_key = $aefi->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($aefi->user_id)) {
                    $reporter = $this->Aefis->Users->get($aefi->user_id);
                    $data = [
                        'email_address' => $reporter->email, 'user_id' => $reporter->id,
                        'type' => 'manager_request_reporter_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['user_message'] = $aefi->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                } else {
                    $this->Flash->error(__('Unable to locate reporter.'));
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if (!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $aefi->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //manager does not get a notificatoin
                //end 

                $this->Flash->success('Request successfully sent to reporter for Aefi ' . $aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown Aefi Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    public function committeeReview()
    {
        $aefi = $this->Aefis->get($this->request->getData('aefi_pr_id'), ['contain' => 'ReportStages']);
        if (isset($aefi->id) && $this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->committees[0]->user_id = $this->Auth->user('id');
            $aefi->committees[0]->model = 'Aefis';
            $aefi->committees[0]->category = 'committee';

            /**
             * Committee decision 
             * If decision is Approved, the status is set to Committee or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */

            // update action date  
            $aefi->action_date = date("Y-m-d H:i:s");
            if (!empty($this->request->getData('committees.100.status'))) {
                $stage1  = $this->Aefis->ReportStages->newEntity();
                $stage1->model = 'Aefis';
                $stage1->stage = 'FinalFeedback';
                $stage1->description = 'Stage 8';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $aefi->committees[0]->outcome_date;
                $aefi->report_stages = [$stage1];
                $aefi->status = 'FinalFeedback';
            } else {
                //If Coming from Stage 6 then stage 4
                $stage1  = $this->Aefis->ReportStages->newEntity();
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $aefi->committees[0]->outcome_date;
                if (in_array("Correspondence", Hash::extract($aefi->report_stages, '{n}.stage'))) {
                    $stage1->model = 'Aefis';
                    $stage1->stage = 'Presented';
                    $stage1->description = 'Stage 7: PVCT';
                    $aefi->status = 'Presented';
                    $aefi->report_stages = [$stage1];
                } else {
                    $stage1->model = 'Aefis';
                    $stage1->stage = 'Committee';
                    $stage1->description = 'Stage 4: PVCT';
                    $aefi->status = 'Committee';
                    $aefi->report_stages = [$stage1];
                }
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Aefis->save($aefi)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($aefi->assigned_to)) {
                    $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_committee_assigned_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_committee_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //notify manager                
                $data = [
                    'user_id' => $this->Auth->user('id'), 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if (!empty($aefi->committees[0]->literature_review) && $aefi->status == 'Approved') {
                    $reporter = $this->Aefis->Users->get($aefi->user_id);
                    $data = [
                        'email_address' => $aefi->reporter_email, 'user_id' => $aefi->user_id,
                        'type' => 'reporter_committee_comments_email', 'model' => 'Aefis', 'foreign_key' => $aefi->id,
                        'vars' =>  $aefi->toArray()
                    ];
                    $data['vars']['literature_review'] = $aefi->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //end 

                $this->Flash->success('Committee Review successfully done for Aefi ' . $aefi->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown Aefi Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }


    /**
     * Edit method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function clean($id = null)
    {
        //ensure only one 
        $this->loadModel('OriginalAefis');
        $orig_aefi = $this->OriginalAefis->get($id, ['contain' => ['Aefis']]);
        if ($orig_aefi->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_aefi['aefi']['id']]);
        }
        $aefi = $this->Aefis->duplicateEntity($id);
        $aefi->aefi_id = $id;
        $aefi->user_id = $this->Auth->user('id'); //the report is reassigned to the evaluator... the reporter should only have original report

        // Create a copy if only Allowed
        if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $aefi->assigned_to)) {
            $this->Flash->error('You have not been assigned the report, you can only create a copy of assigned reports!');
            return $this->redirect($this->referer());
        }

        if ($this->Aefis->save($aefi, ['validate' => false])) {
            $query = $this->Aefis->query();
            $query->update()
                ->set(['copied' => 'old copy'])
                ->where(['id' => $orig_aefi->id])
                ->execute();
            $this->Flash->success(__('The AEFI has been successfully copied. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $aefi->id]);
        }
        $this->Flash->error(__('The AEFI Investigation Report could not be copied. Please, try again.'));
        return $this->redirect($this->referer());
    }

    public function edit($id = null)
    {
        //ensure only one 
        $this->loadModel('OriginalAefis');
        $orig_aefi = $this->OriginalAefis->get($id, ['contain' => ['Aefis']]);
        if ($orig_aefi->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_aefi['aefi']['id']]);
        }

        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments']
        ]);

        // Option only available to assigned
        if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $aefi->assigned_to)) {
            $this->Flash->error('You have not been assigned the report, you can only create a copy of assigned reports!');
            return $this->redirect($this->referer());
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            if (!empty($aefi->attachments)) {
                for ($i = 0; $i <= count($aefi->attachments) - 1; $i++) {
                    $aefi->attachments[$i]->model = 'Aefis';
                    $aefi->attachments[$i]->category = 'attachments';
                }
            }

            if ($aefi->submitted == 1) {
                //save changes button
                $aefi->submitted = 2;
                if ($this->Aefis->save($aefi, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report have been saved.'));
                    return $this->redirect(['action' => 'edit', $aefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($aefi->submitted == 2) {
                //submit to mcaz button
                if ($this->Aefis->save($aefi, ['validate' => false])) {
                    $this->Flash->success(__('Report ' . $aefi->reference_number . ' has been successfully submitted to MCAZ for review.'));
                    return $this->redirect(['action' => 'view', $aefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($aefi->submitted == -1) {
                //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report later'));
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
            } else {
                if ($this->Aefis->save($aefi, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report have been saved.'));
                    return $this->redirect(['action' => 'edit', $aefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            }
        }

        //format dates
        if (!empty($aefi->date_of_birth)) {
            if (empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day' => $a[0], 'month' => $a[1], 'year' => $a[2]);
        }

        $designations = $this->Aefis->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi']);
    }

    public function attachSignature($id = null)
    {
        $aefi_causality = $this->Aefis->AefiCausalities->get($id, ['contain' => ['Aefis']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi_causality = $this->Aefis->AefiCausalities->patchEntity($aefi_causality, [
                'chosen' => 1,
                'reviewed_by' => $this->Auth->user('id'),
                'aefi' => ['signature' => 1]
            ], ['associated' => ['Aefis']]);
            if ($this->Aefis->AefiCausalities->save($aefi_causality)) {
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
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function archive($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        //update field
        $query = $this->Aefis->query();
        $query->update()
            ->set(['status' => 'Archived'])
            ->where(['id' => $aefi->id])
            ->execute();
        $this->Flash->success(__('The AEFI has been archived.'));
        //

        return $this->redirect(['action' => 'index']);
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        if ($this->Aefis->delete($aefi)) {
            $this->Flash->success(__('The aefi has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
