<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/saefis/saefi_view');
  $this->assign('baseClass', 'saefi_form');
  $this->assign('editable', false);
?>

<?php $this->start('actions'); ?>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
      <?= ($saefi->submitted == 2) ? $saefi->reference_number : $saefi->created ?></a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php 
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => $prefix, $saefi->id], ['escape' => false]); 
    echo "&nbsp;";
    ?>
    <?php if(empty($saefi->assigned_to)) { ?>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
        <small class="pull-right"><?= '<b>Assigned To</b>:'.$evaluators->toArray()[$saefi->assigned_to]?></small>
    <?php }  ?>
<?php $this->end(); ?>


<?php $this->start('submit_buttons'); ?>

<?php $this->end(); ?>

<?php $this->start('other_tabs'); ?>

    </div> <!-- Firstly, close the first tab!! IMPORTANT -->
<!-- </div> -->
  <!-- </div> -->
</div>

<?php $this->end(); ?>

