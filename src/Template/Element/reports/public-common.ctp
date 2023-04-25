<?php if (($report->adr_desig == 1) | ($report->sae_design == 1) | ($report->aefi_desig == 1) | ($report->sae_desig == 1)) { ?>
    <div class="row">
        <?php if ($report->adr_desig == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="sadrs-index"></div>
            </div>
        <?php } ?>
        <?php if ($report->sae_desig == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="adrs-index"></div>
            </div>
        <?php } ?>

    </div>
    <div class="row">
        <?php if ($report->aefi_desig == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="aefis-index"></div>
            </div>
        <?php } ?>
        <?php if ($report->saefi_desig == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="saefis-index"></div>
            </div>
        <?php } ?>
    </div>
<?php  } ?>

<!-- Additional Reports -->
<?php if (($report->adr_year == 1) | ($report->sae_year == 1) | ($report->aefi_year == 1) | ($report->sae_year == 1)) { ?>
    <h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Year
    </h4>
    <div class="row">
        <?php if ($report->adr_year == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="sadrs-year"></div>
            </div>
        <?php  } ?>


        <?php if ($report->sae_year == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="sae-year"></div>
            </div>

        <?php  } ?>
    </div>
    <div class="row">
        <?php if ($report->aefi_year == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="aefis-year"></div>
            </div>
        <?php  } ?>

        <?php if ($report->saefi_year == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="saefis-year"></div>
            </div>
        <?php  } ?>
    </div>
<?php  } ?>

<?php if (($report->adr_month == 1) | ($report->sae_month == 1) | ($report->aefi_month == 1) | ($report->saefi_month == 1)) { ?>
    <h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per Month
    </h4>
    <div class="row">
        <?php if ($report->adr_month == 1) { ?>
            <div class="col-xs-4 col-sm-6">
                <div id="sadrs-month"></div>
            </div>
        <?php  } ?>
        <?php if ($report->sae_month == 1) { ?>
            <div class="col-xs-4 col-sm-6">
                <div id="sae-month"></div>
            </div>
        <?php  } ?>
    </div>
    <div class="row">
        <?php if ($report->aefi_month == 1) { ?>
            <div class="col-xs-4 col-sm-6">
                <div id="aefis-month"></div>
            </div>
        <?php  } ?>
        <?php if ($report->saefi_month == 1) { ?>
            <div class="col-xs-4 col-sm-6">
                <div id="saefis-month"></div>
            </div>
        <?php  } ?>
    </div>
<?php  } ?>
<?php if (($report->adr_inst == 1) | ($report->aefi_inst == 1) | ($report->saefi_inst == 1) | ($report->sae_inst == 1)) { ?>
    <h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
        Institution
    </h4>
    <div class="row">
        <?php if ($report->adr_inst == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="sadrs-institution"></div>
            </div>
        <?php  } ?>
        <?php if ($report->sae_inst == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="sae-institution"></div>
            </div>
        <?php  } ?>
    </div>
    <div class="row">
        <?php if ($report->aefi_inst == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="aefis-institution"></div>
            </div>
        <?php  } ?>
        <?php if ($report->saefi_inst == 1) { ?>
            <div class="col-xs-6 col-sm-6">
                <div id="saefis-institution"></div>
            </div>
        <?php  } ?>

    </div>
<?php  } ?>
<?php if (($report->adr_med == 1) | ($report->sae_med == 1) | ($report->aefi_med == 1) | ($report->saefi_med == 1)) { ?>
    <h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
        Medicine
    </h4>
    <div class="row">
        <?php if ($report->adr_med == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="sadrs-medicine"></div>
            </div>
        <?php  } ?>
        <?php if ($report->sae_med == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="sae-medicine"></div>
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
    <div class="row">
        <?php if ($report->saefi_med == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="saefis-medicine"></div>
            </div>
        <?php  } ?>
    </div>
<?php  } ?>

<!-- Reports per Province -->
<?php if (($report->adr_province == 1) | ($report->sae_province == 1) | ($report->aefi_province == 1) | ($report->saefi_province == 1)) { ?>
    <h4 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports per
        Province
    </h4>
    <div class="row">
        <?php if ($report->adr_province == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="sadrs-province"></div>
            </div>
        <?php  } ?>
    </div>

    <div class="row">
        <?php if ($report->aefi_province == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="aefis-province"></div>
            </div>
        <?php  } ?>
    </div>
    <div class="row">
        <?php if ($report->saefi_province == 1) { ?>
            <div class="col-xs-12 col-sm-12">
                <div id="saefis-province"></div>
            </div>
        <?php  } ?>
    </div>
<?php  } ?>