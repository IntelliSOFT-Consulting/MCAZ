<?php

$this->Html->css('public_reports', ['block' => true]);
$this->Html->script('aefi_edit', ['block' => true]);
$this->Html->script('loop', ['block' => true]); 

?>
<div class="row">

    <div class="col-xs-3">

        <h4 class="page-header text-center"> ADR</h4>
        <?= $this->Form->create($report, ['type' => 'file', 'url' => ['action' => 'update-settings']]) ?>
        <?php echo $this->Form->control('adr_year', ['type' => 'checkbox', 'label' => 'ADR per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_month', ['type' => 'checkbox', 'label' => 'ADR per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_inst', ['type' => 'checkbox', 'label' => 'ADR per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_med', ['type' => 'checkbox', 'label' => 'ADR per Medicine', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_province', ['type' => 'checkbox', 'label' => 'ADR per Province', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_desig', ['type' => 'checkbox', 'label' => 'ADR per Designation', 'templates' =>  'checkbox_form']);
        ?>

    </div>
    <div class="col-xs-3">

        <h4 class="page-header text-center"> SAE</h4>
        <?php echo $this->Form->control('sae_year', ['type' => 'checkbox', 'label' => 'SAE per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_month', ['type' => 'checkbox', 'label' => 'SAE per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_inst', ['type' => 'checkbox', 'label' => 'SAE per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_med', ['type' => 'checkbox', 'label' => 'SAE per Medicine', 'templates' =>  'checkbox_form']);
        // echo $this->Form->control('sae_province', ['type' => 'checkbox', 'label' => 'SAE per Province', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_desig', ['type' => 'checkbox', 'label' => 'SAE per Designation', 'templates' =>  'checkbox_form']);
        ?>

    </div>

    <div class="col-xs-3">

        <h4 class="page-header text-center"> AEFI</h4>
        <?php echo $this->Form->control('aefi_year', ['type' => 'checkbox', 'label' => 'AEFI per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_month', ['type' => 'checkbox', 'label' => 'AEFI per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_inst', ['type' => 'checkbox', 'label' => 'AEFI per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_med', ['type' => 'checkbox', 'label' => 'AEFI per Medicine', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_province', ['type' => 'checkbox', 'label' => 'AEFI per Province', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_desig', ['type' => 'checkbox', 'label' => 'AEFI per Designation', 'templates' =>  'checkbox_form']);
        ?>

    </div>

    <div class="col-xs-3">

        <h4 class="page-header text-center"> SAEFI</h4>
        <?php echo $this->Form->control('saefi_year', ['type' => 'checkbox', 'label' => 'SAEFI per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('saefi_month', ['type' => 'checkbox', 'label' => 'SAEFI per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('saefi_inst', ['type' => 'checkbox', 'label' => 'SAEFI per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('saefi_med', ['type' => 'checkbox', 'label' => 'SAEFI per Medicine', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('saefi_province', ['type' => 'checkbox', 'label' => 'SAEFI per Province', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('saefi_desig', ['type' => 'checkbox', 'label' => 'SAEFI per Designation', 'templates' =>  'checkbox_form']);
        ?>

    </div>

    <div class="col-xs-3">

        <h4 class="page-header text-center"> </h4>

        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-sm active text-center" onclick="return confirm('Are you sure you want to update public reports?');"><i class="fa fa-save" aria-hidden="true"></i>
                Update</button>
            <button type="button" class="btn btn-success btn-sm active text-center" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-eye" aria-hidden="true"></i> Preview
            </button>
        </p>

        <?= $this->Form->end() ?>
    </div>
</div>

<div class="modal fade modal-fullscreen" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Public Reports</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->element('reports/public-common') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>
 