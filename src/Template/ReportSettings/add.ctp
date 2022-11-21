<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportSetting $reportSetting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Report Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reportSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($reportSetting) ?>
    <fieldset>
        <legend><?= __('Add Report Setting') ?></legend>
        <?php
            echo $this->Form->control('adr_year');
            echo $this->Form->control('adr_month');
            echo $this->Form->control('adr_inst');
            echo $this->Form->control('adr_med');
            echo $this->Form->control('sae_year');
            echo $this->Form->control('sae_month');
            echo $this->Form->control('sae_inst');
            echo $this->Form->control('sae_med');
            echo $this->Form->control('aefi_year');
            echo $this->Form->control('aefi_month');
            echo $this->Form->control('aefi_inst');
            echo $this->Form->control('aefi_med');
            echo $this->Form->control('saefi_year');
            echo $this->Form->control('saefi_month');
            echo $this->Form->control('saefi_inst');
            echo $this->Form->control('saefi_med');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
