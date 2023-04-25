<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ce2b $ce2b
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ce2b'), ['action' => 'edit', $ce2b->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ce2b'), ['action' => 'delete', $ce2b->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ce2b->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ce2bs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ce2b'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Committees'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Evaluators'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Evaluator'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ce2bs view large-9 medium-8 columns content">
    <h3><?= h($ce2b->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ce2b->has('user') ? $this->Html->link($ce2b->user->name, ['controller' => 'Users', 'action' => 'view', $ce2b->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($ce2b->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Messageid') ?></th>
            <td><?= h($ce2b->messageid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($ce2b->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($ce2b->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E2b File') ?></th>
            <td><?= h($ce2b->e2b_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($ce2b->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= h($ce2b->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($ce2b->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resubmit') ?></th>
            <td><?= h($ce2b->resubmit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($ce2b->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copied') ?></th>
            <td><?= h($ce2b->copied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ce2b->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned To') ?></th>
            <td><?= $this->Number->format($ce2b->assigned_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned By') ?></th>
            <td><?= $this->Number->format($ce2b->assigned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($ce2b->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($ce2b->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned Date') ?></th>
            <td><?= h($ce2b->assigned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ce2b->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ce2b->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Date') ?></th>
            <td><?= h($ce2b->action_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($ce2b->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $ce2b->signature ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($ce2b->comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('E2b Content') ?></h4>
        <?= $this->Text->autoParagraph(h($ce2b->e2b_content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Report Stages') ?></h4>
        <?php if (!empty($ce2b->report_stages)): ?>
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
            <?php foreach ($ce2b->report_stages as $reportStages): ?>
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
        <?php if (!empty($ce2b->attachments)): ?>
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
            <?php foreach ($ce2b->attachments as $attachments): ?>
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
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($ce2b->reviews)): ?>
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
            <?php foreach ($ce2b->reviews as $reviews): ?>
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
        <?php if (!empty($ce2b->committees)): ?>
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
            <?php foreach ($ce2b->committees as $committees): ?>
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
        <?php if (!empty($ce2b->request_reporters)): ?>
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
            <?php foreach ($ce2b->request_reporters as $requestReporters): ?>
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
        <?php if (!empty($ce2b->request_evaluators)): ?>
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
            <?php foreach ($ce2b->request_evaluators as $requestEvaluators): ?>
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
        <h4><?= __('Related Reminders') ?></h4>
        <?php if (!empty($ce2b->reminders)): ?>
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
            <?php foreach ($ce2b->reminders as $reminders): ?>
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
</div>
