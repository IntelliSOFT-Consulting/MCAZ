<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\View\Helper\HtmlHelper;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\Utility\Hash;

class RemindersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Ce2bs');
        $this->loadModel('Users');
        $this->loadModel('Queue.QueuedJobs');
    }

    public function main()
    {
        $this->out('Generating Reminders********.');


        //AEFIS
        $aefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'ifnull(Aefis.submitted, 0) =' => 0, 'Aefis.status' => 'UnSubmitted', 'Aefis.created <=' => new \DateTime('-1 days')
                //'DATE(created)' => date('Y-m-d',strtotime("-1 days"))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.user_id', 'Reminders.reminder_type' => 'applicant_aefi_reminder_email']);
            });
        foreach ($aefis as $aefi) {
            if (!empty($aefi->reporter_email)) {
                $data = [
                    'email_address' => $aefi->reporter_email, 'user_id' => $aefi->user_id,
                    'type' => 'applicant_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Aefis', 'action' => 'edit', $aefi->id, '_full' => true]);
                $data['vars']['name'] = (($aefi->reporter_name)) ?? $aefi->reporter_email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $aefi->user_id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'applicant_aefi_reminder_email';
                $aefi->reminders = [$rem];
                $this->Aefis->save($aefi);
            }
        }

        //SAEFIS
        $saefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'ifnull(Saefis.submitted, 0) =' => 0, 'Saefis.status' => 'UnSubmitted',
                'Saefis.created <=' => new \DateTime('-1 days')
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.user_id', 'Reminders.reminder_type' => 'applicant_saefi_reminder_email']);
            });
        foreach ($saefis as $saefi) {
            if (!empty($saefi->reporter_email)) {
                $data = [
                    'email_address' => $saefi->reporter_email, 'user_id' => $saefi->user_id,
                    'type' => 'applicant_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Saefis', 'action' => 'edit', $saefi->id, '_full' => true]);
                $data['vars']['name'] = (($saefi->reporter_name)) ?? $saefi->reporter_email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $saefi->user_id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'applicant_saefi_reminder_email';
                $saefi->reminders = [$rem];
                $this->Saefis->save($saefi);
            }
        }

        //SADR
        $sadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'ifnull(Sadrs.submitted, 0) =' => 0, 'Sadrs.status' => 'UnSubmitted', 'Sadrs.created <=' => new \DateTime('-1 days')
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.user_id', 'Reminders.reminder_type' => 'applicant_sadr_reminder_email']);
            });
        foreach ($sadrs as $sadr) {
            if (!empty($sadr->reporter_email)) {
                $data = [
                    'email_address' => $sadr->reporter_email, 'user_id' => $sadr->user_id,
                    'type' => 'applicant_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Sadrs', 'action' => 'edit', $sadr->id, '_full' => true]);
                $data['vars']['name'] = (($sadr->reporter_name)) ?? $sadr->reporter_email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $sadr->user_id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'applicant_sadr_reminder_email';
                $sadr->reminders = [$rem];
                $this->Sadrs->save($sadr);
            }
        }


        //ADRS
        $adrs = $this->Adrs->find('all')
            ->contain([])
            ->where(['ifnull(Adrs.submitted, 0) =' => 0, 'Adrs.status' => 'UnSubmitted', 'Adrs.created <=' => new \DateTime('-1 days')])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.user_id', 'Reminders.reminder_type' => 'applicant_sae_reminder_email']);
            });
        foreach ($adrs as $adr) {
            if (!empty($adr->reporter_email)) {
                $data = [
                    'email_address' => $adr->reporter_email, 'user_id' => $adr->user_id,
                    'type' => 'applicant_sae_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $adr->id,
                    'vars' =>  $adr->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Adrs', 'action' => 'edit', $adr->id, '_full' => true]);
                $data['vars']['name'] = (($adr->reporter_name)) ?? $adr->reporter_email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $adr->user_id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'applicant_sae_reminder_email';
                $adr->reminders = [$rem];
                $this->Adrs->save($adr);
            }
        }

        // USERS
        $users = $this->Users->find('all')
            ->contain([])
            ->where([
                'ifnull(Users.deactivated, 0) =' => 0, 'Users.last_password <=' => new \DateTime(Configure::read('password_expire_timeout'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Users.id', 'Reminders.reminder_type' => 'change_password_reminder_email']);
            });
        foreach ($users as $user) {
            if (!empty($user->email)) {
                $data = [
                    'email_address' => $user->email, 'user_id' => $user->id,
                    'type' => 'change_password_reminder_email',
                    'model' => 'Users', 'foreign_key' => $user->id,
                    'vars' =>  $user->toArray()
                ];
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['change_link'] = $html->link('Change', ['controller' => 'Users', 'action' => 'profile', '_full' => true]);
                $data['vars']['name'] = (($user->name)) ?? $user->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Users->Reminders->newEntity();
                $rem->user_id = $user->id;
                $rem->model = 'Users';
                $rem->reminder_type = 'change_password_reminder_email';
                $user->reminders = [$rem];
                $this->Users->save($user);
            }
        }

        //Notify Manager that a report has not been assigned to an evaluator in 7 days

        // Qualified Managers
        $managers = $this->Sadrs->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
        // SADR Reports

        $unUssignedSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'Sadrs.status' => 'Submitted', 'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $ms = $this->Sadrs->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($ms->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_reminder_email', 'Reminders.model' => 'Sadrs']);
            });

        foreach ($unUssignedSadrs as $sadr) {

            foreach ($managers as $manager) {

                // Work on filtering only manager's who have not been notified.

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'unassigned_reminder_email';
                $sadr->reminders = [$rem];
                $this->Sadrs->save($sadr);
            }
        }

        // Handle:: Start of SAE Reports
        $unUssignedAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'Adrs.status' => 'Submitted', 'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $madrs = $this->Adrs->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($madrs->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_reminder_email', 'Reminders.model' => 'Adrs']);
            });

        foreach ($unUssignedAdrs as $adr) {

            foreach ($managers as $manager) {

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $adr->id,
                    'vars' =>  $adr->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'unassigned_reminder_email';
                $adr->reminders = [$rem];
                $this->Adrs->save($adr);
            }
        }
        // End of SAE Reports

        // Handle:: Start of AEFI Reports
        $unUssignedAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'Aefis.status' => 'Submitted', 'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $mAefis = $this->Aefis->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($mAefis->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_reminder_email', 'Reminders.model' => 'Aefis']);
            });

        foreach ($unUssignedAefis as $report) {

            foreach ($managers as $manager) {

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'unassigned_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }
        // End of AEFI Reports

        // Handle:: Start of SAEFI Reports
        $unUssignedSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'Saefis.status' => 'Submitted', 'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $mSaefis = $this->Saefis->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($mSaefis->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_reminder_email', 'Reminders.model' => 'Saefis']);
            });

        foreach ($unUssignedSaefis as $report) {

            foreach ($managers as $manager) {

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'unassigned_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }
        // End of SAEFI Reports

        // Handle:: Start of Ce2bs Reports
        $unUssignedCe2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'Ce2bs.status' => 'Submitted', 'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-2 minutes'))
            ])
            ->notMatching('Reminders', function ($q) {
                $mCe2bs = $this->Ce2bs->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($mCe2bs->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_reminder_email', 'Reminders.model' => 'Ce2bs']);
            });

        foreach ($unUssignedCe2bs as $report) {

            foreach ($managers as $manager) {

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'unassigned_reminder_email';
                $report->reminders = [$rem];
                $this->Ce2bs->save($report);
            }
        }
        // End of Ce2bs Reports

        // START OF ASSIGNED->UNREVIEWED REPORTS [NOTIFY THE ASSIGNED EVALUATOR]
        //SADRs
        $nsadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Assigned',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reviews', function ($q) {
                return $q->where(['Reviews.user_id = Sadrs.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'evaluator_sadr_reminder_email']);
            });
        foreach ($nsadrs as $sadr) {
            if (!empty($sadr->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                $manager = $this->Sadrs->Users->get($sadr->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'evaluator_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'evaluator_sadr_reminder_email';
                $sadr->reminders = [$rem];
                $this->Sadrs->save($sadr);
            }
        }

        // SAEs 
        $unEvaluatedAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Assigned',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reviews', function ($q) {
                return $q->where(['Reviews.user_id = Adrs.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'evaluator_sae_reminder_email']);
            });
        foreach ($unEvaluatedAdrs as $report) {

            $evaluator = $this->Adrs->Users->get($report->assigned_to);
            $manager = $this->Adrs->Users->get($report->assigned_by);
            $data = [
                'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                'type' => 'evaluator_sae_reminder_email',
                'model' => 'Adrs', 'foreign_key' => $report->id,
                'vars' =>  $report->toArray()
            ];

            $data['vars']['name'] = $evaluator->name;
            $data['vars']['assigned_by_name'] = $manager->name;
            $data['vars']['cc'] = $manager->email;
            // $this->QueuedJobs->createJob('GenericEmail', $data);
            $rem  = $this->Adrs->Reminders->newEntity();
            $rem->user_id = $evaluator->id;
            $rem->model = 'Adrs';
            $rem->reminder_type = 'evaluator_sae_reminder_email';
            $report->reminders = [$rem];
            $this->Adrs->save($report);
        }

        // AEFIs 
        $naefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Assigned',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AefiCausalities', function ($q) {
                return $q->where(['AefiCausalities.user_id = Aefis.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'evaluator_aefi_reminder_email']);
            });
        foreach ($naefis as $aefi) {
            if (!empty($aefi->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
                $manager = $this->Aefis->Users->get($aefi->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'evaluator_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $aefi->id,
                    'vars' =>  $aefi->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'evaluator_aefi_reminder_email';
                $aefi->reminders = [$rem];
                $this->Aefis->save($aefi);
                // $this->out('Heyyy :)');
            }
        }

        //SAEFIS
        $nsaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Assigned',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AefiCausalities', function ($q) {
                return $q->where(['AefiCausalities.user_id = Saefis.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'evaluator_saefi_reminder_email']);
            });
        foreach ($nsaefis as $saefi) {
            if (!empty($saefi->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
                $manager = $this->Saefis->Users->get($saefi->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'evaluator_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $saefi->id,
                    'vars' =>  $saefi->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'evaluator_saefi_reminder_email';
                $saefi->reminders = [$rem];
                $this->Saefis->save($saefi);
                // $this->out('Heyyy :)');
            }
        }

        // CE2BS
        $nce2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'Assigned',
                'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])

            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Ce2bs.assigned_to', 'Reminders.reminder_type' => 'evaluator_ce2b_reminder_email']);
            });
        foreach ($nce2bs as $ce2b) {
            if (!empty($ce2b->reporter_email)) {
                $evaluator = $this->Ce2bs->Users->get($ce2b->assigned_to);
                $manager = $this->Ce2bs->Users->get($ce2b->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'evaluator_ce2b_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $ce2b->id,
                    'vars' =>  $ce2b->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'evaluator_ce2b_reminder_email';
                $ce2b->reminders = [$rem];
                $this->Ce2bs->save($ce2b);
                // $this->out('Heyyy :)');
            }
        }

        // STAYED FOR LONG WITHOUT COMMITTEE ACTION -> APPROVE EVALUATION

        // SADRs
        $nsadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Evaluated',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Committees', function ($q) {
                return $q->where(['Committees.category' => 'committee', 'Committees.user_id = Sadrs.assigned_to'])
                    ->orWhere(['Committees.category' => 'committee', 'Committees.user_id = Sadrs.assigned_by']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'committee_sadr_reminder_email']);
            });
        foreach ($nsadrs as $sadr) {
            if (!empty($sadr->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
                $manager = $this->Sadrs->Users->get($sadr->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $sadr->id,
                    'vars' =>  $sadr->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'committee_sadr_reminder_email';
                $sadr->reminders = [$rem];
                $this->Sadrs->save($sadr);
            }
        }
        // SAE
        $nAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Evaluated',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Committees', function ($q) {
                return $q->where(['Committees.category' => 'committee', 'Committees.user_id = Adrs.assigned_to'])->orWhere(['Committees.category' => 'committee', 'Committees.user_id = Adrs.assigned_by']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'committee_adr_reminder_email']);
            });
        foreach ($nAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Adrs->Users->get($report->assigned_to);
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'committee_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }
        // AEFI
        $nAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Evaluated',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Committees', function ($q) {
                return $q->where(['Committees.category' => 'committee', 'Committees.user_id = Aefis.assigned_to'])->orWhere(['Committees.category' => 'committee', 'Committees.user_id = Aefis.assigned_by']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'committee_aefi_reminder_email']);
            });
        foreach ($nAefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($report->assigned_to);
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'committee_aefi_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }

        // SAEFIS
        $nSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Evaluated',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Committees', function ($q) {
                return $q->where(['Committees.category' => 'committee', 'Committees.user_id = Saefis.assigned_to'])->orWhere(['Committees.category' => 'committee', 'Committees.user_id = Saefis.assigned_by']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'committee_saefi_reminder_email']);
            });
        foreach ($nSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($report->assigned_to);
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'committee_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }

        // CE2B
        $nCe2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'Evaluated',
                'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Committees', function ($q) {
                return $q->where(['Committees.category' => 'committee', 'Committees.user_id = Ce2bs.assigned_to'])->orWhere(['Committees.category' => 'committee', 'Committees.user_id = Ce2bs.assigned_by']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Ce2bs.assigned_to', 'Reminders.reminder_type' => 'committee_ce2b_reminder_email']);
            });
        foreach ($nCe2bs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Ce2bs->Users->get($report->assigned_to);
                $manager = $this->Ce2bs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_ce2b_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'committee_ce2b_reminder_email';
                $report->reminders = [$rem];
                $this->Ce2bs->save($report);
            }
        }

        //STAYED LONG WITHOUT COMMITTEE ACTION
        // SADRS
        $nSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Committee',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'committee_action_sadr_reminder_email']);
            });
        foreach ($nSadrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($report->assigned_to);
                $manager = $this->Sadrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_action_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'committee_action_sadr_reminder_email';
                $report->reminders = [$rem];
                $this->Sadrs->save($report);
            }
        }
        // SAE
        $nAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Committee',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'committee_action_adr_reminder_email']);
            });
        foreach ($nAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Adrs->Users->get($report->assigned_to);
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_action_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'committee_action_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }
        // AEFIS
        $nAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Committee',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'committee_action_aefis_reminder_email']);
            });
        foreach ($nAefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($report->assigned_to);
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_action_aefis_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'committee_action_aefis_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }
        // SAEFIS
        $nSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Committee',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'committee_action_saefi_reminder_email']);
            });
        foreach ($nSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($report->assigned_to);
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_action_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'committee_action_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }

        // CE2B
        $nCe2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'Committee',
                'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Ce2bs.assigned_to', 'Reminders.reminder_type' => 'committee_action_ce2b_reminder_email']);
            });
        foreach ($nCe2bs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Ce2bs->Users->get($report->assigned_to);
                $manager = $this->Ce2bs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'committee_action_ce2b_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'committee_action_ce2b_reminder_email';
                $report->reminders = [$rem];
                $this->Ce2bs->save($report);
            }
        }

        // STAYED FOR LONG WITHOUT CORESPONDENCE ACTION
        // SADRs
        $corespondenceSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Correspondence',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('SadrComments', function ($q) {
                return $q->where(['SadrComments.user_id = Sadrs.user_id']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.user_id', 'Reminders.reminder_type' => 'correspondence_sadr_reminder_email']);
            });
        foreach ($corespondenceSadrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($report->user_id);
                $manager = $this->Sadrs->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'correspondence_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'correspondence_sadr_reminder_email';
                $report->reminders = [$rem];
                $this->Sadrs->save($report);
            }
        }
        // SAE
        $corespondenceAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Correspondence',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AdrComments', function ($q) {
                return $q->where(['AdrComments.user_id = Adrs.user_id']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.user_id', 'Reminders.reminder_type' => 'correspondence_adr_reminder_email']);
            });
        foreach ($corespondenceAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Adrs->Users->get($report->user_id);
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'correspondence_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'correspondence_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }

        // AEFIS
        $corespondenceAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Correspondence',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AefiComments', function ($q) {
                return $q->where(['AefiComments.user_id = Aefis.user_id']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.user_id', 'Reminders.reminder_type' => 'correspondence_aefi_reminder_email']);
            });
        foreach ($corespondenceAefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($report->user_id);
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'correspondence_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'correspondence_aefi_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }


        // SAEFIS
        $corespondenceSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Correspondence',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('SaefiComments', function ($q) {
                return $q->where(['SaefiComments.user_id = Saefis.user_id']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.user_id', 'Reminders.reminder_type' => 'correspondence_saefi_reminder_email']);
            });
        foreach ($corespondenceSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($report->user_id);
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'correspondence_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'correspondence_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }
        // CE2BS
        // $corespondenceCe2bs = $this->Ce2bs->find('all')
        //     ->contain([])
        //     ->where([
        //         'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'Correspondence',
        //         'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
        //     ])
        //     ->notMatching('Ce2bComments', function ($q) {
        //         return $q->where(['Ce2bComments.user_id = Ce2bs.user_id']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Ce2bs.user_id', 'Reminders.reminder_type' => 'correspondence_ce2b_reminder_email']);
        //     });
        // foreach ($corespondenceCe2bs as $report) {
        //     if (!empty($report->reporter_email)) {
        //         $evaluator = $this->Ce2bs->Users->get($report->user_id);
        //         $manager = $this->Ce2bs->Users->get($report->assigned_by);
        //         $data = [

        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'correspondence_ce2b_reminder_email',
        //             'model' => 'Ce2bs', 'foreign_key' => $report->id,
        //             'vars' =>  $report->toArray()
        //         ];

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         // $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Ce2bs->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Ce2bs';
        //         $rem->reminder_type = 'correspondence_ce2b_reminder_email';
        //         $report->reminders = [$rem];
        //         $this->Ce2bs->save($report);
        //     }
        // }

        // STAYED LONG AT APPLICANT'S RESPONSE
        // SADRS
        $applicantResponseSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'ApplicantResponse',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('SadrComments', function ($q) {
                return $q->where(['SadrComments.user_id = Sadrs.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'reponse_sadr_reminder_email']);
            });
        foreach ($applicantResponseSadrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($report->assigned_to);
                $manager = $this->Sadrs->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'reponse_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'reponse_sadr_reminder_email';
                $report->reminders = [$rem];
                $this->Sadrs->save($report);
            }
        }
        // SAE
        $applicantResponseAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'ApplicantResponse',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AdrComments', function ($q) {
                return $q->where(['AdrComments.user_id = Adrs.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'reponse_adr_reminder_email']);
            });
        foreach ($applicantResponseAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Adrs->Users->get($report->assigned_to);
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'reponse_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'reponse_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }

        // AEFIS
        $applicantResponseAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'ApplicantResponse',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('AefiComments', function ($q) {
                return $q->where(['AefiComments.user_id = Aefis.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'reponse_aefi_reminder_email']);
            });
        foreach ($applicantResponseAefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($report->assigned_to);
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'reponse_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'reponse_aefi_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }

        // SAEFIS
        $applicantResponseSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'ApplicantResponse',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('SaefiComments', function ($q) {
                return $q->where(['SaefiComments.user_id = Saefis.assigned_to']);
            })
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'reponse_saefi_reminder_email']);
            });
        foreach ($applicantResponseSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($report->assigned_to);
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [

                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'reponse_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'reponse_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }

        // CE2Bs
        // $applicantResponseCe2bs = $this->Ce2bs->find('all')
        //     ->contain([])
        //     ->where([
        //         'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'ApplicantResponse',
        //         'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
        //     ])
        //     ->notMatching('SaefiComments', function ($q) {
        //         return $q->where(['SaefiComments.user_id = Ce2bs.assigned_to']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Ce2bs.assigned_to', 'Reminders.reminder_type' => 'reponse_saefi_reminder_email']);
        //     });
        // foreach ($applicantResponseCe2bs as $report) {
        //     if (!empty($report->reporter_email)) {
        //         $evaluator = $this->Ce2bs->Users->get($report->assigned_to);
        //         $manager = $this->Ce2bs->Users->get($report->assigned_by);
        //         $data = [

        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'reponse_saefi_reminder_email',
        //             'model' => 'Ce2bs', 'foreign_key' => $report->id,
        //             'vars' =>  $report->toArray()
        //         ];

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         // $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Ce2bs->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Ce2bs';
        //         $rem->reminder_type = 'reponse_saefi_reminder_email';
        //         $report->reminders = [$rem];
        //         $this->Ce2bs->save($report);
        //     }
        // }

        // STAYED FOR LONG WITHOUT PRESENTER'S ACTION
        // SADRS
        $nSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Presented',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'presented_sadr_reminder_email']);
            });
        foreach ($nSadrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Sadrs->Users->get($report->assigned_to);
                $manager = $this->Sadrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'presented_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'presented_sadr_reminder_email';
                $report->reminders = [$rem];
                $this->Sadrs->save($report);
            }
        }
        // SAE
        $nAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Presented',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'presented_adr_reminder_email']);
            });
        foreach ($nAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Adrs->Users->get($report->assigned_to);
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'presented_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'presented_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }

        // AEFIS
        $nAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Presented',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'presented_aefi_reminder_email']);
            });
        foreach ($nAefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Aefis->Users->get($report->assigned_to);
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'presented_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'presented_aefi_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }

        // SAEFIS
        $nSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Presented',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'presented_saefi_reminder_email']);
            });
        foreach ($nSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Saefis->Users->get($report->assigned_to);
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'presented_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'presented_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }
        // CE2BS
        $presentedCe2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'Presented',
                'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Ce2bs.assigned_to', 'Reminders.reminder_type' => 'presented_ce2b_reminder_email']);
            });
        foreach ($presentedCe2bs as $report) {
            if (!empty($report->reporter_email)) {
                $evaluator = $this->Ce2bs->Users->get($report->assigned_to);
                $manager = $this->Ce2bs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
                    'type' => 'presented_ce2b_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $evaluator->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                $data['vars']['cc'] = $manager->email;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $evaluator->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'presented_ce2b_reminder_email';
                $report->reminders = [$rem];
                $this->Ce2bs->save($report);
            }
        }



        // STAYED LONG AT FINAL FEEDBACK STAGE
        // SADRS
        $feedbackSadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'FinalFeedback',
                'DATE(Sadrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Sadrs.assigned_by', 'Reminders.reminder_type' => 'feedback_sadr_reminder_email']);
            });
        foreach ($feedbackSadrs as $report) {
            if (!empty($report->reporter_email)) {
                $manager = $this->Sadrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'feedback_sadr_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Sadrs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Sadrs';
                $rem->reminder_type = 'feedback_sadr_reminder_email';
                $report->reminders = [$rem];
                $this->Sadrs->save($report);
            }
        }
        // SAE
        $feedbackAdrs = $this->Adrs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'FinalFeedback',
                'DATE(Adrs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Adrs.assigned_by', 'Reminders.reminder_type' => 'feedback_adr_reminder_email']);
            });
        foreach ($feedbackAdrs as $report) {
            if (!empty($report->reporter_email)) {
                $manager = $this->Adrs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'feedback_adr_reminder_email',
                    'model' => 'Adrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Adrs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Adrs';
                $rem->reminder_type = 'feedback_adr_reminder_email';
                $report->reminders = [$rem];
                $this->Adrs->save($report);
            }
        }

        // AEFIS
        $feedbackAefis = $this->Aefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'FinalFeedback',
                'DATE(Aefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Aefis.assigned_by', 'Reminders.reminder_type' => 'feedback_aefi_reminder_email']);
            });
        foreach ($feedbackAefis as $report) {
            if (!empty($report->reporter_email)) {
                $manager = $this->Aefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'feedback_aefi_reminder_email',
                    'model' => 'Aefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Aefis->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Aefis';
                $rem->reminder_type = 'feedback_aefi_reminder_email';
                $report->reminders = [$rem];
                $this->Aefis->save($report);
            }
        }
        // SAEFIS
        $feedbackSaefis = $this->Saefis->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'FinalFeedback',
                'DATE(Saefis.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Saefis.assigned_by', 'Reminders.reminder_type' => 'feedback_saefi_reminder_email']);
            });
        foreach ($feedbackSaefis as $report) {
            if (!empty($report->reporter_email)) {
                $manager = $this->Saefis->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'feedback_saefi_reminder_email',
                    'model' => 'Saefis', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Saefis->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Saefis';
                $rem->reminder_type = 'feedback_saefi_reminder_email';
                $report->reminders = [$rem];
                $this->Saefis->save($report);
            }
        }
        // CE2BS
        $feedbackCe2bs = $this->Ce2bs->find('all')
            ->contain([])
            ->where([
                'assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Ce2bs.status' => 'FinalFeedback',
                'DATE(Ce2bs.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                return $q->where(['Reminders.user_id = Ce2bs.assigned_by', 'Reminders.reminder_type' => 'feedback_ce2b_reminder_email']);
            });
        foreach ($feedbackCe2bs as $report) {
            if (!empty($report->reporter_email)) {
                $manager = $this->Ce2bs->Users->get($report->assigned_by);
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'feedback_ce2b_reminder_email',
                    'model' => 'Ce2bs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];

                $data['vars']['name'] = $manager->name;
                $data['vars']['assigned_by_name'] = $manager->name;
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Ce2bs->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Ce2bs';
                $rem->reminder_type = 'feedback_ce2b_reminder_email';
                $report->reminders = [$rem];
                $this->Ce2bs->save($report);
            }
        }
    }
}
