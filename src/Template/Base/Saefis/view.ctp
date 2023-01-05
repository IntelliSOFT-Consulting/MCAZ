<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
$this->extend('/Element/saefis/saefi_view');
$this->assign('baseClass', 'saefi_form');
$this->assign('editable', false);
?>

<?php $this->start('actions'); ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
            <?= ($saefi->submitted == 2) ? $saefi->reference_number : $saefi->created ?></a></li>
    <?php if ($saefi->submitted == 2) { ?>
        <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
                <?php
                if (empty($saefi->assigned_to)) {
                    echo 'Assign Evaluator';
                } else {
                    echo "Assigned to:" . $assignees->toArray()[$saefi->assigned_to];
                }
                ?>
            </a></li>
        <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
        <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
    <?php } ?>
    <?php if ($saefi->report_type === 'FollowUp') { ?>
        <li role="presentation"><a href="#initial" aria-controls="initial" role="tab" data-toggle="tab">Initial Report</a></li>
    <?php } ?>

    <?php if ($saefi->copied === 'new copy') { ?>
        <li role="presentation"><a href="#original" aria-controls="original" role="tab" data-toggle="tab">Original Report</a></li>
    <?php } ?>
    <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab">STAGES</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
        <br>
        <?php
        echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => $prefix, $saefi->id], ['escape' => false]);
        echo "&nbsp;";
        if ($saefi->copied === 'new copy') {
            echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> Edit copy </button>', ['action' => 'edit', $saefi->id], ['escape' => false]);
        } elseif ($saefi->submitted == 2) {
            echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-copy" aria-hidden="true"></i> Create clean copy to edit </button>', ['action' => 'clean', 'prefix' => $prefix, $saefi->id], ['escape' => false]);
        }
        ?>
        <?php if (empty($saefi->assigned_to)) { ?>
            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
        <?php } else { ?>
            <small class="pull-right"><?= '<b>Assigned To</b>:' . $assignees->toArray()[$saefi->assigned_to] ?></small>
        <?php }  ?>
        <?php $this->end(); ?>


        <?php $this->start('submit_buttons'); ?>

        <?php $this->end(); ?>

        <?php $this->start('other_tabs'); ?>

    </div> <!-- Firstly, close the first tab!! IMPORTANT -->
    <!-- </div> -->
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php echo $this->element('saefis/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="causality">
        <?php echo $this->element('saefis/causality') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee_review">
        <?php echo $this->element('saefis/committee_review') ?>
    </div>
    <?php if ($saefi->report_type === 'FollowUp') { ?>
        <div role="tabpanel" class="tab-pane" id="initial">
            
            <?php 
            //echo $this->element('saefis/saefi_view', ['saefi' => $saefi->original_saefi, 'nfetch' => true]) 
            ?>
        </div>
    <?php } ?>
    <?php if ($saefi->copied === 'new copy') { ?>
        <div role="tabpanel" class="tab-pane" id="original">
            <?php  //echo $this->element('saefis/clean') 
            ?>
            <?php echo $this->element('saefis/saefi_view', ['saefi' => $saefi->original_saefi, 'nfetch' => true]) ?>
        </div>
    <?php } ?>

    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('saefis/stages') ?>
    </div>
    <!-- </div> -->
</div>

<?php $this->end(); ?>