<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiReaction $aefiReaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi Reaction'), ['action' => 'edit', $aefiReaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi Reaction'), ['action' => 'delete', $aefiReaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiReaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Reactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Reaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefiReactions view large-9 medium-8 columns content">
    <h3><?= h($aefiReaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reaction Name') ?></th>
            <td><?= h($aefiReaction->reaction_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefiReaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Id') ?></th>
            <td><?= $this->Number->format($aefiReaction->aefi_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefiReaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefiReaction->modified) ?></td>
        </tr>
    </table>
</div>
