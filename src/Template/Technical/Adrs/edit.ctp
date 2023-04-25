<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr $adr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adr->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adr->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Original Adrs'), ['controller' => 'OriginalAdrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Original Adr'), ['controller' => 'OriginalAdrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Initial Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Initial Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['controller' => 'AdrLabTests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['controller' => 'AdrLabTests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['controller' => 'AdrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['controller' => 'AdrListOfDrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['controller' => 'AdrOtherDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['controller' => 'AdrOtherDrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Refids'), ['controller' => 'Refids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Refid'), ['controller' => 'Refids', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adr Followups'), ['controller' => 'AdrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr Followup'), ['controller' => 'AdrFollowups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrs form large-9 medium-8 columns content">
    <?= $this->Form->create($adr) ?>
    <fieldset>
        <legend><?= __('Edit Adr') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('adr_id', ['options' => $originalAdrs, 'empty' => true]);
            echo $this->Form->control('initial_id', ['options' => $initialAdrs, 'empty' => true]);
            echo $this->Form->control('messageid');
            echo $this->Form->control('reference_number');
            echo $this->Form->control('assigned_to');
            echo $this->Form->control('assigned_by');
            echo $this->Form->control('assigned_date', ['empty' => true]);
            echo $this->Form->control('mrcz_protocol_number');
            echo $this->Form->control('mcaz_protocol_number');
            echo $this->Form->control('principal_investigator');
            echo $this->Form->control('reporter_name');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('designation_study');
            echo $this->Form->control('reporter_phone');
            echo $this->Form->control('name_of_institution');
            echo $this->Form->control('institution_code');
            echo $this->Form->control('study_title');
            echo $this->Form->control('study_sponsor');
            echo $this->Form->control('date_of_adverse_event', ['empty' => true]);
            echo $this->Form->control('participant_number');
            echo $this->Form->control('report_type');
            echo $this->Form->control('date_of_site_awareness', ['empty' => true]);
            echo $this->Form->control('date_of_birth');
            echo $this->Form->control('age');
            echo $this->Form->control('gender');
            echo $this->Form->control('study_week');
            echo $this->Form->control('visit_number');
            echo $this->Form->control('adverse_event_type');
            echo $this->Form->control('sae_type');
            echo $this->Form->control('sae_description');
            echo $this->Form->control('toxicity_grade');
            echo $this->Form->control('previous_events');
            echo $this->Form->control('previous_events_number');
            echo $this->Form->control('total_saes');
            echo $this->Form->control('location_event');
            echo $this->Form->control('location_event_specify');
            echo $this->Form->control('research_involves');
            echo $this->Form->control('research_involves_specify');
            echo $this->Form->control('name_of_drug');
            echo $this->Form->control('drug_investigational');
            echo $this->Form->control('patient_other_drug');
            echo $this->Form->control('report_to_mcaz');
            echo $this->Form->control('report_to_mcaz_date', ['empty' => true]);
            echo $this->Form->control('report_to_mrcz');
            echo $this->Form->control('report_to_mrcz_date', ['empty' => true]);
            echo $this->Form->control('report_to_sponsor');
            echo $this->Form->control('report_to_sponsor_date', ['empty' => true]);
            echo $this->Form->control('report_to_irb');
            echo $this->Form->control('report_to_irb_date', ['empty' => true]);
            echo $this->Form->control('medical_history');
            echo $this->Form->control('diagnosis');
            echo $this->Form->control('immediate_cause');
            echo $this->Form->control('symptoms');
            echo $this->Form->control('investigations');
            echo $this->Form->control('results');
            echo $this->Form->control('management');
            echo $this->Form->control('outcome');
            echo $this->Form->control('d1_consent_form');
            echo $this->Form->control('d2_brochure');
            echo $this->Form->control('d3_changes_sae');
            echo $this->Form->control('d4_consent_sae');
            echo $this->Form->control('changes_explain');
            echo $this->Form->control('assess_risk');
            echo $this->Form->control('in_utero');
            echo $this->Form->control('submitted');
            echo $this->Form->control('resubmit');
            echo $this->Form->control('submitted_date', ['empty' => true]);
            echo $this->Form->control('status');
            echo $this->Form->control('active');
            echo $this->Form->control('emails');
            echo $this->Form->control('signature');
            echo $this->Form->control('action_date', ['empty' => true]);
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('copied');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
