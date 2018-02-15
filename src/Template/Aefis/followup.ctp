<?php $this->start('actions'); ?>
    <?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-backward" aria-hidden="true"></i> Back to Initial Report </button>', ['controller' => 'Aefis', 'action' => 'view', $aefi->id], ['escape' => false]); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/aefis/aefi_form');
  $this->assign('editable', false);
  $this->assign('baseClass', 'aefi_form');
?>

<!-- Insert fields for various followup fields -->
<?php $this->start('followups'); $editable = true; ?>
    <hr>
    <h2 class="text-center"><u>Follow Ups Section</u></h2>
    <?= $this->element('aefis/view_followups') ?>
    <?= $this->Form->create($followup, ['type' => 'file', 'url' => ['action' => 'followup', $aefi->id, $followup->id]]) ?>

    <div class="row">
            <div class="col-xs-12"><?php echo $this->element('multi/list_of_vaccines', ['editable' => $editable, 'followup_form' => true]);?></div>
    </div>


    <div class="row">
      <div class="col-xs-3">
        <h4>Adverse Event(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>:</h4>
        <?php
            // echo $this->Form->control('adverse_events', ['label' => 'Adverse event(s):', 'type' => 'select', 'multiple' => true, 'options' => ['Severe local reaction' => 'Severe local reaction', 'Seizures' => 'Seizures', 'Abscess' => 'Abscess']]);
            echo '<label>Seizures</label>';
            echo $this->Form->control('ae_afebrile', ['type' => 'checkbox', 'label' => 'afebrile', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_febrile', ['type' => 'checkbox', 'label' => 'febrile', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo '<label>Severe local reaction</label>';

            echo $this->Form->control('ae_3days', ['type' => 'checkbox', 'label' => '>3 days', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);

            echo $this->Form->control('ae_beyond_joint', ['type' => 'checkbox', 'label' => 'beyond nearest joint', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            
                            
        ?>
      </div>
      <div class="col-xs-2">
        <br><br>
        <?php
           echo $this->Form->control('ae_encephalopathy', ['type' => 'checkbox', 'label' => 'Encephalopathy', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_abscess', ['type' => 'checkbox', 'label' => 'Abscess', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_sepsis', ['type' => 'checkbox', 'label' => 'Sepsis', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_anaphylaxis', ['type' => 'checkbox', 'label' => 'Anaphylaxis', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_fever', ['type' => 'checkbox', 'label' => 'Fever≥38°C', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_toxic_shock', ['type' => 'checkbox', 'label' => 'Toxic shock syndrome', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
            echo $this->Form->control('ae_thrombocytopenia', ['type' => 'checkbox', 'label' => 'Thrombocytopenia', 'templates' => ($editable) ? 'checkbox_form': 'view_form_checkbox' ]);
           
            
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
        <div class="col-xs-12"><?= $this->element('multi/attachments', ['editable' => true, 'followup_form' => true]);?></div>   
    </div>
    
    <div class="well">
      <div class="row">
        <div class="col-md-4 text-center">
          <button name="submitted" value="1" id="followupSaveChanges" class="btn btn-primary active" type="submit">
            <span class="fa fa-edit" aria-hidden="true"></span> Save changes
          </button>
        </div>
        <div class="col-md-4 text-center">
          <button name="submitted" value="2" id="aefiSubmit" class="btn btn-success active" type="submit"
                  onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
          >
            <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
          </button>
        </div>
        <div class="col-md-4 text-center">
          <button name="submitted" value="-1" id="aefiCancel" class="btn btn-default active" type="submit"
                  onclick="return confirm('Are you sure you wish to cancel the report?');"
          >
            <span class="fa fa-close" aria-hidden="true"></span> Cancel
          </button>
        </div>
      </div>
    </div>
     <?= $this->Form->end() ?>
<?php $this->end(); ?>