<?php
  use Cake\Utility\Hash;
?>

 <?php foreach ($adr->committees as $committee_review) {  ?>
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
                            <p class="form-control-static"><?= $committee_review['status'] ?></p>
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
                  <?php echo $this->element('comments/list', ['comments' => $committee_review->adr_comments]) ?> 
                  <?php if(!in_array("FinalStage", Hash::extract($adr->report_stages, '{n}.stage'))) { ?>
                  <?php  
                        echo $this->element('comments/add', [
                          'model' => ['model_id' => $adr->id, 'foreign_key' => $committee_review->id, 
                                      'model' => 'Adrs', 'category' => 'committee', 'url' => 'add-from-committee/adrs']]) 
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
          if(in_array("1", Hash::extract($adr->reviews, '{n}.chosen'))) {
          echo $this->Form->create($adr, ['type' => 'file', 'url' => ['action' => 'committee-review']]);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Committee Report</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('adr_pr_id', ['type' => 'hidden', 'value' => $adr->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('committees.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('committees.100.comments', ['escape' => false, 'templates' => 'app_form', 'label' => 'Internal MCAZ Comments']);
                    echo $this->Form->control('committees.100.literature_review', ['escape' => false, 'templates' => 'app_form', 'label' => 'Reporter Visible Comments']);
                    echo $this->Form->control('committees.100.status', ['type' => 'radio', 
                               'label' => '<b>Committee Decision</b> <a onclick="$(\'input[name=committees\\\[100\\\]\\\[status\\\]]\').removeAttr(\'checked\');" class="tiptip"  data-original-title="clear!!">
                <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>', 'escape' => false,
                               'templates' => 'radio_form',
                               'options' => [
                                  'Certain' => 'Certain', 
                                  'Probable' => 'Probable', 
                                  'Possible' => 'Possible', 
                                  'Unlikely' => 'Unlikely',
                                  'Conditional/Unclassified' => 'Conditional/Unclassified',
                                  'Unassessable/Unclassifiable' => 'Unassessable/Unclassifiable']]);
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
          } else { 
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