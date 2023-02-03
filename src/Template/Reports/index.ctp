<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('index_report', ['block' => true]); ?>

<?php


/**
 * Check the current logged in user
 */
$user = $this->request->session()->read('Auth.User.group_id');
if ($user == 1 or $user == 2) { ?>
<?= $this->element('reports/public') ?>
<?php }
?>


<div class="row">
    <h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>
    <div class="col-xs-12 ">
        <div id="total-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="hopitalization-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="death-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="hopitalization-adr"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="hopitalization-sae"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="hopitalization-sae"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="hopitalization-aefi"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="sadrs-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="adr-facilities"></div>
    </div>

    <div class="col-xs-6 col-sm-6 placeholder">
        <div id="sadrs-causality"></div>
    </div>


</div>

<div class="row">
    <div class="col-xs-6 col-sm-6">
        <div id="saefis-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div id="adrs-index"></div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6">
        <div id="aefis-index"></div>
    </div>
</div>