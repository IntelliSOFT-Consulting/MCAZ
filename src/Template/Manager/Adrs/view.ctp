<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<?php
  $this->extend('/Element/adrs/adr_form');
  $this->assign('baseClass', 'adr_form');
  $this->assign('editable', false);
?>

<?php $this->start('actions'); ?>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
      <?= ($adr->submitted == 2) ? $adr->reference_number : $adr->created ?></a></li>
    <?php if($adr->submitted == 2) { ?>
    <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
        <?php 
            if(empty($adr->assigned_to)) {
                echo 'Assign Evaluator';
            } else {
                echo "Assigned to:".$evaluators->toArray()[$adr->assigned_to];
            }
         ?>
    </a></li>
    <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
    <li role="presentation"><a href="#request_reporter" aria-controls="request_reporter" role="tab" data-toggle="tab">Request info</a></li>
    <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
        <?php if($adr->copied === 'new copy') { ?>
    <li role="presentation"><a href="#original" aria-controls="original" role="tab" data-toggle="tab">Original Report</a></li>
        <?php } ?>
    <?php } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php 
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => false, $adr->id], ['escape' => false]); 
    echo "&nbsp;";
    if($adr->copied === 'new copy') {
        echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> Edit copy </button>', ['action' => 'edit', $adr->id], ['escape' => false]); 
    } else {
        echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-copy" aria-hidden="true"></i> Create clean copy to edit </button>', ['action' => 'clean', 'prefix' => $prefix, $adr->id], ['escape' => false]); 
    }
    ?>
    <?php if(empty($adr->assigned_to)) { ?>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
        <small><?= '<b>Assigned To</b>:'.$evaluators->toArray()[$adr->assigned_to]?></small>
    <?php }  ?>
<?php $this->end(); ?>


<?php $this->start('submit_buttons'); ?>

<?php $this->end(); ?>

<?php $this->start('other_tabs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->
<!-- </div> -->
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php echo $this->element('adrs/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="causality">
        <?php echo $this->element('adrs/causality') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request_reporter">
        <?php  echo $this->element('adrs/request_reporter') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee_review">
        <?php  echo $this->element('adrs/committee_review') ?>
    </div>
        <?php if($adr->copied === 'new copy') { ?>        
    <div role="tabpanel" class="tab-pane" id="original">
        <?php  echo $this->element('adrs/clean') ?>
    </div>
        <?php } ?>
  <!-- </div> -->
</div>

<?php $this->end(); ?>

