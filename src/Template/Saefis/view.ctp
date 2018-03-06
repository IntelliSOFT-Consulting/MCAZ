<?php
  $this->extend('/Element/saefis/saefi_form');
  $this->assign('editable', false);
  $this->assign('baseClass', 'saefi_form');
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);
?>

<?php $this->start('actions'); ?>
<div class="row">
<div class="col-xs-2"> <!-- required for floating -->
  <ul class="nav nav-tabs tabs-left" data-offset-top="60"  role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($saefi->submitted == 2) ? $saefi->reference_number : $saefi->created ?></b></a></li>
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee Review(s)</b></a></li>     
  </ul>
</div>
<div class="col-xs-10">  

<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
  	<?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Saefis', 'action' => 'view', '_ext' => 'pdf', $saefi->id], ['escape' => false]); ?>
<?php $this->end(); ?>

<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="committee">      
        <?= $this->element('saefis/applicant_committee') ?>
    </div>
    </div>
  </div>
</div>
<?php $this->end(); ?>