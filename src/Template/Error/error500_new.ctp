<?php $this->start('sidebar'); ?>
    <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<?php
  $this->assign('Home', 'active');
?>
<!-- Example row of columns -->
    <div class="row">
      <div class="col-md-12">
        <p class="text-center text-error">We have encountered a problem. Our engineers will look into this.</p>
        <p class="text-center">
          <?php echo $this->Html->link(
                '<i class="fa fa-home" aria-hidden="true"></i> Home',
                ['controller' => 'Pages', 'action' => 'home', 'prefix' => false], ['escape' => false, 'class' => 'btn btn-primary btn-lg']
              );  
          ?>
        </p>
      </div>
    </div>
