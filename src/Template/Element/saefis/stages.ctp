<div class="row">
    <div class="col-xs-12">
        <?php 
            foreach ($saefi->report_stages as $application_stage) {
        ?>
            <p><a href="#" class="btn btn-primary btn-lg">
                <?= $application_stage->description ?> - <?= $application_stage->stage ?> 
                <br><small><?= $application_stage->created ?></small>
                </a>
            </p>
            <p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </p>
        <?php
            }
        ?>
    </div>
</div>