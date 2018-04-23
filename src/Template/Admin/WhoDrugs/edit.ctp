<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> WhoDrugs', ['controller' => 'WhoDrugs', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

        <div class="page-header">
            <div class="styled_title"><h1>Update Details </h1></div>
        </div>
        <?= $this->Flash->render() ?>

    <?= $this->Form->create($whoDrug) ?>

    <div class="row">
        <div class="col-md-6">
            <?php
                // echo $this->Form->control('id', ['templates' => 'table_form']);
                echo $this->Form->control('drug_name', ['label' => 'Drug Name', 'escape' => false]);
                ?>
        </div><!--/span-->
        <div class="col-md-6">
            
        </div><!--/span-->
    </div><!--/row-->
     <hr>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-success active" id="login"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
        </div> 
    </div>
     <?= $this->Form->end() ?>
    </div>
</div>

