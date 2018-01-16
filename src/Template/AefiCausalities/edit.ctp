<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiCausality $aefiCausality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aefiCausality->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aefiCausality->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiCausalities form large-9 medium-8 columns content">
    <?= $this->Form->create($aefiCausality) ?>
    <fieldset>
        <legend><?= __('Edit Aefi Causality') ?></legend>
        <?php
            echo $this->Form->control('aefi_id', ['options' => $aefis, 'empty' => true]);
            echo $this->Form->control('saefi_id', ['options' => $saefis, 'empty' => true]);
            echo $this->Form->control('prescribing_error');
            echo $this->Form->control('prescribing_error_specify');
            echo $this->Form->control('vaccine_unsterile');
            echo $this->Form->control('vaccine_unsterile_specify');
            echo $this->Form->control('vaccine_condition');
            echo $this->Form->control('vaccine_condition_specify');
            echo $this->Form->control('vaccine_reconstitution');
            echo $this->Form->control('vaccine_reconstitution_specify');
            echo $this->Form->control('vaccine_handling');
            echo $this->Form->control('vaccine_handling_specify');
            echo $this->Form->control('vaccine_administered');
            echo $this->Form->control('vaccine_administered_specify');
            echo $this->Form->control('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
