  <div class="row">
    <div class="col-xs-12">
      <?php 
        if(empty($adr->assigned_to)) { ?>
          <?php echo $this->Form->create($adr, ['url' => ['action' => 'assign-evaluator']]) ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Assign report to evaluator for review</h5></div>
              <div class="col-xs-12">
	          	<?php
	                  echo $this->Form->control('adr_pr_id', ['type' => 'hidden', 'value' => $adr->id, 'escape' => false, 'templates' => 'table_form']);
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
        	} else {
            echo "<br><br><h4 class='text-center'>Assigned to: ".$evaluators->toArray()[$adr->assigned_to]." on ".$adr->assigned_date."</h4>";
        	}
     	?>
    </div>
    
    <div class="col-xs-12">
      <div class="col-xs-12">
      <?php
        if(!empty($adr['request_evaluators'])) {
          $i = 0;
          foreach ($adr['request_evaluators'] as $request_evaluator) {
            $i = $i+1;
            echo "<p class='text-center'><u>".$i.". Requested by : ".$users->toArray()[$request_evaluator['sender_id']]." on ".$request_evaluator['created']."</u></p>";
            echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_evaluator['user_message']."</p>";
          }
        }
        ?>
      </div>
      <hr>
      <?php if(!empty($adr->assigned_to)) { 
        ?>
          <?php echo $this->Form->create($adr, ['url' => ['action' => 'request-evaluator']]);
                //$i = count($adr['request_evaluators']);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Send request to evaluator <?= $evaluators->toArray()[$adr->assigned_to]?> for more information</h5></div>
              <div class="col-xs-12">
              <?php
                    echo $this->Form->control('adr_pr_id', ['type' => 'hidden', 'value' => $adr->id, 'escape' => false, 'templates' => 'table_form']);
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