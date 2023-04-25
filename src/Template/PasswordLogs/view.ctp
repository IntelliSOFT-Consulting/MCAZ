<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PasswordLog $passwordLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Password Log'), ['action' => 'edit', $passwordLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Password Log'), ['action' => 'delete', $passwordLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passwordLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Password Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Password Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passwordLogs view large-9 medium-8 columns content">
    <h3><?= h($passwordLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $passwordLog->has('user') ? $this->Html->link($passwordLog->user->name, ['controller' => 'Users', 'action' => 'view', $passwordLog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($passwordLog->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($passwordLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($passwordLog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($passwordLog->modified) ?></td>
        </tr>
    </table>
</div>
