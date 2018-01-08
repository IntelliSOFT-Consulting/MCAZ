
<?php
  $this->extend('/Element/saefis/saefi_form');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'saefi_form');
?>

<?php $this->start('actions'); ?>
	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Saefis', 'action' => 'view', '_ext' => 'pdf', $saefi->id], ['escape' => false]); ?>
<?php $this->end(); ?>