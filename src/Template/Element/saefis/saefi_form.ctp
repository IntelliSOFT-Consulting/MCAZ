<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// pr($aefi);
$this->Html->script('saefi_edit', ['block' => true]);
$editable = $this->fetch('editable');
?>
<?php 
    echo $this->fetch('actions');
?>
<?= $this->Flash->render() ?>
<?php $this->ValidationMessages->display($saefi->errors()) ?>

<script type="text/javascript">
$(document).ready(function(){
    <?php if($saefi->pregnancy == 'No'){ ?> 
      $("#choice-pregnancy").hide();
    <?php } ?>
    
});
</script>
<script language="javascript"> 
function getChoice(sel){
    var type = sel.value;
      if(type=="Yes"){
          $("#choice-pregnancy").show('slow');
      }else{
          $("#choice-pregnancy").hide();
      }
}
</script>
<div class="<?= $this->fetch('baseClass');?>">

  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"> 
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Adverse Event After Immunization (AEFI) Investigation Form
      </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center has-error">(Only for Serious Adverse Events Following Immunization <i class="fa fa-minus" aria-hidden="true"></i> Death / Disability / Hospitalization / Cluster)</h5></div>
      </div>
    </div>
  </div>


  <hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($saefi, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= ($saefi->reference_number) ? $saefi->reference_number : $saefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>         
          </div>

          <h4>Section A:  <span class="text-center">Basic Details </span></h4>

          <div class="row">
            <div class="col-xs-4"><?= $this->Form->input('province_id', ['options' => $provinces, 'empty' => true]);?></div>
            <div class="col-xs-4"><?= $this->Form->control('district', ['label' => 'District']); ?></div>
            <div class="col-xs-4"><?= $this->Form->control('aefi_report_ref', ['label' => 'AEFI Report ID']); ?></div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('name_of_vaccination_site', ['label' => 'Name of vaccination site <span class="sterix fa fa-asterisk" aria-hidden="true"></span>','escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">              
            <div class="col-xs-6">
                <?php
                  echo $this->Form->control('reporter_name', ['label' => 'Name of Investigating Health Worker']);
                  echo $this->Form->input('designation_id', ['label' => 'Designation <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'options' => $designations, 'empty' => true, 'escape' => false]);                 
              ?>
            </div>
            <div class="col-xs-6">
                <?php
                  echo $this->Form->control('telephone', ['label' => 'Telephone # Landline (with code)']);
                  echo $this->Form->control('mobile', ['label' => 'Mobile']);               
                  echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <?php                  
                  echo $this->Form->control('place_vaccination', ['type' => 'radio', 
                     'label' => '<b>Place of vaccination</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Govt. health facility' => 'Govt. health facility', 'Private health facility' => 'Private health facility', 'Other' => 'Other']]);
                  echo $this->Form->control('place_vaccination_other', ['label' => 'Other, (specify)']);
                  echo $this->Form->control('site_type', ['type' => 'radio', 
                     'label' => '<b>Type of site</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Fixed' => 'Fixed', 'Mobile' => 'Mobile', 'Outreach' => 'Outreach' , 'Other' => 'Other']]);
                  echo $this->Form->control('site_type_other', ['label' => 'Other, (specify)']);
                  echo $this->Form->control('vaccination_in', ['type' => 'radio', 
                     'label' => '<b>Vaccination in</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Campaign' => 'Campaign', 'Routine' => 'Routine', 'Other' => 'Other']]);
                  echo $this->Form->control('vaccination_in_other', ['label' => 'Other, (specify)']);
              ?>
            </div>
            <div class="col-xs-3">
                <?php
                  echo $this->Form->control('report_date', ['label' => 'Date AEFI reported', 'type' => 'text',                   
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
                  echo $this->Form->control('start_date', ['label' => 'Date investigation started', 'type' => 'text',                   
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
                  echo $this->Form->control('complete_date', ['label' => 'Date investigation completed', 'type' => 'text',                   
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
              ?>
            </div>
          </div>

          <div class="row"> 
            <div class="col-xs-6"> 
                <?= $this->Form->control('patient_name', ['label' => 'Patient Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]); ?>
            </div> 
            <div class="col-xs-6"> 
                <?= $this->Form->control('gender', ['type' => 'radio', 
                     'label' => '<b>Gender</b> <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Male' => 'Male', 'Female' => 'Female']]);
                ?>
            </div> 
          </div>

          <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
              <?php
                echo $this->Form->control('patient_address', ['label' => 'Patient’s physical address <small class="muted">(Street name, house number, ward/village, phone number etc.)</small>:', 'type' => 'text',  'escape' => false,                 
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-3 col-xs-offset-1"><?php
              echo $this->Form->control('date_of_birth', ['label' => 'Date of birth', 'type' => 'text',                   
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
            ?></div>
            <div class="col-xs-4"><?php
                echo $this->Form->control('age_at_onset_years', ['label' => '<b>OR</b> Age at onset:', 'escape' => false, 'placeholder' => 'years...']);
                echo $this->Form->control('age_at_onset_months', ['label' => '', 'escape' => false, 'placeholder' => 'months...']);
                echo $this->Form->control('age_at_onset_days', ['label' => '', 'escape' => false, 'placeholder' => 'days...']);
            ?></div>
            <div class="col-xs-4">
              <?= $this->Form->control('age_group', ['type' => 'radio', 
                     'label' => '<b>OR</b> Age group', 'escape' => false,
                     'templates' => ($editable) ? 'checkbox_form': 'view_form_radio' ,
                     'options' => ['< 1 Year' => '< 1 Year', '1-5 years' => '1-5 years', '> 5 years' => '> 5 years']]);
                ?>
            </div>
          </div>

          <div class="row">
            <h4>*Complete below table if vaccination information missing on the AEFI reporting form</h4>
            <div class="col-xs-12"><?php echo $this->element('multi/list_of_vaccines', ['editable' => $editable]);?></div>
          </div>

          <div class="row">
            <div class="col-xs-7">
              <?php              
                  echo $this->Form->control('symptom_date', ['label' => 'Date and time of first/key symptom', 'type' => 'text']);    
                  echo $this->Form->control('hospitalization_date', ['label' => 'Date of hospitalization', 'type' => 'text']);    
                  echo $this->Form->control('status_on_date', ['type' => 'radio', 
                     'label' => '<b>Status on the date of investigation</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Died' => 'Died', 'Disabled' => 'Disabled', 'Recovering' => 'Recovering', 'Recovered completely' => 'Recovered completely', 'Unknown' => 'Unknown']]);
                  echo $this->Form->control('died_date', ['label' => 'If died, date and time of death ', 'type' => 'text']);
              ?>
            </div>
            <div class="col-xs-4">
                
                <?php

                  echo $this->Form->control('autopsy_done', ['type' => 'radio', 
                     'label' => '<b>Autopsy done?</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('autopsy_done_date', ['label' => 'If yes, date:', 'type' => 'text']); 

                  echo $this->Form->control('autopsy_planned', ['type' => 'radio', 
                     'label' => '<b>Autopsy Planned?</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('autopsy_planned_date', ['label' => 'If yes, date:', 'type' => 'text']); 
              ?>
            </div>
          </div>

          <hr>

          <h4>Section B:  <span class="text-center">Relevant patient information prior to immunization </span></h4>
          
          <div class="row">
              <div class="col-xs-12">
                  <table class="table table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th style="width: 50%;" class="text-center">Criteria</th>
                          <th class="text-center">Finding</th>
                          <th class="text-center">Remarks (If yes, provide details)</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><label>Past history of similar event</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('past_history', ['type' => 'radio', 
                     'label' => false, 

                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('past_history_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Adverse event after previous vaccination(s)</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('adverse_event', ['type' => 'radio', 
                     'label' => false, 

                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('adverse_event_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>History of allergy to vaccine, drug or food</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('allergy_history', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('allergy_history_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Pre-existing illness (30 days) / congenital disorder</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('existing_illness', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('existing_illness_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>History of hospitalization in last 30 days, with cause</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('hospitalization_history', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('hospitalization_history_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Was patient on medication at time of vaccination?
(If yes, name the drug, indication, doses & treatment dates)</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('medication_vaccination', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('medication_vaccination_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Did patient consult faith healers before/after vaccination?
*specify</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('faith_healers', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('faith_healers_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>Family history of any disease (relevant to AEFI) or allergy</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('family_history', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio'  ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                                  
                              </td>
                              <td>
                                  <?= $this->Form->control('family_history_remarks', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                <p><b>For Adult Women:</b></p>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="col-xs-5">
                      <?= $this->Form->control('pregnant', [
                         'type' => 'radio', 
                         'label' => '<b>Currently pregnant?</b>',
                         'onchange'=>'getChoice(this)', 
                         'escape' => false,
                         'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                         'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                    </div>
                    <div class="col-xs-4" id="choice-pregnancy">
                        <?= $this->Form->control('pregnant_weeks', [
                           'label' => 'Weeks',]); ?>
                    </div>
                  </div>
                  
                  <div class="col-xs-5">
                      <?= $this->Form->control('breastfeeding', ['type' => 'radio', 
                         'label' => '<b>Currently breastfeeding?</b>', 
                         'escape' => false,
                         'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,

                         'options' => ['Yes' => 'Yes', 'No' => 'No',]]); ?>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                <p><b>For Infants:</b></p>
                <div class="row">
                  <div class="col-xs-8">
                      <?= $this->Form->control('infant', ['type' => 'radio', 
                         'label' => '<b>The birth was:</b>', 
                         'escape' => false,
                         'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                         'options' => ['full-term' => 'full-term', 'pre-term' => 'pre-term', 'post-term' => 'post-term']]); ?>
                  </div>
                  <div class="col-xs-4">
                      <?= $this->Form->control('birth_weight', [
                         'label' => 'Birth Weight',]); ?>
                  </div>
              </div>
            </div>
            <div class="col-xs-4">
                
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
                      <?= $this->Form->control('delivery_procedure', ['type' => 'radio', 
                         'label' => '<b>Delivery procedure was:</b>', 
                         'escape' => false,
                         'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                         'options' => ['Normal' => 'Normal', 'Caesarean' => 'Caesarean', 'Assisted (forceps, vacuum etc.)' => 'Assisted (forceps, vacuum etc.)', 'with complication' => 'with complication']]); ?>
                  
            </div>
            <div class="col-xs-4">
                      <?= $this->Form->control('delivery_procedure_specify', [
                         'label' => 'If complication, specify',]); ?> 
            </div>
          </div>

          <h4>Section C Details of first examination** of serious AEFI case</h4>
          <p><b>Source of information (tick all that apply)</b></p>
          <div class="row">
              <div class="col-xs-6">
                
                  <?php
                    echo $this->Form->control('source_examination', ['type' => 'checkbox', 'label' => 'Examination by the investigator', 'templates' => ($editable) ? 'checkbox_form' : 'view_form_checkbox']);
                    echo $this->Form->control('source_verbal', ['type' => 'checkbox', 'label' => 'Verbal autopsy', 'templates' => ($editable) ? 'checkbox_form' : 'view_form_checkbox']);
                    echo $this->Form->control('verbal_source', [
                         'label' => 'If verbal autopsy, please mention the source',]);
                    
                  ?>
              </div>
              <div class="col-xs-6">
                  <?php
                    echo $this->Form->control('source_documents', ['type' => 'checkbox', 'label' => 'Documents', 'templates' => ($editable) ? 'checkbox_form' : 'view_form_checkbox']);
                    echo $this->Form->control('source_other', ['type' => 'checkbox', 'label' => 'Other', 'templates' => ($editable) ? 'checkbox_form' : 'view_form_checkbox']);
                    echo $this->Form->control('source_other_specify', [
                         'label' => 'If other, specify',]);
                  ?>
              </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
                <?php 
                    echo $this->Form->control('examiner_name', [
                         'label' => 'Name of the person who first examined/treated the patient:',]);

                    echo $this->Form->control('other_sources', [
                         'label' => 'Other sources who provided information (specify):',]);
                    echo $this->Form->control('signs_symptoms', [
                         'label' => 'Signs and symptoms in chronological order from the time of vaccination: <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                ?>
            </div>
          </div>

          <div class="row">
              <div class="col-xs-3 col-xs-offset-1">
                  <?php
                    echo $this->Form->control('person_details', [
                        'label' => 'Name and contact information of person completing these clinical details:',                                      
                        'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
                  ?>
              </div>
              <div class="col-xs-4">
                  <?php
                    echo $this->Form->control('person_designation', [
                         'label' => 'Designation',]);
                  ?>
              </div>
              <div class="col-xs-4">
                  <?php
                    echo $this->Form->control('person_date', ['type' => 'text', 'label' => 'Date/time',]);
                  ?>
              </div>
          </div>

          <h5><strong>**Instructions – Attach copies of ALL available documents (including case sheet, discharge summary, case notes, laboratory reports and autopsy reports) and then complete additional information NOT AVAILABLE in existing documents, i.e.</strong> </h5><br>
            <ul>
                <li><strong>If patient has received medical care </strong>– attach copies of all available documents (including case sheet, discharge summary, laboratory reports and autopsy reports, if available) and write only the information that is not available in the attached documents below
                </li>
                <div class="row">
                    <div class="col-xs-12"><?php echo $this->Form->control('medical_care', ['label' => false]);?></div>
                  </div>
                <li>
                <strong>If patient has not received medical care </strong> – obtain history, examine the patient and write down your findings below (add additional sheets if necessary)
                </li>
                <div class="row">
                  <div class="col-xs-12"><?php echo $this->Form->control('not_medical_care', ['label' => false]);?></div>
                </div>
            </ul>
            </h4>
            <div class="row">
              <div class="col-xs-4">
                <div class="control-label"><label>Autopsy report (if available):</label></div>
              </div>
              <div class="col-xs-7">
                <?php
                  if (!empty($saefi['reports'])) {
                      echo '<p><b>File attachment:</b></p>';
                      echo $this->Html->link($saefi['reports'][0]->file, substr($saefi['reports'][0]->dir, 8) . '/' . $saefi['reports'][0]->file, ['fullBase' => true]);
                  } else {
                    echo $this->Form->control('reports.0.file', ['type' => 'file','label' => false, 'templates' => 'table_form']);
                  }
                ?>
              </div>
            </div>
          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments', ['editable' => $editable]);?></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->Form->control('final_diagnosis', ['label' => 'Provisional / Final diagnosis:']);?>
            </div>
          </div>

        <h4>Section D Details of vaccines provided at the site linked to AEFI on the corresponding day 
        </h4>
        <div class="col-xs-12"><?php echo $this->element('multi/saefi_list_of_vaccines', ['editable' => $editable]);?></div>

        <div class="row">
            <div class="col-xs-12">
                <p><b>a) When was the patient vaccinated:</b> <b style="color: green;">(select answer below and respond to ALL questions)</b></p>
                <div class="col-xs-12">
                  <?= $this->Form->control('when_vaccinated', ['type' => 'radio', 
                         'label' => false, 
                         'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                         'options' => [
                          'Within the first vaccinations of the session' => 'Within the first vaccinations of the session', 
                         'Within the last vaccinations of the session' => 'Within the last vaccinations of the session',
                         'Unknown' => 'Unknown'
                         ]]); ?>
                </div>
                <br/>
                <br/>
                <br/>
                <p><b>In case of multidose vials, was the vaccine given</b></p>
                <div class="col-xs-12">
                <?= $this->Form->control('when_vaccinated', ['type' => 'radio', 
                         'label' => false, 
                         'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                         'options' => ['within the first few doses of the vial administered' => 'within the first few doses of the vial administered', 'within the last doses of the vial administered' => 'within the last doses of the vial administered', 'Unknown' => 'Unknown']]); 
                         ?>
                </div>
                <div class="col-xs-12">
                  <?php echo $this->Form->control('when_vaccinated_specify', ['label' => 'Specify:']);?>
                 </div>

            </div>
        </div>

        <p> <b style="color:red;">It is compulsory for you to provide explanations for ‘yes’ answers separately</b></p>
        <div class="row">
              <div class="col-xs-12">
                  <table class="table table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th style="width: 55%;" class="text-center"></th>
                          <th class="text-center"> Response</th>
                          <th class="text-center">Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><label>b) Was there an error in prescribing or non-adherence to recommendations for use of this vaccine?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('prescribing_error', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('prescribing_error_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>c) Based on your investigation, do you feel that the vaccine (ingredients) administered could have been unsterile?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccine_unsterile', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_unsterile_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>d) Based on your investigation, do you feel that the vaccine's physical condition (e.g. colour, turbidity, foreign substances etc.) was abnormal at the time of administration?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccine_condition', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_condition_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>e) Based on your investigation, do you feel that there was an error in vaccine reconstitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper mixing, improper syringe filling etc.)?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccine_reconstitution', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_reconstitution_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>f) Based on your investigation, do you feel that there was an error in vaccine handling (e.g. cold chain failure during transport, storage and/or immunization session etc.)?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccine_handling', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_handling_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>g) Based on your investigation, do you feel that the vaccine was administered incorrectly (e.g. wrong dose, site or route of administration, wrong needle size, not following good injection practice etc.)?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccine_administered', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccine_administered_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>h) Number vaccinated from the concerned vaccine vial/ampoule </label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_vial', [
                     'label' => false, 
                     'templates' => ($editable) ? 'table_form': 'view_form_text' ]); ?>
                              </td>
                              <td>
                                  
                              </td>
                          </tr>
                          <tr>
                              <td><label>i) Number vaccinated with the concerned vaccine in the same session</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_session', [
                     'label' => false, 
                     'templates' => ($editable) ? 'table_form': 'view_form_text' ]); ?>
                              </td>
                              <td>
                                  
                              </td>
                          </tr>
                          <tr>
                              <td><label>j) Number vaccinated with the concerned vaccine having the same batch number in other locations. Specify locations: </label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_locations', [
                     'label' => false, 
                     'templates' => ($editable) ? 'table_form': 'view_form_text' ]); ?>
                              </td>
                              <td>
                                  <?= $this->Form->control('vaccinated_locations_specify', ['label' => false,  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td><label>k) Is this case a part of a cluster?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccinated_cluster', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                     </div>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>i. If yes, how many other cases have been detected in the cluster?</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster_number', [
                     'label' => false,
                     'templates' => ($editable) ? 'table_form': 'view_form_text' ]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>a. Did all the cases in the cluster receive vaccine from the same vial?</label></td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('vaccinated_cluster_vial', ['type' => 'radio', 
                     'label' => false, 
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                                </div>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                          <tr>
                              <td><label>b. If no, number of vials used in the cluster (enter details separately)</label></td>
                              <td>
                                  <?= $this->Form->control('vaccinated_cluster_vial_number', [
                     'label' => false, 
                     'templates' => ($editable) ? 'table_form': 'view_form_text' ]); ?>
                              </td>
                              <td>
                                 
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>

        <h4>
            Section E        Immunization practices at the place(s) where concerned vaccine was used <br>
            <small>(Complete this section by asking and/or observing practice)</small>
        </h4>
        <p><strong>Syringes and needles used:</strong></p>
        <div class="row">
            <div class="col-xs-6">
                      <?= $this->Form->control('syringes_used', ['type' => 'radio', 
                         'label' => '<b>Are AD syringes used for immunization?</b>', 
                         'escape' => false,
                         'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                         'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown'=>'Unknown']]); ?>

                  
            </div>
            <div class="col-xs-6">
                <?= $this->Form->control('syringes_used_specify', ['type' => 'radio', 
                    'label' => '<b> If no, specify the type of syringes used:</b>',
                    'escape' => false, 
                         'templates' => ($editable) ? 'radio_form' : 'view_form_radio',

                         'options' => ['Glass' => 'Glass', 'Disposable' => 'Disposable', 'Recycled disposable' => 'Recycled disposable', 'Other' => 'Other']]); ?>
                <?= $this->Form->control('syringes_used_other', ['label' => 'If other, specify',  
                    'templates' => ($editable) ? [ 
                      'textarea' => '<div class="col-sm-11"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']); ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">                
                <?php echo $this->Form->control('syringes_used_findings', ['label' => 'Specific key findings/additional observations and comments:']);?>
            </div>
          </div>

          <p><strong>Reconstitution: (complete only if applicable, NA if not applicable)</strong></p>
          <p><b>Reconstitution procedure :</b></p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('reconstitution_multiple', ['type' => 'radio', 
                     'label' => 'Same reconstitution syringe used for multiple vials of same vaccine?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A'=>'N/A']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php
                  echo $this->Form->control('reconstitution_different', ['type' => 'radio', 
                     'label' => 'Same reconstitution syringe used for reconstituting different vaccines?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A'=>'N/A']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php
                  echo $this->Form->control('reconstitution_vial', ['type' => 'radio', 
                     'label' => 'Separate reconstitution syringe for each vaccine vial?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A'=>'N/A']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php
                  echo $this->Form->control('reconstitution_syringe', ['type' => 'radio', 
                     'label' => 'Separate reconstitution syringe for each vaccination?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A'=>'N/A']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php
                  echo $this->Form->control('reconstitution_vaccines', ['type' => 'radio', 
                     'label' => 'Are the vaccines and diluents used the same as those recommended by the manufacturer?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A'=>'N/A']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php
                  echo $this->Form->control('reconstitution_observations', ['label' => 'Specific key findings/additional observations and comments:']);
              ?>
            </div>
          </div>

        <h4> Section F                                       Cold chain and transport <br>
            <small>(Complete this section by asking and/or observing practice)</small></h4>
        <p><strong>Last vaccine storage point:</strong></p>
        <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('cold_temperature', ['type' => 'radio', 
                     'label' => 'Is the temperature of the vaccine storage refrigerator monitored?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('cold_temperature_deviation', ['type' => 'radio', 
                     'label' => 'If “yes”, was there any deviation outside of 2-8° C after the vaccine was placed inside?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('cold_temperature_specify', ['label' => 'If “yes”, provide details of monitoring separately.']);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('procedure_followed', ['type' => 'radio', 
                     'label' => 'Was the correct procedure for storing vaccines, diluents and syringes followed?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('other_items', ['type' => 'radio', 
                     'label' => 'Was any other item (other than EPI vaccines and diluents) in the refrigerator or freezer?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('partial_vaccines', ['type' => 'radio', 
                     'label' => 'Were any partially used reconstituted vaccines in the refrigerator?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('unusable_vaccines', ['type' => 'radio', 
                     'label' => 'Were any unusable vaccines (expired, no label, VVM at stages 3 or 4, frozen) in the refrigerator?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php
                  echo $this->Form->control('unusable_diluents', ['type' => 'radio', 
                     'label' => 'Were any unusable diluents (expired, manufacturer not matched, cracked, dirty ampoule) in the store?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                  ?>
              </div>
              <div class="col-xs-12">
              <?php

                  echo $this->Form->control('additional_observations', ['label' => 'Specific key findings/additional observations and comments:']);
              ?>
              </div>
              <p><strong>Vaccine transportation from the refrigerator to the vaccination centre:</strong></p>
              <div class="col-xs-12">
                <?php 
                  echo $this->Form->control('cold_transportation', ['type' => 'radio', 
                     'label' => 'Was cold chain properly maintained during transportation?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php 
                  echo $this->Form->control('vaccine_carrier', ['type' => 'radio', 
                     'label' => 'Was the vaccine carrier sent to the site on the same day as vaccination?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php 
                  echo $this->Form->control('coolant_packs', ['type' => 'radio', 
                     'label' => 'Were conditioned coolant-packs used?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
              ?>
              </div>
              <div class="col-xs-12">
                <?php 
                  echo $this->Form->control('transport_findings', ['label' => 'Specific key findings/additional observations and comments:']);
              ?>
              </div>
            
          </div>

        <h4>Section G       Community investigation (Please visit locality and interview parents/others)</h4>
        <div class="row">
            <div class="col-xs-12">
                <?php
                  echo $this->Form->control('similar_events', ['type' => 'radio', 
                     'label' => '<b> Were any similar events reported within a time period similar to when the adverse event occurred and in the same locality?</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',

                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);

                  echo $this->Form->control('similar_events_describe', ['label' => 'If yes, describe:']);
                  echo $this->Form->control('similar_events_episodes', ['label' => 'If yes, how many events/episodes?']);

                  echo '<p>Of those affected, how many are:</p>';
                  echo $this->Form->control('affected_vaccinated', ['label' => 'Vaccinated:']);
                  echo $this->Form->control('affected_not_vaccinated', ['label' => 'Not Vaccinated:']);
                  echo $this->Form->control('affected_unknown', ['label' => 'Unknown:']);

                  echo $this->Form->control('community_comments', ['label' => 'Other comments:']);
                ?>
            </div>
        </div>

        <h4>Section H       Other relevant findings/observations/comments</h4>
        <?php
            echo $this->Form->control('relevant_findings', ['label' => false]);
        ?>
        
        <?php 
            echo $this->fetch('submit_buttons');
        ?>   

      <?= $this->Form->end() ?>
    </div>
  </div>
  
</div>

<?php 
  echo $this->fetch('other_tabs');
?>


    <?php echo $this->fetch('endjs') ?>