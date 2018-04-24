<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">medDRA LLT</h1>


<div class="row">
  <div class="col-md-6">
    <dl class="dl-horizontal">
      <dt>ID</dt>
      <dd><?= h($meddra->id) ?></dd>
     <dt scope="row"><?= __('terminology') ?></dt>
        <dd><?= h($meddra->terminology) ?></dd>     
    </dl>
  </div>
</div>

<div class="row">
  <div class="col-md-offset-1 col-md-11">
    <?= $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> Edit', ['controller' => 'Meddras', 'action' => 'edit', $meddra->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
  </div>
</div>