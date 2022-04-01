<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaefiReaction $saefiReaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Saefi Reaction'), ['action' => 'edit', $saefiReaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Saefi Reaction'), ['action' => 'delete', $saefiReaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiReaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Saefi Reactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi Reaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="saefiReactions view large-9 medium-8 columns content">
    <h3><?= h($saefiReaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Saefi') ?></th>
            <td><?= $saefiReaction->has('saefi') ? $this->Html->link($saefiReaction->saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefiReaction->saefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reaction Name') ?></th>
            <td><?= h($saefiReaction->reaction_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($saefiReaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($saefiReaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($saefiReaction->modified) ?></td>
        </tr>
    </table>
</div>
