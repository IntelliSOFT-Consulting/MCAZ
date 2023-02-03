<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PasswordLog[]|\Cake\Collection\CollectionInterface $passwordLogs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Password Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passwordLogs index large-9 medium-8 columns content">
    <h3><?= __('Password Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passwordLogs as $passwordLog): ?>
            <tr>
                <td><?= $this->Number->format($passwordLog->id) ?></td>
                <td><?= $passwordLog->has('user') ? $this->Html->link($passwordLog->user->name, ['controller' => 'Users', 'action' => 'view', $passwordLog->user->id]) : '' ?></td>
                <td><?= h($passwordLog->password) ?></td>
                <td><?= h($passwordLog->created) ?></td>
                <td><?= h($passwordLog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passwordLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passwordLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passwordLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passwordLog->id)]) ?>
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
