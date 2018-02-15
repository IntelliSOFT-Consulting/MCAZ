<?php
    $globalEd = $this->fetch('globalEd');
    $followup = $this->fetch('var_followup');
?>
<?= $this->Form->create($followup, ['type' => 'file', 'url' => ['action' => 'followup', $sadr->id, $followup->id]]) ?>
<script type="text/javascript">
$(document).ready(function(){
    <?php if($sadr->severity == 'No'){ ?> 
      $("#followup-severity").hide();
    <?php } ?>
    
});
</script>
<script language="javascript"> 
function getFollowUpChoice(sel){
    var type = sel.value;
      if(type=="Yes"){
          $("#followup-severity").show('slow');
      }else{
          $("#followup-severity").hide();
      }
}
</script>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
    <div class="row">
        <div class="col-xs-6">
          <?php 
              //$this->Form->control('date_of_onset_of_reaction', ['label' => 'Date of Onset:']); 
              echo $this->Form->control('date_of_onset_of_reaction', array(
                'type' => 'date', 'escape' => false,
                'label' => 'Date of onset of Reaction <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                'templates' => ($globalEd) ? [] : ['dateWidget' => '<div class="col-xs-6">{{day}}-{{month}}-{{year}}</div>',
                               'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
              ));
          ?>
        </div>
        <div class="col-xs-6">
          <?php 
              echo $this->Form->control('date_of_end_of_reaction', array(
                'type' => 'date',
                'label' => 'Date of end of Reaction <br> <i>(if it ended)</i>', 'escape' => false,
                'templates' => ($globalEd) ? [] : ['dateWidget' => '<div class="col-xs-6">{{day}}-{{month}}-{{year}}</div>',
                               'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
              ));
          ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8"><?= $this->Form->control('description_of_reaction', ['label' => 'Description of ADR <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]); ?></div>
        <div class="col-xs-4"></div>
    </div>

    <div class="row">
        <div class="col-xs-3"><?php 
            echo  $this->Form->control('severity', ['type' => 'radio', 
            'onchange'=>'getFollowUpChoice(this)',
            'label' => '<b>Serious</b> <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 
            'escape' => false,
            'templates' => 'radio_form',
            'options' => ['Yes' => 'Yes', 'No' => 'No']]);
            ?>            
        </div>

        <div class="col-xs-5" id="followup-severity"><?= $this->Form->control('severity_reason', [//'type' => 'select', 
            'label' => 'Reason for Seriousness',
            //'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
            'templates' => 'app_form', 'empty' => true,
            'options' => ['Death' => 'Death', 'Life-threatening' => 'Life-threatening', 'Hospitalizaion/Prolonged' => 'Hospitalizaion/Prolonged', 'Disabling' => 'Disabling', 
            'Congenital-anomaly' => 'Congenital-anomaly', 
            'Other Medically Important Reason' => 'Other Medically Important Reason']]); ?>

        </div>
        <div class="col-xs-4"></div>
    </div>

    <div class="row">
        <div class="col-xs-12"><?= $this->Form->control('medical_history', ['label' => 'Relevant Medical History, including Allergies','type' => 'textarea', 'templates' => 'app_form']); ?></div>
        <div class="col-xs-12"><?= $this->Form->control('past_drug_therapy', ['label' => 'Relevant Past Drug Therapy','type' => 'textarea', 'templates' => 'app_form']); ?></div>
    </div>

    <div class="row">
        <div class="col-xs-12"><?= $this->Form->control('lab_test_results', ['label' => 'Laboratory test Results', 'type' => 'textarea', 'templates' => 'app_form']); ?></div>
    </div>
    <h4 class="text-center">Add Medications</h4>
    <div class="row">
        <div class="col-xs-12"><?= $this->element('multi/sadr_list_of_drugs', ['globalEd' => false]);?></div>   
    </div>
    <div class="well">
      <div class="row">
        <div class="col-md-4 text-center">
          <button name="submitted" value="1" id="followupSaveChanges" class="btn btn-primary active" type="submit">
            <span class="fa fa-edit" aria-hidden="true"></span> Save changes
          </button>
        </div>
        <div class="col-md-4 text-center">
          <button name="submitted" value="2" id="sadrSubmit" class="btn btn-success active" type="submit"
                  onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
          >
            <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
          </button>
        </div>
        <div class="col-md-4 text-center">
          <button name="submitted" value="-1" id="sadrCancel" class="btn btn-default active" type="submit"
                  onclick="return confirm('Are you sure you wish to cancel the report?');"
          >
            <span class="fa fa-close" aria-hidden="true"></span> Cancel
          </button>
        </div>
      </div>
    </div>
     <?= $this->Form->end() ?>