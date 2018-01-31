<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
<h1 class="page-header"> Import XML reports</h1>
    <div class="col-sm-6">
      <h5>ADRs Import</h5>
      <?= $this->Form->create(null, ['type' => 'file']) ?>
        <?= $this->Form->control('sadr_files', ['type' => 'file', 'label' => false, 'required' => 'required']);?>
        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10"> 
              <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Upload</button>
            </div> 
        </div>
      <?= $this->Form->end() ?>
    </div>
    <div class="col-sm-6">

    </div>
</div>
