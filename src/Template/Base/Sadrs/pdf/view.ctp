<?php //echo $this->element('sadrs/reporter_view');?>

<?php
  $this->extend('/Element/sadrs/sadr_view');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'sadr_form');
  $this->Html->script('jquery/assign_evaluator', ['block' => true]);
?>

<?php $this->start('actions'); ?>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab"><?= $sadr->reference_number ?></a></li>
    <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
        <?php 
            if(empty($sadr->assigned_to)) {
                echo 'Assign Evaluator';
            } else {
                echo "Assigned to:".$evaluators->toArray()[$sadr->assigned_to];
            }
         ?>
    </a></li>
    <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
    <li role="presentation"><a href="#request_reporter" aria-controls="request_reporter" role="tab" data-toggle="tab">Request for Reporter for info</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">

    <?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $sadr->id], ['escape' => false]); ?>
    <?php if(empty($sadr->assigned_to)) {?>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
        <small><?= '<b>Assigned To</b>:'.$evaluators->toArray()[$sadr->assigned_to]?></small>
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
    <div role="tabpanel" class="tab-pane" id="request_reporter">
        <?= $this->element('sadrs/request_reporter') ?>
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
                                foreach($evaluators as $key => $value):
                                echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
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

