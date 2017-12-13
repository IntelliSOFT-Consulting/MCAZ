<div class="sadr_form">
	<?php 
  // echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]);
  // // echo $this->element('sadrs/reporter_view');
  // $globalEd = true;
  // echo $this->element('sadrs/sadr_form', ['globalEd' => true]);
?>
</div>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]); ?>
<?php $this->end(); ?>

<?php
  //echo $this->element('sadrs/sadr_form', ['globalEd' => false]);
  $this->extend('/Element/sadrs/sadr_form');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'sadr_form');
?>