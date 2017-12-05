<?php
    $this->assign('Login', 'active');
?>
<?php $this->start('sidebar'); ?>
  <ul class="nav nav-sidebar">
    <li><?= $this->Html->link('Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?></li>
    <li>
      <?= $this->Html->link('ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('AEFIS', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="active">
      <?= $this->Html->link('USERS', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>
<?php $this->end(); ?>

<h1 class="page-header">PROFILE</h1>

<div class="row">
  <div class="col-md-12">
    <h3><?= h($user->name) ?></h3>
    <dl class="dl-horizontal">
      <dt>Designation</dt>
      <dd><?= $user->has('designation') ? $this->Html->link($user->designation->name, ['controller' => 'Designations', 'action' => 'view', $user->designation->id]) : '' ?></dd>
      <dt scope="row"><?= __('Username') ?></dt>
      <dd><?= h($user->username) ?></dd>
      <dt scope="row"><?= __('Name') ?></dt>
        <dd><?= h($user->name) ?></dd>
     <dt scope="row"><?= __('Email') ?></dt>
        <dd><?= h($user->email) ?></dd>
        <dt scope="row"><?= __('Group') ?></dt>
        <dd><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'index', 'prefix' => $prefix]) : '' ?></dd>
        <dt scope="row"><?= __('Phone No') ?></dt>
            <dd><?= h($user->phone_no) ?></dd>
    </dl>
  </div>
</div>

