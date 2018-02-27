<div class="row">  
  <div class="col-xs-6">
    <h4>Internal Reviewers</h4>
    <div class="row">
      <div class="col-xs-12">
      <?php
        if(!empty($aefi['request_evaluators'])) {
          $i = 0;
          foreach ($aefi['request_evaluators'] as $request_evaluator) {
            $i = $i+1;
            echo "<p class='text-center'><u>".$i.". Requested by : ".$users->toArray()[$request_evaluator['sender_id']]." on ".$request_evaluator['created']."</u></p>";
            echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_evaluator['user_message']."</p>";
          }
        }
        ?>
      </div>
    </div>
    <hr>
    <?php if(!empty($aefi->assigned_to) && $prefix == 'manager') { 
      ?>
        <?php echo $this->Form->create($aefi, ['url' => ['action' => 'request-evaluator']]);
              //$i = count($aefi['request_evaluators']);
         ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">Send request to evaluator <?= $evaluators->toArray()[$aefi->assigned_to]?> for more information</h5></div>
            <div class="col-xs-12">
            <?php
                  echo $this->Form->control('aefi_pr_id', ['type' => 'hidden', 'value' => $aefi->id, 'escape' => false, 'templates' => 'table_form']);
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
  
  <div class="col-xs-6" style="min-height: 450px; border-left: 1px solid #eee; border-right: 1px solid #eee;">
    <h4>Reporter</h4>
    <div class="row">
      <div class="col-xs-12">
        <?php
        if(!empty($aefi['request_reporters'])) {
          $i = 0;
          foreach ($aefi['request_reporters'] as $request_reporter) {
            $i = $i+1;
            echo "<p class='text-center'><u>".$i.". Requested by : ".$users->toArray()[$request_reporter['sender_id']]." on ".$request_reporter['created']."</u></p>";
            echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_reporter['user_message']."</p>";
          }
        }
        ?>
      </div>

      <div class="col-xs-12">
        <hr>
            <?php echo $this->Form->create($aefi, ['url' => ['action' => 'request-reporter']]);
                  // $i = count($aefi['request_reporters']);
             ?>
              <div class="row">
                <div class="col-xs-12"><h5 class="text-center">Send request to reporter for more information</h5></div>
                <div class="col-xs-12">
              	<?php
                      echo $this->Form->control('aefi_pk_id', ['type' => 'hidden', 'value' => $aefi->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('request_reporters.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('request_reporters.100.user_message', ['escape' => false, 'templates' => 'app_form']);
                ?>
           	    </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-offset-4 col-sm-8"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Request</button>
                  </div> 
                </div>
           <?php echo $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>