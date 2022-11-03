<?php

$this->Html->script('aefi_edit', ['block' => true]);

?>
<div class="row">

    <div class="col-xs-3">

        <h4 class="page-header text-center"> ADR</h4>
        <?= $this->Form->create($report, ['type' => 'file' ,'url' => ['action' => 'update-settings']]) ?>
        <?php echo $this->Form->control('adr_year', ['type' => 'checkbox', 'label' => 'ADR per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_month', ['type' => 'checkbox', 'label' => 'ADR per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_inst', ['type' => 'checkbox', 'label' => 'ADR per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('adr_med', ['type' => 'checkbox', 'label' => 'ADR per Medicine', 'templates' =>  'checkbox_form']);
        ?>

    </div>
    <div class="col-xs-3">

        <h4 class="page-header text-center"> SAE</h4>
        <?php echo $this->Form->control('sae_year', ['type' => 'checkbox', 'label' => 'SAE per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_month', ['type' => 'checkbox', 'label' => 'SAE per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_inst', ['type' => 'checkbox', 'label' => 'SAE per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('sae_med', ['type' => 'checkbox', 'label' => 'SAE per Medicine', 'templates' =>  'checkbox_form']);
        ?>

    </div>

    <div class="col-xs-3">

        <h4 class="page-header text-center"> AEFI</h4>
        <?php echo $this->Form->control('aefi_year', ['type' => 'checkbox', 'label' => 'AEFI per Year', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_month', ['type' => 'checkbox', 'label' => 'AEFI per Month', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_inst', ['type' => 'checkbox', 'label' => 'AEFI per Institution', 'templates' =>  'checkbox_form']);
        echo $this->Form->control('aefi_med', ['type' => 'checkbox', 'label' => 'AEFI per Medicine', 'templates' =>  'checkbox_form']);
        ?>

    </div>

    <div class="col-xs-3">

        <h4 class="page-header text-center"> </h4>

        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-lg active text-center"
                onclick="return confirm('Are you sure you want to update public reports?');"><i class="fa fa-save"
                    aria-hidden="true"></i>
                Update</button>
        </p>

        <?= $this->Form->end() ?>
    </div>
</div>