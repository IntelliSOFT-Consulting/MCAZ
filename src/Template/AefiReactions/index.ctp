<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AefiReaction[]|\Cake\Collection\CollectionInterface $aefiReactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aefi Reaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefis'), ['controller' => 'Aefis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi'), ['controller' => 'Aefis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aefiReactions index large-9 medium-8 columns content">
    <h3><?= __('Aefi Reactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reaction_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefiReactions as $aefiReaction): ?>
            <tr>
                <td><?= $this->Number->format($aefiReaction->id) ?></td>
                <td><?= $this->Number->format($aefiReaction->aefi_id) ?></td>
                <td><?= h($aefiReaction->reaction_name) ?></td>
                <td><?= h($aefiReaction->created) ?></td>
                <td><?= h($aefiReaction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aefiReaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aefiReaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefiReaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiReaction->id)]) ?>
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
