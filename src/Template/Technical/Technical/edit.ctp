<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technical $technical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $technical->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $technical->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Technical'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="technical form large-9 medium-8 columns content">
    <?= $this->Form->create($technical) ?>
    <fieldset>
        <legend><?= __('Edit Technical') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
