<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('public_report', ['block' => true]); ?>

<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports
</h1>

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


<!-- Additional Reports -->
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Year
</h4>
<div class="row">
    <div class="col-xs-4 col-sm-4">
        <div id="sadrs-year"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="saefis-year"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="aefis-year"></div>
    </div>
</div>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Month
</h4>
<div class="row">
    <div class="col-xs-4 col-sm-4">
        <div id="sadrs-month-index"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="sae-month-index"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="aefi-month-index"></div>
    </div>
</div>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
    Institution
</h4>
<div class="row">
    <div class="col-xs-4 col-sm-4">
        <div id="sadrs-institution-index"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="sae-institution-index"></div>
    </div>
    <div class="col-xs-4 col-sm-4">
        <div id="aefi-institution-index"></div>
    </div>
</div>