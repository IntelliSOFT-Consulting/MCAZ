<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr[]|\Cake\Collection\CollectionInterface $sadrs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Original Sadrs'), ['controller' => 'OriginalSadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Original Sadr'), ['controller' => 'OriginalSadrs', 'action' => 'add']) ?></li>
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
<div class="sadrs index large-9 medium-8 columns content">
    <h3><?= __('Sadrs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initial_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('in_utero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_onset_of_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_end_of_reaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('severity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('severity_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resubmit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_taken') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relatedness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notified') ?></th>
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
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?= $sadr->has('user') ? $this->Html->link($sadr->user->name, ['controller' => 'Users', 'action' => 'view', $sadr->user->id]) : '' ?></td>
                <td><?= $sadr->has('original_sadr') ? $this->Html->link($sadr->original_sadr->id, ['controller' => 'OriginalSadrs', 'action' => 'view', $sadr->original_sadr->id]) : '' ?></td>
                <td><?= $sadr->has('initial_sadr') ? $this->Html->link($sadr->initial_sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadr->initial_sadr->id]) : '' ?></td>
                <td><?= h($sadr->messageid) ?></td>
                <td><?= $this->Number->format($sadr->assigned_to) ?></td>
                <td><?= $this->Number->format($sadr->assigned_by) ?></td>
                <td><?= h($sadr->assigned_date) ?></td>
                <td><?= $sadr->has('province') ? $this->Html->link($sadr->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $sadr->province->id]) : '' ?></td>
                <td><?= h($sadr->reference_number) ?></td>
                <td><?= $sadr->has('designation') ? $this->Html->link($sadr->designation->name, ['controller' => 'Designations', 'action' => 'view', $sadr->designation->id]) : '' ?></td>
                <td><?= h($sadr->report_type) ?></td>
                <td><?= h($sadr->name_of_institution) ?></td>
                <td><?= h($sadr->institution_code) ?></td>
                <td><?= h($sadr->institution_name) ?></td>
                <td><?= h($sadr->institution_address) ?></td>
                <td><?= h($sadr->patient_name) ?></td>
                <td><?= h($sadr->ip_no) ?></td>
                <td><?= h($sadr->date_of_birth) ?></td>
                <td><?= $this->Number->format($sadr->year_of_birth) ?></td>
                <td><?= $this->Number->format($sadr->month_of_birth) ?></td>
                <td><?= $this->Number->format($sadr->day_of_birth) ?></td>
                <td><?= h($sadr->age_group) ?></td>
                <td><?= $this->Number->format($sadr->in_utero) ?></td>
                <td><?= h($sadr->gender) ?></td>
                <td><?= h($sadr->weight) ?></td>
                <td><?= h($sadr->height) ?></td>
                <td><?= h($sadr->date_of_onset_of_reaction) ?></td>
                <td><?= h($sadr->date_of_end_of_reaction) ?></td>
                <td><?= h($sadr->duration_type) ?></td>
                <td><?= h($sadr->duration) ?></td>
                <td><?= h($sadr->severity) ?></td>
                <td><?= h($sadr->severity_reason) ?></td>
                <td><?= h($sadr->outcome) ?></td>
                <td><?= h($sadr->reporter_name) ?></td>
                <td><?= h($sadr->reporter_email) ?></td>
                <td><?= h($sadr->reporter_phone) ?></td>
                <td><?= $this->Number->format($sadr->submitted) ?></td>
                <td><?= h($sadr->resubmit) ?></td>
                <td><?= h($sadr->submitted_date) ?></td>
                <td><?= h($sadr->action_taken) ?></td>
                <td><?= h($sadr->relatedness) ?></td>
                <td><?= h($sadr->status) ?></td>
                <td><?= h($sadr->signature) ?></td>
                <td><?= $this->Number->format($sadr->emails) ?></td>
                <td><?= h($sadr->active) ?></td>
                <td><?= $this->Number->format($sadr->device) ?></td>
                <td><?= $this->Number->format($sadr->notified) ?></td>
                <td><?= h($sadr->created) ?></td>
                <td><?= h($sadr->modified) ?></td>
                <td><?= h($sadr->action_date) ?></td>
                <td><?= h($sadr->deleted) ?></td>
                <td><?= h($sadr->copied) ?></td>
                <td><?= h($sadr->user_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sadr->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sadr->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id)]) ?>
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
