<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sadr'), ['action' => 'edit', $sadr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sadr'), ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Original Sadrs'), ['controller' => 'OriginalSadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Original Sadr'), ['controller' => 'OriginalSadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Initial Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Initial Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
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
        <li><?= $this->Html->link(__('List Sadr Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Committees'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Evaluators'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Evaluator'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Other Drugs'), ['controller' => 'SadrOtherDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Other Drug'), ['controller' => 'SadrOtherDrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reactions'), ['controller' => 'Reactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reaction'), ['controller' => 'Reactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sadrs view large-9 medium-8 columns content">
    <h3><?= h($sadr->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sadr->has('user') ? $this->Html->link($sadr->user->name, ['controller' => 'Users', 'action' => 'view', $sadr->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Original Sadr') ?></th>
            <td><?= $sadr->has('original_sadr') ? $this->Html->link($sadr->original_sadr->id, ['controller' => 'OriginalSadrs', 'action' => 'view', $sadr->original_sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Sadr') ?></th>
            <td><?= $sadr->has('initial_sadr') ? $this->Html->link($sadr->initial_sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadr->initial_sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Messageid') ?></th>
            <td><?= h($sadr->messageid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $sadr->has('province') ? $this->Html->link($sadr->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $sadr->province->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($sadr->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $sadr->has('designation') ? $this->Html->link($sadr->designation->name, ['controller' => 'Designations', 'action' => 'view', $sadr->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($sadr->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($sadr->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($sadr->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Name') ?></th>
            <td><?= h($sadr->institution_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Address') ?></th>
            <td><?= h($sadr->institution_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Name') ?></th>
            <td><?= h($sadr->patient_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip No') ?></th>
            <td><?= h($sadr->ip_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($sadr->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($sadr->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($sadr->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= h($sadr->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= h($sadr->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Onset Of Reaction') ?></th>
            <td><?= h($sadr->date_of_onset_of_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of End Of Reaction') ?></th>
            <td><?= h($sadr->date_of_end_of_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration Type') ?></th>
            <td><?= h($sadr->duration_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($sadr->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Severity') ?></th>
            <td><?= h($sadr->severity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Severity Reason') ?></th>
            <td><?= h($sadr->severity_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outcome') ?></th>
            <td><?= h($sadr->outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($sadr->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($sadr->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($sadr->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resubmit') ?></th>
            <td><?= h($sadr->resubmit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Taken') ?></th>
            <td><?= h($sadr->action_taken) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relatedness') ?></th>
            <td><?= h($sadr->relatedness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($sadr->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copied') ?></th>
            <td><?= h($sadr->copied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Description') ?></th>
            <td><?= h($sadr->user_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sadr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned To') ?></th>
            <td><?= $this->Number->format($sadr->assigned_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned By') ?></th>
            <td><?= $this->Number->format($sadr->assigned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year Of Birth') ?></th>
            <td><?= $this->Number->format($sadr->year_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month Of Birth') ?></th>
            <td><?= $this->Number->format($sadr->month_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day Of Birth') ?></th>
            <td><?= $this->Number->format($sadr->day_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('In Utero') ?></th>
            <td><?= $this->Number->format($sadr->in_utero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($sadr->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($sadr->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $this->Number->format($sadr->device) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notified') ?></th>
            <td><?= $this->Number->format($sadr->notified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned Date') ?></th>
            <td><?= h($sadr->assigned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted Date') ?></th>
            <td><?= h($sadr->submitted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sadr->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sadr->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Date') ?></th>
            <td><?= h($sadr->action_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($sadr->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $sadr->signature ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $sadr->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description Of Reaction') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->description_of_reaction)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical History') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->medical_history)); ?>
    </div>
    <div class="row">
        <h4><?= __('Past Drug Therapy') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->past_drug_therapy)); ?>
    </div>
    <div class="row">
        <h4><?= __('Lab Test Results') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->lab_test_results)); ?>
    </div>
    <div class="row">
        <h4><?= __('Any Other Information') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->any_other_information)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Report Stages') ?></h4>
        <?php if (!empty($sadr->report_stages)): ?>
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
            <?php foreach ($sadr->report_stages as $reportStages): ?>
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
        <?php if (!empty($sadr->attachments)): ?>
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
            <?php foreach ($sadr->attachments as $attachments): ?>
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
        <?php if (!empty($sadr->uploads)): ?>
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
            <?php foreach ($sadr->uploads as $uploads): ?>
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
        <?php if (!empty($sadr->reminders)): ?>
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
            <?php foreach ($sadr->reminders as $reminders): ?>
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
        <?php if (!empty($sadr->refids)): ?>
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
            <?php foreach ($sadr->refids as $refids): ?>
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
        <?php if (!empty($sadr->reviews)): ?>
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
            <?php foreach ($sadr->reviews as $reviews): ?>
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
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($sadr->sadr_comments)): ?>
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
            <?php foreach ($sadr->sadr_comments as $sadrComments): ?>
            <tr>
                <td><?= h($sadrComments->id) ?></td>
                <td><?= h($sadrComments->foreign_key) ?></td>
                <td><?= h($sadrComments->user_id) ?></td>
                <td><?= h($sadrComments->model_id) ?></td>
                <td><?= h($sadrComments->model) ?></td>
                <td><?= h($sadrComments->category) ?></td>
                <td><?= h($sadrComments->sender) ?></td>
                <td><?= h($sadrComments->subject) ?></td>
                <td><?= h($sadrComments->content) ?></td>
                <td><?= h($sadrComments->deleted) ?></td>
                <td><?= h($sadrComments->created) ?></td>
                <td><?= h($sadrComments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $sadrComments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $sadrComments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $sadrComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrComments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($sadr->committees)): ?>
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
            <?php foreach ($sadr->committees as $committees): ?>
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
        <?php if (!empty($sadr->request_reporters)): ?>
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
            <?php foreach ($sadr->request_reporters as $requestReporters): ?>
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
        <?php if (!empty($sadr->request_evaluators)): ?>
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
            <?php foreach ($sadr->request_evaluators as $requestEvaluators): ?>
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
        <h4><?= __('Related Sadr Followups') ?></h4>
        <?php if (!empty($sadr->sadr_followups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Initial Id') ?></th>
                <th scope="col"><?= __('Messageid') ?></th>
                <th scope="col"><?= __('Assigned To') ?></th>
                <th scope="col"><?= __('Assigned By') ?></th>
                <th scope="col"><?= __('Assigned Date') ?></th>
                <th scope="col"><?= __('Province Id') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Institution Name') ?></th>
                <th scope="col"><?= __('Institution Address') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Ip No') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Year Of Birth') ?></th>
                <th scope="col"><?= __('Month Of Birth') ?></th>
                <th scope="col"><?= __('Day Of Birth') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('In Utero') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Date Of Onset Of Reaction') ?></th>
                <th scope="col"><?= __('Date Of End Of Reaction') ?></th>
                <th scope="col"><?= __('Duration Type') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Severity') ?></th>
                <th scope="col"><?= __('Severity Reason') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Past Drug Therapy') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Lab Test Results') ?></th>
                <th scope="col"><?= __('Any Other Information') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Resubmit') ?></th>
                <th scope="col"><?= __('Submitted Date') ?></th>
                <th scope="col"><?= __('Action Taken') ?></th>
                <th scope="col"><?= __('Relatedness') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Action Date') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Copied') ?></th>
                <th scope="col"><?= __('User Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sadr->sadr_followups as $sadrFollowups): ?>
            <tr>
                <td><?= h($sadrFollowups->id) ?></td>
                <td><?= h($sadrFollowups->user_id) ?></td>
                <td><?= h($sadrFollowups->sadr_id) ?></td>
                <td><?= h($sadrFollowups->initial_id) ?></td>
                <td><?= h($sadrFollowups->messageid) ?></td>
                <td><?= h($sadrFollowups->assigned_to) ?></td>
                <td><?= h($sadrFollowups->assigned_by) ?></td>
                <td><?= h($sadrFollowups->assigned_date) ?></td>
                <td><?= h($sadrFollowups->province_id) ?></td>
                <td><?= h($sadrFollowups->reference_number) ?></td>
                <td><?= h($sadrFollowups->designation_id) ?></td>
                <td><?= h($sadrFollowups->report_type) ?></td>
                <td><?= h($sadrFollowups->name_of_institution) ?></td>
                <td><?= h($sadrFollowups->institution_code) ?></td>
                <td><?= h($sadrFollowups->institution_name) ?></td>
                <td><?= h($sadrFollowups->institution_address) ?></td>
                <td><?= h($sadrFollowups->patient_name) ?></td>
                <td><?= h($sadrFollowups->ip_no) ?></td>
                <td><?= h($sadrFollowups->date_of_birth) ?></td>
                <td><?= h($sadrFollowups->year_of_birth) ?></td>
                <td><?= h($sadrFollowups->month_of_birth) ?></td>
                <td><?= h($sadrFollowups->day_of_birth) ?></td>
                <td><?= h($sadrFollowups->age_group) ?></td>
                <td><?= h($sadrFollowups->in_utero) ?></td>
                <td><?= h($sadrFollowups->gender) ?></td>
                <td><?= h($sadrFollowups->weight) ?></td>
                <td><?= h($sadrFollowups->height) ?></td>
                <td><?= h($sadrFollowups->date_of_onset_of_reaction) ?></td>
                <td><?= h($sadrFollowups->date_of_end_of_reaction) ?></td>
                <td><?= h($sadrFollowups->duration_type) ?></td>
                <td><?= h($sadrFollowups->duration) ?></td>
                <td><?= h($sadrFollowups->description_of_reaction) ?></td>
                <td><?= h($sadrFollowups->severity) ?></td>
                <td><?= h($sadrFollowups->severity_reason) ?></td>
                <td><?= h($sadrFollowups->medical_history) ?></td>
                <td><?= h($sadrFollowups->past_drug_therapy) ?></td>
                <td><?= h($sadrFollowups->outcome) ?></td>
                <td><?= h($sadrFollowups->lab_test_results) ?></td>
                <td><?= h($sadrFollowups->any_other_information) ?></td>
                <td><?= h($sadrFollowups->reporter_name) ?></td>
                <td><?= h($sadrFollowups->reporter_email) ?></td>
                <td><?= h($sadrFollowups->reporter_phone) ?></td>
                <td><?= h($sadrFollowups->submitted) ?></td>
                <td><?= h($sadrFollowups->resubmit) ?></td>
                <td><?= h($sadrFollowups->submitted_date) ?></td>
                <td><?= h($sadrFollowups->action_taken) ?></td>
                <td><?= h($sadrFollowups->relatedness) ?></td>
                <td><?= h($sadrFollowups->status) ?></td>
                <td><?= h($sadrFollowups->signature) ?></td>
                <td><?= h($sadrFollowups->emails) ?></td>
                <td><?= h($sadrFollowups->active) ?></td>
                <td><?= h($sadrFollowups->device) ?></td>
                <td><?= h($sadrFollowups->notified) ?></td>
                <td><?= h($sadrFollowups->created) ?></td>
                <td><?= h($sadrFollowups->modified) ?></td>
                <td><?= h($sadrFollowups->action_date) ?></td>
                <td><?= h($sadrFollowups->deleted) ?></td>
                <td><?= h($sadrFollowups->copied) ?></td>
                <td><?= h($sadrFollowups->user_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrFollowups', 'action' => 'view', $sadrFollowups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrFollowups', 'action' => 'edit', $sadrFollowups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrFollowups', 'action' => 'delete', $sadrFollowups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrFollowups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sadr List Of Drugs') ?></h4>
        <?php if (!empty($sadr->sadr_list_of_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Dose Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Dose') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Indication') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sadr->sadr_list_of_drugs as $sadrListOfDrugs): ?>
            <tr>
                <td><?= h($sadrListOfDrugs->id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_followup_id) ?></td>
                <td><?= h($sadrListOfDrugs->dose_id) ?></td>
                <td><?= h($sadrListOfDrugs->route_id) ?></td>
                <td><?= h($sadrListOfDrugs->frequency_id) ?></td>
                <td><?= h($sadrListOfDrugs->drug_name) ?></td>
                <td><?= h($sadrListOfDrugs->brand_name) ?></td>
                <td><?= h($sadrListOfDrugs->batch_number) ?></td>
                <td><?= h($sadrListOfDrugs->dose) ?></td>
                <td><?= h($sadrListOfDrugs->start_date) ?></td>
                <td><?= h($sadrListOfDrugs->stop_date) ?></td>
                <td><?= h($sadrListOfDrugs->indication) ?></td>
                <td><?= h($sadrListOfDrugs->suspected_drug) ?></td>
                <td><?= h($sadrListOfDrugs->created) ?></td>
                <td><?= h($sadrListOfDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrListOfDrugs', 'action' => 'view', $sadrListOfDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrListOfDrugs', 'action' => 'edit', $sadrListOfDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrListOfDrugs', 'action' => 'delete', $sadrListOfDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrListOfDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sadr Other Drugs') ?></h4>
        <?php if (!empty($sadr->sadr_other_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sadr->sadr_other_drugs as $sadrOtherDrugs): ?>
            <tr>
                <td><?= h($sadrOtherDrugs->id) ?></td>
                <td><?= h($sadrOtherDrugs->sadr_id) ?></td>
                <td><?= h($sadrOtherDrugs->drug_name) ?></td>
                <td><?= h($sadrOtherDrugs->start_date) ?></td>
                <td><?= h($sadrOtherDrugs->stop_date) ?></td>
                <td><?= h($sadrOtherDrugs->suspected_drug) ?></td>
                <td><?= h($sadrOtherDrugs->created) ?></td>
                <td><?= h($sadrOtherDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrOtherDrugs', 'action' => 'view', $sadrOtherDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrOtherDrugs', 'action' => 'edit', $sadrOtherDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrOtherDrugs', 'action' => 'delete', $sadrOtherDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrOtherDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reactions') ?></h4>
        <?php if (!empty($sadr->reactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sadr->reactions as $reactions): ?>
            <tr>
                <td><?= h($reactions->id) ?></td>
                <td><?= h($reactions->sadr_id) ?></td>
                <td><?= h($reactions->reaction_name) ?></td>
                <td><?= h($reactions->created) ?></td>
                <td><?= h($reactions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reactions', 'action' => 'view', $reactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reactions', 'action' => 'edit', $reactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reactions', 'action' => 'delete', $reactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
