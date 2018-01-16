<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiCausality $aefiCausality
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi Causality'), ['action' => 'edit', $aefiCausality->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi Causality'), ['action' => 'delete', $aefiCausality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiCausality->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefiCausalities view large-9 medium-8 columns content">
    <h3><?= h($aefiCausality->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Aefi') ?></th>
            <td><?= $aefiCausality->has('aefi') ? $this->Html->link($aefiCausality->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiCausality->aefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saefi') ?></th>
            <td><?= $aefiCausality->has('saefi') ? $this->Html->link($aefiCausality->saefi->id, ['controller' => 'Saefis', 'action' => 'view', $aefiCausality->saefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prescribing Error') ?></th>
            <td><?= h($aefiCausality->prescribing_error) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Unsterile') ?></th>
            <td><?= h($aefiCausality->vaccine_unsterile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Condition') ?></th>
            <td><?= h($aefiCausality->vaccine_condition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Reconstitution') ?></th>
            <td><?= h($aefiCausality->vaccine_reconstitution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Handling') ?></th>
            <td><?= h($aefiCausality->vaccine_handling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Administered') ?></th>
            <td><?= h($aefiCausality->vaccine_administered) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefiCausality->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($aefiCausality->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefiCausality->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefiCausality->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Prescribing Error Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->prescribing_error_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Unsterile Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->vaccine_unsterile_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Condition Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->vaccine_condition_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Reconstitution Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->vaccine_reconstitution_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Handling Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->vaccine_handling_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Administered Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($aefiCausality->vaccine_administered_specify)); ?>
    </div>
</div>
