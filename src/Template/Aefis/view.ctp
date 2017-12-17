<?php 
  // echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Aefis', 'action' => 'view', '_ext' => 'pdf', $aefi->id], ['escape' => false]);
  // echo $this->element('aefis/reporter_view');
?>



<?php
  //echo $this->element('sadrs/sadr_form', ['globalEd' => false]);
  $this->extend('/Element/aefis/aefi_form');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'aefi_form');
?>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Aefis', 'action' => 'view', '_ext' => 'pdf', $aefi->id], ['escape' => false]); ?>
	<?php echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Create Followup Report </button>', ['controller' => 'Aefis', 'action' => 'followup', $aefi->id], ['escape' => false]); ?>
<?php $this->end(); ?>

<?php $this->start('followups');  ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
   <?= $this->element('aefis/view_followups') ?>
<?php $this->end() ?>
