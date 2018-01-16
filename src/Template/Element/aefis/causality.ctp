<?php use Cake\Utility\Hash; ?>
  <div class="row">
    <div class="col-xs-12"><h5 class="text-center">Causality Assessment</h5></div>
  </div>

  <div class="row <?php if(!empty($saefi['aefi_causality'])) { ?> muted <?php } ?>">
    <?php echo $this->Form->create($aefi, ['url' => ['action' => 'causality']]); ?>
    <fieldset <?php if(!empty($aefi['aefi_causality'])) { ?> disabled="disabled" <?php } ?> >
    <div class="row">
      <div class="col-xs-12">        
        <h4 style="text-decoration-line: underline;">Step 1 (Eligibility)</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-3">
        <p><b>Id number of Patient</b></p>
        <?=  $aefi['patient_name'].' '.$aefi['patient_surname'] ?>
      </div>
      <div class="col-xs-3">        
        <p><b>Name of one or more vaccines administered before this event</b></p>
        <?php
          if(!empty($aefi['aefi_list_of_vaccines'])) {
            foreach ($aefi['aefi_list_of_vaccines'] as $aefi_list_of_vaccines) {
              echo "<span>".$aefi_list_of_vaccines['vaccine_name']."</span><br>";
            }
          }
        ?>
      </div>
      <div class="col-xs-3">
        <p><b>What is the Valid Diagnosis</b></p>
        <?=  $aefi['description_of_reaction'] ?>        
      </div>
      <div class="col-xs-3">
        <p><b>Does the diagnosis meet a case definition</b></p>
        <?= $this->Form->control('aefi_causality.diagnosis_meet', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['diagnosis_meet'] ?? 'Yes',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No']]); ?>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-1">
        <label class="pull-right">Has the </label>
      </div>
      <div class="col-xs-3">
        <?= $this->Form->control('aefi_causality.primary_vaccine', ['type' => 'select', 'label' => false, 
            'options' => Hash::combine($aefi->toArray(), 'aefi_list_of_vaccines.{n}.vaccine_name', 'aefi_list_of_vaccines.{n}.vaccine_name'), 
            'templates' => 'table_form']);?>
      </div>
      <div class="col-xs-3">
            <b>vaccine / vaccination caused </b>
      </div>
      <div class="col-xs-5">
            <?=  $aefi['description_of_reaction'] ?>
      </div>
    </div>

    <h4 style="text-decoration-line: underline;">Step 2 (Event Checklist)</h4>
    <div class="col-xs-12">
      <hr>
            <div class="row">             
              
	          	<?php
                  echo $this->Form->control('aefi_pr_id', ['type' => 'hidden', 'value' => $aefi->id, 'escape' => false, 'templates' => 'table_form']);
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
                              <td>Does a clinical examination or laboratory test on the patient confirm another cause?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.clinical_examination', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['clinical_examination'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.clinical_examination_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <th colspan="3">
                              II. Is there a known causal association with the vaccine or vaccination?
                            </th>
                          </tr>
                          <tr>
                            <td colspan="3">
                              <small><b><em>Vaccine product(s)</em></b></small>
                            </td>
                          </tr>
                          <tr>
                              <td>Is there evidence in the literature that this vaccine(s) may cause the reported event even if administered correctly?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.evidence_literature', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['evidence_literature'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.evidence_literature_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Did a specific test demonstrate the causal role of the vaccine or any of the ingredients?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.causal_role', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['causal_role'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.causal_role_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <td colspan="3">
                              <small><b><em>Immunization error</em></b></small>
                            </td>
                          </tr>
                          <tr>
                              <td>Was there an error in prescribing or non-adherence to recommendations for use of this vaccine?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.prescribing_error', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['prescribing_error'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.prescribing_error_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was the vaccine (or any of it's ingredients) administered unsterile?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_unsterile', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_unsterile'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_unsterile_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was the vaccine's physical condition (e.g. colour, turbidity, foreign substances etc.) abnormal at the time of administration?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_condition', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_condition'] ?? 'Unk',
                     'templates' => 'radio_form' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_condition_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was there an error in vaccine reconstitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper mixing, improper syringe filling etc.)?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_reconstitution', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_reconstitution'] ?? 'Unk',
                     'templates' => 'radio_form' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_reconstitution_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was there an error in vaccine handling (e.g. cold chain failure during transport, storage and/or immunization session etc.)?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_handling', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_handling'] ?? 'Unk',
                     'templates' => 'radio_form' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_handling_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was the vaccine administered incorrectly (e.g. wrong does, site or route of administration, wrong needle size etc.??</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_administered', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_administered'] ?? 'Unk',
                     'templates' => 'radio_form' ,
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_administered_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <td colspan="3">
                              <small><b><em>Immunization anxiety</em></b></small>
                            </td>
                          </tr>
                          <tr>
                              <td>Could the event have been caused by anxiety about the immunization (e.g. vasovaga, hyperventilation or stress-related disorder)?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.vaccine_anxiety', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['vaccine_anxiety'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.vaccine_anxiety_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <th colspan="3">
                              II (time). If "yes" to any question in II. was the event within the time window of increased risk?
                            </th>
                          </tr>
                          <tr>
                              <td>Did the event occur within an appropriate time window after vaccine administration?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.time_window', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['time_window'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.time_window_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <th colspan="3">
                              III. Is there strong evidence against a causal association?
                            </th>
                          </tr>
                          <tr>
                              <td>Is there strong evidence against a causal association?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.causal_association', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['causal_association'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.causal_association_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                            <th colspan="3">
                              IV. Other qualifying factors for classification
                            </th>
                          </tr>
                          <tr>
                              <td>Could the event occur independently of vaccination (background rate)?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.independent_vaccination', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['independent_vaccination'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.independent_vaccination_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Could the event be a manifestation of another health condition?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.manifest_health', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['manifest_health'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.manifest_health_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Did a comparable event occur after a previous dose of a similar vaccine?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.comparable_event', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['comparable_event'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.comparable_event_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was there exposure to a potential risk factor or toxin prior to the event?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.exposure_risk', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['exposure_risk'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.exposure_risk_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was there acute illness prior to the event?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.acute_illness', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['acute_illness'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.acute_illness_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Did the event occur in the past independently of vaccination?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.occur_past', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['occur_past'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.occur_past_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Was the patient taking any medicatoin prior to vaccination?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.taking_medication', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['taking_medication'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.taking_medication_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Is there a biological plausibility that the vaccine could cause the event?</td>
                              <td>
                                <div class="col-xs-12">
                                  <?= $this->Form->control('aefi_causality.biological_plausibility', ['type' => 'radio', 
                     'label' => false, 'value' => $aefi['aefi_causality']['biological_plausibility'] ?? 'Unk',
                     'templates' => 'radio_form',
                     'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']]); ?>
                     </div>
                              </td>
                              <td>
                                  <?= $this->Form->control('aefi_causality.biological_plausibility_specify', ['label' => false, 'templates' => 'table_form']); ?>
                              </td>
                          </tr>
                          
                      </tbody>
                  </table>
              </div>
          </div>        
            </div>
    </div>

    <h4 style="text-decoration-line: underline;">Step 3 (Algorithm) review all steps and <i class="fa fa-check" aria-hidden="true"></i>
 all the appropriate boxes</h4>

    <div class="col-xs-12">
      <!-- <p>insert causality assessment table here... collapsible. Collapsed by default</p> -->
      <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
         Causality Algorithm
      </a>
      <div class="collapse" id="collapseExample">
        <div class="well">
          <?php echo $this->Html->image('aefi1.png', ['alt' => 'Causality Algorithm', 'width' => '826']); ?>
        </div>
      </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
      <div class="col-xs-4">
        <div class="well" style="background-color: #CDFFCC">
          <?php
            echo $this->Form->control('aefi_causality.inconsistent_i', ['type' => 'checkbox', 'label' => 'I A. Inconsistent causal association to immunization', 'templates' => 'checkbox_form']);   
            echo $this->Form->control('aefi_causality.inconsistent_iii', ['type' => 'checkbox', 'label' => 'III A. Inconsistent causal association to immunization', 'templates' => 'checkbox_form']);   
            echo $this->Form->control('aefi_causality.inconsistent_iv', ['type' => 'checkbox', 'label' => 'IV C. Inconsistent causal association to immunization', 'templates' => 'checkbox_form']);                
          ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="well" style="background-color: #FECCFF">
          <?php
            echo $this->Form->control('aefi_causality.consistent_ii', ['type' => 'checkbox', 'label' => 'II A. Consistent causal association to immunization', 'templates' => 'checkbox_form']);   
            echo $this->Form->control('aefi_causality.consistent_iv', ['type' => 'checkbox', 'label' => 'IV A. Consistent causal association to immunization', 'templates' => 'checkbox_form']);               
          ?>
        </div>        
      </div>
      <div class="col-xs-4">
        <div class="well" style="background-color: #FFFFCD">
          <?php
            echo $this->Form->control('aefi_causality.indeterminate', ['type' => 'checkbox', 'label' => 'IV B. Indeterminate', 
              'checked' => $aefi['aefi_causality']['indeterminate'] ?? true,
              'templates' => 'checkbox_form']);   
            echo $this->Form->control('aefi_causality.unclassifiable', ['type' => 'checkbox', 'label' => 'IV D. Unclassifiable', 'templates' => 'checkbox_form']);               
          ?>
        </div>          
      </div>
    </div>
          <div class="row">
            <div class="form-group"> 
              <div class="col-sm-12"> 
                <p class="text-center">
                  <?php if(empty($aefi['aefi_causality'])) { ?> 
                  <button type="submit" class="btn btn-success btn-lg active text-center" id="registerUser" onclick="return confirm('Save?');"><i class="fa fa-save" aria-hidden="true"></i> Save review</button>
                  <?php } ?>
                </p>
              </div> 
            </div>
          </div>
          </fieldset>
         <?php echo $this->Form->end() ?>
  </div>