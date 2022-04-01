<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaefiReaction[]|\Cake\Collection\CollectionInterface $saefiReactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Saefi Reaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="saefiReactions index large-9 medium-8 columns content">
    <h3><?= __('Saefi Reactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reaction_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saefiReactions as $saefiReaction): ?>
            <tr>
                <td><?= $this->Number->format($saefiReaction->id) ?></td>
                <td><?= $saefiReaction->has('saefi') ? $this->Html->link($saefiReaction->saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefiReaction->saefi->id]) : '' ?></td>
                <td><?= h($saefiReaction->reaction_name) ?></td>
                <td><?= h($saefiReaction->created) ?></td>
                <td><?= h($saefiReaction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $saefiReaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saefiReaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saefiReaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiReaction->id)]) ?>
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
