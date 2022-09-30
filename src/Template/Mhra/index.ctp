<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mhra[]|\Cake\Collection\CollectionInterface $mhra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mhra'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mhra index large-9 medium-8 columns content">
    <h3><?= __('Mhra') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mhra as $mhra): ?>
            <tr>
                <td><?= $this->Number->format($mhra->id) ?></td>
                <td><?= h($mhra->system_name) ?></td>
                <td><?= h($mhra->display_name) ?></td>
                <td><?= h($mhra->created_at) ?></td>
                <td><?= h($mhra->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mhra->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mhra->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mhra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mhra->id)]) ?>
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
