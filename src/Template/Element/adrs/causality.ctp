<?php
  use Cake\Utility\Hash;

  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
?>

 <?php foreach ($adr->reviews as $review) {  ?>
      <div class="row">
        <div class="col-xs-12">          
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $review['created'] ?> by <?= $review->user->name ?></em></small></p>
            <div class="amend-form">
                <?php
                //echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
                ?>
              <div class="row">
                <div class="col-xs-8">
                
                      
                        <form>
                          <div class="form-group">
                            <label class="control-label">Literature Review</label>
                            <div>
                              <p class="form-control-static"><?= $review->literature_review ?></p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Comments</label>
                            <div>
                              <p class="form-control-static"><?= $review->comments ?></p>
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="control-label">References Text:</label>
                            <div>
                            <p class="form-control-static"><?= $review['references_text'] ?></p>
                            </div> 
                          </div> 
                          <div class="form-group">
                            <label class="control-label">File</label>
                            <div class="">
                              <p class="form-control-static text-info text-left"><?php
                                   echo $this->Html->link($review->file, substr($review->dir, 8) . '/' . $review->file, ['fullBase' => true]);
                              ?></p>
                            </div>
                          </div> 

                          <div class="form-group">
                            <div class="control-label">
                              <label><?= ($review->signature) ? $checked : $nChecked; ?> Signature</label>
                            </div>
                            <div>
                              <h4 class="form-control-static text-info text-left"><?php          
                                echo ($review->signature) ? "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 30%;' alt=''>" : '';
                              ?></h4>
                            </div>
                          </div>

                          </form>  <br>

                          <?php if($review->chosen == 1) { ?>
                            <div class="form-group">
                              <div class="control-label">
                                <label>Signature</label>
                              </div>
                              <div>
                                <h4 class="form-control-static text-info text-left"><?php          
                                  echo "<img src='".$this->Url->build(substr(Hash::combine($users->toArray(), '{n}.id', '{n}.dir')[$adr->assigned_by], 8) . '/' . Hash::combine($users->toArray(), '{n}.id', '{n}.file')[$adr->assigned_by], true)."' style='width: 30%;' alt=''>";
                                ?></h4>
                              </div>
                            </div>                          
                          <?php 
                            //If the current user did not submit the review and review final submission not yet done
                            } elseif($review->user_id != $this->request->session()->read('Auth.User.id') && $adr->signature != 1) { 
                                $template = $this->Form->getTemplates();
                                $this->Form->resetTemplates();
                                echo $this->Form->postLink('<span class="label label-info">Attach signature?</span>', 
                                  ['action' => 'attachSignature', $review->id, 'prefix' => $prefix], 
                                  ['escape' => false, 'confirm' => 'Are you sure you want to attach your signature to assessment?', 'class' => 'label-link']);
                                $this->Form->setTemplates($template);                              
                            } 
                          ?>                 
                  
                  
                </div>

                <!-- include comments -->
                <div class="col-xs-4 lefty">
                  <?php //pr($review->comments) ?>
                  <?php echo $this->element('comments/list', ['comments' => $review->adr_comments]) ?> 
                  <?php if(!in_array("FinalStage", Hash::extract($adr->report_stages, '{n}.stage')) && !empty($adr->assigned_to)) { ?>
                  <?php  
                        echo $this->element('comments/add', [
                          'model' => ['model_id' => $adr->id, 'foreign_key' => $review->id, 
                                      'model' => 'Adrs', 'category' => 'causality', 'url' => 'add-from-causality/adrs']]) 
                  ?>
                  <?php } ?>
                </div>
            </div>  
          </div>
          </div>
        </div>
      </div>
    <?php } ?>

  <div class="row">

    <?php if($adr->signature != 1) { ?>
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
                  // if ($prefix == 'manager') {                  
                  //     echo $this->Form->control('reviews.100.signature', ['type' => 'checkbox', 'label' => 'Attach signature', 'escape' => false, 'templates' => 'app_form']);
                  // } else {
                      echo "<div class='control-label'><label>Signature<label></div>";
                      echo $this->Form->control('reviews.100.signature', ['type' => 'hidden', 'value' => 1, 'templates' => 'table_form']);
                  // }
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
    <?php } ?>
  </div>