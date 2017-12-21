<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
// debug($sadr);
// debug($this->request->data);
  $editable = $this->fetch('editable');
?>
<script type="text/javascript">
$(document).ready(function(){
    <?php if($sadr->severity == 'No'){ ?> 
      $("#choice-severity").hide();
    <?php } ?>
    
});
</script>
<script language="javascript"> 
function getChoice(sel){
    var type = sel.value;
      if(type=="Yes"){
          $("#choice-severity").show('slow');
      }else{
          $("#choice-severity").hide();
      }
}


function getAge(dateString,type) {
    if(type==1){
      var today = new Date();
      var birthDate = new Date(dateString);
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
      if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--;
      }
    }else if (type==2) {
      var age = dateString;
      var m = 2 ;
    }
    
    if( age < 1 && (m == 1 || m == 0)){
      age = 'neonatal';
    }else if(age >=0 && age <= 4){
      age ='infant';
    }else if(age > 4 && age <= 11){
      age ='child';
    }else if(age > 11 && age <= 16){
      age ='adolescent';
    }else if(age > 16 && age <= 69){
      age ='adult';
    }else if(age > 69){
      age ='elderly';
    }

    $('#age_group').val(age);

    return age;
}

function getDate(sel){
  var get_day = document.getElementById('date_of_birth[day]');
  var day = get_day.options[get_day.selectedIndex].value;
  var get_month = document.getElementById("date_of_birth[month]");
  var month = get_month.options[get_month.selectedIndex].value;
  var get_year = document.getElementById("date_of_birth[year]");
  var year = get_year.options[get_year.selectedIndex].value;

  var get_age = document.getElementById("age");
  var age = get_age.value;

  if(sel==1){
    date = year+'/'+month+'/'+day;
  }else{
    date = age;
  }

  console.log(getAge(date,sel));
  return date;

}



</script>
<?php 
    echo $this->fetch('actions');
?>

<div class="<?= $this->fetch('baseClass');?>">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Spontenous Adverse Drug Reaction (ADR) Report Form</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12"><h5 class="text-center"> MCAZ Reference Number: <strong><?= ($sadr->submitted == 2) ? $sadr->reference_number : $sadr->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>          
  </div>



<hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($sadr, ['type' => 'file']) ?>
        <div class="row">
          <div class="col-xs-12"><h5 class="text-center">Patient details (to allow linkage with other reports)</h5></div>
        </div>
          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('evaluator', 
                    ['label' => ['text' => 'Clinic/Hospital Name ', 'escape' => false]]);
                  echo $this->Form->control('patient_name', ['label' => 'Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                  //echo $this->Form->control('date_of_birth');
                   
                  echo $this->Form->control('date_of_birth', array(
                    'type' => 'date', 'escape' => false,
                    'label' => 'Date of Birth',
                    'templates' => ($editable) ? ['dateWidget' => '<div class="col-xs-6">{{day}}-{{month}}-{{year}}</div>',
                                   'select' => '<select onchange="getDate(1);" id="{{name}}" name="{{name}}"{{attrs}}>{{content}}</select>',] : [],
                    'minYear' => date('Y') - 100, 
                    'maxYear' => date('Y'), 'empty' => true,
                  ));
                  echo $this->Form->control('age',[
                    'label' => 'OR AGE',
                    'id' => 'age',
                    'type'=>'number',
                    'onchange' => 'getDate(2);']);
                  /*
                  if($sadr->age > 60){
                      $age_group='elderly';
                  }elseif($sadr->age > 17 && $sadr->age < 61){
                      $age_group='adult';
                  }elseif($sadr->age > 12 && $sadr->age < 18){
                      $age_group='adolescent';
                  }elseif($sadr->age > 2 && $sadr->age < 13){
                      $age_group='child';
                  }elseif($sadr->age < 3){
                      $age_group='infant';
                  }*/
                  echo $this->Form->control('age_group',[
                    'id' => 'age_group',
                    'type' => 'hidden']);
              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('institution_code', ['label' => 'Clinic/Hospital Number']);
                  echo $this->Form->control('ip_no', ['label' => 'VCT/OI/TB Number']);
                  echo $this->Form->input('province_id', ['options' => $provinces, 'empty' => true]);
                  echo $this->Form->control('weight', ['label' => 'Weight (KGs)']);
                  echo $this->Form->control('height', ['label' => 'Height (cm)']);
                  //TODO: Change styles for view select, radio and checkbox to become silent
                  echo $this->Form->control('gender', ['type' => 'radio', 
                     'label' => '<b>Gender</b> <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown']]);
              ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Adverse Reaction</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php 
                  //$this->Form->control('date_of_onset_of_reaction', ['label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_onset_of_reaction', array(
                    'type' => 'date', 'escape' => false,
                    'label' => 'Date of onset of Reaction <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ($editable) ? ['dateWidget' => '<div class="col-xs-6">{{day}}-{{month}}-{{year}}</div>',
                                   'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',] : [],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
            <div class="col-xs-6">
              <?php 
                  //$this->Form->control('date_of_end_of_reaction', ['label' => 'Date of Onset:']); 
                  echo $this->Form->control('date_of_end_of_reaction', array(
                    'type' => 'date',
                    'label' => 'Date of end of Reaction </br> <i>(if it ended)</i>', 'escape' => false,
                    'templates' => ($editable) ? ['dateWidget' => '<div class="col-xs-6">{{day}}-{{month}}-{{year}}</div>',
                                   'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',] : [],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              ?>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-xs-8"><?php
              // $this->Form->control('duration_type', [
              // 'type' => 'radio', 'label' => 'Duration Type:',
              // 'options' => ['Less than one hour' => 'Less than one hour', 'Hours' => 'Hours', 'Days' => 'Days',
              //                                 'Weeks' => 'Weeks', 'Months' => 'Months']]); 
              ?></div>
             <div class="col-xs-4"></div>
          </div> -->

          <!-- <div class="row">
            <div class="col-xs-6"><?php //$this->Form->control('duration', ['label' => 'Duration:']); ?></div>
            <div class="col-xs-6"></div>
          </div> -->

          <div class="row">
            <div class="col-xs-8"><?= $this->Form->control('description_of_reaction', ['label' => 'Description of ADR <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]); ?></div>
            <div class="col-xs-4"></div>
          </div>

          <div class="row">
            <div class="col-xs-4">
              <div class="col-xs-4">
                <b>Serious</b> <span class="sterix fa fa-asterisk" aria-hidden="true"></span>
              </div>
              <div class="col-xs-8">
              <?php 
              echo  $this->Form->control('severity', [
                    'type' => 'radio', 
                    'onchange'=>'getChoice(this)',
                    'label' => false, 
                    'escape' => false,
                    'templates' => ($editable) ?  'radio_form' : 'view_form_radio',
                    'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>      
              </div>      
            </div>

            <div class="col-xs-5" id="choice-severity"><?= $this->Form->control('severity_reason', ['type' => 'select', 
                    'label' => 'Reason for Seriousness',
                    //'label' => '<b>Serious: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                    'templates' => 'radio_form', 'empty' => true,
                    'options' => ['Death' => 'Death', 'Life-threatening' => 'Life-threatening', 'Hospitalizaion/Prolonged' => 'Hospitalizaion/Prolonged', 'Disabling' => 'Disabling', 
                                      'Congenital-anomaly' => 'Congenital-anomaly', 
                                              'Other Medically Important Reason' => 'Other Medically Important Reason']]); ?>
                                                
              </div>
              <div class="col-xs-3"></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?= $this->Form->control('medical_history', ['label' => 'Relevant Medical History, including Allergies']); ?>
              
            </div>
            <div class="col-xs-12"><?= $this->Form->control('past_drug_therapy', ['label' => 'Relevant Past Drug Therapy']); ?>
              
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?= $this->Form->control('lab_test_results', ['label' => 'Laboratory test Results']); ?>              
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Current Medication</h4></div>
          </div>
          
          <div class="row">
            <div class="col-xs-12">
              <?php echo $this->element('multi/sadr_list_of_drugs', [
              'editable' => $editable]);?>
              </div>
                    <?= $this->fetch('list_of_drugs'); ?>
          </div>        

          <div class="row">
            <div class="col-xs-4">
                <?=
                  $this->Form->control('action_taken', ['type' => 'select', 
                      'label' => 'Action Taken: <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Drug withdrawn' => 'Drug withdrawn',
'Dose increased' => 'Dose increased',
'Unknown' => 'Unknown',
'Dose reduced' => 'Dose reduced',
'Dose not changed' => 'Dose not changed',
'Not applicable' => 'Not applicable',
'Medical treatment of ADR' => 'Medical treatment of ADR']]); 
                ?>
            </div>
            <div class="col-xs-4">
                <?=
                  $this->Form->control('outcome', ['type' => 'select', 
                      'label' => 'Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Recovered' => 'Recovered', 
                  'Recovering' => 'Recovering', 
                  'Not yet recovered' => 'Not yet recovered', 
                  'Fatal' => 'Fatal', 
                  'Unknown' => 'Unknown']]); 
                ?>
              </div>
            
            <div class="col-xs-4">
                <?=
                  $this->Form->control('relatedness', ['type' => 'select', 
                      'label' => 'Relatedness of suspected medicine(s) to ADR:', 'empty' => true, 'escape' => false,
                      'templates' => 'radio_form',
                      'options' => ['Certain' => 'Certain',
'Probable / Likely' => 'Probable / Likely',
'Possible' => 'Possible',
'Unlikely' => 'Unlikely',
'Conditional / Unclassified' => 'Conditional / Unclassified',
'Unassessable / Unclassifiable,' => 'Unassessable / Unclassifiable,',]]); 
                ?>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments', ['editable' => $editable]);?></div>
          </div>

          

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Reported By:</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                echo $this->Form->control('reporter_name', ['label' => 'Reporter name']);
                echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);

                echo $this->Form->control('institution_name', ['label' => 'Institution Name']);
              ?>
            </div><!--/span-->
            <div class="col-xs-6">
              <?php
                echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);
                echo $this->Form->control('reporter_phone', ['label' => 'Reporter phone']);
                echo $this->Form->control('institution_address', ['label' => 'Institution Address']);
              ?>
            </div><!--/span-->
          </div><!--/row-->

          <?php 
            // $this->start('submit_buttons'); 
              echo $this->fetch('submit_buttons');
            // $this->end(); 
          ?>

      <?= $this->Form->end() ?>
    </div>
    <div class="col-xs-12">
      <?php 
            // $this->start('submit_buttons'); 
              echo $this->fetch('followups');
            // $this->end(); 
          ?>
    </div>
  </div>

<?php 
    echo $this->fetch('other_tabs');
?>
</div>