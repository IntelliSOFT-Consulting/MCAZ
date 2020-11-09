<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  //echo $this->element('sadrs/sadr_form', ['globalEd' => false]);
  $this->extend('/Element/aefis/aefi_form');
  $this->assign('editable', true);
  $this->assign('baseClass', 'aefi_form');
?>

<?php $this->start('actions'); ?>
  <?php 
    echo $this->Html->link('<button class="btn btn-info"> <i class="fa fa-backward" aria-hidden="true"></i> Back to view </button>', ['action' => 'view', $aefi->id], ['escape' => false]); 
    ?>
<?php $this->end(); ?>

<?php $this->start('submit_buttons'); ?>
<div class="well">
  <div class="row">
    <div class="col-md-4 text-center">
      <button name="submitted" value="1" id="aefiSaveChanges" class="btn btn-primary active" type="submit">
        <span class="fa fa-edit" aria-hidden="true"></span> Save changes
      </button>
    </div>
    <div class="col-md-4 text-center">
      <button name="submitted" value="2" id="aefiSubmit" class="btn btn-success active" type="submit">
        <span class="fa fa-send" aria-hidden="true"></span> Save and Exit
      </button>
    </div>
    <div class="col-md-4 text-center">
      <button name="submitted" value="-1" id="aefiCancel" class="btn btn-default active" type="submit"
              onclick="return confirm('Are you sure you wish to cancel the report?');"
      >
        <span class="fa fa-close" aria-hidden="true"></span> Cancel
      </button>
    </div>    
  </div>
</div>
<?php $this->end(); ?>