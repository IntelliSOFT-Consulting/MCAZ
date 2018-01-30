<?php
  //echo $this->element('sadrs/sadr_form', ['globalEd' => false]);
  $this->extend('/Element/aefis/aefi_form');
  $this->assign('editable', true);
  $this->assign('baseClass', 'aefi_form');
?>

<?php $this->start('submit_buttons'); ?>
<div class="well">
  <div class="row">
    <div class="col-md-3 text-center">
      <button name="submitted" value="1" id="aefiSaveChanges" class="btn btn-primary active" type="submit" formnovalidate="formnovalidate">
        <span class="fa fa-edit" aria-hidden="true"></span> Save changes
      </button>
    </div>
    <div class="col-md-3 text-center">
      <button name="submitted" value="2" id="aefiSubmit" class="btn btn-success active" type="submit" formnovalidate="formnovalidate"
              onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
      >
        <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
      </button>
    </div>
    <div class="col-md-3 text-center">
      <button name="submitted" value="-1" id="aefiCancel" class="btn btn-default active" type="submit"
              onclick="return confirm('Are you sure you wish to cancel the report?');"
      >
        <span class="fa fa-close" aria-hidden="true"></span> Cancel
      </button>
    </div>    
    <div class="col-md-3 text-center">
      <span class="text-center">
        <?= $this->Html->link('<i class="fa fa-trash"></i> Delete', ['action' => 'delete', $aefi->id], ['confirm' => 'Are you sure you wish to delete the report? You will not be able to access it later.', 'class' => 'btn btn-danger active', 'escape' => false]) ?>
      </span>
    </div>
  </div>
</div>
<?php $this->end(); ?>