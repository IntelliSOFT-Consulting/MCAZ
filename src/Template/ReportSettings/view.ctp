<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportSetting $reportSetting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Report Setting'), ['action' => 'edit', $reportSetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Report Setting'), ['action' => 'delete', $reportSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportSetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Report Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Setting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reportSettings view large-9 medium-8 columns content">
    <h3><?= h($reportSetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reportSetting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adr Year') ?></th>
            <td><?= $this->Number->format($reportSetting->adr_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adr Month') ?></th>
            <td><?= $this->Number->format($reportSetting->adr_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adr Inst') ?></th>
            <td><?= $this->Number->format($reportSetting->adr_inst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adr Med') ?></th>
            <td><?= $this->Number->format($reportSetting->adr_med) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Year') ?></th>
            <td><?= $this->Number->format($reportSetting->sae_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Month') ?></th>
            <td><?= $this->Number->format($reportSetting->sae_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Inst') ?></th>
            <td><?= $this->Number->format($reportSetting->sae_inst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Med') ?></th>
            <td><?= $this->Number->format($reportSetting->sae_med) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Year') ?></th>
            <td><?= $this->Number->format($reportSetting->aefi_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Month') ?></th>
            <td><?= $this->Number->format($reportSetting->aefi_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Inst') ?></th>
            <td><?= $this->Number->format($reportSetting->aefi_inst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Med') ?></th>
            <td><?= $this->Number->format($reportSetting->aefi_med) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saefi Year') ?></th>
            <td><?= $this->Number->format($reportSetting->saefi_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saefi Month') ?></th>
            <td><?= $this->Number->format($reportSetting->saefi_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saefi Inst') ?></th>
            <td><?= $this->Number->format($reportSetting->saefi_inst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saefi Med') ?></th>
            <td><?= $this->Number->format($reportSetting->saefi_med) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reportSetting->created) ?></td>
        </tr>
    </table>
</div>
