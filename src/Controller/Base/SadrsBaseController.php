<?php

namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Entity;
use Cake\Utility\Hash;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class SadrsBaseController extends AppController
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
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->data);
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
        /*// $sadrs = $this->paginate($this->Sadrs,['finder' => ['status' => $id]]);
        if($this->request->getQuery('status')) {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['status' => $this->request->getQuery('status'), 'ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]); }
        else {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]);}*/

        $query = $this->Sadrs
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['Sadrs.status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy']);
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
            $_header = [
                'id', 'user_id', 'sadr_id', 'messageid', 'assigned_to', 'assigned_by', 'assigned_date', 'Province', 'reference_number', 'Designation', 'report_type', 'name_of_institution', 'institution_code', 'institution_name', 'institution_address', 'patient_name', 'ip_no', 'date_of_birth', 'age_group', 'gender', 'weight', 'height', 'date_of_onset_of_reaction', 'date_of_end_of_reaction', 'duration_type', 'duration', 'description_of_reaction', 'severity', 'severity_reason', 'medical_history', 'past_drug_therapy', 'outcome', 'lab_test_results', 'reporter_name', 'reporter_email', 'reporter_phone', 'submitted', 'submitted_date', 'action_taken', 'relatedness', 'status', 'emails', 'active', 'device', 'notified', 'created', 'modified',
                'sadr_list_of_drugs.drug_name', 'sadr_list_of_drugs.brand_name', 'sadr_list_of_drugs.dose',  'sadr_list_of_drugs.dose_id', 'sadr_list_of_drugs.route_id', 'sadr_list_of_drugs.frequency_id',
                'sadr_followups',
                'committees.comments', 'committees.literature_review', 'committees.references_text',
                'request_evaluators.system_message', 'request_evaluators.user_message',
                'request_reporters.system_message', 'request_reporters.user_message',
                'reviews.system_message', 'reviews.user_message',
                'attachments.file'
            ];
            $_extract = [
                'id', 'user_id', 'sadr_id', 'messageid', 'assigned_to', 'assigned_by', 'assigned_date',
                function ($row) use ($_provinces) {
                    return (!empty($_provinces[$row['province_id']])) ? $_provinces[$row['province_id']] : '';
                }, //provinces
                'reference_number',
                function ($row) use ($_designations) {
                    return (!empty($_designations[$row['designation_id']])) ? $_designations[$row['designation_id']] : '';
                }, //designation_id 
                'report_type', 'name_of_institution', 'institution_code', 'institution_name', 'institution_address', 'patient_name', 'ip_no', 'date_of_birth', 'age_group', 'gender', 'weight', 'height', 'date_of_onset_of_reaction', 'date_of_end_of_reaction', 'duration_type', 'duration', 'description_of_reaction', 'severity', 'severity_reason', 'medical_history', 'past_drug_therapy', 'outcome', 'lab_test_results', 'reporter_name', 'reporter_email', 'reporter_phone', 'submitted', 'submitted_date', 'action_taken', 'relatedness', 'status', 'emails', 'active', 'device', 'notified', 'created', 'modified',
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.drug_name'));
                }, // 'drug_name', 
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.brand_name'));
                }, //'.brand_name', 
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.dose'));
                }, //'.dose',  
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.dose_id'));
                }, //'sadr_list_of_drugs.dose_id', 
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.route_id'));
                }, //'.route_id', 
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_list_of_drugs'], '{n}.frequency_id'));
                }, //'.frequency_id', 
                function ($row) {
                    return implode('|', Hash::extract($row['sadr_followups'], '{n}.id'));
                }, //'sadr_followups', 
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

        if ($this->request->params['_ext'] === 'pdf') {
            $query->where([['Sadrs.active' => '1']]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'ADRS_' . date('d-m-Y') . '.pdf'
                ]
            ]);
            $this->render('/Base/Sadrs/pdf/index');
        } else {
            $this->render('/Base/Sadrs/index');
        }
    }
    public function time()
    {
        $this->paginate = [
            'contain' => ['SadrListOfDrugs', 'SadrListOfDrugs.Doses', 'SadrOtherDrugs', 'Attachments',  'Reviews', 'Reviews.Users', 'RequestReporters', 'RequestEvaluators', 'Committees', 'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments', 'ReportStages', 'Reactions']
        ];
        /*// $sadrs = $this->paginate($this->Sadrs,['finder' => ['status' => $id]]);
        if($this->request->getQuery('status')) {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['status' => $this->request->getQuery('status'), 'ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]); }
        else {$sadrs = $this->paginate($this->Sadrs->find('all')->where(['ifnull(report_type,-1) !=' => 'FollowUp']), ['order' => ['Sadrs.id' => 'desc']]);}*/

        $query = $this->Sadrs
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['Sadrs.status !=' => (!$this->request->getQuery('status')) ? 'UnSubmitted' : 'something_not', 'IFNULL(copied, "N") !=' => 'old copy']);
        // You can add extra things to the query if you need to
        //->where([['ifnull(report_type,-1) !=' => 'FollowUp']]);
        // if($this->Auth->user('group_id') == 5) $query->where(['Sadrs.name_of_institution' => $this->Auth->user('name_of_institution')]);
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $users = $this->Sadrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations', 'query', 'users'));
        $this->set('sadrs', $query->contain($this->paginate['contain']));

        // $this->set(compact('sadrs'));
        // $this->set('_serialize', ['sadrs']);
        $_provinces = $provinces->toArray();
        $_designations = $designations->toArray();


        $query->where([['Sadrs.active' => '1']]);
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'landscape',
                'filename' => 'ADRS_' . date('d-m-Y') . '_Timeline.pdf'
            ]
        ]);
        $this->render('/Base/Sadrs/pdf/timeline');
    }
    public function restore()
    {
        $this->paginate = [
            'contain' => []
        ];

        $query = $this->Sadrs
            ->find('search', ['search' => $this->request->query, 'withDeleted'])
            ->where(['deleted IS NOT' =>  null]);

        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $this->set(compact('provinces', 'designations'));
        $this->set('sadrs', $this->paginate($query));
    }
    public function restoreDeleted($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $sadr = $this->Sadrs->get($id, ['withDeleted']);
        if ($this->request->getData('purpose') == 'active') {
            $sadr->active = $this->request->getData('value');
            $this->Sadrs->save($sadr);
        } else {
            if ($this->Sadrs->restore($sadr)) {
                $this->Flash->success(__('The ADR has been restored.'));
            } else {
                $this->Flash->error(__('The ADR could not be restored. Please, try again.'));
            }
            return $this->redirect(['action' => 'restore']);
        }
    }
    /**
     * View method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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

        // debug($sadr);
        // exit;

        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($sadr->reviews as $key => $value) {
                if ($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            }
        }

        if (strpos($this->request->url, 'pdf')) {
            // $this->viewBuilder()->setLayout('pdf/default');
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $sadr->reference_number . '.pdf'
                ]
            ]);
        }

        $current_id = $this->Auth->user('id');
        $assignees = $this->Sadrs->Users
            ->find('list', ['limit' => 200])
            ->where(['group_id' => 4])
            ->orWhere(['id' => $sadr->assigned_to ? $sadr->assigned_to : $current_id]); //use current id if unassigned else assigned user

        $evaluators = $this->Sadrs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);


        $users = $this->Sadrs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $designations = $this->Sadrs->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'assignees', 'evaluators', 'users', 'designations', 'provinces', 'doses', 'routes', 'frequencies', 'ekey'));
        $this->set('_serialize', ['sadr']);


        if ($this->request->params['_ext'] === 'pdf') {
            $this->render('/Base/Sadrs/pdf/view');
        } else {
            $this->render('/Base/Sadrs/view');
        }
    }

    public function causality()
    {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($sadr->id) && $this->request->is('post')) {
            // Only Allowed Evaluators
            if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $sadr->assigned_to)) {
                $this->Flash->error('You have not been assigned the report for review!');
                return $this->redirect($this->referer());
            }
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->reviews[0]->user_id = $this->Auth->user('id');
            $sadr->reviews[0]->model = 'Sadrs';
            $sadr->reviews[0]->category = 'causality';

            //new stage only once
            if (!in_array("Evaluated", Hash::extract($sadr->report_stages, '{n}.stage'))) {
                $stage1  = $this->Sadrs->ReportStages->newEntity();
                $stage1->model = 'Sadrs';
                $stage1->stage = 'Evaluated';
                $stage1->description = 'Stage 3';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $sadr->report_stages = [$stage1];
                $sadr->status = 'Evaluated';
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_review_assigned_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_review_assigned_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }

                //notify manager                
                $data = [
                    'user_id' => $this->Auth->user('id'), 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                $data['type'] = 'manager_review_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //end 

                $this->Flash->success('Review successfully done for SADR ' . $sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown SADR Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    /*public function requestReporter() {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_id'), []);
        debug((string)$sadr);
        debug($this->request->data);
    }*/

    public function requestReporter()
    {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pk_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->request_reporters[0]->user_id = $sadr->user_id;
            $sadr->request_reporters[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $sadr->request_reporters[0]->type = 'request_reporter_info';
            $sadr->request_reporters[0]->model = 'Sadrs';
            $sadr->request_reporters[0]->foreign_key = $sadr->id;
            //Notification should be sent to reporter and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to reporter
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($sadr->user_id)) {
                    $reporter = $this->Sadrs->Users->get($sadr->user_id);
                    $data = [
                        'email_address' => $reporter->email, 'user_id' => $reporter->id,
                        'type' => 'manager_request_reporter_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['user_message'] = $sadr->request_reporters[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_reporter_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                } else {
                    $this->Flash->error(__('Unable to locate reporter.'));
                    return $this->redirect($this->referer());
                }

                //notify assigned evaluator      
                if (!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_request_reporter_evaluator_notification', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['assigned_by_name'] = $this->Auth->user('name');
                    $data['vars']['user_message'] = $sadr->request_reporters[0]->user_message;
                    //notify evaluator
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //manager does not get a notificatoin
                //end 

                $this->Flash->success('Request successfully sent to reporter for SADR ' . $sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to reporter. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown ADR Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    // public function requestEvaluator() {
    //     $sadr = $this->Sadrs->get($this->request->getData('sadr_id'), []);
    //     debug((string)$sadr);
    //     debug($this->request->data);
    // }

    public function requestEvaluator()
    {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), []);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->request_evaluators[0]->user_id = $sadr->assigned_to;
            $sadr->request_evaluators[0]->sender_id = $this->Auth->user('id');  //TODO: Can have view to see all messages where I requested for info
            $sadr->request_evaluators[0]->type = 'request_evaluator_info';
            $sadr->request_evaluators[0]->model = 'Sadrs';
            $sadr->request_evaluators[0]->foreign_key = $sadr->id;

            //Notification should be sent to assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_request_evaluator_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['name'] = $evaluator->name;
                    $data['vars']['user_message'] = $sadr->request_evaluators[0]->user_message;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'manager_request_evaluator_message';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                } else {
                    $this->Flash->error(__('Unable to locate evaluator.'));
                    return $this->redirect($this->referer());
                }

                //end 

                $this->Flash->success('Request successfully sent to evaluator for ADR ' . $sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to send request to evaluator. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown ADR Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }


    public function committeeReview()
    {
        $sadr = $this->Sadrs->get($this->request->getData('sadr_pr_id'), ['contain' => 'ReportStages']);
        if (isset($sadr->id) && $this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->committees[0]->user_id = $this->Auth->user('id');
            $sadr->committees[0]->model = 'Sadrs';
            $sadr->committees[0]->category = 'committee';

            /**
             * Committee decision 
             * If decision is Approved, the status is set to Committee or Stage 9
             * Else Application status is set to Committee. Committee process always visible to PI (except internal comments)
             * 
             */
            if (!empty($this->request->getData('committees.100.status'))) {
                $stage1  = $this->Sadrs->ReportStages->newEntity();
                $stage1->model = 'Sadrs';
                $stage1->stage = 'FinalFeedback';
                $stage1->description = 'Stage 8';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $sadr->committees[0]->outcome_date;
                $sadr->report_stages = [$stage1];
                $sadr->status = 'FinalFeedback';
            } else {
                //If Coming from Stage 6 then stage 4
                $stage1  = $this->Sadrs->ReportStages->newEntity();
                $stage1->model = 'Sadrs';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $stage1->alt_date = $sadr->committees[0]->outcome_date;
                if (in_array("Correspondence", Hash::extract($sadr->report_stages, '{n}.stage'))) {
                    $stage1->stage = 'Presented';
                    $stage1->description = 'Stage 7: PVCT';
                    $sadr->status = 'Presented';
                    $sadr->report_stages = [$stage1];
                } else {
                    $stage1->stage = 'Committee';
                    $stage1->description = 'Stage 4: PVCT';
                    $sadr->status = 'Committee';
                    $sadr->report_stages = [$stage1];
                }
            }

            //Notification should be sent to manager and assigned_to evaluator if exists
            if ($this->Sadrs->save($sadr)) {
                //Send email and message (if present!!!) to evaluator
                $this->loadModel('Queue.QueuedJobs');
                if (!empty($sadr->assigned_to)) {
                    $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                    $data = [
                        'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                        'type' => 'manager_committee_assigned_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
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
                    'user_id' => $this->Auth->user('id'), 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                $data['type'] = 'manager_committee_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);

                //reporter visible notification and email sent when approved
                if (!empty($sadr->committees[0]->literature_review) && !empty($sadr->status)) {
                    $reporter = $this->Sadrs->Users->get($sadr->user_id);
                    $data = [
                        'email_address' => $sadr->reporter_email, 'user_id' => $sadr->user_id,
                        'type' => 'reporter_committee_comments_email', 'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                        'vars' =>  $sadr->toArray()
                    ];
                    $data['vars']['literature_review'] = $sadr->committees[0]->literature_review;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = 'reporter_committee_comments_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                }
                //end 

                $this->Flash->success('Committee Review successfully done for ADR ' . $sadr->reference_number);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Unable to review report. Please, try again.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Unknown ADR Report. Please correct.'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadr = $this->Sadrs->newEntity();
        if ($this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->user_id = $this->Auth->user('id');
            if ($this->Sadrs->save($sadr, ['validate' => false])) {
                //update field
                $query = $this->Sadrs->query();
                $query->update()
                    ->set(['reference_number' => 'ADR' . $sadr->id . '/' . $sadr->created->i18nFormat('yyyy')])
                    ->where(['id' => $sadr->id])
                    ->execute();
                //

                $this->Flash->success(__('The changes to the ADR have been saved.'));

                return $this->redirect(['action' => 'edit', $sadr->id]);
            }
            $this->Flash->error(__('The ADR could not be saved. Kindly correct the errors below and retry.'));
        }
        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', array('order' => 'Designations.name ASC'));
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    private function format_dates($sadr)
    {
        //format dates
        if (!empty($sadr->date_of_birth)) {
            if (empty($sadr->date_of_birth)) $sadr->date_of_birth = '--';
            $a = explode('-', $sadr->date_of_birth);
            $sadr->date_of_birth = array('day' => $a[0], 'month' => $a[1], 'year' => $a[2]);
        }
        if (!empty($sadr->date_of_onset_of_reaction)) {
            if (empty($sadr->date_of_onset_of_reaction)) $sadr->date_of_onset_of_reaction = '--';
            $a = explode('-', $sadr->date_of_onset_of_reaction);
            $sadr->date_of_onset_of_reaction = array('day' => $a[0], 'month' => $a[1], 'year' => $a[2]);
        }
        if (!empty($sadr->date_of_end_of_reaction)) {
            if (empty($sadr->date_of_end_of_reaction)) $sadr->date_of_end_of_reaction = '--';
            $a = explode('-', $sadr->date_of_end_of_reaction);
            $sadr->date_of_end_of_reaction = array('day' => $a[0], 'month' => $a[1], 'year' => $a[2]);
        }
        return $sadr;
    }

    public function clean($id = null)
    {
        //ensure only one 
        $this->loadModel('OriginalSadrs');
        $orig_sadr = $this->OriginalSadrs->get($id, ['contain' => ['Sadrs']]);
        if ($orig_sadr->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_sadr['sadr']['id']]);
        }
        $sadr = $this->Sadrs->duplicateEntity($id);
        $sadr->sadr_id = $id;
        $sadr->user_id = $this->Auth->user('id'); //the report is reassigned to the evaluator... the reporter should only have original report

        // Create a copy if only Allowed
        if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $sadr->assigned_to)) {
            $this->Flash->error('You have not been assigned the report, you can only create a copy of assigned reports!');
            return $this->redirect($this->referer());
        }
        if ($this->Sadrs->save($sadr, ['validate' => false])) {
            $query = $this->Sadrs->query();
            $query->update()
                ->set(['copied' => 'old copy'])
                ->where(['id' => $orig_sadr->id])
                ->execute();
            $this->Flash->success(__('The SADR has been successfully copied. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $sadr->id]);
        }
        $this->Flash->error(__('The SADR Report could not be copied. Please, try again.'));
        return $this->redirect($this->referer());
    }

    public function edit($id = null)
    {

        //ensure only one 
        $this->loadModel('OriginalSadrs');
        $orig_sadr = $this->OriginalSadrs->get($id, ['contain' => ['Sadrs']]);
        if ($orig_sadr->copied === 'old copy') {
            $this->Flash->success(__('An editable copy of the report is already available.'));
            return $this->redirect(['action' => 'edit', $orig_sadr['sadr']['id']]);
        }
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'Reactions', 'OriginalSadrs']
        ]);

       
        // Option only available to assigned
        if (($this->Auth->user('group_id') == 4) && ($this->Auth->user('id') != $sadr->assigned_to)) {
            $this->Flash->error('You have not been assigned the report, you can only create a copy of assigned reports!');
            return $this->redirect($this->referer());
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData(), [
                'validate' => ($this->request->getData('submitted') == 2) ? true : false,
                'associated' => [
                    'Reactions' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'SadrListOfDrugs' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'Attachments' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false]
                ]
            ]);
            //Attachments
            if (!empty($sadr->attachments)) {
                for ($i = 0; $i <= count($sadr->attachments) - 1; $i++) {
                    $sadr->attachments[$i]->model = 'Sadrs';
                    $sadr->attachments[$i]->category = 'attachments';
                }
            }
            if ($sadr->submitted == 1) {
                //save changes button
                $sadr->submitted = 2;
                if ($this->Sadrs->save($sadr, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report  have been saved.'));
                    return $this->redirect(['action' => 'edit', $sadr->id]);
                } else {
                    $this->Flash->error(__('Report  could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($sadr->submitted == 2) {
                //submit to mcaz button
                if ($this->Sadrs->save($sadr)) {

                    // Update the Original Report
                    $old_copy = $this->Sadrs->get($sadr->original_sadr->id, [
                        'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'Reactions', 'OriginalSadrs']
                    ]);

                    // debug($old_copy);
                    // exit;

                    $update = $this->Sadrs->patchEntity($old_copy, $this->request->getData(), [
                        'validate' => ($this->request->getData('submitted') == 2) ? true : false,
                        'associated' => [
                            'Reactions' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                            'Attachments' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false]
                        ]
                    ]);
                    $this->Sadrs->save($update);


                    $this->Flash->success(__('Report ' . $sadr->reference_number . ' has been successfully submitted to MCAZ for review.'));
                    return $this->redirect(['action' => 'view', $sadr->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($sadr->submitted == -1) {
                //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing the report later'));
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
            } else {
                if ($this->Sadrs->save($sadr, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report have been saved.'));
                    return $this->redirect(['action' => 'edit', $sadr->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            }
        }

        $sadr = $this->format_dates($sadr);

        $designations = $this->Sadrs->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Sadrs->Provinces->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'designations', 'provinces', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr', 'provinces']);
    }


    public function attachSignature($id = null)
    {
        $review = $this->Sadrs->Reviews->get($id, ['contain' => ['Sadrs']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Sadrs->Reviews->patchEntity($review, ['chosen' => 1, 'reviewed_by' => $this->Auth->user('id'), 'sadr' => ['signature' => 1]], ['associated' => ['Sadrs']]);
            if ($this->Sadrs->Reviews->save($review)) {
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
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function archive($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $sadr = $this->Sadrs->get($id);
        //update field
        $query = $this->Sadrs->query();
        $query->update()
            ->set(['status' => 'Archived'])
            ->where(['id' => $sadr->id])
            ->execute();
        $this->Flash->success(__('The ADR has been archived.'));
        //

        return $this->redirect(['action' => 'index']);
    }
}
