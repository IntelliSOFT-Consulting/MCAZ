<?php

namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;
use DateTime;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsBaseController extends AppController
{

    public function initialize()
    {
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
            'contain' => ['Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews', 'Reviews.Users', 'ReportStages']
        ];
        $query = $this->Ce2bs
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['IFNULL(copied, "N") !=' => 'old copy']);

        if ($this->request->getQuery('minimal')) {
            if ($this->request->getQuery('minimal') == 'External') {
                $query = $query->where(['reporter_email !=' => 'dataentry@mcaz.co.zw']);
            } elseif ($this->request->getQuery('minimal') == 'Internal') {
                $query = $query->where(['reporter_email' => 'dataentry@mcaz.co.zw']);
            }
        }
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
                function ($row) {
                    return implode('|', Hash::extract($row['reviews'], '{n}.system_message'));
                }, //'reviews.system_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['reviews'], '{n}.user_message'));
                }, //'reviews.user_message', 
                function ($row) {
                    return implode('|', Hash::extract($row['attachments'], '{n}.file'));
                }, //'attachments.file'
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
            $query->where([['Ce2bs.active' => '1']]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'CE2BS_' . date('d-m-Y') . '.pdf'
                ]
            ]);
            $this->render('/Base/Ce2bs/pdf/index');
        } else {
            $this->render('/Base/Ce2bs/index');
        }
    }
    public function time()
    {
        $this->paginate = [
            'contain' => ['Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews', 'Reviews.Users', 'ReportStages']
        ];
        $query = $this->Ce2bs
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['IFNULL(copied, "N") !=' => 'old copy']);
        $query->where([['Ce2bs.active' => '1']]);
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
                'filename' => 'CE2BS_' . date('d-m-Y') . '_Timeline.pdf'
            ]
        ]);
        $this->render('/Base/Ce2bs/pdf/timeline');
    }

    public function restore()
    {
        $this->paginate = [
            'contain' => []
        ];

        $query = $this->Ce2bs
            ->find('search', ['search' => $this->request->query, 'withDeleted'])
            ->where(['deleted IS NOT' =>  null]);

        $this->set('ce2bs', $this->paginate($query));
    }
    public function restoreDeleted($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $ce2b = $this->Ce2bs->get($id, ['withDeleted']);
        if ($this->request->getData('purpose') == 'active') {
            $ce2b->active = $this->request->getData('value');
            $this->Ce2bs->save($ce2b);
        } else {
            if ($this->Ce2bs->restore($ce2b)) {
                $this->Flash->success(__('The CE2B report has been restored.'));
            } else {
                $this->Flash->error(__('The CE2B report could not be restored. Please, try again.'));
            }
            return $this->redirect(['action' => 'restore']);
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
                if ($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            }
        }

        if (strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $ce2b->reference_number . '.pdf'
                ]
            ]);
        }

        $current_id = $this->Auth->user('id');
        $assignees = $this->Ce2bs->Users
            ->find('list', ['limit' => 200])
            ->where(['group_id' => 4])
            ->orWhere(['id' => $ce2b->assigned_to ? $ce2b->assigned_to : $current_id]); //use current id if unassigned else assigned user


        $evaluators = $this->Ce2bs->Users->find('list', ['limit' => 200])->where(['group_id' => 4, 'deactivated' => 0]);
        $users = $this->Ce2bs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4], 'deactivated' => 0]);

        $ce2b_content = $ce2b->e2b_content;
        try {

            $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
            $arr = Hash::flatten($xml);
        } catch (\Exception $e) {
            $this->Flash->error('Not a valid E2B file. ' . $e->getMessage());
            return $this->redirect(['action' => 'index']);
        } catch (\Cake\Utility\Exception\XmlException $e) {
            $this->Flash->error('Not a valid E2B file. ' . $e->getMessage());
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('ce2b', 'assignees', 'evaluators', 'users', 'ekey', 'arr'));
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
                for ($i = 0; $i <= count($ce2b->attachments) - 1; $i++) {
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
                $this->Flash->warning('The file <b>' . $this->request->data['e2b_file']['name'] . '</b> has been imported before on ' . $import_dates . '. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
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
                    $this->Flash->error('Not a valid E2B file. ' . $e->getMessage());
                    return $this->redirect(['action' => 'add']);
                }
                $ce2b->e2b_content = iconv(
                    mb_detect_encoding($xmlString, mb_detect_order(), true),
                    'utf-8//IGNORE',
                    $xmlString
                ); //iconv(mb_detect_encoding($xmlString), "UTF-8", $xmlString);
                $var = (date("Y") == 2019) ? 28 : 1;
                // $ref = $this->Ce2bs->find()->count() + 1;
                //$ref = $this->Ce2bs->find('all', ['conditions' => ['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null]])->count() + $var;
                $ref = $this->Ce2bs->find()->select(['Ce2bs.reference_number'])->distinct(['Ce2bs.reference_number'])->where(['date_format(Ce2bs.created,"%Y")' => date("Y"), 'Ce2bs.reference_number IS NOT' => null])->count() + $var;
                $ce2b->reference_number = (!empty($ce2b->reference_number)) ? $ce2b->reference_number : 'CE2B' . $ref . '/' . date('Y');
                try {
                    if ($this->Ce2bs->save($ce2b)) {
                        $datum = $this->Imports->newEntity(['filename' => $this->request->data['e2b_file']['name']]);
                        $this->Imports->save($datum);

                        $this->Flash->success(__('The E2B File has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                } catch (\PDOException $e) {
                    $this->Flash->error('The E2B File was not saved. ' . $e->getMessage());
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


    public function requestEvaluator()
    {
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
                if (!empty($ce2b->assigned_to)) {
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

                $this->Flash->success('Request successfully sent to evaluator for Adr ' . $ce2b->reference_number);

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

    public function causality()
    {
        $ce2b = $this->Ce2bs->get($this->request->getData('ce2b_pr_id'), ['contain' => ['ReportStages']]);
        if (isset($ce2b->id) && $this->request->is('post')) {

            // Only Allowed Evaluators
            if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $ce2b->assigned_to)) {
                $this->Flash->error('You have not been assigned the report for review!');
                return $this->redirect($this->referer());
            }
            $ce2b = $this->Ce2bs->patchEntity($ce2b, $this->request->getData());
            $ce2b->reviews[0]->user_id = $this->Auth->user('id');
            $ce2b->reviews[0]->model = 'Ce2bs';
            $ce2b->reviews[0]->category = 'causality';

            // update action date  
            $ce2b->action_date = date("Y-m-d H:i:s");
            //new stage only once
            if (!in_array("Evaluated", Hash::extract($ce2b->report_stages, '{n}.stage'))) {
                $stage1  = $this->Ce2bs->ReportStages->newEntity();
                $stage1->model = 'Ce2bs';
                $stage1->stage = 'Evaluated';
                $stage1->description = 'Stage 3';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $ce2b->report_stages = [$stage1];
                $ce2b->status = 'Evaluated';
                $ce2b->signature = '0';
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Ce2bs->save($ce2b)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($ce2b->assigned_to)) {
                    $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                    $assigner = $this->Ce2bs->Users->get($ce2b->assigned_by);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_review_assigned_email', 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $assigner->name;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                $managers = $this->Ce2bs->Users->find('all')->where(['Users.group_id IN' => [2], 'deactivated' => 0]);
                foreach ($managers as $manager) {
                    //notify manager                
                    $data = [
                        'email_address' => $manager->email,
                        'user_id' => $manager->id,
                        'model' => 'Ce2bs',
                        'foreign_key' => $ce2b->id,
                        'vars' =>  $ce2b->toArray()
                    ];
                    $data['type'] = 'manager_review_notification';
                    $data['vars']['name'] = $manager->name; 
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                    //end 
                }

                $this->Flash->success('Review successfully done for SAE ' . $ce2b->reference_number);

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


    public function requestReporter()
    {
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
                if (!empty($ce2b->user_id)) {
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
                if (!empty($ce2b->assigned_to)) {
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

                $this->Flash->success('Request successfully sent to reporter for Adr ' . $ce2b->reference_number);

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

    public function committeeReview()
    {
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

            // update action date  
            $ce2b->action_date = date("Y-m-d H:i:s");
            if (!empty($this->request->getData('committees.100.status'))) {
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
                if (in_array("Correspondence", Hash::extract($ce2b->report_stages, '{n}.stage'))) {
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
                if (!empty($ce2b->assigned_to)) {
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
                $data = [
                    'user_id' => $this->Auth->user('id'), 'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()
                ];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if (!empty($ce2b->committees[0]->literature_review) && !empty($ce2b->status)) {
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

                $this->Flash->success('Committee Review successfully done for Adr ' . $ce2b->reference_number);

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

    public function attachSignature($id = null)
    {
        $this->loadModel('Ce2bs');
        $review = $this->Ce2bs->Reviews->get($id, ['contain' => ['Ce2bs']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Ce2bs->Reviews->patchEntity($review, [
                'chosen' => 1,
                'reviewed_by' => $this->Auth->user('id'),
                'ce2b' => ['signature' => 1]
            ], ['associated' => ['Ce2bs']]);
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
        $this->Flash->success(__('The CE2B has been archived.'));
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
    public function restoreArchived($id = null)
    {
        # code...
        // $this->request->allowMethod(['post', 'delete']);
        $ce2b = $this->Ce2bs->get($id, ['contain' => ['ReportStages']]);

        $latestReportStage = null;
        foreach ($ce2b->report_stages as $reportStage) {
            if (!$latestReportStage || strtotime($latestReportStage->created) < strtotime($reportStage->created)) {
                $latestReportStage = $reportStage;
            }
        }
        $stage = $latestReportStage->stage;

        //get the last stage 
        $query = $this->Ce2bs->query();
        $query->update()
            ->set(['status' => $stage])
            ->where(['id' => $ce2b->id])
            ->execute();

        return $this->redirect($this->referer());
    }
}
