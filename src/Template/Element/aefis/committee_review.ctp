  <div class="row">
    <div class="col-xs-12">
      <?php
      if(!empty($aefi['committees'])) {
        foreach ($aefi['committees'] as $committee) {
          echo "<p class='text-center'><u> Uploaded by : ".$users->toArray()[$committee['user_id']]." on ".$committee['created']."</u></p>";
          echo "<h4 class='text-center'>Internal MCAZ Comments</h4><p class='text-center'>".$committee['comments']."</p>";
          echo "<h4 class='text-center'>Reporter Visible Comments</h4><p class='text-center'>".$committee['literature_review']."</p>";
          echo "<h5 class='text-center'>";
            if (!empty($committee['file'])) {
                    echo '<span>File attachment: </span>';
                    echo $this->Html->link($committee->file, substr($committee->dir, 8) . '/' . $committee->file, ['fullBase' => true]);
                } 
            echo "</h5>";
          }
      }
      ?>
    </div>

    <div class="col-xs-12">
      <hr>
          <?php echo $this->Form->create($aefi, ['type' => 'file', 'url' => ['action' => 'committee-review']]);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Committee Report</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('aefi_pr_id', ['type' => 'hidden', 'value' => $aefi->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('committees.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('committees.100.comments', ['escape' => false, 'templates' => 'app_form', 'label' => 'Internal MCAZ Comments']);
                    echo $this->Form->control('committees.100.literature_review', ['escape' => false, 'templates' => 'app_form', 'label' => 'Reporter Visible Comments']);
                    echo $this->Form->control('status', ['type' => 'radio', 
                               'label' => '<b>Committee Decision</b>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => ['Approved' => 'Approved', 'Rejected' => 'Rejected', 'RequestReporter' => 'Request info(Reporter)', 'RequestEvaluator' => 'Request info (Evaluator)', '' => 'N/A']]);
                    echo $this->Form->control('committees.100.file', ['type' => 'file','label' => 'Attach report (if available)', 'escape' => false, 'templates' => 'app_form']);
	            ?>
         	    </div>          
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Review</button>
                </div> 
              </div>
         <?php echo $this->Form->end() ?>
    </div>
  </div>