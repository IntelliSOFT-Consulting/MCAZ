<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aefi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Original Aefis'), ['controller' => 'OriginalAefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Original Aefi'), ['controller' => 'OriginalAefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Initial Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Initial Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['controller' => 'AefiListOfVaccines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['controller' => 'AefiListOfVaccines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi List Of Diluents'), ['controller' => 'AefiListOfDiluents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi List Of Diluent'), ['controller' => 'AefiListOfDiluents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['controller' => 'AefiCausalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['controller' => 'AefiCausalities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
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
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi Followups'), ['controller' => 'AefiFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi Followup'), ['controller' => 'AefiFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi Reactions'), ['controller' => 'AefiReactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi Reaction'), ['controller' => 'AefiReactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefis form large-9 medium-8 columns content">
    <?= $this->Form->create($aefi) ?>
    <fieldset>
        <legend><?= __('Edit Aefi') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('aefi_id', ['options' => $originalAefis, 'empty' => true]);
            echo $this->Form->control('initial_id', ['options' => $initialAefis, 'empty' => true]);
            echo $this->Form->control('messageid');
            echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
            echo $this->Form->control('reference_number');
            echo $this->Form->control('assigned_to');
            echo $this->Form->control('assigned_by');
            echo $this->Form->control('assigned_date', ['empty' => true]);
            echo $this->Form->control('patient_name');
            echo $this->Form->control('patient_surname');
            echo $this->Form->control('patient_next_of_kin');
            echo $this->Form->control('patient_address');
            echo $this->Form->control('patient_telephone');
            echo $this->Form->control('report_type');
            echo $this->Form->control('gender');
            echo $this->Form->control('female_status');
            echo $this->Form->control('date_of_birth');
            echo $this->Form->control('age_at_onset');
            echo $this->Form->control('age_at_onset_years');
            echo $this->Form->control('age_at_onset_months');
            echo $this->Form->control('age_at_onset_days');
            echo $this->Form->control('age_at_onset_specify');
            echo $this->Form->control('age_group');
            echo $this->Form->control('reporter_name');
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('reporter_department');
            echo $this->Form->control('reporter_address');
            echo $this->Form->control('reporter_institution');
            echo $this->Form->control('reporter_district');
            echo $this->Form->control('reporter_province');
            echo $this->Form->control('reporter_phone');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('name_of_vaccination_center');
            echo $this->Form->control('adverse_events');
            echo $this->Form->control('ae_severe_local_reaction');
            echo $this->Form->control('ae_seizures');
            echo $this->Form->control('ae_abscess');
            echo $this->Form->control('ae_sepsis');
            echo $this->Form->control('ae_encephalopathy');
            echo $this->Form->control('ae_toxic_shock');
            echo $this->Form->control('ae_thrombocytopenia');
            echo $this->Form->control('ae_anaphylaxis');
            echo $this->Form->control('ae_fever');
            echo $this->Form->control('ae_3days');
            echo $this->Form->control('ae_febrile');
            echo $this->Form->control('ae_beyond_joint');
            echo $this->Form->control('ae_afebrile');
            echo $this->Form->control('ae_other');
            echo $this->Form->control('adverse_events_specify');
            echo $this->Form->control('aefi_date', ['empty' => true]);
            echo $this->Form->control('patient_hospitalization');
            echo $this->Form->control('notification_date', ['empty' => true]);
            echo $this->Form->control('description_of_reaction');
            echo $this->Form->control('treatment_provided');
            echo $this->Form->control('serious');
            echo $this->Form->control('serious_yes');
            echo $this->Form->control('outcome');
            echo $this->Form->control('other_reason');
            echo $this->Form->control('died_date', ['empty' => true]);
            echo $this->Form->control('autopsy');
            echo $this->Form->control('past_medical_history');
            echo $this->Form->control('district_receive_date', ['empty' => true]);
            echo $this->Form->control('investigation_needed');
            echo $this->Form->control('investigation_date', ['empty' => true]);
            echo $this->Form->control('national_receive_date', ['empty' => true]);
            echo $this->Form->control('comments');
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
            echo $this->Form->control('user_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
