<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/aefis/aefi_view');
  $this->assign('baseClass', 'aefi_form');
  $this->assign('editable', false);
?>

<?php $this->start('actions'); ?>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
      <?= ($aefi->submitted == 2) ? $aefi->reference_number : $aefi->created ?></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php 
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => $prefix, $aefi->id], ['escape' => false]); 
    echo "&nbsp;";
    ?>
    <?php if(empty($aefi->assigned_to)) {?>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
        <small><?= '<b>Assigned To</b>:'.$evaluators->toArray()[$aefi->assigned_to]?></small>
    <?php }  ?>
<?php $this->end(); ?>


<?php $this->start('submit_buttons'); ?>

<?php $this->end(); ?>


<?php $this->start('followups');  ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
   <?= $this->element('aefis/view_followups') ?>
<?php $this->end() ?>

<?php $this->start('other_tabs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->
<!-- </div> -->
  </div>
</div>

<?php $this->end(); ?>

