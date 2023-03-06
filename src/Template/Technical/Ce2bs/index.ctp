<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ce2b[]|\Cake\Collection\CollectionInterface $ce2bs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ce2b'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ce2bs index large-9 medium-8 columns content">
    <h3><?= __('Ce2bs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e2b_file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resubmit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copied') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ce2bs as $ce2b): ?>
            <tr>
                <td><?= $this->Number->format($ce2b->id) ?></td>
                <td><?= $ce2b->has('user') ? $this->Html->link($ce2b->user->name, ['controller' => 'Users', 'action' => 'view', $ce2b->user->id]) : '' ?></td>
                <td><?= h($ce2b->reference_number) ?></td>
                <td><?= h($ce2b->messageid) ?></td>
                <td><?= $this->Number->format($ce2b->assigned_to) ?></td>
                <td><?= $this->Number->format($ce2b->assigned_by) ?></td>
                <td><?= h($ce2b->company_name) ?></td>
                <td><?= h($ce2b->reporter_email) ?></td>
                <td><?= h($ce2b->e2b_file) ?></td>
                <td><?= h($ce2b->dir) ?></td>
                <td><?= h($ce2b->size) ?></td>
                <td><?= h($ce2b->type) ?></td>
                <td><?= h($ce2b->assigned_date) ?></td>
                <td><?= h($ce2b->signature) ?></td>
                <td><?= $this->Number->format($ce2b->submitted) ?></td>
                <td><?= h($ce2b->resubmit) ?></td>
                <td><?= h($ce2b->status) ?></td>
                <td><?= $this->Number->format($ce2b->active) ?></td>
                <td><?= h($ce2b->copied) ?></td>
                <td><?= h($ce2b->created) ?></td>
                <td><?= h($ce2b->modified) ?></td>
                <td><?= h($ce2b->action_date) ?></td>
                <td><?= h($ce2b->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ce2b->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ce2b->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ce2b->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ce2b->id)]) ?>
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
