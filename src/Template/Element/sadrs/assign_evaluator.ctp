<?php
  use Cake\Utility\Hash;
  $this->Html->css('bootstrap-editable', ['block' => true]);
  $this->Html->css('bootstrap/common_header', ['block' => true]);
  $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
?>
<div class="row">
    <div class="col-xs-12">
        <?php 
        if(empty($sadr->assigned_to)) {
         if($prefix == 'manager') { ?>
         <!-- Split Form -->
        <div class="row">
            <div class="col-xs-6">                
                <?php echo $this->Form->create($sadr, ['url' => ['action' => 'assign-evaluator']]) ?>
                <h5 class="text-center">Assign report to evaluator for review</h5>
                <?php
	                  echo $this->Form->control('sadr_pr_id', ['type' => 'hidden', 'value' => $sadr->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('evaluator', ['escape' => false, 'options' => $evaluators, 'templates' => 'app_form']);
	                  echo $this->Form->control('user_message', ['type' => 'textarea', 'escape' => false, 'templates' => 'app_form']);
	            ?>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-share-square-o"
                                aria-hidden="true"></i>
                            Assign</button> 
                    </div>

                  <?php echo $this->Form->end() ?>
                </div>
            </div>
            <div class="col-xs-6">
            <?php echo $this->Form->create($sadr, ['url' => ['action' => 'assign-self']]) ?>
                <h5 class="text-center">Assign report to Self for review</h5>
                <?php
	                  echo $this->Form->control('sadr_pr_id', ['type' => 'hidden', 'value' => $sadr->id, 'escape' => false, 'templates' => 'table_form']); 
	                  echo $this->Form->control('reminder_note', ['type' => 'textarea', 'escape' => false, 'templates' => 'app_form']);
	            ?>
                
                <div class="form-group">
         </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-success active" id="registerUser"><i class="fa fa-user"
                                aria-hidden="true"></i>
                            Assign Self</button> 
                    </div>

                  <?php echo $this->Form->end() ?>
                </div>
            </div>
        </div>
         
        <?php     
        	} } else {
            ?>
        <br><br>
        <h4 class="text-center">Assigned to: <span
                <?php if(!in_array("Evaluated", Hash::extract($sadr->report_stages, '{n}.stage'))) { ?> id="assigned-to"
                class="editable" data-type="select" data-pk="<?= $sadr->id ?>"
                data-url="<?= $this->Url->build(['controller' => 'Sadrs', 'action' => 'changeEvaluator',  'prefix' => 'manager', $sadr->id, '_ext' => 'json']); ?>"
                data-name="assigned_to" data-title="Change evaluator" <?php } ?> class='text-center'>
                <?= $this->cell('Signature::index', [$sadr->assigned_to]) ?></span> on <?= $sadr->assigned_date ?></h4>
        <?php
        	}
     	?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php
        if(!empty($sadr['request_evaluators'])) {
          $i = 0;
          foreach ($sadr['request_evaluators'] as $request_evaluator) {
            $i = $i+1;
            
            echo "<p class='text-center'><u>".$i.". Requested by : ".Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$request_evaluator['sender_id']]." on ".$request_evaluator['created']."</u></p>";
            echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_evaluator['user_message']."</p>";
          }
        }
        ?>
        </div>
        <?php if(!empty($sadr->assigned_to)  && $prefix == 'manager') { ?>
        <hr>
        <?php echo $this->Form->create($sadr, ['url' => ['action' => 'request-evaluator']]);
                //$i = count($sadr['request_evaluators']);
           ?>
        <div class="row">
            <div class="col-xs-12">
                <h5 class="text-center">Send request to evaluator
                    <?= $this->cell('Signature::index', [$sadr->assigned_to]) ?> for more information</h5>
            </div>
            <div class="col-xs-12">
                <?php
                    echo $this->Form->control('sadr_pr_id', ['type' => 'hidden', 'value' => $sadr->id, 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('request_evaluators.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('request_evaluators.100.user_message', ['escape' => false, 'templates' => 'app_form']);
              ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus"
                        aria-hidden="true"></i> Request</button>
            </div>
        </div>
        <?php echo $this->Form->end() ?>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $('#assigned-to').editable({
        value: <?= $sadr->assigned_to ?>,
        source: <?php echo json_encode($evaluators); ?>,
        params: function(params) { //params already contain `name`, `value` and `pk`
            var data = {};
            data['id'] = params.pk;
            data[params.name] = params.value;
            return data;
        }
    });
});
</script>