<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mhra $mhra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mhra'), ['action' => 'edit', $mhra->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mhra'), ['action' => 'delete', $mhra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mhra->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mhra'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mhra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mhra view large-9 medium-8 columns content">
    <h3><?= h($mhra->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('System Name') ?></th>
            <td><?= h($mhra->system_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Name') ?></th>
            <td><?= h($mhra->display_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mhra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($mhra->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($mhra->update_at) ?></td>
        </tr>
    </table>
</div>
