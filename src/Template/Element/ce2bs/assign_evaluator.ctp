<?php
  use Cake\Utility\Hash;
  $this->Html->css('bootstrap-editable', ['block' => true]);
  $this->Html->css('bootstrap/common_header', ['block' => true]);
  $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
?>
  <div class="row">
    <div class="col-xs-12">
      <?php 
        if(empty($ce2b->assigned_to)) {
         if($prefix == 'manager') { ?>
          <?php echo $this->Form->create($ce2b, ['url' => ['action' => 'assign-evaluator']]) ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Assign report to evaluator for review</h5></div>
              <div class="col-xs-12">
	          	<?php
	                  echo $this->Form->control('ce2b_pr_id', ['type' => 'hidden', 'value' => $ce2b->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('evaluator', ['escape' => false, 'options' => $evaluators, 'templates' => 'app_form']);
	                  echo $this->Form->control('user_message', ['type' => 'textarea', 'escape' => false, 'templates' => 'app_form']);
	            ?>
         	    </div>          
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-share-square-o" aria-hidden="true"></i>
Assign</button>
                </div> 
              </div>
         <?php echo $this->Form->end() ?>
         <?php     
          }	} else {
         ?>
          <br><br><h4 class="text-center">Assigned to: <span 
          <?php if(!in_array("Evaluated", Hash::extract($ce2b->report_stages, '{n}.stage'))) { ?>
            id="assigned-to" class="editable"
            data-type="select" data-pk="<?= $ce2b->id ?>"
            data-url="<?= $this->Url->build(['controller' => 'Ce2bs', 'action' => 'changeEvaluator',  'prefix' => 'manager', $ce2b->id, '_ext' => 'json']); ?>" 
            data-name="assigned_to"
            data-title="Change evaluator"
          <?php } ?>
          class='text-center'> <?= $evaluators->toArray()[$ce2b->assigned_to] ?></span> on <?= $ce2b->assigned_date ?></h4>
      <?php
        	}
     	?>
    </div>
    
    <div class="col-xs-12">
      <div class="col-xs-12">
      <?php
        if(!empty($ce2b['request_evaluators'])) {
          $i = 0;
          foreach ($ce2b['request_evaluators'] as $request_evaluator) {
            $i = $i+1;
            echo "<p class='text-center'><u>".$i.". Requested by : ".Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$request_evaluator['sender_id']]." on ".$request_evaluator['created']."</u></p>";
            echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_evaluator['user_message']."</p>";
          }
        }
        ?>
      </div>
      <hr>
      <?php if(!empty($ce2b->assigned_to)) { 
        ?>
          <?php echo $this->Form->create($ce2b, ['url' => ['action' => 'request-evaluator']]);
                //$i = count($ce2b['request_evaluators']);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Send request to evaluator <?= $evaluators->toArray()[$ce2b->assigned_to]?> for more information</h5></div>
              <div class="col-xs-12">
              <?php
                    echo $this->Form->control('ce2b_pr_id', ['type' => 'hidden', 'value' => $ce2b->id, 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('request_evaluators.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('request_evaluators.100.user_message', ['escape' => false, 'templates' => 'app_form']);
              ?>
              </div>          
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Request</button>
                </div> 
              </div>
         <?php echo $this->Form->end() ?>
         <?php } ?>
    </div>
  </div>

<script type="text/javascript">
  $(function(){
    $('#assigned-to').editable({
        value: <?= $ce2b->assigned_to ?>,    
        source: <?php echo json_encode($evaluators); ?>,
        params: function(params) {  //params already contain `name`, `value` and `pk`
          var data = {};
          data['id'] = params.pk;
          data[params.name] = params.value;
          return data;
        }
    });
  });
</script>