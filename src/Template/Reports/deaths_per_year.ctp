<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/deaths_per_year', ['block' => true]); ?>

<div class="row">
<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>

    <div class="col-xs-12">
      <div id="death-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="death-adr"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="death-sae"></div>
    </div><div class="col-xs-6 col-sm-6">
      <div id="death-aefi"></div>
    </div>



