<?php
  use Cake\Utility\Hash;
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';
?>

<h3 class="text-success text-center">Committee Reviews</h3>
<hr>
<br>
 <?php foreach ($aefi->committees as $committee_review) {  ?>
      <div class="row">
        <div class="col-xs-12">          
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> by <?= $committee_review->user->name ?></em></small></p>
            <div class="amend-form">
              <div class="row">
                <div class="col-xs-8">                
                      
                        <form>
                          <div class="form-group">
                            <label class="control-label">Comments</label>
                            <div>
                              <p class="form-control-static"><?= $committee_review->literature_review ?></p>
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="control-label">Committee Decision:</label>
                            <div>
                              <p><strong>A. Consistent with causal associatioin to Immunization</strong></p>
                              <p class="form-control-static"><?= ($committee_review->consistent_i) ? $checked : $nChecked; ?> A1. Vaccine product-related reaction (As per published literature) </p>
                              <p class="form-control-static"><?= ($committee_review->consistent_ii) ? $checked : $nChecked; ?> A2. Vaccine quality defect-related reaction</p>
                              <p class="form-control-static"><?= ($committee_review->consistent_iii) ? $checked : $nChecked; ?> A3. Immunization error-related reaction </p>
                              <p class="form-control-static"><?= ($committee_review->consistent_iv) ? $checked : $nChecked; ?> A4. Immunization anxiety-related reaction <b>(ITSR**)</b> </p>

                              <p><strong>B. Indeterminate</strong></p>
                              <p class="form-control-static"><?= ($committee_review->indeterminate_i) ? $checked : $nChecked; ?> B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event) </p>
                              <p class="form-control-static"><?= ($committee_review->indeterminate_ii) ? $checked : $nChecked; ?> B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization </p>

                              <p><strong>C. Inconsistent with causal association to immunization</strong></p>
                              <p class="form-control-static"><?= ($committee_review->inconsistent) ? $checked : $nChecked; ?> C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine </p>

                              <p><strong>Adequate information not available</strong></p>
                              <p class="form-control-static"><?= ($committee_review->unclassifiable) ? $checked : $nChecked; ?> Unclassifiable </p>
                              <p class="form-control-static"><strong>Specify the additional information required for classification:</strong><br>
                                  <?= $committee_review->unclassifiable_specify ?>
                              </p>
                            </div> 
                          </div>  
                          <div class="form-group">
                            <label class="control-label">File</label>
                            <div class="">
                              <p class="form-control-static text-info text-left"><?php
                                   echo $this->Html->link($committee_review->file, substr($committee_review->dir, 8) . '/' . $committee_review->file, ['fullBase' => true]);
                              ?></p>
                            </div>
                          </div> 
                        </form>  <br>                   
                  
                  
                </div>

                <!-- include comments -->
                <div class="col-xs-4 lefty">
                  <?php //pr($committee_review->comments) ?>
                  <?php echo $this->element('comments/list', ['comments' => $committee_review->aefi_comments]) ?> 
                  <?php if(!in_array("FinalStage", Hash::extract($aefi->report_stages, '{n}.stage'))) { ?>
                  <?php  
                        echo $this->element('comments/add', [
                          'model' => ['model_id' => $aefi->id, 'foreign_key' => $committee_review->id, 
                                      'model' => 'Aefis', 'category' => 'applicant', 'url' => 'add-from-applicant/aefis']]) 
                  ?>
                  <?php } ?>
                </div>
            </div>  
          </div>
          </div>
        </div>
      </div>
    <?php } ?>
