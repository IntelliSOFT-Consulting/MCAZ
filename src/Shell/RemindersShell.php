<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\View\Helper\HtmlHelper; 
use Cake\I18n\Time;
use Cake\Core\Configure;

class RemindersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();        
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Users');
        $this->loadModel('Queue.QueuedJobs');
    }

    public function main()
    {
         $this->out('Hello world.');
        //  debug('test');
        //  exit;

        //AEFIS
        // $aefis = $this->Aefis->find('all')
        //     ->contain([])
        //     ->where(['ifnull(Aefis.submitted, 0) =' => 0, 'Aefis.status' => 'UnSubmitted', 'Aefis.created <=' => new \DateTime('-1 days')
        //              //'DATE(created)' => date('Y-m-d',strtotime("-1 days"))
        //             ])
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Aefis.user_id', 'Reminders.reminder_type' => 'applicant_aefi_reminder_email']);
        //     });
        // foreach ($aefis as $aefi) { 
        //     if (!empty($aefi->reporter_email)) {
        //         $data = [
        //             'email_address' => $aefi->reporter_email, 'user_id' => $aefi->user_id,
        //             'type' => 'applicant_aefi_reminder_email', 
        //             'model' => 'Aefis', 'foreign_key' => $aefi->id,
        //             'vars' =>  $aefi->toArray()
        //         ];  
        //         $html = new HtmlHelper(new \Cake\View\View());
        //         $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Aefis', 'action' => 'edit', $aefi->id, '_full' => true]);
        //         $data['vars']['name'] = (($aefi->reporter_name)) ?? $aefi->reporter_email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Aefis->Reminders->newEntity();
        //         $rem->user_id = $aefi->user_id;
        //         $rem->model = 'Aefis';
        //         $rem->reminder_type = 'applicant_aefi_reminder_email';
        //         $aefi->reminders = [$rem];
        //         $this->Aefis->save($aefi);
        //     }            
        // }
        // //notify managers if no review on 7th day
        // $naefis = $this->Aefis->find('all')
        //     ->contain([])
        //     ->where(['assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Aefis.status' => 'Submitted', 
        //             'DATE(Aefis.created) <=' => date('Y-m-d', strtotime('-7 days'))
        //             ])
        //     ->notMatching('AefiCausalities', function ($q) {
        //         return $q->where(['AefiCausalities.user_id = Aefis.assigned_to']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Aefis.assigned_to', 'Reminders.reminder_type' => 'evaluator_aefi_reminder_email']);
        //     });
        // foreach ($naefis as $aefi) { 
        //     if (!empty($aefi->reporter_email)) {
        //         $evaluator = $this->Aefis->Users->get($aefi->assigned_to);
        //         $manager = $this->Aefis->Users->get($aefi->assigned_by);
        //         $data = [
        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'evaluator_aefi_reminder_email', 
        //             'model' => 'Aefis', 'foreign_key' => $aefi->id,
        //             'vars' =>  $aefi->toArray()
        //         ];  

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Aefis->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Aefis';
        //         $rem->reminder_type = 'evaluator_aefi_reminder_email';
        //         $aefi->reminders = [$rem];
        //         $this->Aefis->save($aefi);
        //         // $this->out('Heyyy :)');
        //     }            
        // }

        // //SAEFIS
        // $saefis = $this->Saefis->find('all')
        //     ->contain([])
        //     ->where(['ifnull(Saefis.submitted, 0) =' => 0, 'Saefis.status' => 'UnSubmitted', 
        //              'Saefis.created <=' => new \DateTime('-1 days')
        //             ])
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Saefis.user_id', 'Reminders.reminder_type' => 'applicant_saefi_reminder_email']);
        //     });
        // foreach ($saefis as $saefi) { 
        //     if (!empty($saefi->reporter_email)) {
        //         $data = [
        //             'email_address' => $saefi->reporter_email, 'user_id' => $saefi->user_id,
        //             'type' => 'applicant_saefi_reminder_email', 
        //             'model' => 'Saefis', 'foreign_key' => $saefi->id,
        //             'vars' =>  $saefi->toArray()
        //         ];  
        //         $html = new HtmlHelper(new \Cake\View\View());
        //         $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Saefis', 'action' => 'edit', $saefi->id, '_full' => true]);
        //         $data['vars']['name'] = (($saefi->reporter_name)) ?? $saefi->reporter_email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Saefis->Reminders->newEntity();
        //         $rem->user_id = $saefi->user_id;
        //         $rem->model = 'Saefis';
        //         $rem->reminder_type = 'applicant_saefi_reminder_email';
        //         $saefi->reminders = [$rem];
        //         $this->Saefis->save($saefi);
        //     }            
        // }
        // //notify managers if no review on 7th day
        // $nsaefis = $this->Saefis->find('all')
        //     ->contain([])
        //     ->where(['assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Saefis.status' => 'Submitted', 
        //             'DATE(Saefis.created) <=' => date('Y-m-d', strtotime('-7 days'))
        //             ])
        //     ->notMatching('AefiCausalities', function ($q) {
        //         return $q->where(['AefiCausalities.user_id = Saefis.assigned_to']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Saefis.assigned_to', 'Reminders.reminder_type' => 'evaluator_saefi_reminder_email']);
        //     });
        // foreach ($nsaefis as $saefi) { 
        //     if (!empty($saefi->reporter_email)) {
        //         $evaluator = $this->Saefis->Users->get($saefi->assigned_to);
        //         $manager = $this->Saefis->Users->get($saefi->assigned_by);
        //         $data = [
        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'evaluator_saefi_reminder_email', 
        //             'model' => 'Saefis', 'foreign_key' => $saefi->id,
        //             'vars' =>  $saefi->toArray()
        //         ];  

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Saefis->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Saefis';
        //         $rem->reminder_type = 'evaluator_saefi_reminder_email';
        //         $saefi->reminders = [$rem];
        //         $this->Saefis->save($saefi);
        //         // $this->out('Heyyy :)');
        //     }            
        // }

        // //SADR
        // $sadrs = $this->Sadrs->find('all')
        //     ->contain([])
        //     ->where(['ifnull(Sadrs.submitted, 0) =' => 0, 'Sadrs.status' => 'UnSubmitted', 'Sadrs.created <=' => new \DateTime('-1 days')
        //             ])
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Sadrs.user_id', 'Reminders.reminder_type' => 'applicant_sadr_reminder_email']);
        //     });
        // foreach ($sadrs as $sadr) { 
        //     if (!empty($sadr->reporter_email)) {
        //         $data = [
        //             'email_address' => $sadr->reporter_email, 'user_id' => $sadr->user_id,
        //             'type' => 'applicant_sadr_reminder_email', 
        //             'model' => 'Sadrs', 'foreign_key' => $sadr->id,
        //             'vars' =>  $sadr->toArray()
        //         ];  
        //         $html = new HtmlHelper(new \Cake\View\View());
        //         $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Sadrs', 'action' => 'edit', $sadr->id, '_full' => true]);
        //         $data['vars']['name'] = (($sadr->reporter_name)) ?? $sadr->reporter_email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Sadrs->Reminders->newEntity();
        //         $rem->user_id = $sadr->user_id;
        //         $rem->model = 'Sadrs';
        //         $rem->reminder_type = 'applicant_sadr_reminder_email';
        //         $sadr->reminders = [$rem];
        //         $this->Sadrs->save($sadr);
        //     }            
        // }
        // //notify managers if no review on 7th day
        // $nsadrs = $this->Sadrs->find('all')
        //     ->contain([])
        //     ->where(['assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Sadrs.status' => 'Submitted', 
        //             'DATE(Sadrs.created) <=' => date('Y-m-d', strtotime('-7 days'))
        //             ])
        //     ->notMatching('Reviews', function ($q) {
        //         return $q->where(['Reviews.user_id = Sadrs.assigned_to']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Sadrs.assigned_to', 'Reminders.reminder_type' => 'evaluator_sadr_reminder_email']);
        //     });
        // foreach ($nsadrs as $sadr) { 
        //     if (!empty($sadr->reporter_email)) {
        //         $evaluator = $this->Sadrs->Users->get($sadr->assigned_to);
        //         $manager = $this->Sadrs->Users->get($sadr->assigned_by);
        //         $data = [
        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'evaluator_sadr_reminder_email', 
        //             'model' => 'Sadrs', 'foreign_key' => $sadr->id,
        //             'vars' =>  $sadr->toArray()
        //         ];  

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Sadrs->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Sadrs';
        //         $rem->reminder_type = 'evaluator_sadr_reminder_email';
        //         $sadr->reminders = [$rem];
        //         $this->Sadrs->save($sadr);
        //     }            
        // }

        // //ADRS
        // $adrs = $this->Adrs->find('all')
        //     ->contain([])
        //     ->where(['ifnull(Adrs.submitted, 0) =' => 0, 'Adrs.status' => 'UnSubmitted', 'Adrs.created <=' => new \DateTime('-1 days')])
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Adrs.user_id', 'Reminders.reminder_type' => 'applicant_sae_reminder_email']);
        //     });
        // foreach ($adrs as $adr) { 
        //     if (!empty($adr->reporter_email)) {
        //         $data = [
        //             'email_address' => $adr->reporter_email, 'user_id' => $adr->user_id,
        //             'type' => 'applicant_sae_reminder_email', 
        //             'model' => 'Adrs', 'foreign_key' => $adr->id,
        //             'vars' =>  $adr->toArray()
        //         ];  
        //         $html = new HtmlHelper(new \Cake\View\View());
        //         $data['vars']['report_link'] = $html->link('Edit', ['controller' => 'Adrs', 'action' => 'edit', $adr->id, '_full' => true]);
        //         $data['vars']['name'] = (($adr->reporter_name)) ?? $adr->reporter_email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Adrs->Reminders->newEntity();
        //         $rem->user_id = $adr->user_id;
        //         $rem->model = 'Adrs';
        //         $rem->reminder_type = 'applicant_sae_reminder_email';
        //         $adr->reminders = [$rem];
        //         $this->Adrs->save($adr);
        //     }            
        // }        
        // //notify managers if no review on 7th day
        // $nadrs = $this->Adrs->find('all')
        //     ->contain([])
        //     ->where(['assigned_to IS NOT' => null, 'assigned_by IS NOT' => null, 'Adrs.status' => 'Submitted', 
        //             'DATE(Adrs.created) <=' => date('Y-m-d', strtotime('-7 days'))
        //             ])
        //     ->notMatching('Reviews', function ($q) {
        //         return $q->where(['Reviews.user_id = Adrs.assigned_to']);
        //     })
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Adrs.assigned_to', 'Reminders.reminder_type' => 'evaluator_sae_reminder_email']);
        //     });
        // foreach ($nadrs as $adr) { 
        //     if (!empty($adr->reporter_email)) {
        //         $evaluator = $this->Adrs->Users->get($adr->assigned_to);
        //         $manager = $this->Adrs->Users->get($adr->assigned_by);
        //         $data = [
        //             'email_address' => $evaluator->email, 'user_id' => $evaluator->id,
        //             'type' => 'evaluator_sae_reminder_email', 
        //             'model' => 'Adrs', 'foreign_key' => $adr->id,
        //             'vars' =>  $adr->toArray()
        //         ];  

        //         $data['vars']['name'] = $evaluator->name;
        //         $data['vars']['assigned_by_name'] = $manager->name;
        //         $data['vars']['cc'] = $manager->email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Adrs->Reminders->newEntity();
        //         $rem->user_id = $evaluator->id;
        //         $rem->model = 'Adrs';
        //         $rem->reminder_type = 'evaluator_sae_reminder_email';
        //         $adr->reminders = [$rem];
        //         $this->Adrs->save($adr);
        //     }            
        // }

        // //USERS
        // $users = $this->Users->find('all')
        //     ->contain([])
        //     ->where(['ifnull(Users.deactivated, 0) =' => 0, 'Users.last_password <=' => new \DateTime(Configure::read('password_expire_timeout'))
        //             ])
        //     ->notMatching('Reminders', function ($q) {
        //         return $q->where(['Reminders.user_id = Users.id', 'Reminders.reminder_type' => 'change_password_reminder_email']);
        //     });
        // foreach ($users as $user) { 
        //     if (!empty($user->email)) {
        //         $data = [
        //             'email_address' => $user->email, 'user_id' => $user->id,
        //             'type' => 'change_password_reminder_email', 
        //             'model' => 'Users', 'foreign_key' => $user->id,
        //             'vars' =>  $user->toArray()
        //         ];  
        //         $html = new HtmlHelper(new \Cake\View\View());
        //         $data['vars']['change_link'] = $html->link('Change', ['controller' => 'Users', 'action' => 'profile', '_full' => true]);
        //         $data['vars']['name'] = (($user->name)) ?? $user->email;
        //         $this->QueuedJobs->createJob('GenericEmail', $data);
        //         $rem  = $this->Users->Reminders->newEntity();
        //         $rem->user_id = $user->id;
        //         $rem->model = 'Users';
        //         $rem->reminder_type = 'change_password_reminder_email';
        //         $user->reminders = [$rem];
        //         $this->Users->save($user);
        //     }            
        // }
    }
}
