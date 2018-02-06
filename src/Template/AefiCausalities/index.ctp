<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiCausality[]|\Cake\Collection\CollectionInterface $aefiCausalities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiCausalities index large-9 medium-8 columns content">
    <h3><?= __('Aefi Causalities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prescribing_error') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_unsterile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_condition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_reconstitution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_handling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_administered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefiCausalities as $aefiCausality): ?>
            <tr>
                <td><?= $this->Number->format($aefiCausality->id) ?></td>
                <td><?= $aefiCausality->has('aefi') ? $this->Html->link($aefiCausality->aefi->id, ['controller' => 'Aefis', 'action' => 'view', $aefiCausality->aefi->id]) : '' ?></td>
                <td><?= $aefiCausality->has('saefi') ? $this->Html->link($aefiCausality->saefi->id, ['controller' => 'Saefis', 'action' => 'view', $aefiCausality->saefi->id]) : '' ?></td>
                <td><?= h($aefiCausality->prescribing_error) ?></td>
                <td><?= h($aefiCausality->vaccine_unsterile) ?></td>
                <td><?= h($aefiCausality->vaccine_condition) ?></td>
                <td><?= h($aefiCausality->vaccine_reconstitution) ?></td>
                <td><?= h($aefiCausality->vaccine_handling) ?></td>
                <td><?= h($aefiCausality->vaccine_administered) ?></td>
                <td><?= h($aefiCausality->deleted) ?></td>
                <td><?= h($aefiCausality->created) ?></td>
                <td><?= h($aefiCausality->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefiCausality->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefiCausality->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefiCausality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiCausality->id)]) ?>
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
