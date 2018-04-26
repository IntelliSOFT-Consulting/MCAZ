<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\View\Helper\HtmlHelper; 
use Cake\I18n\Time;

class RemindersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();        
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Queue.QueuedJobs');
    }

    public function main()
    {
        // $this->out('Hello world.');
        //AEFIS
        $aefis = $this->Aefis->find('all')
            ->contain([])
            ->where(['ifnull(submitted, 0) =' => 0, 'status' => 'UnSubmitted', 'emails' => 0, 'created <=' => new \DateTime('-1 days')
                     //'DATE(created)' => date('Y-m-d',strtotime("-1 days"))
                    ]);
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
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $aefi->emails = 1;
                $this->Aefis->save($aefi);
            }            
        }
        //SAEFIS
        $saefis = $this->Saefis->find('all')
            ->contain([])
            ->where(['ifnull(submitted, 0) =' => 0, 'status' => 'UnSubmitted', 'emails' => 0, 'created <=' => new \DateTime('-1 days')]);
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
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $saefi->emails = 1;
                $this->Saefis->save($saefi);
            }            
        }

        //SADR
        $sadrs = $this->Sadrs->find('all')
            ->contain([])
            ->where(['ifnull(submitted, 0) =' => 0, 'status' => 'UnSubmitted', 'emails' => 0, 'created <=' => new \DateTime('-1 days')]);
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
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $sadr->emails = 1;
                $this->Sadrs->save($sadr);
            }            
        }

        //ADRS
        $adrs = $this->Adrs->find('all')
            ->contain([])
            ->where(['ifnull(submitted, 0) =' => 0, 'status' => 'UnSubmitted', 'emails' => 0, 'created <=' => new \DateTime('-1 days')]);
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
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $adr->emails = 1;
                $this->Adrs->save($adr);
            }            
        }
    }
}
