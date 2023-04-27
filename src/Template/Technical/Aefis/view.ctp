<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi'), ['action' => 'edit', $aefi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi'), ['action' => 'delete', $aefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Original Aefis'), ['controller' => 'OriginalAefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Original Aefi'), ['controller' => 'OriginalAefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Initial Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Initial Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['controller' => 'AefiListOfVaccines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['controller' => 'AefiListOfVaccines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi List Of Diluents'), ['controller' => 'AefiListOfDiluents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi List Of Diluent'), ['controller' => 'AefiListOfDiluents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['controller' => 'AefiCausalities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['controller' => 'AefiCausalities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Refids'), ['controller' => 'Refids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refid'), ['controller' => 'Refids', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Committees'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Evaluators'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Evaluator'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Followups'), ['controller' => 'AefiFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Followup'), ['controller' => 'AefiFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Reactions'), ['controller' => 'AefiReactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Reaction'), ['controller' => 'AefiReactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefis view large-9 medium-8 columns content">
    <h3><?= h($aefi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $aefi->has('user') ? $this->Html->link($aefi->user->name, ['controller' => 'Users', 'action' => 'view', $aefi->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Original Aefi') ?></th>
            <td><?= $aefi->has('original_aefi') ? $this->Html->link($aefi->original_aefi->id, ['controller' => 'OriginalAefis', 'action' => 'view', $aefi->original_aefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Aefi') ?></th>
            <td><?= $aefi->has('initial_aefi') ? $this->Html->link($aefi->initial_aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefi->initial_aefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Messageid') ?></th>
            <td><?= h($aefi->messageid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $aefi->has('province') ? $this->Html->link($aefi->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $aefi->province->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($aefi->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Name') ?></th>
            <td><?= h($aefi->patient_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Surname') ?></th>
            <td><?= h($aefi->patient_surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Next Of Kin') ?></th>
            <td><?= h($aefi->patient_next_of_kin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Address') ?></th>
            <td><?= h($aefi->patient_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Telephone') ?></th>
            <td><?= h($aefi->patient_telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($aefi->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($aefi->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Female Status') ?></th>
            <td><?= h($aefi->female_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($aefi->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset') ?></th>
            <td><?= h($aefi->age_at_onset) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($aefi->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($aefi->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $aefi->has('designation') ? $this->Html->link($aefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $aefi->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Department') ?></th>
            <td><?= h($aefi->reporter_department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Address') ?></th>
            <td><?= h($aefi->reporter_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Institution') ?></th>
            <td><?= h($aefi->reporter_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter District') ?></th>
            <td><?= h($aefi->reporter_district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Province') ?></th>
            <td><?= h($aefi->reporter_province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($aefi->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($aefi->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Vaccination Center') ?></th>
            <td><?= h($aefi->name_of_vaccination_center) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adverse Events') ?></th>
            <td><?= h($aefi->adverse_events) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Hospitalization') ?></th>
            <td><?= h($aefi->patient_hospitalization) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatment Provided') ?></th>
            <td><?= h($aefi->treatment_provided) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serious') ?></th>
            <td><?= h($aefi->serious) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serious Yes') ?></th>
            <td><?= h($aefi->serious_yes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outcome') ?></th>
            <td><?= h($aefi->outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autopsy') ?></th>
            <td><?= h($aefi->autopsy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigation Needed') ?></th>
            <td><?= h($aefi->investigation_needed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resubmit') ?></th>
            <td><?= h($aefi->resubmit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($aefi->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copied') ?></th>
            <td><?= h($aefi->copied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Description') ?></th>
            <td><?= h($aefi->user_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefi->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned To') ?></th>
            <td><?= $this->Number->format($aefi->assigned_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned By') ?></th>
            <td><?= $this->Number->format($aefi->assigned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Years') ?></th>
            <td><?= $this->Number->format($aefi->age_at_onset_years) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Months') ?></th>
            <td><?= $this->Number->format($aefi->age_at_onset_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Days') ?></th>
            <td><?= $this->Number->format($aefi->age_at_onset_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Specify') ?></th>
            <td><?= $this->Number->format($aefi->age_at_onset_specify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Severe Local Reaction') ?></th>
            <td><?= $this->Number->format($aefi->ae_severe_local_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Seizures') ?></th>
            <td><?= $this->Number->format($aefi->ae_seizures) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Abscess') ?></th>
            <td><?= $this->Number->format($aefi->ae_abscess) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Sepsis') ?></th>
            <td><?= $this->Number->format($aefi->ae_sepsis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Encephalopathy') ?></th>
            <td><?= $this->Number->format($aefi->ae_encephalopathy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Toxic Shock') ?></th>
            <td><?= $this->Number->format($aefi->ae_toxic_shock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Thrombocytopenia') ?></th>
            <td><?= $this->Number->format($aefi->ae_thrombocytopenia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Anaphylaxis') ?></th>
            <td><?= $this->Number->format($aefi->ae_anaphylaxis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Fever') ?></th>
            <td><?= $this->Number->format($aefi->ae_fever) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae 3days') ?></th>
            <td><?= $this->Number->format($aefi->ae_3days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Febrile') ?></th>
            <td><?= $this->Number->format($aefi->ae_febrile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Beyond Joint') ?></th>
            <td><?= $this->Number->format($aefi->ae_beyond_joint) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Afebrile') ?></th>
            <td><?= $this->Number->format($aefi->ae_afebrile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ae Other') ?></th>
            <td><?= $this->Number->format($aefi->ae_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($aefi->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($aefi->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($aefi->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned Date') ?></th>
            <td><?= h($aefi->assigned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Date') ?></th>
            <td><?= h($aefi->aefi_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notification Date') ?></th>
            <td><?= h($aefi->notification_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Died Date') ?></th>
            <td><?= h($aefi->died_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District Receive Date') ?></th>
            <td><?= h($aefi->district_receive_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigation Date') ?></th>
            <td><?= h($aefi->investigation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('National Receive Date') ?></th>
            <td><?= h($aefi->national_receive_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted Date') ?></th>
            <td><?= h($aefi->submitted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefi->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefi->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Date') ?></th>
            <td><?= h($aefi->action_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($aefi->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $aefi->signature ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Adverse Events Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->adverse_events_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description Of Reaction') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->description_of_reaction)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->other_reason)); ?>
    </div>
    <div class="row">
        <h4><?= __('Past Medical History') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->past_medical_history)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->comments)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi List Of Vaccines') ?></h4>
        <?php if (!empty($aefi->aefi_list_of_vaccines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Vaccine Name') ?></th>
                <th scope="col"><?= __('Manufacturer') ?></th>
                <th scope="col"><?= __('Vaccination Date') ?></th>
                <th scope="col"><?= __('Vaccination Time') ?></th>
                <th scope="col"><?= __('Dosage') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Diluent Batch Number') ?></th>
                <th scope="col"><?= __('Diluent Date') ?></th>
                <th scope="col"><?= __('Diluent Expiry Date') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_list_of_vaccines as $aefiListOfVaccines): ?>
            <tr>
                <td><?= h($aefiListOfVaccines->id) ?></td>
                <td><?= h($aefiListOfVaccines->aefi_id) ?></td>
                <td><?= h($aefiListOfVaccines->saefi_id) ?></td>
                <td><?= h($aefiListOfVaccines->vaccine_name) ?></td>
                <td><?= h($aefiListOfVaccines->manufacturer) ?></td>
                <td><?= h($aefiListOfVaccines->vaccination_date) ?></td>
                <td><?= h($aefiListOfVaccines->vaccination_time) ?></td>
                <td><?= h($aefiListOfVaccines->dosage) ?></td>
                <td><?= h($aefiListOfVaccines->batch_number) ?></td>
                <td><?= h($aefiListOfVaccines->expiry_date) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_batch_number) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_date) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_expiry_date) ?></td>
                <td><?= h($aefiListOfVaccines->suspected_drug) ?></td>
                <td><?= h($aefiListOfVaccines->created) ?></td>
                <td><?= h($aefiListOfVaccines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiListOfVaccines', 'action' => 'view', $aefiListOfVaccines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiListOfVaccines', 'action' => 'edit', $aefiListOfVaccines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiListOfVaccines', 'action' => 'delete', $aefiListOfVaccines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfVaccines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi List Of Diluents') ?></h4>
        <?php if (!empty($aefi->aefi_list_of_diluents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Diluent Name') ?></th>
                <th scope="col"><?= __('Diluent Date') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_list_of_diluents as $aefiListOfDiluents): ?>
            <tr>
                <td><?= h($aefiListOfDiluents->id) ?></td>
                <td><?= h($aefiListOfDiluents->aefi_id) ?></td>
                <td><?= h($aefiListOfDiluents->diluent_name) ?></td>
                <td><?= h($aefiListOfDiluents->diluent_date) ?></td>
                <td><?= h($aefiListOfDiluents->batch_number) ?></td>
                <td><?= h($aefiListOfDiluents->expiry_date) ?></td>
                <td><?= h($aefiListOfDiluents->created) ?></td>
                <td><?= h($aefiListOfDiluents->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiListOfDiluents', 'action' => 'view', $aefiListOfDiluents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiListOfDiluents', 'action' => 'edit', $aefiListOfDiluents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiListOfDiluents', 'action' => 'delete', $aefiListOfDiluents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfDiluents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi Causalities') ?></h4>
        <?php if (!empty($aefi->aefi_causalities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Diagnosis Meet') ?></th>
                <th scope="col"><?= __('Valid Diagnosis') ?></th>
                <th scope="col"><?= __('Primary Vaccine') ?></th>
                <th scope="col"><?= __('Causality Question') ?></th>
                <th scope="col"><?= __('Case Eligibility') ?></th>
                <th scope="col"><?= __('Causality Notes') ?></th>
                <th scope="col"><?= __('Clinical Examination') ?></th>
                <th scope="col"><?= __('Clinical Examination Specify') ?></th>
                <th scope="col"><?= __('Evidence Literature Specify') ?></th>
                <th scope="col"><?= __('Evidence Literature') ?></th>
                <th scope="col"><?= __('Causal Role') ?></th>
                <th scope="col"><?= __('Causal Role Specify') ?></th>
                <th scope="col"><?= __('Vaccine Quality') ?></th>
                <th scope="col"><?= __('Vaccine Quality Specify') ?></th>
                <th scope="col"><?= __('Prescribing Error') ?></th>
                <th scope="col"><?= __('Prescribing Error Specify') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile Specify') ?></th>
                <th scope="col"><?= __('Vaccine Condition') ?></th>
                <th scope="col"><?= __('Vaccine Condition Specify') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution Specify') ?></th>
                <th scope="col"><?= __('Vaccine Handling') ?></th>
                <th scope="col"><?= __('Vaccine Handling Specify') ?></th>
                <th scope="col"><?= __('Vaccine Administered') ?></th>
                <th scope="col"><?= __('Vaccine Administered Specify') ?></th>
                <th scope="col"><?= __('Vaccine Anxiety') ?></th>
                <th scope="col"><?= __('Vaccine Anxiety Specify') ?></th>
                <th scope="col"><?= __('Time Window') ?></th>
                <th scope="col"><?= __('Time Window Specify') ?></th>
                <th scope="col"><?= __('Causal Association') ?></th>
                <th scope="col"><?= __('Causal Association Specify') ?></th>
                <th scope="col"><?= __('Independent Vaccination') ?></th>
                <th scope="col"><?= __('Independent Vaccination Specify') ?></th>
                <th scope="col"><?= __('Manifest Health') ?></th>
                <th scope="col"><?= __('Manifest Health Specify') ?></th>
                <th scope="col"><?= __('Comparable Event') ?></th>
                <th scope="col"><?= __('Comparable Event Specify') ?></th>
                <th scope="col"><?= __('Exposure Risk') ?></th>
                <th scope="col"><?= __('Exposure Risk Specify') ?></th>
                <th scope="col"><?= __('Acute Illness') ?></th>
                <th scope="col"><?= __('Acute Illness Specify') ?></th>
                <th scope="col"><?= __('Occur Past') ?></th>
                <th scope="col"><?= __('Occur Past Specify') ?></th>
                <th scope="col"><?= __('Taking Medication') ?></th>
                <th scope="col"><?= __('Taking Medication Specify') ?></th>
                <th scope="col"><?= __('Biological Plausibility') ?></th>
                <th scope="col"><?= __('Biological Plausibility Specify') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Conclude') ?></th>
                <th scope="col"><?= __('Conclude Reason') ?></th>
                <th scope="col"><?= __('Conclude Inability') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_causalities as $aefiCausalities): ?>
            <tr>
                <td><?= h($aefiCausalities->id) ?></td>
                <td><?= h($aefiCausalities->user_id) ?></td>
                <td><?= h($aefiCausalities->aefi_id) ?></td>
                <td><?= h($aefiCausalities->saefi_id) ?></td>
                <td><?= h($aefiCausalities->diagnosis_meet) ?></td>
                <td><?= h($aefiCausalities->valid_diagnosis) ?></td>
                <td><?= h($aefiCausalities->primary_vaccine) ?></td>
                <td><?= h($aefiCausalities->causality_question) ?></td>
                <td><?= h($aefiCausalities->case_eligibility) ?></td>
                <td><?= h($aefiCausalities->causality_notes) ?></td>
                <td><?= h($aefiCausalities->clinical_examination) ?></td>
                <td><?= h($aefiCausalities->clinical_examination_specify) ?></td>
                <td><?= h($aefiCausalities->evidence_literature_specify) ?></td>
                <td><?= h($aefiCausalities->evidence_literature) ?></td>
                <td><?= h($aefiCausalities->causal_role) ?></td>
                <td><?= h($aefiCausalities->causal_role_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_quality) ?></td>
                <td><?= h($aefiCausalities->vaccine_quality_specify) ?></td>
                <td><?= h($aefiCausalities->prescribing_error) ?></td>
                <td><?= h($aefiCausalities->prescribing_error_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_unsterile) ?></td>
                <td><?= h($aefiCausalities->vaccine_unsterile_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_condition) ?></td>
                <td><?= h($aefiCausalities->vaccine_condition_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_reconstitution) ?></td>
                <td><?= h($aefiCausalities->vaccine_reconstitution_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_handling) ?></td>
                <td><?= h($aefiCausalities->vaccine_handling_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_administered) ?></td>
                <td><?= h($aefiCausalities->vaccine_administered_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_anxiety) ?></td>
                <td><?= h($aefiCausalities->vaccine_anxiety_specify) ?></td>
                <td><?= h($aefiCausalities->time_window) ?></td>
                <td><?= h($aefiCausalities->time_window_specify) ?></td>
                <td><?= h($aefiCausalities->causal_association) ?></td>
                <td><?= h($aefiCausalities->causal_association_specify) ?></td>
                <td><?= h($aefiCausalities->independent_vaccination) ?></td>
                <td><?= h($aefiCausalities->independent_vaccination_specify) ?></td>
                <td><?= h($aefiCausalities->manifest_health) ?></td>
                <td><?= h($aefiCausalities->manifest_health_specify) ?></td>
                <td><?= h($aefiCausalities->comparable_event) ?></td>
                <td><?= h($aefiCausalities->comparable_event_specify) ?></td>
                <td><?= h($aefiCausalities->exposure_risk) ?></td>
                <td><?= h($aefiCausalities->exposure_risk_specify) ?></td>
                <td><?= h($aefiCausalities->acute_illness) ?></td>
                <td><?= h($aefiCausalities->acute_illness_specify) ?></td>
                <td><?= h($aefiCausalities->occur_past) ?></td>
                <td><?= h($aefiCausalities->occur_past_specify) ?></td>
                <td><?= h($aefiCausalities->taking_medication) ?></td>
                <td><?= h($aefiCausalities->taking_medication_specify) ?></td>
                <td><?= h($aefiCausalities->biological_plausibility) ?></td>
                <td><?= h($aefiCausalities->biological_plausibility_specify) ?></td>
                <td><?= h($aefiCausalities->inconsistent) ?></td>
                <td><?= h($aefiCausalities->consistent_i) ?></td>
                <td><?= h($aefiCausalities->consistent_iii) ?></td>
                <td><?= h($aefiCausalities->consistent_ii) ?></td>
                <td><?= h($aefiCausalities->consistent_iv) ?></td>
                <td><?= h($aefiCausalities->indeterminate_i) ?></td>
                <td><?= h($aefiCausalities->indeterminate_ii) ?></td>
                <td><?= h($aefiCausalities->unclassifiable) ?></td>
                <td><?= h($aefiCausalities->unclassifiable_specify) ?></td>
                <td><?= h($aefiCausalities->conclude) ?></td>
                <td><?= h($aefiCausalities->conclude_reason) ?></td>
                <td><?= h($aefiCausalities->conclude_inability) ?></td>
                <td><?= h($aefiCausalities->signature) ?></td>
                <td><?= h($aefiCausalities->chosen) ?></td>
                <td><?= h($aefiCausalities->reviewed_by) ?></td>
                <td><?= h($aefiCausalities->deleted) ?></td>
                <td><?= h($aefiCausalities->created) ?></td>
                <td><?= h($aefiCausalities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiCausalities', 'action' => 'view', $aefiCausalities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiCausalities', 'action' => 'edit', $aefiCausalities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiCausalities', 'action' => 'delete', $aefiCausalities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiCausalities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($aefi->aefi_comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Model Id') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Sender') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_comments as $aefiComments): ?>
            <tr>
                <td><?= h($aefiComments->id) ?></td>
                <td><?= h($aefiComments->foreign_key) ?></td>
                <td><?= h($aefiComments->user_id) ?></td>
                <td><?= h($aefiComments->model_id) ?></td>
                <td><?= h($aefiComments->model) ?></td>
                <td><?= h($aefiComments->category) ?></td>
                <td><?= h($aefiComments->sender) ?></td>
                <td><?= h($aefiComments->subject) ?></td>
                <td><?= h($aefiComments->content) ?></td>
                <td><?= h($aefiComments->deleted) ?></td>
                <td><?= h($aefiComments->created) ?></td>
                <td><?= h($aefiComments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $aefiComments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $aefiComments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $aefiComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiComments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Report Stages') ?></h4>
        <?php if (!empty($aefi->report_stages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Stage') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Stage Date') ?></th>
                <th scope="col"><?= __('Alt Date') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->report_stages as $reportStages): ?>
            <tr>
                <td><?= h($reportStages->id) ?></td>
                <td><?= h($reportStages->foreign_key) ?></td>
                <td><?= h($reportStages->model) ?></td>
                <td><?= h($reportStages->stage) ?></td>
                <td><?= h($reportStages->description) ?></td>
                <td><?= h($reportStages->stage_date) ?></td>
                <td><?= h($reportStages->alt_date) ?></td>
                <td><?= h($reportStages->deleted) ?></td>
                <td><?= h($reportStages->created) ?></td>
                <td><?= h($reportStages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ReportStages', 'action' => 'view', $reportStages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReportStages', 'action' => 'edit', $reportStages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReportStages', 'action' => 'delete', $reportStages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportStages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($aefi->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->attachments as $attachments): ?>
            <tr>
                <td><?= h($attachments->id) ?></td>
                <td><?= h($attachments->foreign_key) ?></td>
                <td><?= h($attachments->file) ?></td>
                <td><?= h($attachments->dir) ?></td>
                <td><?= h($attachments->size) ?></td>
                <td><?= h($attachments->type) ?></td>
                <td><?= h($attachments->model) ?></td>
                <td><?= h($attachments->category) ?></td>
                <td><?= h($attachments->description) ?></td>
                <td><?= h($attachments->created) ?></td>
                <td><?= h($attachments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Uploads') ?></h4>
        <?php if (!empty($aefi->uploads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->uploads as $uploads): ?>
            <tr>
                <td><?= h($uploads->id) ?></td>
                <td><?= h($uploads->foreign_key) ?></td>
                <td><?= h($uploads->file) ?></td>
                <td><?= h($uploads->dir) ?></td>
                <td><?= h($uploads->size) ?></td>
                <td><?= h($uploads->type) ?></td>
                <td><?= h($uploads->model) ?></td>
                <td><?= h($uploads->category) ?></td>
                <td><?= h($uploads->description) ?></td>
                <td><?= h($uploads->created) ?></td>
                <td><?= h($uploads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Uploads', 'action' => 'view', $uploads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Uploads', 'action' => 'edit', $uploads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Uploads', 'action' => 'delete', $uploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reminders') ?></h4>
        <?php if (!empty($aefi->reminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reminder Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->reminders as $reminders): ?>
            <tr>
                <td><?= h($reminders->id) ?></td>
                <td><?= h($reminders->foreign_key) ?></td>
                <td><?= h($reminders->model) ?></td>
                <td><?= h($reminders->user_id) ?></td>
                <td><?= h($reminders->reminder_type) ?></td>
                <td><?= h($reminders->created) ?></td>
                <td><?= h($reminders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reminders', 'action' => 'view', $reminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reminders', 'action' => 'edit', $reminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reminders', 'action' => 'delete', $reminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refids') ?></h4>
        <?php if (!empty($aefi->refids)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Refid') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->refids as $refids): ?>
            <tr>
                <td><?= h($refids->id) ?></td>
                <td><?= h($refids->foreign_key) ?></td>
                <td><?= h($refids->model) ?></td>
                <td><?= h($refids->refid) ?></td>
                <td><?= h($refids->year) ?></td>
                <td><?= h($refids->created) ?></td>
                <td><?= h($refids->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Refids', 'action' => 'view', $refids->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Refids', 'action' => 'edit', $refids->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Refids', 'action' => 'delete', $refids->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refids->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($aefi->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Literature Review') ?></th>
                <th scope="col"><?= __('References Text') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Clinical Findings') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Outcome Date') ?></th>
                <th scope="col"><?= __('Causality Decision') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->foreign_key) ?></td>
                <td><?= h($reviews->category) ?></td>
                <td><?= h($reviews->model) ?></td>
                <td><?= h($reviews->comments) ?></td>
                <td><?= h($reviews->literature_review) ?></td>
                <td><?= h($reviews->references_text) ?></td>
                <td><?= h($reviews->drug_name) ?></td>
                <td><?= h($reviews->reaction_name) ?></td>
                <td><?= h($reviews->medical_history) ?></td>
                <td><?= h($reviews->clinical_findings) ?></td>
                <td><?= h($reviews->file) ?></td>
                <td><?= h($reviews->dir) ?></td>
                <td><?= h($reviews->size) ?></td>
                <td><?= h($reviews->type) ?></td>
                <td><?= h($reviews->outcome_date) ?></td>
                <td><?= h($reviews->causality_decision) ?></td>
                <td><?= h($reviews->status) ?></td>
                <td><?= h($reviews->inconsistent) ?></td>
                <td><?= h($reviews->consistent_i) ?></td>
                <td><?= h($reviews->consistent_iii) ?></td>
                <td><?= h($reviews->consistent_ii) ?></td>
                <td><?= h($reviews->consistent_iv) ?></td>
                <td><?= h($reviews->indeterminate_i) ?></td>
                <td><?= h($reviews->indeterminate_ii) ?></td>
                <td><?= h($reviews->unclassifiable) ?></td>
                <td><?= h($reviews->unclassifiable_specify) ?></td>
                <td><?= h($reviews->signature) ?></td>
                <td><?= h($reviews->chosen) ?></td>
                <td><?= h($reviews->reviewed_by) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td><?= h($reviews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($aefi->committees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Literature Review') ?></th>
                <th scope="col"><?= __('References Text') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Clinical Findings') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Outcome Date') ?></th>
                <th scope="col"><?= __('Causality Decision') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->committees as $committees): ?>
            <tr>
                <td><?= h($committees->id) ?></td>
                <td><?= h($committees->user_id) ?></td>
                <td><?= h($committees->foreign_key) ?></td>
                <td><?= h($committees->category) ?></td>
                <td><?= h($committees->model) ?></td>
                <td><?= h($committees->comments) ?></td>
                <td><?= h($committees->literature_review) ?></td>
                <td><?= h($committees->references_text) ?></td>
                <td><?= h($committees->drug_name) ?></td>
                <td><?= h($committees->reaction_name) ?></td>
                <td><?= h($committees->medical_history) ?></td>
                <td><?= h($committees->clinical_findings) ?></td>
                <td><?= h($committees->file) ?></td>
                <td><?= h($committees->dir) ?></td>
                <td><?= h($committees->size) ?></td>
                <td><?= h($committees->type) ?></td>
                <td><?= h($committees->outcome_date) ?></td>
                <td><?= h($committees->causality_decision) ?></td>
                <td><?= h($committees->status) ?></td>
                <td><?= h($committees->inconsistent) ?></td>
                <td><?= h($committees->consistent_i) ?></td>
                <td><?= h($committees->consistent_iii) ?></td>
                <td><?= h($committees->consistent_ii) ?></td>
                <td><?= h($committees->consistent_iv) ?></td>
                <td><?= h($committees->indeterminate_i) ?></td>
                <td><?= h($committees->indeterminate_ii) ?></td>
                <td><?= h($committees->unclassifiable) ?></td>
                <td><?= h($committees->unclassifiable_specify) ?></td>
                <td><?= h($committees->signature) ?></td>
                <td><?= h($committees->chosen) ?></td>
                <td><?= h($committees->reviewed_by) ?></td>
                <td><?= h($committees->created) ?></td>
                <td><?= h($committees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $committees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $committees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $committees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $committees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($aefi->request_reporters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('System Message') ?></th>
                <th scope="col"><?= __('User Message') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->request_reporters as $requestReporters): ?>
            <tr>
                <td><?= h($requestReporters->id) ?></td>
                <td><?= h($requestReporters->user_id) ?></td>
                <td><?= h($requestReporters->sender_id) ?></td>
                <td><?= h($requestReporters->type) ?></td>
                <td><?= h($requestReporters->model) ?></td>
                <td><?= h($requestReporters->foreign_key) ?></td>
                <td><?= h($requestReporters->title) ?></td>
                <td><?= h($requestReporters->url) ?></td>
                <td><?= h($requestReporters->system_message) ?></td>
                <td><?= h($requestReporters->user_message) ?></td>
                <td><?= h($requestReporters->deleted) ?></td>
                <td><?= h($requestReporters->created) ?></td>
                <td><?= h($requestReporters->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $requestReporters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $requestReporters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $requestReporters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestReporters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($aefi->request_evaluators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('System Message') ?></th>
                <th scope="col"><?= __('User Message') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->request_evaluators as $requestEvaluators): ?>
            <tr>
                <td><?= h($requestEvaluators->id) ?></td>
                <td><?= h($requestEvaluators->user_id) ?></td>
                <td><?= h($requestEvaluators->sender_id) ?></td>
                <td><?= h($requestEvaluators->type) ?></td>
                <td><?= h($requestEvaluators->model) ?></td>
                <td><?= h($requestEvaluators->foreign_key) ?></td>
                <td><?= h($requestEvaluators->title) ?></td>
                <td><?= h($requestEvaluators->url) ?></td>
                <td><?= h($requestEvaluators->system_message) ?></td>
                <td><?= h($requestEvaluators->user_message) ?></td>
                <td><?= h($requestEvaluators->deleted) ?></td>
                <td><?= h($requestEvaluators->created) ?></td>
                <td><?= h($requestEvaluators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $requestEvaluators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $requestEvaluators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $requestEvaluators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestEvaluators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi Followups') ?></h4>
        <?php if (!empty($aefi->aefi_followups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Initial Id') ?></th>
                <th scope="col"><?= __('Messageid') ?></th>
                <th scope="col"><?= __('Province Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Assigned To') ?></th>
                <th scope="col"><?= __('Assigned By') ?></th>
                <th scope="col"><?= __('Assigned Date') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Patient Surname') ?></th>
                <th scope="col"><?= __('Patient Next Of Kin') ?></th>
                <th scope="col"><?= __('Patient Address') ?></th>
                <th scope="col"><?= __('Patient Telephone') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Female Status') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Age At Onset') ?></th>
                <th scope="col"><?= __('Age At Onset Years') ?></th>
                <th scope="col"><?= __('Age At Onset Months') ?></th>
                <th scope="col"><?= __('Age At Onset Days') ?></th>
                <th scope="col"><?= __('Age At Onset Specify') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Reporter Department') ?></th>
                <th scope="col"><?= __('Reporter Address') ?></th>
                <th scope="col"><?= __('Reporter Institution') ?></th>
                <th scope="col"><?= __('Reporter District') ?></th>
                <th scope="col"><?= __('Reporter Province') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Name Of Vaccination Center') ?></th>
                <th scope="col"><?= __('Adverse Events') ?></th>
                <th scope="col"><?= __('Ae Severe Local Reaction') ?></th>
                <th scope="col"><?= __('Ae Seizures') ?></th>
                <th scope="col"><?= __('Ae Abscess') ?></th>
                <th scope="col"><?= __('Ae Sepsis') ?></th>
                <th scope="col"><?= __('Ae Encephalopathy') ?></th>
                <th scope="col"><?= __('Ae Toxic Shock') ?></th>
                <th scope="col"><?= __('Ae Thrombocytopenia') ?></th>
                <th scope="col"><?= __('Ae Anaphylaxis') ?></th>
                <th scope="col"><?= __('Ae Fever') ?></th>
                <th scope="col"><?= __('Ae 3days') ?></th>
                <th scope="col"><?= __('Ae Febrile') ?></th>
                <th scope="col"><?= __('Ae Beyond Joint') ?></th>
                <th scope="col"><?= __('Ae Afebrile') ?></th>
                <th scope="col"><?= __('Ae Other') ?></th>
                <th scope="col"><?= __('Adverse Events Specify') ?></th>
                <th scope="col"><?= __('Aefi Date') ?></th>
                <th scope="col"><?= __('Patient Hospitalization') ?></th>
                <th scope="col"><?= __('Notification Date') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Treatment Provided') ?></th>
                <th scope="col"><?= __('Serious') ?></th>
                <th scope="col"><?= __('Serious Yes') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Other Reason') ?></th>
                <th scope="col"><?= __('Died Date') ?></th>
                <th scope="col"><?= __('Autopsy') ?></th>
                <th scope="col"><?= __('Past Medical History') ?></th>
                <th scope="col"><?= __('District Receive Date') ?></th>
                <th scope="col"><?= __('Investigation Needed') ?></th>
                <th scope="col"><?= __('Investigation Date') ?></th>
                <th scope="col"><?= __('National Receive Date') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Resubmit') ?></th>
                <th scope="col"><?= __('Submitted Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Action Date') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Copied') ?></th>
                <th scope="col"><?= __('User Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_followups as $aefiFollowups): ?>
            <tr>
                <td><?= h($aefiFollowups->id) ?></td>
                <td><?= h($aefiFollowups->user_id) ?></td>
                <td><?= h($aefiFollowups->aefi_id) ?></td>
                <td><?= h($aefiFollowups->initial_id) ?></td>
                <td><?= h($aefiFollowups->messageid) ?></td>
                <td><?= h($aefiFollowups->province_id) ?></td>
                <td><?= h($aefiFollowups->reference_number) ?></td>
                <td><?= h($aefiFollowups->assigned_to) ?></td>
                <td><?= h($aefiFollowups->assigned_by) ?></td>
                <td><?= h($aefiFollowups->assigned_date) ?></td>
                <td><?= h($aefiFollowups->patient_name) ?></td>
                <td><?= h($aefiFollowups->patient_surname) ?></td>
                <td><?= h($aefiFollowups->patient_next_of_kin) ?></td>
                <td><?= h($aefiFollowups->patient_address) ?></td>
                <td><?= h($aefiFollowups->patient_telephone) ?></td>
                <td><?= h($aefiFollowups->report_type) ?></td>
                <td><?= h($aefiFollowups->gender) ?></td>
                <td><?= h($aefiFollowups->female_status) ?></td>
                <td><?= h($aefiFollowups->date_of_birth) ?></td>
                <td><?= h($aefiFollowups->age_at_onset) ?></td>
                <td><?= h($aefiFollowups->age_at_onset_years) ?></td>
                <td><?= h($aefiFollowups->age_at_onset_months) ?></td>
                <td><?= h($aefiFollowups->age_at_onset_days) ?></td>
                <td><?= h($aefiFollowups->age_at_onset_specify) ?></td>
                <td><?= h($aefiFollowups->age_group) ?></td>
                <td><?= h($aefiFollowups->reporter_name) ?></td>
                <td><?= h($aefiFollowups->designation_id) ?></td>
                <td><?= h($aefiFollowups->reporter_department) ?></td>
                <td><?= h($aefiFollowups->reporter_address) ?></td>
                <td><?= h($aefiFollowups->reporter_institution) ?></td>
                <td><?= h($aefiFollowups->reporter_district) ?></td>
                <td><?= h($aefiFollowups->reporter_province) ?></td>
                <td><?= h($aefiFollowups->reporter_phone) ?></td>
                <td><?= h($aefiFollowups->reporter_email) ?></td>
                <td><?= h($aefiFollowups->name_of_vaccination_center) ?></td>
                <td><?= h($aefiFollowups->adverse_events) ?></td>
                <td><?= h($aefiFollowups->ae_severe_local_reaction) ?></td>
                <td><?= h($aefiFollowups->ae_seizures) ?></td>
                <td><?= h($aefiFollowups->ae_abscess) ?></td>
                <td><?= h($aefiFollowups->ae_sepsis) ?></td>
                <td><?= h($aefiFollowups->ae_encephalopathy) ?></td>
                <td><?= h($aefiFollowups->ae_toxic_shock) ?></td>
                <td><?= h($aefiFollowups->ae_thrombocytopenia) ?></td>
                <td><?= h($aefiFollowups->ae_anaphylaxis) ?></td>
                <td><?= h($aefiFollowups->ae_fever) ?></td>
                <td><?= h($aefiFollowups->ae_3days) ?></td>
                <td><?= h($aefiFollowups->ae_febrile) ?></td>
                <td><?= h($aefiFollowups->ae_beyond_joint) ?></td>
                <td><?= h($aefiFollowups->ae_afebrile) ?></td>
                <td><?= h($aefiFollowups->ae_other) ?></td>
                <td><?= h($aefiFollowups->adverse_events_specify) ?></td>
                <td><?= h($aefiFollowups->aefi_date) ?></td>
                <td><?= h($aefiFollowups->patient_hospitalization) ?></td>
                <td><?= h($aefiFollowups->notification_date) ?></td>
                <td><?= h($aefiFollowups->description_of_reaction) ?></td>
                <td><?= h($aefiFollowups->treatment_provided) ?></td>
                <td><?= h($aefiFollowups->serious) ?></td>
                <td><?= h($aefiFollowups->serious_yes) ?></td>
                <td><?= h($aefiFollowups->outcome) ?></td>
                <td><?= h($aefiFollowups->other_reason) ?></td>
                <td><?= h($aefiFollowups->died_date) ?></td>
                <td><?= h($aefiFollowups->autopsy) ?></td>
                <td><?= h($aefiFollowups->past_medical_history) ?></td>
                <td><?= h($aefiFollowups->district_receive_date) ?></td>
                <td><?= h($aefiFollowups->investigation_needed) ?></td>
                <td><?= h($aefiFollowups->investigation_date) ?></td>
                <td><?= h($aefiFollowups->national_receive_date) ?></td>
                <td><?= h($aefiFollowups->comments) ?></td>
                <td><?= h($aefiFollowups->submitted) ?></td>
                <td><?= h($aefiFollowups->resubmit) ?></td>
                <td><?= h($aefiFollowups->submitted_date) ?></td>
                <td><?= h($aefiFollowups->status) ?></td>
                <td><?= h($aefiFollowups->active) ?></td>
                <td><?= h($aefiFollowups->emails) ?></td>
                <td><?= h($aefiFollowups->signature) ?></td>
                <td><?= h($aefiFollowups->created) ?></td>
                <td><?= h($aefiFollowups->modified) ?></td>
                <td><?= h($aefiFollowups->action_date) ?></td>
                <td><?= h($aefiFollowups->deleted) ?></td>
                <td><?= h($aefiFollowups->copied) ?></td>
                <td><?= h($aefiFollowups->user_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiFollowups', 'action' => 'view', $aefiFollowups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiFollowups', 'action' => 'edit', $aefiFollowups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiFollowups', 'action' => 'delete', $aefiFollowups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiFollowups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi Reactions') ?></h4>
        <?php if (!empty($aefi->aefi_reactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aefi->aefi_reactions as $aefiReactions): ?>
            <tr>
                <td><?= h($aefiReactions->id) ?></td>
                <td><?= h($aefiReactions->aefi_id) ?></td>
                <td><?= h($aefiReactions->reaction_name) ?></td>
                <td><?= h($aefiReactions->created) ?></td>
                <td><?= h($aefiReactions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiReactions', 'action' => 'view', $aefiReactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiReactions', 'action' => 'edit', $aefiReactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiReactions', 'action' => 'delete', $aefiReactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiReactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
