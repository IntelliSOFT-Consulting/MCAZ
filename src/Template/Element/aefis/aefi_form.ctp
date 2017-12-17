<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// pr($aefi);
$this->Html->script('aefi_edit', ['block' => true]);
$editable = $this->fetch('editable');
?>
<?php 
    echo $this->fetch('actions');
?>

<div class="<?= $this->fetch('baseClass');?>">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"> 
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Adverse Event After Immunization (AEFI) Report Form
      </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI) </h5></div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->Form->create($aefi, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= ($aefi->submitted == 2) ? $aefi->reference_number : $aefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>         
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php               

                  echo $this->Form->control('patient_name', ['label' => 'Patient first name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_surname', ['label' => 'Patient Surname <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_next_of_kin', ['label' => 'Patient next of Kin', 'escape' => false]);

                  echo $this->Form->control('patient_address', ['label' => 'Patient\'s physical address <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);

                  echo $this->Form->control('patient_telephone', ['label' => 'Patient\'s phone number', 'escape' => false]);
                  echo $this->Form->control('gender', ['type' => 'radio', 
                     'label' => '<b>Gender <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Male' => 'Male', 'Female' => 'Female']]);

                  echo $this->Form->control('date_of_birth', array(
                    'type' => 'date', 'escape' => false,
                    'label' => 'Date of Birth <span class="sterix fa fa-asterisk" aria-hidden="true"></span>',
                    'templates' => ($editable) ?  ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',] : [],
                    'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                  ));
              
                  // echo $this->Form->control('age_at_onset', ['label' => 'OR Age at onset:', 'escape' => false]);
                  echo $this->Form->control('age_at_onset', ['type' => 'radio', 
                     'label' => '<b>OR Age at onset:', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Years' => 'Years', 'Months'=>'Months','Days' => 'Days']]);

                  echo $this->Form->control('age_at_onset_specify', ['label' => '', 'escape' => false]);
                  
              ?>            
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('reporter_name', ['label' => 'Reporter\'s name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape'=> false]);
                  echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);
                  echo $this->Form->control('reporter_institution', ['label' => 'Reporter Institution']);
                  echo $this->Form->control('reporter_department', ['label' => 'Department']);
                  echo $this->Form->control('reporter_address', ['label' => 'Address']);
                  echo $this->Form->control('reporter_district', ['label' => 'District']);
                  //echo $this->Form->control('reporter_province', ['label' => 'Province']);
                  echo $this->Form->input('province_id', ['options' => $provinces, 'empty' => true]);
                  echo $this->Form->control('reporter_phone', ['label' => 'Reporter phone']);
                  echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('name_of_vaccination_center', ['label' => 'Name of vaccination center <span class="sterix fa fa-asterisk" aria-hidden="true"></span>','escape' => false]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/list_of_vaccines', ['editable' => $editable]);?></div>
          </div>

          <div class="row">
            <div class="col-xs-3">
              <h4>Adverse Event(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>:</h4>
              <?php
                  // echo $this->Form->control('adverse_events', ['label' => 'Adverse event(s):', 'type' => 'select', 'multiple' => true, 'options' => ['Severe local reaction' => 'Severe local reaction', 'Seizures' => 'Seizures', 'Abscess' => 'Abscess']]);
                  echo $this->Form->control('ae_severe_local_reaction', ['type' => 'checkbox', 'label' => 'Severe local reaction', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_seizures', ['type' => 'checkbox', 'label' => 'Seizures', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_afebrile', ['type' => 'checkbox', 'label' => 'afebrile', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_febrile', ['type' => 'checkbox', 'label' => 'febrile', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_abscess', ['type' => 'checkbox', 'label' => 'Abscess', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_sepsis', ['type' => 'checkbox', 'label' => 'Sepsis', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_encephalopathy', ['type' => 'checkbox', 'label' => 'Encephalopathy', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  
                                  
              ?>
            </div>
            <div class="col-xs-2">
              <br><br>
              <?php
                  echo $this->Form->control('ae_anaphylaxis', ['type' => 'checkbox', 'label' => 'Anaphylaxis', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_fever', ['type' => 'checkbox', 'label' => 'Fever≥38°C', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_3days', ['type' => 'checkbox', 'label' => '>3 days', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_toxic_shock', ['type' => 'checkbox', 'label' => 'Toxic shock syndrome', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_thrombocytopenia', ['type' => 'checkbox', 'label' => 'Thrombocytopenia', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                  echo $this->Form->control('ae_beyond_joint', ['type' => 'checkbox', 'label' => 'beyond nearest joint', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
                 
                  
              ?>
            </div>
            <div class="col-xs-3">
              <br><br>
              <?php 
                  echo $this->Form->control('ae_other', ['type' => 'checkbox', 'label' => 'Other (specify)', 
                    //'templates' => 'checkbox_form'
                    'templates' => ($editable) ? [
                        'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                        'inputContainer' => '<div class="form-group"><div class=" {{required}}"><div class="checkbox">{{content}}</div></div></div>',
                    ] : 'view_form_checkbox'
                  ]);
                  echo $this->Form->control('adverse_events_specify', ['label' => 'If other, specify',  
                    'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);

                  
              ?>
            </div>
            <div class="col-xs-3">
              <br><br><br>
              <?php
                  //echo $this->Form->control('description_of_reaction', ['label' => 'Describe AEFI (Signs and symptoms):']);

                  echo $this->Form->control('aefi_date', ['label' => 'Date & Time AEFI started', 'type' => 'text',                   
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);
            // ($editable) ? 'radio_form' : 'view_form_radio'
                   echo $this->Form->control('patient_hospitalization', ['type' => 'radio', 
                     'label' => '<b>Was patient hospitalized?  ', 'escape' => false,
                     'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);

                  echo $this->Form->control('notification_date', ['label' => 'Date patient notified event to health system', 'type' => 'text',
                    'templates' => ($editable) ? [    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'] : 'view_form_text']);

                
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('description_of_reaction', ['label' => 'Describe AEFI (Signs and symptoms)',  
                    'templates' => ($editable) ? [ 
                      'label' => '<div class="col-sm-offset-1 col-sm-11"><label {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-offset-1 col-sm-11"><textarea class="form-control" rows="7" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',] : 'view_form_text']);

                  echo $this->Form->control('treatment_provided', ['type' => 'radio', 
                     'label' => '<b>Treatment provided', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form' : 'view_form_radio',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('serious', ['type' => 'radio', 
                     'label' => '<b>Serious? <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);

                  echo $this->Form->control('serious_yes', ['type' => 'radio', 
                     'label' => '<b>If yes,', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Death' => 'Death', 'Life threatening' => 'Life threatening', 'Disability' => 'Disability', 'Hospitalization' => 'Hospitalization', 'Congenital anomaly' => 'Congenital anomaly']]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('outcome', ['type' => 'select', 'empty' => true, 
                     'label' => 'Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 
                     'escape' => false,
                     //'templates' => 'radio_form',
                     'options' => ['Recovering' => 'Recovering', 'Recovered' => 'Recovered', 'Recovered with sequelae' => 'Recovered with sequelae', 'Not Recovered' => 'Not Recovered', 'Died'=>'Died','Unknown' => 'Unknown']]);
                  echo $this->Form->control('died_date', ['label' => 'If died, date of death', 'type' => 'text']);
                  echo $this->Form->control('autopsy', ['type' => 'radio',  
                     'label' => '<b>Autopsy done', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('past_medical_history', ['label' => 'Past medical history (including history of similar reaction or other allergies), concomitant medication and other relevant information 
  (e.g. other cases).']);
              ?>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/attachments', ['editable' => $editable]);?></div>
          </div>
          
          <p>First decision making level to complete (District level):</p>
          <div class="row">
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('district_receive_date', ['label' => 'Date report received at district level', 'type' => 'text']);
              ?>
            </div>
            <div class="col-xs-6">
              <?php
                  echo $this->Form->control('investigation_needed', ['type' => 'radio',  
                     'label' => '<b>Investigation needed', 'escape' => false,
                     'templates' => ($editable) ? 'radio_form': 'view_form_radio' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                  echo $this->Form->control('investigation_date', ['label' => 'If yes, date investigation planned', 'type' => 'text']);
              ?>
            </div>
          </div>

          <p>National level top complete:</p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('national_receive_date', ['label' => 'Date report received at national level', 'type' => 'text']);
              ?>
            </div>
          </div>

          <p>Comments:</p>
          <div class="row">
            <div class="col-xs-12">
              <?php
                  echo $this->Form->control('comments', ['label' => false]);
              ?>
            </div>          
          </div>

          <?php 
              echo $this->fetch('submit_buttons');
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