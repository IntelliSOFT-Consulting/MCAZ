<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr $adr
 */
$this->Html->script('adr_edit', ['block' => true]);
$this->Html->css('combo-box', ['block' => true]);
$editable = $this->fetch('editable');
?>
<?php 
    echo $this->fetch('actions');
?>

<div class="<?= $this->fetch('baseClass');?>">
  <div class="row">
    <div class="col-xs-6">
      <p class="text-center"><?= $this->Html->image("mrcz.png", ['fullBase' => true, 'style' => 'width: 20%;']); ?></p>
    </div>
    <div class="col-xs-6">
      <p class="text-center"><?= $this->Html->image("mcaz_logo.png", ['fullBase' => true, 'style' => 'width: 30%;']); ?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center">MEDICAL RESEARCH  COUNCIL OF ZIMBABWE  -  MEDICINES CONTROL AUTHORITY OF ZIMBABWE</h4>
      <h3 class="text-center">MEDICAL RESEARCH COUNCIL OF ZIMBABWE and MEDICINES CONTROL AUTHORITY OF ZIMBABWE </h3>
      <p><em>Instructions :Complete entire form. Do not leave any blank spaces</em><br>
Reporting period: SAEs should be reported within 3 days of site being aware. AE should be reported 7 days of site being aware. 
Please use a separate adverse event reporting form for separate reportable adverse events  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12"><h3 class="text-center">
       <br>SERIOUS ADVERSE EVENT REPORTING FORM </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR SERIOUS ADVERSE EVENT(SAE) </h5></div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-12">

      <?= $this->Form->create($adr, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= $adr->reference_number ?></strong></h5></div>          
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('mrcz_protocol_number', ['label' => 'MRCZ Protocol # <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('mcaz_protocol_number', ['label' => 'MCAZ Protocol # <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                  ?>
            </div>      
            <div class="col-xs-6">
              <?php
                echo $this->Form->control('name_of_institution', ['label' => 'Institution']);
              ?>
            </div>      
           
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('study_title', ['label' => 'Study Title', 'escape' => false]);
              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('date_of_adverse_event', ['label' => 'Date of Adverse Event', 'escape' => false, 'type' => 'text']);

                  echo $this->Form->control('study_sponsor', 
                    ['label' => ['text' => 'Study Sponsor', 'escape' => false]]); 
              ?> 
            </div>
          </div>
          <br/><br/>
          <div class="row">
            <div class="col-xs-6">
              <?php

                  echo $this->Form->control('principal_investigator', ['label' => 'Principal Investigator <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('reporter_name', ['label' => 'Reporter Name', 'escape' => false]);

                  echo $this->Form->control('reporter_email', ['label' => 'Reporter Email', 'escape' => false]);

                  // echo $this->Form->input('designation_id', ['label' => 'Designation in the study','options' => $designations, 'empty' => true]);
                  echo $this->Form->input('designation_study', ['label' => 'Designation in the study','escape' => false]);

                  echo $this->Form->control('reporter_phone', ['label' => 'Reporter Phone ', 'escape' => false]);

              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('participant_number', ['label' => 'Participant ID', 'escape' => false]);

                  echo $this->Form->control('report_type', ['type' => 'radio', 
                     'label' => '<b>Type of Report <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Initial' => 'Initial', 'Follow-up' => 'Follow-up', 'Resolution' => 'Resolution']]);

                  echo $this->Form->control('date_of_birth', array(
                    'type' => 'date',
                    'label' => 'Date of Birth',
                    'templates' => ($editable) ? ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',] : [],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));

                  echo $this->Form->control('gender', ['type' => 'radio', 
                     'label' => '<b>Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span></b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Male' => 'Male', 'Female' => 'Female']]);

                  echo $this->Form->control('study_week', 
                    ['label' => ['text' => 'Study Week', 'escape' => false]]);

                  echo $this->Form->control('visit_number', 
                    ['label' => ['text' => 'Visit number', 'escape' => false]]);

                  echo $this->Form->control('date_of_site_awareness', ['label' => 'Date of site Awareness', 'type' => 'text']);
              ?>
            </div>
          </div>
         <br/><br/>
          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Section B</h4></div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('adverse_event_type', ['type' => 'radio', 
                     'label' => '<b>1. What type of adverse event is this?</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['AE' => 'AE', 'SAE' => 'SAE', 'Death' => 'Death']]);

                  // echo $this->Form->control('sae_type', 
                  //   ['label' => ['text' => 'If SAE, is it 1. Fatal, 2. Life', 'escape' => false]]);

                  echo $this->Form->control('sae_type', ['label' => '2a) If SAE, is it', 'type' => 'select', 'options' => ['Fatal' => 'Fatal', 'Seizures' => 'Seizures', 'Life-threatening (an actual risk of death at the time of the event).' => 'Life-threatening (an actual risk of death at the time of the event).', 'Caused or prolonged hospitalization (non-elective).' => 'Caused or prolonged hospitalization (non-elective).', 'Resulted in persistent or significant disability or incapacity.' => 'Resulted in persistent or significant disability or incapacity.', 'Any other important medical event.' => 'Any other important medical event.'], 'empty' => true]);
                  echo $this->Form->control('sae_description', ['label' => 'If Other, specify', 'escape' => false]);

              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                                                  
                  // echo $this->Form->control('toxicity_grade', ['type' => 'radio','label' => 'Toxicity Grade:', 
                  //     'options' => ['Grade 1' => 'Grade 1', 'Grade 2' => 'Grade 2', 'Grade 3' => 'Grade 3', 'Grade 4' => 'Grade 4', 'Grade 5' => 'Grade 5']]);
                  echo $this->Form->control('toxicity_grade', ['type' => 'radio', 
                    'label' => '<b>2b) Toxicity Grade</b>', 
                    'escape'=> false,
                    'options' => ['Grade 1' => 'Grade 1', 'Grade 2' => 'Grade 2', 'Grade 3' => 'Grade 3', 'Grade 4' => 'Grade 4', 'Grade 5' => 'Grade 5'],
                    'templates' => ($editable) ? [
      'nestingLabel' => '<div class="col-sm-offset-4 radio">{{hidden}}<label  {{attrs}}>{{input}}{{text}}</label></div>',
                    ] : 'view_form_radio'
                  ]);
              ?>
            </div>
          </div>


          <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
              <?php
                  echo $this->Form->control('previous_events', ['type' => 'radio', 
                     'label' => '<b>3a) Any previous Adverse Events report on this participant?</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]);

              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('previous_events_number', ['label' => 'If yes, how many?', 'escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('total_saes', ['label' => '3b) Total Number of SAEs to date for the whole study', 'escape' => false]);
              ?>
            </div>
          </div>


          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('location_event', ['type' => 'radio', 
                     'label' => '<b>4) Location of the current Adverse Event</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Home' => 'Home', 'Clinic/Hospital' => 'Clinic/Hospital', 'Work' => 'Work', 'Study site' => 'Study site', 'Other, specify' => 'Other, specify']]);

                  echo $this->Form->control('location_event_specify', ['label' => 'If Other, specify', 'escape' => false,
                'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-6"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              ?>
            </div>
          </div>
 
          <div class="row">
            <div class="col-xs-8">
              <?php
                  echo $this->Form->control('research_involves', ['type' => 'radio', 
                     'label' => '<b>5) Research involves</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Drug' => 'Drug', 'Device' => 'Device', 'Procedure' => 'Procedure', 'Vaccine' => 'Vaccine', 'Other, specify' => 'Other, specify']]);
                       ?>
            </div>
            <div class="col-xs-12">
                <?php 
                  echo $this->Form->control('research_involves_specify', ['label' => 'if other, specify', 'escape' => false, 'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-6"><textarea class="form-control" rows="1" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('name_of_drug', ['label' => '6) Name of Drug, Device or Procedure', 'escape' => false, 'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="4" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('drug_investigational', ['type' => 'radio', 
                     'label' => '<b>7) Is the drug/device investigational</b>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]);
            ?></div>
          </div>    

          <div class="row">
            <div class="col-xs-12"><b class="text-center"><p>Section C</p>
            8a. List all study / intervention drugs being taken at the time of onset of the SAE, or within 30 days prior to onset, and describe their relationship to the SAE:</b></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/list_of_devices', ['editable' => $editable]);?></div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <p><b>11.Has the Adverse Event been reported to:</b></p>
            </div>            
            <div class="col-xs-6"><?php 
              echo $this->Form->control('report_to_mcaz', ['type' => 'radio', 
                     'label' => '(a)MCAZ', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);

              echo $this->Form->control('report_to_mcaz_date', ['label' => 'Date', 'escape' => false, 'type' => 'text', 'templates' => ($editable) ? ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',] : 'view_form']);
              ?>
            </div>
            <div class="col-xs-6"><?php 
              echo $this->Form->control('report_to_mrcz', ['type' => 'radio', 
                     'label' => '(b)MRCZ', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);

              echo $this->Form->control('report_to_mrcz_date', ['label' => 'Date', 'escape' => false, 'type' => 'text', 'templates' => ($editable) ? ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',] : 'view_form']);
              ?>
            </div>
            <div class="col-xs-6"><?php 
              echo $this->Form->control('report_to_sponsor', ['type' => 'radio', 
                     'label' => '(c)Sponsor', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);

              echo $this->Form->control('report_to_sponsor_date', ['label' => 'Date', 'escape' => false, 'type' => 'text', 'templates' => ($editable) ? ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',] : 'view_form']);
              ?>
            </div>
            <div class="col-xs-6"><?php 
              echo $this->Form->control('report_to_irb', ['type' => 'radio', 
                     'label' => '(d) IRB', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              echo $this->Form->control('report_to_irb_date', ['label' => 'Date', 'escape' => false, 'type' => 'text', 'templates' => ($editable) ? ['input' => '<div class="col-sm-6"><input class="form-control date-pick-field" type="{{type}}" name="{{name}}"{{attrs}}/></div>',] : 'view_form']);
              ?>
            </div>
          </div> 

          <div class="row">
            <div class="col-xs-12"><b class="text-center"> 12.Describe the SAE with diagnosis, immediate cause or precipitating events, symptoms, any investigations, management, results and outcome (with dates where possible). Include relevant medical history. Additional narrative, photocopies of results of abnormal investigations and a hospital discharge letter may be attached:</b></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('medical_history', ['label' => 'Summary of relevant past medical history of participant', 'escape' => false,
                'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']);
              ?></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('diagnosis', ['label' => '(a) Diagnosis', 'escape' => false, 'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']);
              echo $this->Form->control('immediate_cause', ['label' => '(b) Immediate Cause', 'escape' => false, 'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']);
              ?>
            </div>
            <div class="col-xs-12">
                <?php             
              echo $this->Form->control('symptoms', ['label' => '(c) Symptoms', 'escape' => false, 
            'templates' => ($editable) ? [ 'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'] : 'view_form_text']);   

              echo $this->Form->control('investigations', ['label' => '(d) Investigations-Laboratory and any other significant investigations conducted', 'escape' => false, 
            'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/adr_lab_tests', ['editable' => $editable]);?></div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('results', ['label' => '(e) Results', 'escape' => false, 
            'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              echo $this->Form->control('management', ['label' => '(f) Management (Include management of study treatment, continued, temporarily held, reduced dose, permanent discontinuation, off Product)', 'escape' => false, 
            'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);
              ?>
            </div>
            <div class="col-xs-12">
                <?php             
              /*echo $this->Form->control('outcome', ['label' => '(g) Outcome', 'escape' => false, 
            'templates' =>($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);    */         

              ?>
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
          </div>

          <p><b>NB</b> If the outcome is death, please complete and attach the death form. </p>

          <div class="row">
            <div class="col-xs-6"><?php 
              echo $this->Form->control('d1_consent_form', ['type' => 'radio', 
                     'label' => 'D1.  Was this Adverse Event originally addressed in the protocol and consent form?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
            <div class="col-xs-6"><?php 
              echo $this->Form->control('d2_brochure', ['type' => 'radio', 
                     'label' => 'D2. Was this Adverse Event originally addressed in Investigators Brochure?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6"><?php 
              echo $this->Form->control('d3_changes_sae', ['type' => 'radio', 
                     'label' => 'D3. Are changes required to the protocol as a result of this SAE? ', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
            <div class="col-xs-6"><?php 
              echo $this->Form->control('d4_consent_sae', ['type' => 'radio', 
                     'label' => 'D4. Are changes required to the consent form as a result of this SAE?', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A']]);
              ?>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments', ['editable' => $editable]);?></div>
          </div>
          
          <p>If changes are <b>required</b>, please attach a copy of the revised protocol/consent form with changes highlighted with a bright coloured  highlighter. </p>

          <p>If changes are <b>not required</b>, please explain as to why changes to the protocol /consent form are not necessary based on the event.   </p>
          
          <div class="row">
            <div class="col-xs-12">
                <?php             
              echo $this->Form->control('changes_explain', ['label' => false, 'escape' => false]); 
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php 
              echo $this->Form->control('assess_risk', ['type' => 'radio', 
                     'label' => 'From the data obtained or from currently available information, do you see any need to reassess the risks and benefits to the subjects in this research.', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>
            </div>
          </div>

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