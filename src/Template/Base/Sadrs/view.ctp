<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
$this->extend('/Element/sadrs/sadr_view');
$this->assign('editable', false);
$this->assign('baseClass', 'sadr_form');
$this->Html->script('jquery/assign_evaluator', ['block' => true]);
?>

<?php $this->start('actions'); ?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
      <?= ($sadr->submitted == 2) ? $sadr->reference_number : $sadr->created ?></a></li>
  <?php if ($sadr->submitted == 2) { ?>
    <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
        <?php
        if (empty($sadr->assigned_to)) {
          echo 'Assign Evaluator';
        } else {
          echo "Assigned to:" . $assignees->toArray()[$sadr->assigned_to];
        }
        ?>
      </a></li>
    <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
    <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
  <?php } ?>
  <?php if ($sadr->report_type === 'FollowUp') { ?>
    <li role="presentation"><a href="#initial" aria-controls="initial" role="tab" data-toggle="tab">Initial Report</a></li>
  <?php } ?>
  <?php if ($sadr->copied === 'new copy') { ?>
    <li role="presentation"><a href="#original" aria-controls="original" role="tab" data-toggle="tab">Original Report</a></li>
  <?php } ?>
  <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab">STAGES</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', $sadr->id], ['escape' => false]);
    echo "&nbsp;";
    if ($sadr->copied === 'new copy') {
      echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> Edit copy </button>', ['action' => 'edit', $sadr->id], ['escape' => false]);
    } else {
      echo $this->Html->link('<button class="btn btn-success"> <i class="fa fa-copy" aria-hidden="true"></i> Create clean copy to edit </button>', ['action' => 'clean', 'prefix' => $prefix, $sadr->id], ['escape' => false]);
    }
    ?>
    <?php if (empty($sadr->assigned_to)) { ?>
      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
      <small><?= '<b>Assigned To</b>:' . $assignees->toArray()[$sadr->assigned_to] ?></small>
    <?php }  ?>
    <?php $this->end(); ?>


    <?php $this->start('submit_buttons'); ?>

    <?php $this->end(); ?>


    <?php $this->start('followups');  ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
    <?= $this->element('sadrs/view_followups') ?>
    <?php $this->end() ?>

    <?php $this->start('other_tabs'); ?>
  </div> <!-- Firstly, close the first tab!! IMPORTANT -->
</div>
<div role="tabpanel" class="tab-pane" id="assign">
  <?= $this->element('sadrs/assign_evaluator') ?>
</div>
<div role="tabpanel" class="tab-pane" id="causality">
  <?= $this->element('sadrs/causality') ?>
</div>
<div role="tabpanel" class="tab-pane" id="committee_review">
  <?= $this->element('sadrs/committee_review') ?>
</div>
<?php if ($sadr->report_type === 'FollowUp') { ?>
  <div role="tabpanel" class="tab-pane" id="initial">
    <?php echo $this->element('sadrs/sadr_view', ['sadr' => $sadr->initial_sadr, 'nfetch' => true]) ?>
  </div>
<?php } ?>
<?php if ($sadr->copied === 'new copy') { ?>
  <div role="tabpanel" class="tab-pane" id="original">
    <?php echo $this->element('sadrs/sadr_view', ['sadr' => $sadr->original_sadr, 'nfetch' => true]) ?>
  </div>
<?php } ?>
<div role="tabpanel" class="tab-pane" id="stages">
  <?= $this->element('sadrs/stages') ?>
</div>
</div>

<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="assignModalHeader">Assign Evaluator</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="register">
              <div class="col-sm-12">
                <form class="form-horizontal" id="frmAssignEvaluator">
                  <div class="form-group" id="fg-evaluator">
                    <div class="col-sm-4"><label for="evaluator" class="control-label">Evaluator:</label></div>
                    <div class="col-sm-7">
                      <input type="hidden" name="sadr_id" value="<?= $sadr->id ?>" />
                      <select class="form-control" name="evaluator" id="evaluator">
                        <!-- <option value="11">Evaluator2</option> -->
                        <?php
                        foreach ($evaluators as $key => $value) :
                          echo '<option value="' . $key . '">' . $value . '</option>'; //close your tags!!
                        endforeach;
                        ?>
                      </select>
                      <span class="help-block" id="help-evaluator"></span>
                    </div>
                  </div>
                  <div class="form-group" id="fg-user-message">
                    <div class="col-sm-4"><label for="user-message" class="control-label">Message <small>(optional)</small>:</label></div>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="2" name="user-message" id="user-message"></textarea>
                      <span class="help-block" id="help-password"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="button" class="btn btn-primary active" id="assignEvaluator"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-12">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
Close</button>   -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                  Close</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php $this->end(); ?>