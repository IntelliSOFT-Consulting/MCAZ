  <div class="row">
    <div class="col-xs-12">
      <?php
      if(!empty($adr['reviews'])) {
        foreach ($adr['reviews'] as $review) {
          echo "<p class='text-center'><u> Reviewed by : ".$users->toArray()[$review['user_id']]." on ".$review['created']."</u></p>";
          echo "<h4 class='text-center'>Literature Review</h4><p class='text-center'>".$review['literature_review']."</p>";
          echo "<h4 class='text-center'>Comments</h4><p class='text-center'>".$review['comments']."</p>";
          echo "<h4 class='text-center'>Reference Text</h4><p class='text-center'>".$review['references_text']."</p>";
        }
      }
      ?>
    </div>

    <div class="col-xs-12">
      <hr>
          <?php echo $this->Form->create($adr, ['url' => ['action' => 'causality']]);
                // $i = count($adr['reviews']);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Causality Assessment</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('adr_pr_id', ['type' => 'hidden', 'value' => $adr->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('reviews.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('reviews.100.literature_review', ['escape' => false, 'templates' => 'app_form']);
                    echo $this->Form->control('reviews.100.comments', ['escape' => false, 'templates' => 'app_form']);
                    echo $this->Form->control('reviews.100.references_text', ['escape' => false, 'templates' => 'app_form']);
	            ?>
         	    </div>          
            </div>
            <div class="row">
              <div class="col-xs-6">
                <?php
                  if ($prefix == 'manager') {                  
                      echo $this->Form->control('reviews.100.signature', ['type' => 'checkbox', 'label' => 'Attach signature', 'escape' => false, 'templates' => 'app_form']);
                  } else {
                      echo "<div class='control-label'><label>Signature<label></div>";
                      echo $this->Form->control('reviews.100.signature', ['type' => 'hidden', 'value' => 1, 'templates' => 'table_form']);
                  }
                ?>
              </div>
              <div class="col-xs-4">
                <?php          
                  echo "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 70%;' alt=''>";
                ?>
              </div>
              <div class="col-xs-2"> </div>
            </div>
            <br>
            
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Review</button>
                </div> 
              </div>
         <?php echo $this->Form->end() ?>
    </div>
  </div>