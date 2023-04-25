<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi[]|\Cake\Collection\CollectionInterface $aefis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Original Aefis'), ['controller' => 'OriginalAefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Original Aefi'), ['controller' => 'OriginalAefis', 'action' => 'add']) ?></li>
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
<div class="aefis index large-9 medium-8 columns content">
    <h3><?= __('Aefis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initial_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_next_of_kin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('female_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_years') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_months') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_vaccination_center') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adverse_events') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_severe_local_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_seizures') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_abscess') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_sepsis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_encephalopathy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_toxic_shock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_thrombocytopenia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_anaphylaxis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_fever') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_3days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_febrile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_beyond_joint') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_afebrile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ae_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_hospitalization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notification_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_provided') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serious') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serious_yes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('died_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autopsy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district_receive_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigation_needed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('national_receive_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resubmit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copied') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefis as $aefi): ?>
            <tr>
                <td><?= $this->Number->format($aefi->id) ?></td>
                <td><?= $aefi->has('user') ? $this->Html->link($aefi->user->name, ['controller' => 'Users', 'action' => 'view', $aefi->user->id]) : '' ?></td>
                <td><?= $aefi->has('original_aefi') ? $this->Html->link($aefi->original_aefi->id, ['controller' => 'OriginalAefis', 'action' => 'view', $aefi->original_aefi->id]) : '' ?></td>
                <td><?= $aefi->has('initial_aefi') ? $this->Html->link($aefi->initial_aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefi->initial_aefi->id]) : '' ?></td>
                <td><?= h($aefi->messageid) ?></td>
                <td><?= $aefi->has('province') ? $this->Html->link($aefi->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $aefi->province->id]) : '' ?></td>
                <td><?= h($aefi->reference_number) ?></td>
                <td><?= $this->Number->format($aefi->assigned_to) ?></td>
                <td><?= $this->Number->format($aefi->assigned_by) ?></td>
                <td><?= h($aefi->assigned_date) ?></td>
                <td><?= h($aefi->patient_name) ?></td>
                <td><?= h($aefi->patient_surname) ?></td>
                <td><?= h($aefi->patient_next_of_kin) ?></td>
                <td><?= h($aefi->patient_address) ?></td>
                <td><?= h($aefi->patient_telephone) ?></td>
                <td><?= h($aefi->report_type) ?></td>
                <td><?= h($aefi->gender) ?></td>
                <td><?= h($aefi->female_status) ?></td>
                <td><?= h($aefi->date_of_birth) ?></td>
                <td><?= h($aefi->age_at_onset) ?></td>
                <td><?= $this->Number->format($aefi->age_at_onset_years) ?></td>
                <td><?= $this->Number->format($aefi->age_at_onset_months) ?></td>
                <td><?= $this->Number->format($aefi->age_at_onset_days) ?></td>
                <td><?= $this->Number->format($aefi->age_at_onset_specify) ?></td>
                <td><?= h($aefi->age_group) ?></td>
                <td><?= h($aefi->reporter_name) ?></td>
                <td><?= $aefi->has('designation') ? $this->Html->link($aefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $aefi->designation->id]) : '' ?></td>
                <td><?= h($aefi->reporter_department) ?></td>
                <td><?= h($aefi->reporter_address) ?></td>
                <td><?= h($aefi->reporter_institution) ?></td>
                <td><?= h($aefi->reporter_district) ?></td>
                <td><?= h($aefi->reporter_province) ?></td>
                <td><?= h($aefi->reporter_phone) ?></td>
                <td><?= h($aefi->reporter_email) ?></td>
                <td><?= h($aefi->name_of_vaccination_center) ?></td>
                <td><?= h($aefi->adverse_events) ?></td>
                <td><?= $this->Number->format($aefi->ae_severe_local_reaction) ?></td>
                <td><?= $this->Number->format($aefi->ae_seizures) ?></td>
                <td><?= $this->Number->format($aefi->ae_abscess) ?></td>
                <td><?= $this->Number->format($aefi->ae_sepsis) ?></td>
                <td><?= $this->Number->format($aefi->ae_encephalopathy) ?></td>
                <td><?= $this->Number->format($aefi->ae_toxic_shock) ?></td>
                <td><?= $this->Number->format($aefi->ae_thrombocytopenia) ?></td>
                <td><?= $this->Number->format($aefi->ae_anaphylaxis) ?></td>
                <td><?= $this->Number->format($aefi->ae_fever) ?></td>
                <td><?= $this->Number->format($aefi->ae_3days) ?></td>
                <td><?= $this->Number->format($aefi->ae_febrile) ?></td>
                <td><?= $this->Number->format($aefi->ae_beyond_joint) ?></td>
                <td><?= $this->Number->format($aefi->ae_afebrile) ?></td>
                <td><?= $this->Number->format($aefi->ae_other) ?></td>
                <td><?= h($aefi->aefi_date) ?></td>
                <td><?= h($aefi->patient_hospitalization) ?></td>
                <td><?= h($aefi->notification_date) ?></td>
                <td><?= h($aefi->treatment_provided) ?></td>
                <td><?= h($aefi->serious) ?></td>
                <td><?= h($aefi->serious_yes) ?></td>
                <td><?= h($aefi->outcome) ?></td>
                <td><?= h($aefi->died_date) ?></td>
                <td><?= h($aefi->autopsy) ?></td>
                <td><?= h($aefi->district_receive_date) ?></td>
                <td><?= h($aefi->investigation_needed) ?></td>
                <td><?= h($aefi->investigation_date) ?></td>
                <td><?= h($aefi->national_receive_date) ?></td>
                <td><?= $this->Number->format($aefi->submitted) ?></td>
                <td><?= h($aefi->resubmit) ?></td>
                <td><?= h($aefi->submitted_date) ?></td>
                <td><?= h($aefi->status) ?></td>
                <td><?= $this->Number->format($aefi->active) ?></td>
                <td><?= $this->Number->format($aefi->emails) ?></td>
                <td><?= h($aefi->signature) ?></td>
                <td><?= h($aefi->created) ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td><?= h($aefi->action_date) ?></td>
                <td><?= h($aefi->deleted) ?></td>
                <td><?= h($aefi->copied) ?></td>
                <td><?= h($aefi->user_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefi->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefi->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
