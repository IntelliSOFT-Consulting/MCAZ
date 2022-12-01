<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportSetting[]|\Cake\Collection\CollectionInterface $reportSettings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Report Setting'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reportSettings index large-9 medium-8 columns content">
    <h3><?= __('Report Settings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_inst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_med') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sae_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sae_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sae_inst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sae_med') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_inst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_med') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_inst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_med') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportSettings as $reportSetting): ?>
            <tr>
                <td><?= $this->Number->format($reportSetting->id) ?></td>
                <td><?= $this->Number->format($reportSetting->adr_year) ?></td>
                <td><?= $this->Number->format($reportSetting->adr_month) ?></td>
                <td><?= $this->Number->format($reportSetting->adr_inst) ?></td>
                <td><?= $this->Number->format($reportSetting->adr_med) ?></td>
                <td><?= $this->Number->format($reportSetting->sae_year) ?></td>
                <td><?= $this->Number->format($reportSetting->sae_month) ?></td>
                <td><?= $this->Number->format($reportSetting->sae_inst) ?></td>
                <td><?= $this->Number->format($reportSetting->sae_med) ?></td>
                <td><?= $this->Number->format($reportSetting->aefi_year) ?></td>
                <td><?= $this->Number->format($reportSetting->aefi_month) ?></td>
                <td><?= $this->Number->format($reportSetting->aefi_inst) ?></td>
                <td><?= $this->Number->format($reportSetting->aefi_med) ?></td>
                <td><?= $this->Number->format($reportSetting->saefi_year) ?></td>
                <td><?= $this->Number->format($reportSetting->saefi_month) ?></td>
                <td><?= $this->Number->format($reportSetting->saefi_inst) ?></td>
                <td><?= $this->Number->format($reportSetting->saefi_med) ?></td>
                <td><?= h($reportSetting->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reportSetting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reportSetting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reportSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportSetting->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
