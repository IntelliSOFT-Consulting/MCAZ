<?php
  use Cake\Utility\Hash;
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';
?>

 <?php foreach ($aefi->committees as $committee_review) {  ?>
      <div class="row">
        <div class="col-xs-12">          
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success">reviewed on: <?= $committee_review['created'] ?> by <?= $committee_review->user->name ?></em></small></p>
            <div class="amend-form">
                <?php
                //echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'committee', '_ext' => 'pdf', $committee_review->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
                ?>
              <div class="row">
                <div class="col-xs-8">
                
                      
                        <form>
                          <div class="form-group">
                            <label class="control-label">Internal MCAZ Comments</label>
                            <div>
                              <p class="form-control-static"><?= $committee_review->comments ?></p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Reporter Visible Comments</label>
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
                                      'model' => 'Aefis', 'category' => 'committee', 'url' => 'add-from-committee/aefis']]) 
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
    <div class="col-xs-12">
      <hr>
          <?php  
          if(in_array("1", Hash::extract($aefi->aefi_causalities, '{n}.chosen'))) {
          echo $this->Form->create($aefi, ['type' => 'file', 'url' => ['action' => 'committee-review']]);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Committee Report</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('aefi_pr_id', ['type' => 'hidden', 'value' => $aefi->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('committees.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('committees.100.comments', ['escape' => false, 'templates' => 'app_form', 'label' => 'Internal MCAZ Comments']);
                    echo $this->Form->control('committees.100.literature_review', ['escape' => false, 'templates' => 'app_form', 'label' => 'Reporter Visible Comments']);
                //     echo $this->Form->control('committees.100.status', ['type' => 'radio', 
                //                'label' => '<b>Committee Decision</b> <a onclick="$(\'input[name=committees\\\[100\\\]\\\[status\\\]]\').removeAttr(\'checked\');" class="tiptip"  data-original-title="clear!!">
                // <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>', 'escape' => false,
                //                'templates' => 'radio_form',
                //                'options' => [
                //                   'Certain' => 'Certain', 
                //                   'Probable' => 'Probable', 
                //                   'Possible' => 'Possible', 
                //                   'Unlikely' => 'Unlikely',
                //                   'Conditional/Unclassified' => 'Conditional/Unclassified',
                //                   'Unassessable/Unclassifiable' => 'Unassessable/Unclassifiable']]);

	            ?>
         	    </div>    
              <div class="col-xs-12">                
                <div class="row">
                  <div class="col-xs-1">
                    <label>Adequate information available</label>
                  </div>
                  <div class="col-xs-4 c1">
                    <div class="well" style="background-color: #FECCFF">
                      <p><strong>A. Consistent with causal associatioin to Immunization</strong></p>
                      <?php
                        echo $this->Form->control('committees.100.consistent_i', ['type' => 'checkbox', 'label' => 'A1. Vaccine product-related reaction (As per published literature)', 'templates' => 'checkbox_formV2']);   
                        echo $this->Form->control('committees.100.consistent_ii', ['type' => 'checkbox', 'label' => 'A2. Vaccine quality defect-related reaction', 
                          'templates' => 'checkbox_formV2']);        
                        echo $this->Form->control('committees.100.consistent_iii', ['type' => 'checkbox', 'label' => 'A3. Immunization error-related reaction', 
                          'templates' => 'checkbox_formV2']);        
                        echo $this->Form->control('committees.100.consistent_iv', ['type' => 'checkbox', 'label' => 'A4. Immunization anxiety-related reaction <br> <b>(ITSR**)</b>', 'escape' => false,
                          'templates' => 'checkbox_formV2']);               
                      ?>
                    </div>
                  </div>
                  <div class="col-xs-4 c2">
                    <div class="well" style="background-color: #FFFFCD">
                      <p><strong>B. Indeterminate</strong></p>
                      <?php
                        echo $this->Form->control('committees.100.indeterminate_i', ['type' => 'checkbox', 'label' => 'B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event)', 
                          //'checked' => $aefi['committees'][$ekey]['indeterminate'] ?? true,
                          'templates' => 'checkbox_formV2']);   
                        echo $this->Form->control('committees.100.indeterminate_ii', ['type' => 'checkbox', 'label' => 'B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization', 'templates' => 'checkbox_formV2']);               
                      ?>
                    </div>        
                  </div>
                  <div class="col-xs-3 c3">
                    <div class="well" style="background-color: #CDFFCC"> 
                      <p><strong>C. Inconsistent with causal association to immunization</strong></p>         
                      <?php
                        echo $this->Form->control('committees.100.inconsistent', ['type' => 'checkbox', 'label' => 'C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine', 'templates' => 'checkbox_formV2']);                   
                      ?>
                    </div>          
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-1">
                    <label>Adequate information not available</label>
                  </div>
                  <div class="col-xs-11 c4">
                    <div class="well" style="background-color: #8EB4E3"> 
                      <?php
                        echo $this->Form->control('committees.100.unclassifiable', ['type' => 'checkbox', 'label' => '<b>Unclassifiable</b>', 'escape' => false, 'templates' => 'checkbox_formV2']);                   
                        echo $this->Form->control('committees.100.unclassifiable_specify', ['label' => 'Specify the additional information required for classification:', 'templates' => 'app_form']);                   
                      ?>
                    </div>  
                  </div>
                </div>
              </div>      
              <div class="col-xs-12">
                <?php                
                    echo $this->Form->control('committees.100.outcome_date', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
              'label' => '<div class="col-xs-4 control-label"><label {{attrs}}>{{text}}</label></div>',
              'input' => '<div class="col-xs-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);

                    echo $this->Form->control('committees.100.file', ['type' => 'file','label' => 'Attach report (if available)', 'escape' => false, 'templates' => 'app_form']);
                ?>
              </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
                </div> 
              </div>
         <?php 
         echo $this->Form->end();
         }  else { 
          ?>
          <p class="page-header">Review must first be completed.</p>
          <?php } ?>
    </div>
  </div>

<script type="text/javascript">
  $(function() {

    $( "#committees-100-outcome-date" ).datepicker({
      minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
      buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
    });

  });
</script>