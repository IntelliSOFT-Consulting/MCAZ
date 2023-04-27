<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ce2b $ce2b
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ce2bs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ce2bs form large-9 medium-8 columns content">
    <?= $this->Form->create($ce2b) ?>
    <fieldset>
        <legend><?= __('Add Ce2b') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('reference_number');
            echo $this->Form->control('messageid');
            echo $this->Form->control('assigned_to');
            echo $this->Form->control('assigned_by');
            echo $this->Form->control('company_name');
            echo $this->Form->control('comment');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('e2b_content');
            echo $this->Form->control('e2b_file');
            echo $this->Form->control('dir');
            echo $this->Form->control('size');
            echo $this->Form->control('type');
            echo $this->Form->control('assigned_date', ['empty' => true]);
            echo $this->Form->control('signature');
            echo $this->Form->control('submitted');
            echo $this->Form->control('resubmit');
            echo $this->Form->control('status');
            echo $this->Form->control('active');
            echo $this->Form->control('copied');
            echo $this->Form->control('action_date', ['empty' => true]);
            echo $this->Form->control('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
