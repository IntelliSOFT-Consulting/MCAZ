<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
<h1 class="page-header"> Import CSV drug list <small>format: <br>
    panadol<br>
    lamiduvine<br>
  </small></h1>

    <div class="col-sm-12">
      <h4><i class="fa fa-file" aria-hidden="true"></i> ADRs Import</h4>
      <?= $this->Form->create(null, ['type' => 'file']) ?>
        <?= $this->Form->control('sadr_files', ['type' => 'file', 'label' => false, 'required' => 'required']);?>
        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10"> 
              <button type="submit" name="submitted" value="sadrs" class="btn btn-primary">
                  <i class="fa fa-save" aria-hidden="true"></i> Upload
              </button>
            </div> 
        </div>
      <?= $this->Form->end() ?>
    </div>
</div>


