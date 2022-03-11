<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> List Facilities', ['action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-warning')); ?>
<hr>
<h1 class="page-header">Add Facility</h1>

<div class="facilityCodes form large-9 medium-8 columns content">
    <?= $this->Form->create($facility) ?>
    <fieldset>
        <?php
            echo $this->Form->control('facility_code');
            echo $this->Form->control('dhis2_code');
            echo $this->Form->control('district');
            echo $this->Form->control('facility_name');
            echo $this->Form->control('longitude');
            echo $this->Form->control('latitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
