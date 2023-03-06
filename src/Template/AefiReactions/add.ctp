<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiReaction $aefiReaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Aefi Reactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiReactions form large-9 medium-8 columns content">
    <?= $this->Form->create($aefiReaction) ?>
    <fieldset>
        <legend><?= __('Add Aefi Reaction') ?></legend>
        <?php
            echo $this->Form->control('aefi_id');
            echo $this->Form->control('reaction_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
