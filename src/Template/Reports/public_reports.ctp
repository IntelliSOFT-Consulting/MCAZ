
<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('public_report', ['block' => true]); ?>

<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>

<div class="row">
    <div class="col-xs-6 col-sm-6">
      <div id="sadrs-index"></div>
    </div>    
    <div class="col-xs-6 col-sm-6">
      <div id="aefis-index"></div>
    </div>    
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6">
      <div id="adrs-index"></div>
    </div>    
    <div class="col-xs-6 col-sm-6">
      <div id="saefis-index"></div>
    </div>    
</div>
