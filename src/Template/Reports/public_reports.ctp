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
<?php if (($report->adr_year == 1) | ($report->sae_year == 1) | ($report->aefi_year == 1)) { ?>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Year
</h4>
<div class="row">
    <?php if ($report->adr_year == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="sadrs-year"></div>
    </div>
    <?php  } ?>


    <?php if ($report->sae_year == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="saefis-year"></div>
    </div>
    <?php  } ?>

    <?php if ($report->aefi_year == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="aefis-year"></div>
    </div>
    <?php  } ?>
</div>
<?php  } ?>

<?php if (($report->adr_month == 1) | ($report->sae_month == 1) | ($report->aefi_month == 1)) { ?>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Month
</h4>
<div class="row">
    <?php if ($report->adr_month == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="sadrs-month"></div>
    </div>
    <?php  } ?>
    <?php if ($report->sae_month == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="saefis-month"></div>
    </div>
    <?php  } ?>
    <?php if ($report->aefi_month == 1) { ?>
    <div class="col-xs-4 col-sm-4">
        <div id="aefis-month"></div>
    </div>
    <?php  } ?>
</div>
<?php  } ?>
<?php if (($report->adr_inst == 1) | ($report->aefi_inst == 1)) { ?>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
    Institution
</h4>
<div class="row">
    <?php if ($report->adr_month == 1) { ?>
    <div class="col-xs-6 col-sm-6">
        <div id="sadrs-institution"></div>
    </div>
    <?php  } ?>
    <?php if ($report->aefi_inst == 1) { ?>
    <div class="col-xs-6 col-sm-6">
        <div id="aefis-institution"></div>
    </div>
    <?php  } ?>
</div>
<?php  } ?>
<?php if (($report->adr_med == 1) | ($report->sae_med == 1) | ($report->aefi_med == 1)) { ?>
<h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
    Medicine
</h4>
<div class="row">
    <?php if ($report->adr_med == 1) { ?>
    <div class="col-xs-12 col-sm-12">
        <div id="sadrs-medicine"></div>
    </div>
    <?php  } ?>

</div>
<div class="row">
    <?php if ($report->sae_med == 1) { ?>
    <div class="col-xs-12 col-sm-12">
        <div id="saefis-medicine"></div>
    </div>
    <?php  } ?>
</div>
<div class="row">
    <?php if ($report->aefi_med == 1) { ?>
    <div class="col-xs-12 col-sm-12">
        <div id="aefis-medicine"></div>
    </div>
    <?php  } ?>
</div>
<?php  } ?>