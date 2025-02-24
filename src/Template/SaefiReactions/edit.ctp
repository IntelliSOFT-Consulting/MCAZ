<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaefiReaction $saefiReaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $saefiReaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $saefiReaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Saefi Reactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="saefiReactions form large-9 medium-8 columns content">
    <?= $this->Form->create($saefiReaction) ?>
    <fieldset>
        <legend><?= __('Edit Saefi Reaction') ?></legend>
        <?php
            echo $this->Form->control('saefi_id', ['options' => $saefis, 'empty' => true]);
            echo $this->Form->control('reaction_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
