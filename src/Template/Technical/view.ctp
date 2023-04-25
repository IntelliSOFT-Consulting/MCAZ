<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technical $technical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Technical'), ['action' => 'edit', $technical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Technical'), ['action' => 'delete', $technical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $technical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Technical'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Technical'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="technical view large-9 medium-8 columns content">
    <h3><?= h($technical->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($technical->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($technical->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($technical->id) ?></td>
        </tr>
    </table>
</div>
