<div class="sadr_form">
	<?php 
  // echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]);
  // // echo $this->element('sadrs/reporter_view');
  // $editable = true;
  // echo $this->element('sadrs/sadr_form', ['editable' => true]);
?>
</div>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]); ?>
  <?php echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Create Followup Report </button>', ['controller' => 'Sadrs', 'action' => 'followup', $sadr->id], ['escape' => false]); ?>
<?php $this->end(); ?>

<?php
  //echo $this->element('sadrs/sadr_form', ['editable' => false]);
  $this->extend('/Element/sadrs/sadr_form');
  $this->assign('editable', false);
  $this->assign('baseClass', 'sadr_form');
?>

<?php $this->start('followups');  ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
   <?= $this->element('sadrs/view_followups') ?>
<?php $this->end() ?>