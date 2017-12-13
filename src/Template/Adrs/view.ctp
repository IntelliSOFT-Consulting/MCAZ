<?php 
    // echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Adrs', 'action' => 'view', '_ext' => 'pdf', $adr->id], ['escape' => false]);
    // echo $this->element('adrs/reporter_view');
?>

<?php
  $this->extend('/Element/adrs/adr_form');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'adr_form');
?>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Adrs', 'action' => 'view', '_ext' => 'pdf', $adr->id], ['escape' => false]); ?>
<?php $this->end(); ?>