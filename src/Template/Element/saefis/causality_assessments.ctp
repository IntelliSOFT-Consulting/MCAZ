<?php 
  use Cake\Utility\Hash; 

  $this->Html->css('stages', ['block' => true]); 
  $rowo = '<div class="row stages text-center"> ';
  $rowc = '</div>';
  $pre = '<div class="col-xs-2">';
  $rr = '</div><div class="col-xs-1"><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></div>';
  $suf = $rr;
  $brown = $pre.'<span class="stages-on bg-brown">I. Is there strong evidence for other causes?</span> '.$suf;
  $green1 = $pre.'<span class="stages-on bg-green">I. A. Inconsistent causal association to immunization</span> '.$suf;
  $green2 = $pre.'<span class="stages-on bg-green">III. A. Inconsistent causal association to immunization</span> '.$suf;
  $green3 = $pre.'<span class="stages-on bg-green">IV. A. Inconsistent causal association to immunization</span> '.$suf;
  $green_dark = $pre.'<span class="stages-on bg-green-dark">III. Is there a strong evidence against a causal association</span> '.$suf;
  $green_light = $pre.'<span class="stages-on bg-green-light">Is the event classifiable</span> '.$suf;
  $blue1 = $pre.'<span class="stages-on bg-blue1">II. Is there a known causal association with the vaccine/ vaccination</span> '.$suf;
  $blue2 = $pre.'<span class="stages-on bg-blue2">II(Time). Was the event within the time window of the increased risk</span> '.$suf;
  $blue3 = $pre.'<span class="stages-on bg-blue3">IV D. Unclassifiable</span> '.$suf;
  $pink1 = $pre.'<span class="stages-on bg-pink">II A. Consistent causal association to immunization</span> '.$suf;
  $pink2 = $pre.'<span class="stages-on bg-pink">IV A. Consistent causal association to immunization</span> '.$suf;
  $red = $pre.'<span class="stages-on bg-red">IV. Review other qualifying factors</span> '.$suf;
  $yellow = $pre.'<span class="stages-on bg-yellow">IV B. Indeterminate</span> '.$suf;
