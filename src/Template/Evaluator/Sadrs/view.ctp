<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php 
  echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $sadr->id], ['escape' => false]);
  echo $this->element('sadrs/reporter_view');
?>