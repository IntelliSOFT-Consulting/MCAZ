<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">WHO DRUG</h1>


<div class="row">
  <div class="col-md-6">
    <dl class="dl-horizontal">
      <dt>ID</dt>
      <dd><?= h($whoDrug->id) ?></dd>
     <dt scope="row"><?= __('Drug Name') ?></dt>
        <dd><?= h($whoDrug->drug_name) ?></dd>     
    </dl>
  </div>
</div>

<div class="row">
  <div class="col-md-offset-1 col-md-11">
    <?= $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> Edit', ['controller' => 'WhoDrugs', 'action' => 'edit', $whoDrug->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
  </div>
</div>