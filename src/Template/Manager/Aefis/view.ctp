<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/aefis/aefi_form');
  $this->assign('baseClass', 'aefi_form');
?>

<?php $this->start('actions'); ?>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab"><?= $aefi->reference_number ?></a></li>
    <?php if($aefi->submitted == 2) { ?>
    <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
        <?php 
            if(empty($aefi->assigned_to)) {
                echo 'Assign Evaluator';
            } else {
                echo "Assigned to:".$evaluators->toArray()[$aefi->assigned_to];
            }
         ?>
    </a></li>
    <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
    <li role="presentation"><a href="#request_reporter" aria-controls="request_reporter" role="tab" data-toggle="tab">Request for Reporter for info</a></li>
    <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
    <?php } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">

    <?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Aefis', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $aefi->id], ['escape' => false]); ?>
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
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php echo $this->element('aefis/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="causality">
        <?php // $this->element('aefis/causality') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request_reporter">
        <?php  echo $this->element('aefis/request_reporter') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee_review">
        <?php  echo $this->element('aefis/committee_review') ?>
    </div>
  </div>
</div>

<?php $this->end(); ?>

