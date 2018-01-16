<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/aefis_per_province', ['block' => true]); ?>

<div class="row">
<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; AEFIS per province</h3>
    <div class="col-xs-12 col-sm-12">
      <div id="aefis-province"></div>
    </div>
</div>
