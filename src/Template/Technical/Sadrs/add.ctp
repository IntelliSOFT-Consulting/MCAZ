<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Original Sadrs'), ['controller' => 'OriginalSadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Original Sadr'), ['controller' => 'OriginalSadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Initial Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Initial Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Refids'), ['controller' => 'Refids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Refid'), ['controller' => 'Refids', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Other Drugs'), ['controller' => 'SadrOtherDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Other Drug'), ['controller' => 'SadrOtherDrugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reactions'), ['controller' => 'Reactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reaction'), ['controller' => 'Reactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrs form large-9 medium-8 columns content">
    <?= $this->Form->create($sadr) ?>
    <fieldset>
        <legend><?= __('Add Sadr') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('sadr_id', ['options' => $originalSadrs, 'empty' => true]);
            echo $this->Form->control('initial_id', ['options' => $initialSadrs, 'empty' => true]);
            echo $this->Form->control('messageid');
            echo $this->Form->control('assigned_to');
            echo $this->Form->control('assigned_by');
            echo $this->Form->control('assigned_date', ['empty' => true]);
            echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
            echo $this->Form->control('reference_number');
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('report_type');
            echo $this->Form->control('name_of_institution');
            echo $this->Form->control('institution_code');
            echo $this->Form->control('institution_name');
            echo $this->Form->control('institution_address');
            echo $this->Form->control('patient_name');
            echo $this->Form->control('ip_no');
            echo $this->Form->control('date_of_birth');
            echo $this->Form->control('year_of_birth');
            echo $this->Form->control('month_of_birth');
            echo $this->Form->control('day_of_birth');
            echo $this->Form->control('age_group');
            echo $this->Form->control('in_utero');
            echo $this->Form->control('gender');
            echo $this->Form->control('weight');
            echo $this->Form->control('height');
            echo $this->Form->control('date_of_onset_of_reaction');
            echo $this->Form->control('date_of_end_of_reaction');
            echo $this->Form->control('duration_type');
            echo $this->Form->control('duration');
            echo $this->Form->control('description_of_reaction');
            echo $this->Form->control('severity');
            echo $this->Form->control('severity_reason');
            echo $this->Form->control('medical_history');
            echo $this->Form->control('past_drug_therapy');
            echo $this->Form->control('outcome');
            echo $this->Form->control('lab_test_results');
            echo $this->Form->control('any_other_information');
            echo $this->Form->control('reporter_name');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('reporter_phone');
            echo $this->Form->control('submitted');
            echo $this->Form->control('resubmit');
            echo $this->Form->control('submitted_date', ['empty' => true]);
            echo $this->Form->control('action_taken');
            echo $this->Form->control('relatedness');
            echo $this->Form->control('status');
            echo $this->Form->control('signature');
            echo $this->Form->control('emails');
            echo $this->Form->control('active');
            echo $this->Form->control('device');
            echo $this->Form->control('notified');
            echo $this->Form->control('action_date', ['empty' => true]);
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('copied');
            echo $this->Form->control('user_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
