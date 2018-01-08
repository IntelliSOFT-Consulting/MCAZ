  <div class="row">
    <div class="col-xs-12">
      <?php
      if(!empty($sadr['request_reporters'])) {
        $i = 0;
        foreach ($sadr['request_reporters'] as $request_reporter) {
          $i = $i+1;
          echo "<p class='text-center'><u>".$i.". Requested by : ".$users->toArray()[$request_reporter['sender_id']]." on ".$request_reporter['created']."</u></p>";
          echo "<h4 class='text-center'>Request</h4><p class='text-center'>".$request_reporter['user_message']."</p>";
        }
      }
      ?>
    </div>

    <div class="col-xs-12">
      <hr>
          <?php echo $this->Form->create($sadr, ['url' => ['action' => 'request-reporter']]);
                // $i = count($sadr['request_reporters']);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Send request to reporter for more information</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('sadr_pk_id', ['type' => 'hidden', 'value' => $sadr->id, 'escape' => false, 'templates' => 'table_form']);
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