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
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow(['add', 'edit']);       
        $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    public function generate_audit_trail($id, $message)

    {
        $logsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('AuditTrails');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $name = $this->Auth->user('email');
        $time = date('Y-m-d H:i:s');
        $message = $message . " at {$time} by {$name}";
        $logsTable->createLogEntry($id, 'Saefi', $message, $ipAddress);
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
            ->where([['user_id' => $this->Auth->user('id')]]);
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('designations'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('saefis', $query->contain($this->paginate['contain']));
        } else {
            $this->set('saefis', $this->paginate($query));
        }

        $_designations = $designations->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [
                'id', 'user_id', 'saefi_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'place_vaccination', 'place_vaccination_other', 'site_type', 'site_type_other', 'vaccination_in', 'vaccination_in_other', 'reporter_name', 'report_date', 'start_date', 'complete_date',
                'designation_id',
                'telephone', 'mobile', 'reporter_email', 'patient_name', 'gender', 'hospitalization_date', 'status_on_date', 'died_date', 'autopsy_done', 'autopsy_done_date', 'autopsy_planned', 'autopsy_planned_date', 'past_history', 'past_history_remarks', 'adverse_event', 'adverse_event_remarks', 'allergy_history', 'allergy_history_remarks', 'existing_illness', 'existing_illness_remarks', 'hospitalization_history', 'hospitalization_history_remarks', 'medication_vaccination', 'medication_vaccination_remarks', 'faith_healers', 'faith_healers_remarks', 'family_history', 'family_history_remarks', 'pregnant', 'pregnant_weeks', 'breastfeeding', 'infant', 'birth_weight', 'delivery_procedure', 'delivery_procedure_specify', 'source_examination', 'source_documents', 'source_verbal', 'verbal_source', 'source_other', 'source_other_specify', 'examiner_name', 'other_sources', 'signs_symptoms', 'person_details', 'person_designation', 'person_date', 'medical_care', 'not_medical_care', 'final_diagnosis', 'when_vaccinated', 'when_vaccinated_specify', 'prescribing_error', 'prescribing_error_specify', 'vaccine_unsterile', 'vaccine_unsterile_specify', 'vaccine_condition', 'vaccine_condition_specify', 'vaccine_reconstitution', 'vaccine_reconstitution_specify', 'vaccine_handling', 'vaccine_handling_specify', 'vaccine_administered', 'vaccine_administered_specify', 'vaccinated_vial', 'vaccinated_session', 'vaccinated_locations', 'vaccinated_locations_specify', 'vaccinated_cluster', 'vaccinated_cluster_number', 'vaccinated_cluster_vial', 'vaccinated_cluster_vial_number', 'syringes_used', 'syringes_used_specify', 'syringes_used_other', 'syringes_used_findings', 'reconstitution_multiple', 'reconstitution_different', 'reconstitution_vial', 'reconstitution_syringe', 'reconstitution_vaccines', 'reconstitution_observations', 'cold_temperature', 'cold_temperature_deviation', 'cold_temperature_specify', 'procedure_followed', 'other_items', 'partial_vaccines', 'unusable_vaccines', 'unusable_diluents', 'additional_observations', 'cold_transportation', 'vaccine_carrier', 'coolant_packs', 'transport_findings', 'similar_events', 'similar_events_describe', 'similar_events_episodes', 'affected_vaccinated', 'affected_not_vaccinated', 'affected_unknown', 'community_comments', 'relevant_findings', 'created', 'modified', 'submitted', 'submitted_date', 'status', 'reports file',
                'saefi_list_of_vaccines.vaccine_name', 'saefi_list_of_vaccines.vaccination_doses',
                'committees.comments', 'committees.literature_review', 'committees.references_text',
                'request_evaluators.system_message', 'request_evaluators.user_message',
                'request_reporters.system_message', 'request_reporters.user_message',
                'reviews.system_message', 'reviews.user_message',
                'attachments.file'
            ];
            $_extract = [
                'id', 'user_id', 'saefi_id', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'place_vaccination', 'place_vaccination_other', 'site_type', 'site_type_other', 'vaccination_in', 'vaccination_in_other', 'reporter_name', 'report_date', 'start_date', 'complete_date',
                function ($row) use ($_designations) {
                    return (!empty($_designations[$row['designation_id']])) ? $_designations[$row['designation_id']] : '';
                }, //'designation_id', 
                'telephone', 'mobile', 'reporter_email', 'patient_name', 'gender', 'hospitalization_date', 'status_on_date', 'died_date', 'autopsy_done', 'autopsy_done_date', 'autopsy_planned', 'autopsy_planned_date', 'past_history', 'past_history_remarks', 'adverse_event', 'adverse_event_remarks', 'allergy_history', 'allergy_history_remarks', 'existing_illness', 'existing_illness_remarks', 'hospitalization_history', 'hospitalization_history_remarks', 'medication_vaccination', 'medication_vaccination_remarks', 'faith_healers', 'faith_healers_remarks', 'family_history', 'family_history_remarks', 'pregnant', 'pregnant_weeks', 'breastfeeding', 'infant', 'birth_weight', 'delivery_procedure', 'delivery_procedure_specify', 'source_examination', 'source_documents', 'source_verbal', 'verbal_source', 'source_other', 'source_other_specify', 'examiner_name', 'other_sources', 'signs_symptoms', 'person_details', 'person_designation', 'person_date', 'medical_care', 'not_medical_care', 'final_diagnosis', 'when_vaccinated', 'when_vaccinated_specify', 'prescribing_error', 'prescribing_error_specify', 'vaccine_unsterile', 'vaccine_unsterile_specify', 'vaccine_condition', 'vaccine_condition_specify', 'vaccine_reconstitution', 'vaccine_reconstitution_specify', 'vaccine_handling', 'vaccine_handling_specify', 'vaccine_administered', 'vaccine_administered_specify', 'vaccinated_vial', 'vaccinated_session', 'vaccinated_locations', 'vaccinated_locations_specify', 'vaccinated_cluster', 'vaccinated_cluster_number', 'vaccinated_cluster_vial', 'vaccinated_cluster_vial_number', 'syringes_used', 'syringes_used_specify', 'syringes_used_other', 'syringes_used_findings', 'reconstitution_multiple', 'reconstitution_different', 'reconstitution_vial', 'reconstitution_syringe', 'reconstitution_vaccines', 'reconstitution_observations', 'cold_temperature', 'cold_temperature_deviation', 'cold_temperature_specify', 'procedure_followed', 'other_items', 'partial_vaccines', 'unusable_vaccines', 'unusable_diluents', 'additional_observations', 'cold_transportation', 'vaccine_carrier', 'coolant_packs', 'transport_findings', 'similar_events', 'similar_events_describe', 'similar_events_episodes', 'affected_vaccinated', 'affected_not_vaccinated', 'affected_unknown', 'community_comments', 'relevant_findings', 'created', 'modified', 'submitted', 'submitted_date', 'status',
                'reports.0.file',
                function ($row) {
                    return implode('|', Hash::extract($row['saefi_list_of_vaccines'], '{n}.vaccine_name'));
                }, //'.vaccine_name', 
                function ($row) {
                    return implode('|', Hash::extract($row['saefi_list_of_vaccines'], '{n}.vaccination_doses'));
                }, //'.doses no.', 
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
    }

    /**
     * View method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function vigibase($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'Attachments']
        ]);

        // create a builder (hint: new ViewBuilder() constructor works too)
        $builder = $this->viewBuilder();

        // configure as needed
        $builder->setLayout(false);
        $builder->template('Saefis/xml/e2b');

        // create a view instance
        $designations = $this->Saefis->Designations->find('list', ['limit' => 200]);
        $view = $builder->build(compact('saefi', 'designations'));

        // render to a variable
        $payload = $view->render();

        $http = new Client();

        //$payload = $this->VigibaseApi->aefi_e2b($saefi, $doses, $routes);
        //Log::write('debug', 'Payload :: '.$payload);
        $umc = $http->post(
            Configure::read('vigi_post_url'),
            (string)$payload,
            ['headers' => Configure::read('vigi_headers')]
        );

        if ($umc->isOK()) {
            $messageid = $umc->json;

            $vaefi = $this->Saefis->get($id, [
                'contain' => ['AefiListOfVaccines', 'Attachments']
            ]);
            $stage1  = $this->Saefis->ReportStages->newEntity();
            $stage1->model = 'Saefis';
            $stage1->stage = 'VigiBase';
            $stage1->description = 'Stage 9';
            $stage1->stage_date = date("Y-m-d H:i:s");
            $vaefi->report_stages = [$stage1];
            $vaefi->messageid = $messageid['MessageId'];
            $vaefi->status = 'VigiBase';
            $this->Saefis->save($vaefi);

            $this->set([
                'umc' => $umc->json,
                'status' => 'Successfull integration with vigibase',
                '_serialize' => ['umc', 'status']
            ]);

            // return $this->redirect($this->referer());
        } else {
            $this->response->body('Failure');
            $this->response->statusCode($umc->getStatusCode());
            $this->set([
                'umc' => $umc->json,
                'status' => 'Failed',
                '_serialize' => ['umc', 'status']
            ]);

            return; //$this->redirect($this->referer());
        }
    }

    public function e2b($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['AefiListOfVaccines',  'Attachments', 'Reports']
        ]);

        $stage1  = $this->Saefis->ReportStages->newEntity();
        $stage1->model = 'Saefis';
        $stage1->stage = 'VigiBase';
        $stage1->description = 'Stage 9';
        $stage1->stage_date = date("Y-m-d H:i:s");
        $saefi->report_stages = [$stage1];
        $saefi->status = 'VigiBase';
        $this->Saefis->save($saefi);

        $designations = $this->Saefis->Designations->find('list', array('order' => 'Designations.name ASC'));
        $this->set(compact('saefi', 'designations'));
        $this->set('_serialize', false);
        $this->response->download(($saefi->submitted == 2) ? str_replace('/', '_', $saefi->reference_number) . '.xml' : 'SAEFI_' . $saefi->created->i18nFormat('dd-MM-yyyy_HHmmss') . '.xml');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saefi = $this->Saefis->newEntity();
        if ($this->request->is('post')) {
            if ($this->request->getData('aefis')) {
                $this->loadModel('Aefis');
                $aefi = $this->Aefis->get($this->request->getData('aefis'), ['contain' => ['AefiListOfVaccines']]);
                $saefi->aefi_report_ref = $aefi->reference_number;
                $saefi->name_of_vaccination_site = $aefi->name_of_vaccination_center;
                $data = Hash::remove($aefi->toArray(), 'id');
                $data = Hash::remove($data, 'aefi_list_of_vaccines.{n}.id');
                $data = Hash::remove($data, 'aefi_list_of_vaccines.{n}.aefi_id');
                $data = Hash::remove($data, 'aefi_list_of_vaccines.{n}.saefi_id');
                $data = Hash::remove($data, 'aefi_list_of_vaccines.{n}.created');
                $data = Hash::remove($data, 'aefi_list_of_vaccines.{n}.modified');

                // return;
                // if(!empty($data['aefi_list_of_vaccines'])) {
                //     $data['saefi_list_of_vaccines'] = $data['aefi_list_of_vaccines'];
                //     unset($data['aefi_list_of_vaccines']);
                // }

                $saefi = $this->Saefis->patchEntity($saefi, $data);
                // $saefi->id = null;
                $saefi->submitted = 0;
                $saefi->submitted_date = null;
                $saefi->status = 'UnSubmitted';
                $saefi->patient_name = $aefi->patient_name . ' ' . $aefi->patient_surname;
                $saefi->signs_symptoms = $aefi->description_of_reaction;
                $saefi->autopsy_done = $aefi->autopsy;
                $saefi->aefi_date = $aefi->symptom_date;
                $saefi->report_date = $aefi->notification_date;

                $query = $this->Aefis->query();
                $query->update()
                    ->set(['status' => 'Archived'])
                    ->where(['id' => $aefi->id])
                    ->execute();

                $message = "AEFI report ".$aefi->reference_number." has been archived";
                $this->generate_audit_trail($aefi->id, $message);
            } else {
                $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData());
            }
            $saefi->user_id = $this->Auth->user('id');
            $saefi->designation_id = $this->Auth->user('designation_id');
            $saefi->mobile = $this->Auth->user('phone_no');
            $saefi->reporter_name = $this->Auth->user('name');
            if ($this->Saefis->save($saefi, ['validate' => false])) {

                $message = "A new SAEFI report has been created";
                $this->generate_audit_trail($saefi->id, $message);

                $this->Flash->success(__('The saefi has been saved.'));

                return $this->redirect(['action' => 'edit', $saefi->id]);
            }
            $this->Flash->error(__('The saefi could not be saved. Please, try again.'));
        }
        $users = $this->Saefis->Users->find('list', ['limit' => 200]);
        // $designations = $this->Saefis->Designations->find('list',array('order'=>'Designations.name ASC'));
        $this->loadModel('Aefis');
        $aefis = $this->Aefis->find('list', ['keyField' => 'id', 'valueField' => 'reference_number', 'conditions' => ['Aefis.user_id' => $this->Auth->user('id'), 'Aefis.submitted' => 2]]);
        $this->set(compact('saefi', 'users', 'designations', 'aefis'));
        $this->set('_serialize', ['saefi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function _fileUploads($saefi)
    {
        // attachments
        if (!isset($this->request->data['attachments'][0]['file'])) {
            for ($i = 0; $i <= count($saefi->attachments) - 1; $i++) {
                $saefi->attachments[$i]->model = 'Saefis';
                $saefi->attachments[$i]->category = 'attachments';
            }
        }

        // reports
        if (!isset($this->request->data['reports'][0]['file'])) {
            for ($i = 0; $i <= count($saefi->reports) - 1; $i++) {
                $saefi->reports[$i]->model = 'Saefis';
                $saefi->reports[$i]->category = 'reports';
            }
        }
        return $saefi;
    }

    public function generateReferenceNumber($id)
    {
        $refid = $this->Saefis->Refids->newEntity(['foreign_key' => $id, 'model' => 'Saefis', 'year' => date('Y')]);
        $this->Saefis->Refids->save($refid);
        $refid = $this->Saefis->Refids->get($refid->id);
        $reference = 'SAEFI' . $refid->refid . '/' . $refid->year;

        //ensure that the reference number is unique
        $count = $this->Saefis->find('all', ['conditions' => ['Saefis.reference_number' => $reference]])->count();
        if ($count > 0) {
            return  $this->generateReferenceNumber($id);
        } else {
            return $reference;
        }
    }





    public function edit($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => ['SaefiListOfVaccines', 'AefiListOfVaccines',  'Attachments', 'Reports', 'ReportStages', 'SaefiReactions'],
            'conditions' => ['user_id' => $this->Auth->user('id')]
        ]);
        if ($saefi->submitted == 2) {
            $this->Flash->success(__('Report ' . $saefi->reference_number . ' already submitted.'));
            return $this->redirect(['action' => 'view', $saefi->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saefi = $this->Saefis->patchEntity($saefi, $this->request->getData(), [
                'validate' => ($this->request->getData('submitted') == 2) ? true : false,
                'associated' => [
                    'SaefiReactions' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'AefiListOfVaccines' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'SaefiListOfVaccines' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'Attachments' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'Reports' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false],
                    'ReportStages' => ['validate' => ($this->request->getData('submitted') == 2) ? true : false]
                ]
            ]);
            // $saefi = $this->_fileUploads($saefi);
            if (!empty($saefi->attachments)) {
                for ($i = 0; $i <= count($saefi->attachments) - 1; $i++) {
                    $saefi->attachments[$i]->model = 'Saefis';
                    $saefi->attachments[$i]->category = 'attachments';
                }
            }

            if (!empty($saefi->reports)) {
                for ($i = 0; $i <= count($saefi->reports) - 1; $i++) {
                    $saefi->reports[$i]->model = 'Saefis';
                    $saefi->reports[$i]->category = 'reports';
                }
            }

            if ($saefi->submitted == 1) {
                //save changes button
                if ($this->Saefis->save($saefi, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report have been saved.'));
                    return $this->redirect(['action' => 'edit', $saefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($saefi->submitted == 2) {
                //new stage
                $stage1  = $this->Saefis->ReportStages->newEntity();
                $stage1->model = 'Saefis';
                $stage1->stage = 'Submitted';
                $stage1->description = 'Stage 1';
                $stage1->stage_date = date("Y-m-d H:i:s");
                $saefi->report_stages = [$stage1];
                //submit to mcaz button
                $saefi->submitted_date = date("Y-m-d H:i:s");
                $saefi->status = 'Submitted'; //($this->Auth->user('is_admin')) ? 'Manual' : 'Submitted';
                $var = (date("Y") == 2019) ? 27 : 1;
                //$count = $this->Saefis->find('all', ['conditions' => ['date_format(Saefis.created,"%Y")' => date("Y"), 'Saefis.reference_number IS NOT' => null]])->count() + $var;
                // $count = $this->Saefis->find()->select(['reference_number'])->distinct()->where(['date_format(Saefis.created,"%Y")' => date("Y"), 'reference_number IS NOT' => null])->count() + $var;
                // $saefi->reference_number = (($saefi->reference_number)) ?? 'SAEFI'.$count.'/'.date('Y');
                if ($this->Saefis->save($saefi, ['validate' => false])) {
                    //New method to update reference number
                    if (empty($saefi->reference_number)) {

                        $saefi->reference_number = $this->generateReferenceNumber($saefi->id);
                        $this->Saefis->save($saefi);
                    }
                    //

                    $message = "Report " . $saefi->reference_number . " has been successfully submitted to MCAZ for review";
                    $this->generate_audit_trail($saefi->id, $message);
                    $this->Flash->success(__('Report ' . $saefi->reference_number . ' has been successfully submitted to MCAZ for review.'));

                    //send email and notification
                    $this->loadModel('Queue.QueuedJobs');
                    $data = [
                        'email_address' => $saefi->reporter_email, 'user_id' => $this->Auth->user('id'),
                        'type' => ($saefi->report_type == 'FollowUp') ? 'applicant_submit_saefi_followup_email' : 'applicant_submit_saefi_email',
                        'model' => 'Saefis', 'foreign_key' => $saefi->id,
                        'vars' =>  $saefi->toArray()
                    ];
                    $html = new HtmlHelper(new \Cake\View\View());
                    $data['vars']['pdf_link'] = $html->link('Download', [
                        'controller' => 'Saefis', 'action' => 'view', $saefi->id, '_ext' => 'pdf',
                        '_full' => true
                    ]);
                    $data['vars']['name'] = $saefi->reporter_name;
                    //notify applicant
                    $this->QueuedJobs->createJob('GenericEmail', $data);
                    $data['type'] = ($saefi->report_type == 'FollowUp') ? 'applicant_submit_saefi_followup_notification' : 'applicant_submit_saefi_notification';
                    $this->QueuedJobs->createJob('GenericNotification', $data);
                    //notify managers
                    $managers = $this->Saefis->Users->find('all')->where(['Users.group_id IN' => [2, 4], 'deactivated' => 0]);
                    foreach ($managers as $manager) {
                        $data = [
                            'email_address' => $manager->email, 'user_id' => $manager->id, 'model' => 'Saefis', 'foreign_key' => $saefi->id,
                            'vars' =>  $saefi->toArray()
                        ];
                        $data['type'] = ($saefi->report_type == 'FollowUp') ? 'manager_submit_saefi_followup_email' : 'manager_submit_saefi_email';
                        $data['vars']['name'] = $manager->name;
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        $data['type'] = ($saefi->report_type == 'FollowUp') ? 'manager_submit_saefi_followup_notification' : 'manager_submit_saefi_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                    return $this->redirect(['action' => 'view', $saefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            } elseif ($saefi->submitted == -1) {
                //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report later'));
                return $this->redirect(['controller' => 'Users', 'action' => 'home']);
            } else {
                if ($this->Saefis->save($saefi, ['validate' => false])) {
                    $this->Flash->success(__('The changes to the Report have been saved.'));
                    return $this->redirect(['action' => 'edit', $saefi->id]);
                } else {
                    $this->Flash->error(__('Report could not be saved. Kindly correct the errors and try again.'));
                }
            }
        }

        // debug($saefi);
        // exit;
        $designations = $this->Saefis->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations', 'provinces'));
        $this->set('_serialize', ['saefi']);
    }
    public function view($id = null)
    {
        $saefi = $this->Saefis->get($id, [
            'contain' => [
                'SaefiListOfVaccines', 'AefiListOfVaccines', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees',
                'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments',
                'ReportStages', 'AefiCausalities', 'Reports',
                'OriginalSaefis', 'OriginalSaefis.SaefiListOfVaccines', 'OriginalSaefis.Attachments', 'OriginalSaefis.Reports', 'SaefiReactions'
            ],
            'conditions' => ['Saefis.user_id' => $this->Auth->user('id')]
        ]);

        if ($saefi->submitted !== 2) {
            $this->Flash->warning(__('Kindly submit Report ' . $saefi->reference_number . ' before viewing.'));
            return $this->redirect(['action' => 'edit', $saefi->id]);
        }

        if (strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'view_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $saefi->reference_number . '.pdf'
                ]
            ]);
        }
        $adverse_events = [1, 2, 3, 4];
        $designations = $this->Saefis->Designations->find('list', array('order' => 'Designations.name ASC'));
        $provinces = $this->Saefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('saefi', 'designations', 'provinces', 'adverse_events'));
        $this->set('_serialize', ['saefi', 'designations', 'provinces']);
    }


    public function saefiFollowup($id)
    {
        $this->loadModel('SaefiFollowups');
        $orig_saefi = $this->Saefis->get($id, ['contain' => []]);

        $saefi = $this->SaefiFollowups->duplicateEntity($id);
        $saefi->saefi_id = $id;
        $saefi->initial_id = $id;
        $saefi->messageid = null;
        $saefi->user_id = $this->Auth->user('id'); //the report is reassigned to the user
        $saefi->report_type = 'FollowUp';

        if ($this->Saefis->save($saefi, ['validate' => false])) {
            $query = $this->Saefis->query();
            $query->update()
                ->set(['report_type' => 'Initial'])
                ->where(['id' => $orig_saefi->id])
                ->execute();

            $message = "A follow-up report for the AEFI Investigation has been created";
            $this->generate_audit_trail($saefi->id, $message);
            $this->Flash->success(__('A follow-up report for the AEFI Investigation has been created. make changes and submit.'));
            return $this->redirect(['action' => 'edit', $saefi->id]);
        }
        $this->Flash->error(__('A follow-up report for the AEFI Investigation Report could not be created. Please, try again.'));
        return $this->redirect($this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Saefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $saefi = $this->Saefis->get($id);
        if ($saefi->user_id == $this->Auth->user('id') && ($saefi->submitted == 0 or $saefi->submitted == 1)) {
            if ($this->Saefis->delete($saefi)) {
                $message = "The SAEFI report has been deleted successfully";
                $this->generate_audit_trail($saefi->id, $message);
                $this->Flash->success(__('The saefi has been deleted.'));
            } else {
                $this->Flash->error(__('The saefi could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('You do not have permission to delete the report'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
