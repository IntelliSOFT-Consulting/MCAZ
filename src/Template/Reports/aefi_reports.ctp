<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/aefi_reports', ['block' => true]); ?>


<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; ADRS per province</h3>
<div class="row">
  <div class="col-xs-12 col-sm-12">
    <div id="aefis-province"></div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12">
    <div id="aefis-year"></div>
  </div>
</div>

