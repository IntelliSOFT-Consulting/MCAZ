<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
$this->extend('/Element/sadrs/sadr_view');
$this->assign('editable', false);
$this->assign('baseClass', 'sadr_form');
$this->Html->script('jquery/assign_evaluator', ['block' => true]);
?>

<?php $this->start('actions'); ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
      <?= ($sadr->submitted == 2) ? $sadr->reference_number : $sadr->created ?></a></li>
  <?php if ($sadr->submitted == 2) { ?>
    <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
        <?php
        if (empty($sadr->assigned_to)) {
          echo 'Assign Evaluator';
        } else {
          echo "Assigned to:" . $evaluators->toArray()[$sadr->assigned_to];
        }
        ?>
      </a></li>
    <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
    <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
  <?php } ?>
  <?php if ($sadr->copied === 'new copy') { ?>
    <li role="presentation"><a href="#original" aria-controls="original" role="tab" data-toggle="tab">Original Report</a></li>
  <?php } ?>
  <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab">STAGES</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]);
    echo "&nbsp;";
    if ($sadr->copied === 'new copy') {
      echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> Edit copy </button>', ['action' => 'edit', $sadr->id], ['escape' => false]);
    } else {
      echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-copy" aria-hidden="true"></i> Create clean copy to edit </button>', ['action' => 'clean', 'prefix' => $prefix, $sadr->id], ['escape' => false]);
    }
    ?>
    <?php if (empty($sadr->assigned_to)) { ?>
      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
      <small><?= '<b>Assigned To</b>:' . $evaluators->toArray()[$sadr->assigned_to] ?></small>
    <?php }  ?>
    <?php $this->end(); ?>


    <?php $this->start('submit_buttons'); ?>

    <?php $this->end(); ?>


    <?php $this->start('followups');  ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
    <?= $this->element('sadrs/view_followups') ?>
    <?php $this->end() ?>

    <?php $this->start('other_tabs'); ?>
  </div> <!-- Firstly, close the first tab!! IMPORTANT -->
</div>

<div role="tabpanel" class="tab-pane" id="assign">
  <?= $this->element('sadrs/assign_evaluator') ?>
</div>
<div role="tabpanel" class="tab-pane" id="causality">
  <?= $this->element('sadrs/causality') ?>
</div>
<div role="tabpanel" class="tab-pane" id="committee_review">
  <?= $this->element('sadrs/committee_review') ?>
</div>
<?php if ($sadr->copied === 'new copy') { ?>
  <div role="tabpanel" class="tab-pane" id="original">
    <?php  //echo $this->element('sadrs/clean') 
    ?>
    <?php echo $this->element('sadrs/sadr_view', ['sadr' => $sadr->original_sadr, 'nfetch' => true]) ?>
  </div>
<?php } ?>
<div role="tabpanel" class="tab-pane" id="stages">
  <?= $this->element('sadrs/stages') ?>
</div>
</div>

<?php $this->end(); ?>