?>

 <div class="row">
        <div class="col-xs-12">

          <?php foreach ($aefi_causalities as $ikey => $aefi_causality) {  ?>
          <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false" aria-controls="<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
               Evaluated on: <?= $aefi_causality['created'] ?> by <?= $users->toArray()[$aefi_causality->user_id] ?>
            </a>
            <p class="topper"><small><em class="text-success">evaluated on: <?= $aefi_causality['created'] ?> by <?= $users->toArray()[$aefi_causality->user_id] ?></em></small></p>
        <?php
          if($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['action' => 'download', '_ext' => 'pdf', $aefi_causality->id, 'causality'], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
          if($this->request->params['_ext'] != 'pdf' and $aefi_causality->user_id == $this->request->session()->read('Auth.User.id')) {
            $template = $this->Form->getTemplates();
            // $this->Form->setTemplates([
            //     'formStart' => '<form class="hiddenFormClass"{{attrs}}>'
            // ]);
            $this->Form->resetTemplates();
            echo $this->Form->postLink(
                '<span class="label label-info">Edit</span>',
                [],
                ['data' => ['causality_id' => $aefi_causality->id], 'escape' => false, 
                 'confirm' => __('Are you sure you want to edit aefi_causality {0}?', $aefi_causality->id)]
            );
            $this->Form->setTemplates($template);
            // set the template back to its previous state
            // $this->Form->setTemplates([
            //     'formStart' => $formStart
            // ]);
          }        
        ?>
        <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">

    <div class="row muted">
      <?php echo $this->Form->create($saefi, ['url' => ['action' => 'causality']]); ?>
      <fieldset disabled="disabled"  >
      <div class="row">
        <div class="col-xs-4">
          <p><b>Patient ID/Name</b></p>
          <?=  $saefi['patient_name'].' '.$saefi['patient_surname'] ?>
        </div>
        <div class="col-xs-4">        
          <p><b>DOB/Age</b></p>
          <?php  
              if(!empty($saefi['date_of_birth'])) echo $saefi['date_of_birth'].'<br>';
              if(!empty($saefi['age_at_onset_days']) or !empty($saefi['age_at_onset_months']) or !empty($saefi['age_at_onset_years'])) echo $saefi['age_at_onset_days'].' days-'.$saefi['age_at_onset_months'].' months-'.$saefi['age_at_onset_years'].' years'.'<br>';
              if(!empty($saefi['age_group'])) echo $saefi['age_group'].'<br>';
           ?>
        </div>
        <div class="col-xs-4">        
          <p><b>Sex</b></p>
          <?=  $saefi['gender'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">        
          <h4 class="text-warning" style="text-decoration-line: underline;">Step 1 (Eligibility)</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">        
          <p><b>Name of one or more vaccines administered before this event</b></p>
          <?php
            if(!empty($saefi['saefi_list_of_vaccines'])) {
              foreach ($saefi['saefi_list_of_vaccines'] as $ssaefi_list_of_vaccines) {
                echo "<span>".$ssaefi_list_of_vaccines['vaccine_name']."</span><br>";
              }
            }
          ?>
        </div>
        <div class="col-xs-4">
          <p><b>What is the Valid Diagnosis</b></p>
          <?=  $saefi['final_diagnosis'] ?>        
        </div>
        <div class="col-xs-4">
          <p><b>Does the diagnosis meet a case definition</b></p>
          <?= $this->Form->control('aefi_causalities.'.$ikey.'.diagnosis_meet', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
        </div>
      </div>
      <hr>
      <div class="row">
        <h5 class="text-center">Create your question on causality here</h5>
        <div class="col-xs-1">
          <label class="pull-right">Has the </label>
        </div>
        <div class="col-xs-3">
          <?= $this->Form->control('aefi_causalities.'.$ikey.'.primary_vaccine', ['type' => 'select', 'label' => false, 
              'options' => Hash::combine($saefi->toArray(), 'saefi_list_of_vaccines.{n}.vaccine_name', 'saefi_list_of_vaccines.{n}.vaccine_name'), 
              'templates' => 'table_form']);?>
        </div>
        <div class="col-xs-3">
              <b>vaccine / vaccination caused </b>
        </div>
        <div class="col-xs-3">
            <?php 
                echo $this->Form->control('aefi_causalities.'.$ikey.'.causality_question', ['label' => false, 'templates' => 'table_form']);
            ?>
        </div>
        <div class="col-xs-2">
            <label>(The event for review in step 2: valid diagnosis)</label>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <?php 
            echo $this->Form->control('aefi_causalities.'.$ikey.'.case_eligibility', ['type' => 'radio', 
                       'label' => '<span style="color: red;">Is this case eligible for causality assessment?</span>',
                       'escape' => false,'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No']]);
          ?>
        </div>
      </div>

      <h4 class="text-warning" style="text-decoration-line: underline;">Step 2 (Event Checklist)</h4>
      <div class="col-xs-12">
        <hr>
              <div class="row">             
                
                <?php
                    echo $this->Form->control('saefi_pr_id', ['type' => 'hidden',  'templates' => 'table_form']);
                ?>
              <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                          <tr>
                            <th style="width: 55%;">I. Is there strong evidence for other causes?</th>
                            <th class="text-center"> Response</th>
                            <th class="text-center">Remarks</th>
                          </tr>
                            <tr>
                                <td>1. In this patient, does the medical history, clinical examination and/or investigations, confirm another cause for the event?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.clinical_examination', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.clinical_examination_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                              <th colspan="3">
                                II. Is there a known causal association with the vaccine or vaccination?
                              </th>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <small><b><em>Vaccine product</em></b></small>
                              </td>
                            </tr>
                            <tr>
                                <td>1. Is there evidence in published peer reviewed literature that this vaccine may cause such an event if administered correctly?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.evidence_literature', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.evidence_literature_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2. Is there a biological plausibility that the vaccine could cause the event?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.biological_plausibility', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.biological_plausibility_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3. In this patient, did a specific test demonstrate the causal role of the vaccine?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.causal_role', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.causal_role_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                          <tr>
                            <td colspan="3">
                              <small><b><em>Vaccine quality</em></b></small>
                            </td>
                          </tr>
                          <tr>
                              <td>4. Could the vaccine given to this patient have a quality defect or is substandard or falsified?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_quality', ['type' => 'radio', 
                     'label' => false, 'value' => $saefi['aefi_causalities'][$ikey]['vaccine_quality'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_quality_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                            <tr>
                              <td colspan="3">
                                <small><b><em>Immunization error</em></b></small>
                              </td>
                            </tr>
                            <tr>
                                <td>5. In this patient, was there an error in prescribing or non-adherence to recommendations for use of this vaccine (e.g. use beyond the expiry date, wrong recipient etc.)?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.prescribing_error', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.prescribing_error_specify', ['label' => false, 'templates' => 'table_form',
                                    ]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>6. In this patient, was the vaccine (or diluent) administered in an unsterile manner?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_unsterile', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_unsterile_specify', ['label' => false, 'templates' => 'table_form', ]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>7. In this patient, was the vaccine's physical condition (e.g. colour, turbidity, foreign substances etc.) abnormal when admnistered?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_condition', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_condition_specify', ['label' => false, 'templates' => 'table_form', ]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>8. When this patient was vaccinated, was there an error in vaccine constitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper mixing, improper syringe filling etc.)?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_reconstitution', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_reconstitution_specify', ['label' => false, 'templates' => 'table_form', ]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>9. In this patient, was there an error in vaccine handling (e.g. a break in the cold chain during transport, storage and/or immunization session etc.)?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_handling', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_handling_specify', ['label' => false, 'templates' => 'table_form', ]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>10. In this patient, was the vaccine administered incorrectly (e.g. wrong does, site or route of administration, wrong needle size etc.?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_administered', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form' ,
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unable to assess' => 'Unable to assess']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_administered_specify', ['label' => false, 'templates' => 'table_form', ]); ?>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <small><b><em>Immunization anxiety</em></b></small>
                              </td>
                            </tr>
                            <tr>
                                <td>11. In this patient, could this event be as stress response triggered by immunization (e.g. acute stress response, vasovagal reaction, hyperventilation or anxiety)?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_anxiety', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.vaccine_anxiety_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                              <th colspan="3">
                                II (time). If "yes" to any question in II. was the event within the time window of increased risk?
                              </th>
                            </tr>
                            <tr>
                                <td>12. In this patient, did the event occur within a plausible time window after vaccine administration?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.time_window', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.time_window_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                              <th colspan="3">
                                III. Is there strong evidence against a causal association?
                              </th>
                            </tr>
                            <tr>
                                <td>1. Is there a body of published evidence (systematic reviews, GACVS reviews, Cochrane reviews etc.) <b>against</b> a causal association between the vaccine and the event?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.causal_association', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.causal_association_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                              <th colspan="3">
                                IV. Other qualifying factors for classification
                              </th>
                            </tr>
                            <tr>
                                <td>1. In this patient, did such an event occur in the past after administration of a similar vaccine?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.comparable_event', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.comparable_event_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2. In this patient, did such an event occur in the past independent of vaccination?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.occur_past', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.occur_past_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3. Could the current event have occurred in this patient without vaccination?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.independent_vaccination', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.independent_vaccination_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>4. Did this patient have an illness, pre-existing condition or risk factor that could have contributed to the event?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.acute_illness', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.acute_illness_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>5. Was this patient taking any medicatoin prior to vaccination?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.taking_medication', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.taking_medication_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>6. Was this patient exposed to a potential factor (other than vaccine) prior to the event (e.g. allergen, drug, herbal product etc.)?</td>
                                <td>
                                  <div class="col-xs-12">
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.exposure_risk', ['type' => 'radio', 
                       'label' => false, 
                       'templates' => 'radio_form',
                       'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                       </div>
                                </td>
                                <td>
                                    <?= $this->Form->control('aefi_causalities.'.$ikey.'.exposure_risk_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>        
              </div>
      </div>

      <h4 class="text-warning" style="text-decoration-line: underline;">Step 3 (Algorithm) review all steps and <i class="fa fa-check" aria-hidden="true"></i>
   all the appropriate boxes</h4>

      <div class="col-xs-12">
        <!-- <p>insert causality assessment table here... collapsible. Collapsed by default</p> -->
        <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
           Causality Algorithm
        </a>
        <div class="collapseTwo" id="collapseExampleTwo">
          <div class="well">
            <?php 
              echo $this->Html->image('causality_algorithm.png', ['alt' => 'Causality Algorithm', 'width' => '826']); 
              echo $this->Form->control('aefi_causalities.'.$ikey.'.causality_notes', ['label' => 'Notes for step 3:', 'templates' => 'app_form']);
            ?>

            <hr>
              <h4 class="pages-header text-warning text-center">Decision Steps</h4>
                  <!-- <div class="col-xs-12"> -->
                    <?php
                        $a = $aefi_causality;
                        $vbrown = is_numeric(strpos($a->clinical_examination, 'Yes'));
                        $vblue1 = is_numeric(strpos($a->evidence_literature.$a->biological_plausibility.$a->causal_role.$a->vaccine_quality.$a->prescribing_error.$a->vaccine_unsterile.$a->vaccine_condition.$a->vaccine_reconstitution.$a->vaccine_handling.$a->vaccine_administered.$a->vaccine_anxiety, 'Yes'));
                        $vblue2 = is_numeric(strpos($a->time_window, 'Yes'));
                        $vgreen_dark = is_numeric(strpos($a->causal_association, 'Yes'));
                        $vred1 = is_numeric(strpos($a->comparable_event, 'Yes'));
                        $vred2 = is_numeric(strpos($a->occur_past, 'Yes'));
                        $vred3 = is_numeric(strpos($a->independent_vaccination.$a->acute_illness.$a->taking_medication.$a->exposure_risk, 'Yes'));

                        //Rules/Paths
                        if($vbrown) {
                          echo $rowo.$brown.$green1.$rowc; 
                        } 

                        //No -> Yes -> Yes
                        if(!$vbrown && $vblue1 && $vblue2) {    
                          echo $rowo.$brown.$blue1.$blue2.$pink1.$rowc; 
                        }

                        //No -> Yes -> No -> Yes
                        if(!$vbrown && $vblue1 && !$vblue2 && $vgreen_dark) {
                          echo $rowo.$brown.$blue1.$blue2.$green_dark.$rowc.$rowo.$green2.$rowc; 
                        }
                        //No -> Yes -> No -> No -> No
                        if(!$vbrown && $vblue1 && !$vblue2 && !$vgreen_dark && (!$vred1 && !$vred2 && !$vred3)) {
                          echo $rowo.$brown.$blue1.$blue2.$red.$rowc.$rowo.$green_light.$blue3.$rowc; 
                        }
                        //No -> Yes -> No -> No -> Yes1
                        if(!$vbrown && $vblue1 && !$vblue2 && !$vgreen_dark && $vred1 && !$vred2 && !$vred3) {
                          echo $rowo.$brown.$blue1.$blue2.$red.$rowc.$rowo.$green_light.$pink2.$rowc;  
                        }
                        //No -> Yes -> No -> No -> Yes2
                        if(!$vbrown && $vblue1 && !$vblue2 && !$vgreen_dark && $vred2 && !$vred1 && !$vred3) {
                          echo $rowo.$brown.$blue1.$blue2.$red.$rowc.$rowo.$green_light.$green3.$rowc;
                        }
                        //No -> Yes -> No -> No -> Yes3
                        if(!$vbrown && $vblue1 && !$vblue2 && !$vgreen_dark && $vred3 && !$vred1 && !$vred2) {
                          echo $rowo.$brown.$blue1.$blue2.$red.$rowc.$rowo.$green_light.$yellow.$rowc;
                        }

                        //No-> No -> Yes
                        if(!$vbrown && !$vblue1 && $vgreen_dark) {
                          echo $rowo.$brown.$blue1.$green_dark.$rowc.$rowo.$green2.$rowc; 
                        }      
                        //No-> No -> NO -> NO
                        if(!$vbrown && !$vblue1 && !$vgreen_dark && !$vred1 && !$vred2 && !$vred3) {
                          echo $rowo.$brown.$blue1.$green_dark.$red.$rowc.$rowo.$green_light.$pink2.$rowc;
                        }
                        //No-> No -> NO -> Yes1
                        if(!$vbrown && !$vblue1 && !$vgreen_dark && $vred1 && !$vred2 && !$vred3) {
                          echo $rowo.$brown.$blue1.$green_dark.$red.$rowc.$rowo.$green_light.$blue3.$rowc; 
                        }
                        //No-> No -> NO -> Yes2
                        if(!$vbrown && !$vblue1 && !$vgreen_dark && !$vred1 && $vred2 && !$vred3) {
                          echo $rowo.$brown.$blue1.$green_dark.$red.$rowc.$rowo.$green_light.$green3.$rowc;   
                        }
                        //No-> No -> NO -> Yes3
                        if(!$vbrown && !$vblue1 && !$vgreen_dark && !$vred1 && !$vred2 && $vred3) {
                          echo $rowo.$brown.$blue1.$green_dark.$red.$rowc.$rowo.$green_light.$yellow.$rowc;  
                        }
                    ?>     

          </div>
        </div>
      </div>
      <br>
      <hr>
      <br>

      <h4 class="text-warning" style="text-decoration-line: underline;">Step 4 (Classification) <i class="fa fa-check" aria-hidden="true"></i> all boxes that apply</h4>

      <div class="row">
        <div class="col-xs-1">
          <label>Adequate information available</label>
        </div>
        <div class="col-xs-4">
          <div class="well" style="background-color: #FECCFF">
            <p><strong>A. Consistent with causal associatioin to Immunization</strong></p>
            <?php
              echo $this->Form->control('aefi_causalities.'.$ikey.'.consistent_i', ['type' => 'checkbox', 'label' => 'A1. Vaccine product-related reaction (As per published literature)', 'templates' => 'checkbox_formV2']);   
              echo $this->Form->control('aefi_causalities.'.$ikey.'.consistent_ii', ['type' => 'checkbox', 'label' => 'A2. Vaccine quality defect-related reaction', 
                'templates' => 'checkbox_formV2']);        
              echo $this->Form->control('aefi_causalities.'.$ikey.'.consistent_iii', ['type' => 'checkbox', 'label' => 'A3. Immunization error-related reaction', 
                'templates' => 'checkbox_formV2']);        
              echo $this->Form->control('aefi_causalities.'.$ikey.'.consistent_iv', ['type' => 'checkbox', 'label' => 'A4. Immunization anxiety-related reaction <br> <b>(ITSR**)</b>', 'escape' => false,
                'templates' => 'checkbox_formV2']);               
            ?>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="well" style="background-color: #FFFFCD">
            <p><strong>B. Indeterminate</strong></p>
            <?php
              echo $this->Form->control('aefi_causalities.'.$ikey.'.indeterminate_i', ['type' => 'checkbox', 'label' => 'B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event)', 
               // 'checked' => $aefi_causality['indeterminate'] ?? true,
                'templates' => 'checkbox_formV2']);   
              echo $this->Form->control('aefi_causalities.'.$ikey.'.indeterminate_ii', ['type' => 'checkbox', 'label' => 'B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization', 'templates' => 'checkbox_formV2']);               
            ?>
          </div>        
        </div>
        <div class="col-xs-3">
          <div class="well" style="background-color: #CDFFCC"> 
            <p><strong>C. Inconsistent with causal association to immunization</strong></p>         
            <?php
              echo $this->Form->control('aefi_causalities.'.$ikey.'.inconsistent', ['type' => 'checkbox', 'label' => 'C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine', 'templates' => 'checkbox_formV2']);                   
            ?>
          </div>          
        </div>
      </div>

      <div class="row">
        <div class="col-xs-1">
          <label>Adequate information not available</label>
        </div>
        <div class="col-xs-11">
          <div class="well" style="background-color: #8EB4E3"> 
            <?php
              echo $this->Form->control('aefi_causalities.'.$ikey.'.unclassifiable', ['type' => 'checkbox', 'label' => '<b>Unclassifiable</b>', 'escape' => false, 'templates' => 'checkbox_formV2']);                   
              echo $this->Form->control('aefi_causalities.'.$ikey.'.unclassifiable_specify', ['label' => 'Specify the additional information required for classification:', 'templates' => 'app_form']);                   
            ?>
          </div>  
        </div>
      </div>

    <p>*B1: This is a potential signal and may be considered for investigation <br>**Immunization Triggered Stress Response</p>
      
      <div class="row">
        <div class="col-xs-12">
          <p><strong>Summarize the classification logic in the order of priority:</strong></p>
          <p> With available evidence, we could conclude that the classification is 
            <?= $this->Form->control('aefi_causalities.'.$ikey.'.conclude', ['label' => false, 'templates' => 'app_form']) ?> because:
            <?= $this->Form->control('aefi_causalities.'.$ikey.'.conclude_reason', ['label' => false, 'templates' => 'table_form'])?>
          </p>

          <p> With available evidence, we could <b>NOT</b> classify the case because:
            <?= $this->Form->control('aefi_causalities.'.$ikey.'.conclude_inability', ['label' => false, 'templates' => 'table_form'])?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <?php
            echo $this->Form->control('aefi_causalities.'.$ikey.'.signature', ['type' => 'checkbox', 'label' => 'Approve the Evaluator’s review', 'escape' => false, 'templates' => 'app_form']);
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
      
      </fieldset>
           <?php echo $this->Form->end() ?>
    </div>
  </div>
</div>

          <?php } ?>
  </div>
</div>