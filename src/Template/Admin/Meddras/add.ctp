<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> Meddras', ['controller' => 'Meddras', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

        <div class="page-header">
            <div class="styled_title"><h1>Add Details </h1></div>
        </div>
        <?= $this->Flash->render() ?>

    <?= $this->Form->create($meddra) ?>

    <div class="row">
        <div class="col-md-6">
            <?php
                // echo $this->Form->control('id', ['templates' => 'table_form']);
                echo $this->Form->control('terminology', ['label' => 'terminology', 'escape' => false]);
                ?>
        </div><!--/span-->
        <div class="col-md-6">
            
        </div><!--/span-->
    </div><!--/row-->
     <hr>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-primary active" id="login"><i class="fa fa-save" aria-hidden="true"></i> Add</button>
        </div> 
    </div>
     <?= $this->Form->end() ?>
    </div>
</div>

