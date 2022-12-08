<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
$this->extend('/Element/aefis/aefi_form');
$this->assign('baseClass', 'aefi_form');
$this->assign('editable', false);
?>

<?php $this->start('actions'); ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
            <?= ($aefi->submitted == 2) ? $aefi->reference_number : $aefi->created ?></a></li>
    <?php if ($aefi->submitted == 2) { ?>
        <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
                <?php
                if (empty($aefi->assigned_to)) {
                    echo 'Assign Evaluator';
                } else {
                    echo "Assigned to:" . $evaluators->toArray()[$aefi->assigned_to];
                }
                ?>
            </a></li>
        <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
        <li role="presentation"><a href="#request_reporter" aria-controls="request_reporter" role="tab" data-toggle="tab">Request info</a></li>
        <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
        <?php if ($aefi->report_type === 'FollowUp') { ?>
        <li role="presentation"><a href="#initial" aria-controls="initial" role="tab" data-toggle="tab">Initial Report</a></li>
    <?php } ?>
        <?php if ($aefi->copied === 'new copy') { ?>
            <li role="presentation"><a href="#original" aria-controls="original" role="tab" data-toggle="tab">Original Report</a></li>
        <?php } ?>
    <?php } ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
        <br>
        <?php
        echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => false, $aefi->id], ['escape' => false]);
        echo "&nbsp;";
        if ($aefi->copied === 'new copy') {
            echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> Edit copy </button>', ['action' => 'edit', $aefi->id], ['escape' => false]);
        } else {
            echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-copy" aria-hidden="true"></i> Create clean copy to edit </button>', ['action' => 'clean', 'prefix' => $prefix, $aefi->id], ['escape' => false]);
        }
        ?>
        <?php if (empty($aefi->assigned_to)) { ?>
            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
        <?php } else { ?>
            <small><?= '<b>Assigned To</b>:' . $evaluators->toArray()[$aefi->assigned_to] ?></small>
        <?php }  ?>
        <?php $this->end(); ?>


        <?php $this->start('submit_buttons'); ?>

        <?php $this->end(); ?>


        <?php $this->start('followups');  ?>
        <hr>
        <h2 class="text-center"><u>Follow Ups Section</u></h2>
        <?= $this->element('aefis/view_followups') ?>
        <?php $this->end() ?>

        <?php $this->start('other_tabs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->
    <!-- </div> -->
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php echo $this->element('aefis/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="causality">
        <?php echo $this->element('aefis/causality') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request_reporter">
        <?php echo $this->element('aefis/request_reporter') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee_review">
        <?php echo $this->element('aefis/committee_review') ?>
    </div>
    <?php if ($aefi->copied === 'new copy') { ?>
        <div role="tabpanel" class="tab-pane" id="original">
            <?php echo $this->element('aefis/clean') ?>
        </div>
    <?php } ?>
</div>
</div>

<?php $this->end(); ?>