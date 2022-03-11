<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/sadrs_per_province', ['block' => true]); ?>

<!-- <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div id="sadrs-province"></div>
    </div>
</div> -->

<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; ADRS per province</h3>
<div class="row">
  <div class="col-xs-6 col-sm-6">
    <div id="sadr-province"></div>
  </div>
  <div class="col-xs-6 col-sm-6">
    <div id="sadr-year"></div>
  </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-6">
    <div id="sadrs-causality"></div>
  </div>
</div>