<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/sadrs_per_causality', ['block' => true]); ?>

<div class="row">
<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; ADRS by assessment</h3>
    <div class="col-xs-12 col-sm-12">
      <div id="sadrs-causality"></div>
    </div>
</div>
