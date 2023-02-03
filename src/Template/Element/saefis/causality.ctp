<?php

use Cake\Utility\Hash;

$this->Html->script('causality', ['block' => true]);
?>
<br>
<?php
    if(($prefix == 'evaluator') && $this->request->session()->read('Auth.User.id') != $saefi->assigned_to) { ?>

<p class="page-header">You must be assigned this report to review.</p>
<?php } else { ?>
<?php if ($this->request->params['_ext'] != 'pdf') { ?>
<div class="amend-form">
    <h5 class="text-center"><u>INTERNAL COMMENTS/QUERIES</u></h5>
    <div class="row">
        <div class="col-xs-8">
            <?php echo $this->element('comments/list', ['comments' => $saefi->saefi_comments]) ?>
        </div>
        <div class="col-xs-4 lefty">
            <?php if (!in_array("FinalStage", Hash::extract($saefi->report_stages, '{n}.stage')) && !empty($saefi->assigned_to)) { ?>
            <?php
          echo $this->element('comments/add', [
            'model' => [
              'model_id' => $saefi->id, 'foreign_key' => $saefi->id,
              'model' => 'Saefis', 'category' => 'causality', 'url' => 'add-from-causality/saefis'
            ]
          ])
          ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="text-center">Causality Assessment</h3>
    </div>
    <hr>
    <?php
  if ($this->request->params['_ext'] != 'pdf') {
    echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['action' => 'download', '_ext' => 'pdf', $saefi->id, 'causality',], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
  }
  ?>
</div>


<div class="row">
    <div class="col-xs-12">
        <?php
    if (!empty($saefi->aefi_causalities)) {
      echo "<h3 class='text-center'>Previous Assessment(s)</h3>";
    }
    ?>
        <?php echo $this->element('aefis/causality_assessments', ['aefi_causalities' => $saefi->aefi_causalities, 'aefi' => $saefi]) ?>
    </div>
</div>
<?php if ($this->request->params['_ext'] != 'pdf') { ?>

<div class="row causality-form">
    <div class="col-xs-12">
        <?php echo $this->Form->create($saefi, ['url' => ['action' => 'causality']]); ?>
        <fieldset>
            <div class="row">
                <div class="col-xs-4">
                    <p><b>Patient ID/Name</b></p>
                    <?= $saefi['patient_name'] . ' ' . $saefi['patient_surname'] ?>
                </div>
                <div class="col-xs-4">
                    <p><b>DOB/Age</b></p>
                    <?php
            if (!empty($saefi['date_of_birth'])) echo $saefi['date_of_birth'] . '<br>';
            if (!empty($saefi['age_at_onset_days']) or !empty($saefi['age_at_onset_months']) or !empty($saefi['age_at_onset_years'])) echo $saefi['age_at_onset_days'] . ' days-' . $saefi['age_at_onset_months'] . ' months-' . $saefi['age_at_onset_years'] . ' years' . '<br>';
            if (!empty($saefi['age_group'])) echo $saefi['age_group'] . '<br>';
            ?>
                </div>
                <div class="col-xs-4">
                    <p><b>Sex</b></p>
                    <?= $saefi['gender'] ?>
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
            if (!empty($saefi['saefi_list_of_vaccines'])) {
              foreach ($saefi['saefi_list_of_vaccines'] as $ssaefi_list_of_vaccines) {
                echo "<span>" . $ssaefi_list_of_vaccines['vaccine_name'] . "</span><br>";
              }
            }
            ?>
                </div>
                <div class="col-xs-4">
                    <p><b>What is the Valid Diagnosis</b></p>
                    <?= $saefi['final_diagnosis'] ?>
                </div>
                <div class="col-xs-4">
                    <p><b>Does the diagnosis meet a case definition</b></p>
                    <?= $this->Form->control('aefi_causalities.' . $ekey . '.diagnosis_meet', [
              'type' => 'radio',
              'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['diagnosis_meet'])) ? $saefi['aefi_causalities'][$ekey]['diagnosis_meet'] : 'Yes',
              'templates' => 'radio_form',
              'options' => ['Yes' => 'Yes', 'No' => 'No']
            ]); ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <h5 class="text-center">Create your question on causality here</h5>
                <div class="col-xs-1">
                    <label class="pull-right">Has the </label>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->control('aefi_causalities.' . $ekey . '.primary_vaccine', [
              'type' => 'select', 'label' => false,
              'options' => Hash::combine($saefi->toArray(), 'aefi_list_of_vaccines.{n}.vaccine_name', 'aefi_list_of_vaccines.{n}.vaccine_name'),
              'templates' => 'table_form'
            ]); ?>
                </div>
                <div class="col-xs-3">
                    <b>vaccine / vaccination caused </b>
                </div>
                <div class="col-xs-3">
                    <?php
            echo $this->Form->control('aefi_causalities.' . $ekey . '.causality_question', ['label' => false, 'templates' => 'table_form']);
            ?>
                </div>
                <div class="col-xs-2">
                    <label>(The event for review in step 2: valid diagnosis)</label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <?php
            echo $this->Form->control('aefi_causalities.' . $ekey . '.case_eligibility', [
              'type' => 'radio',
              'label' => '<span style="color: red;">Is this case eligible for causality assessment?</span>',
              'escape' => false, 'templates' => 'radio_form',
              'options' => ['Yes' => 'Yes', 'No' => 'No']
            ]);
            ?>
                </div>
            </div>

            <h4 class="text-warning" style="text-decoration-line: underline;">Step 2 (Event Checklist)</h4>
            <div class="col-xs-12">
                <hr>
                <div class="row">

                    <?php
            echo $this->Form->control('saefi_pr_id', ['type' => 'hidden', 'value' => $saefi->id, 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('causality_pr_id', ['type' => 'hidden', 'value' => (!empty($saefi->evaluations[$ekey]['id']) ? $saefi->evaluations[$ekey]['id'] : 100), 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('aefi_causalities.' . $ekey . '.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('aefi_causalities.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
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
                                        <td>1. In this patient, does the medical history, clinical examination and/or
                                            investigations, confirm another cause for the event?</td>
                                        <td>
                                            <div class="col-xs-12 r1">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.clinical_examination', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['clinical_examination'])) ? $saefi['aefi_causalities'][$ekey]['clinical_examination'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.clinical_examination_specify', ['label' => false, 'templates' => 'table_form']); ?>
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
                                        <td>1. Is there evidence in published peer reviewed literature that this vaccine
                                            may cause such an event if administered correctly?</td>
                                        <td>
                                            <div class="col-xs-12 r21">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.evidence_literature', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['evidence_literature'])) ? $saefi['aefi_causalities'][$ekey]['evidence_literature'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.evidence_literature_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Is there a biological plausibility that the vaccine could cause the
                                            event?</td>
                                        <td>
                                            <div class="col-xs-12 r21">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.biological_plausibility', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['biological_plausibility'])) ? $saefi['aefi_causalities'][$ekey]['biological_plausibility'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.biological_plausibility_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. In this patient, did a specific test demonstrate the causal role of the
                                            vaccine?</td>
                                        <td>
                                            <div class="col-xs-12 r21">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.causal_role', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['causal_role'])) ? $saefi['aefi_causalities'][$ekey]['causal_role'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.causal_role_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <small><b><em>Vaccine quality</em></b></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Could the vaccine given to this patient have a quality defect or is
                                            substandard or falsified?</td>
                                        <td>
                                            <div class="col-xs-12 r22">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_quality', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_quality'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_quality'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_quality_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <small><b><em>Immunization error</em></b></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5. In this patient, was there an error in prescribing or non-adherence to
                                            recommendations for use of this vaccine (e.g. use beyond the expiry date,
                                            wrong recipient etc.)?</td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.prescribing_error', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['prescribing_error'])) ? $saefi['aefi_causalities'][$ekey]['prescribing_error'] : $saefi['prescribing_error'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.prescribing_error_specify', [
                          'label' => false, 'templates' => 'table_form',
                          'value' => $saefi['prescribing_error_specify']
                        ]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6. In this patient, was the vaccine (or diluent) administered in an
                                            unsterile manner?</td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_unsterile', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_unsterile'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_unsterile'] : $saefi['vaccine_unsterile'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_unsterile_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['vaccine_unsterile_specify']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7. In this patient, was the vaccine's physical condition (e.g. colour,
                                            turbidity, foreign substances etc.) abnormal when admnistered?</td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_condition', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_condition'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_condition'] : $saefi['vaccine_condition'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_condition_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['vaccine_condition_specify']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8. When this patient was vaccinated, was there an error in vaccine
                                            constitution/preparation by the vaccinator (e.g. wrong product, wrong
                                            diluent, improper mixing, improper syringe filling etc.)?</td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_reconstitution', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_reconstitution'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_reconstitution'] : $saefi['vaccine_reconstitution'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_reconstitution_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['vaccine_reconstitution_specify']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9. In this patient, was there an error in vaccine handling (e.g. a break in
                                            the cold chain during transport, storage and/or immunization session etc.)?
                                        </td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_handling', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_handling'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_handling'] : $saefi['vaccine_handling'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_handling_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['vaccine_handling_specify']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10. In this patient, was the vaccine administered incorrectly (e.g. wrong
                                            does, site or route of administration, wrong needle size etc.?</td>
                                        <td>
                                            <div class="col-xs-12 r23">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_administered', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_administered'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_administered'] : 'Unable to assess',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown', 'Not applicable' => 'Not applicable']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_administered_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['vaccine_administered_specify']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <small><b><em>Immunization anxiety</em></b></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11. In this patient, could this event be as stress response triggered by
                                            immunization (e.g. acute stress response, vasovagal reaction,
                                            hyperventilation or anxiety)?</td>
                                        <td>
                                            <div class="col-xs-12 r24">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_anxiety', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['vaccine_anxiety'])) ? $saefi['aefi_causalities'][$ekey]['vaccine_anxiety'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.vaccine_anxiety_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            II (time). If "yes" to any question in II. was the event within the time
                                            window of increased risk?
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>12. In this patient, did the event occur within a plausible time window
                                            after vaccine administration?</td>
                                        <td>
                                            <div class="col-xs-12 r3">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.time_window', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['time_window'])) ? $saefi['aefi_causalities'][$ekey]['time_window'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.time_window_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            III. Is there strong evidence against a causal association?
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>1. Is there a body of published evidence (systematic reviews, GACVS reviews,
                                            Cochrane reviews etc.) <b>against</b> a causal association between the
                                            vaccine and the event?</td>
                                        <td>
                                            <div class="col-xs-12 r4">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.causal_association', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['causal_association'])) ? $saefi['aefi_causalities'][$ekey]['causal_association'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.causal_association_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            IV. Other qualifying factors for classification
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>1. In this patient, did such an event occur in the past after administration
                                            of a similar vaccine?</td>
                                        <td>
                                            <div class="col-xs-12 r51">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.comparable_event', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['comparable_event'])) ? $saefi['aefi_causalities'][$ekey]['comparable_event'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.comparable_event_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. In this patient, did such an event occur in the past independent of
                                            vaccination?</td>
                                        <td>
                                            <div class="col-xs-12 r52">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.occur_past', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['occur_past'])) ? $saefi['aefi_causalities'][$ekey]['occur_past'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.occur_past_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Could the current event have occurred in this patient without vaccination
                                            (background rate)?</td>
                                        <td>
                                            <div class="col-xs-12 r53">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.independent_vaccination', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['independent_vaccination'])) ? $saefi['aefi_causalities'][$ekey]['independent_vaccination'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.independent_vaccination_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Did this patient have an illness, pre-existing condition or risk factor
                                            that could have contributed to the event?</td>
                                        <td>
                                            <div class="col-xs-12 r53">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.acute_illness', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['acute_illness'])) ? $saefi['aefi_causalities'][$ekey]['acute_illness'] : $saefi['existing_illness'],
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.acute_illness_specify', ['label' => false, 'templates' => 'table_form', 'value' => $saefi['existing_illness_remarks']]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5. Was this patient taking any medicatoin prior to vaccination?</td>
                                        <td>
                                            <div class="col-xs-12 r53">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.taking_medication', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['taking_medication'])) ? $saefi['aefi_causalities'][$ekey]['taking_medication'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.taking_medication_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6. Was this patient exposed to a potential factor (other than vaccine) prior
                                            to the event (e.g. allergen, drug, herbal product etc.)?</td>
                                        <td>
                                            <div class="col-xs-12 r53">
                                                <?= $this->Form->control('aefi_causalities.' . $ekey . '.exposure_risk', [
                            'type' => 'radio',
                            'label' => false, 'value' => (!empty($saefi['aefi_causalities'][$ekey]['exposure_risk'])) ? $saefi['aefi_causalities'][$ekey]['exposure_risk'] : 'Unk',
                            'templates' => 'radio_form',
                            'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unk' => 'Unk']
                          ]); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $this->Form->control('aefi_causalities.' . $ekey . '.exposure_risk_specify', ['label' => false, 'templates' => 'table_form']); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="text-warning" style="text-decoration-line: underline;">Step 3 (Algorithm) review all steps and <i
                    class="fa fa-check" aria-hidden="true"></i>
                all the appropriate boxes</h4>

            <!-- <div class="col-xs-12"> -->
            <!-- <p>insert causality assessment table here... collapsible. Collapsed by default</p> -->
            <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExampleTwo" aria-expanded="true"
                aria-controls="collapseExampleTwo">
                Causality Algorithm
            </a>
            <div id="collapseExampleTwo">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2" id="step1a">
                            <div class="stages text-center">
                                <span class="stages-on bg-green">I. A. Inconsistent causal association to
                                    immunization</span>
                            </div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-3" id="step4a">
                            <div class="stages text-center">
                                <span class="stages-on bg-green">III. A. Inconsistent causal association to
                                    immunization</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2" id="step1u">
                            <div class="text-center yes1"><span class="arrow"><i class="fa fa-long-arrow-up fa-4"
                                        aria-hidden="true"></i></span> Yes</div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-3" id="step4y">
                            <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-up fa-4"
                                        aria-hidden="true"></i></span> Yes</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="row">
                                <div class="col-xs-9" id="step1">
                                    <div class="stages text-center">
                                        <span class="stages-on bg-brown">I. Is there strong evidence for other causes?
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-3" id="step1n">
                                    <div class="text-center yes2"><span class="arrow"><i
                                                class="fa fa-long-arrow-right fa-4" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2" id="step2">
                            <div class="stages text-center">
                                <span class="stages-on bg-blue1">II. Is there a known causal association with the
                                    vaccine/ vaccination</span>
                            </div>
                        </div>
                        <div class="col-xs-1" id="step2n">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-right fa-4"
                                            aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="row">
                                <div class="col-xs-9" id="step4">
                                    <div class="stages text-center">
                                        <span class="stages-on bg-green-dark">III. Is there a strong evidence against a
                                            causal association</span>
                                    </div>
                                </div>
                                <div class="col-xs-3" id="step4n">
                                    <div class="text-center yes2"><span class="arrow"><i
                                                class="fa fa-long-arrow-right fa-4" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2" id="step5">
                            <div class="stages text-center">
                                <span class="stages-on bg-red">IV. Review other qualifying factors</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-2" id="step2y">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-down fa-4"
                                            aria-hidden="true"></i> Yes</span> </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-1" id="step3ni">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-up fa-4"
                                            aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-xs-2" id="step5n">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-down fa-4"
                                            aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-2" id="step3">
                            <div class="stages text-center">
                                <span class="stages-on bg-blue2">II(Time). Was the event within the time window of the
                                    increased risk</span>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="stages text-center" id="step3n">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-minus fa-4"
                                            aria-hidden="true"></i></span> No</div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-2" id="step6">
                            <div class="stages text-center">
                                <span class="stages-on bg-green-light">Is the event classifiable</span>
                            </div>
                        </div>
                        <div class="col-xs-1" id="step6n">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-right fa-4"
                                            aria-hidden="true"></i> </span>No </div>
                            </div>
                        </div>
                        <div class="col-xs-2" id="step7">
                            <div class="stages text-center">
                                <span class="stages-on bg-blue3">IV D. Unclassifiable</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-2" id="step3y">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-down fa-4"
                                            aria-hidden="true"></i> Yes</span> </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-3" id="step6y">
                            <div class="stages text-center">
                                <div class="text-center yes2"><span class="arrow"><i class="fa fa-long-arrow-down fa-4"
                                            aria-hidden="true"></i> Yes</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-2" id="step3a">
                            <div class="stages text-center">
                                <span class="stages-on bg-pink">II A. Consistent causal association to
                                    immunization</span>
                            </div>
                        </div>
                        <div class="col-xs-2 col-xs-offset-1" id="step8">
                            <div class="stages text-center">
                                <span class="stages-on bg-pink">IV A. Consistent causal association to
                                    immunization</span>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stages text-center" id="step9">
                                <span class="stages-on bg-yellow">IV B. Indeterminate</span>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="stages text-center" id="step10">
                                <span class="stages-on bg-green">IV. C. Inconsistent causal association to
                                    immunization</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
            // echo $this->Html->image('causality_algorithm.png', ['alt' => 'Causality Algorithm', 'width' => '826']); 
            echo $this->Form->control('aefi_causalities.' . $ekey . '.causality_notes', ['label' => 'Notes for step 3:', 'templates' => 'app_form']);
            ?>
                </div>
            </div>
            <!-- </div> -->
            <br>
            <hr>
            <br>



            <h4 class="text-warning" style="text-decoration-line: underline;">Step 4 (Classification) <i
                    class="fa fa-check" aria-hidden="true"></i> all boxes that apply</h4>

            <div class="row">
                <div class="col-xs-1">
                    <label>Adequate information available</label>
                </div>
                <div class="col-xs-4 c1">
                    <div class="well" style="background-color: #FECCFF">
                        <p><strong>A. Consistent with causal associatioin to Immunization</strong></p>
                        <?php
              echo $this->Form->control('aefi_causalities.' . $ekey . '.consistent_i', ['type' => 'checkbox', 'label' => 'A1. Vaccine product-related reaction (As per published literature)', 'templates' => 'checkbox_formV2']);
              echo $this->Form->control('aefi_causalities.' . $ekey . '.consistent_ii', [
                'type' => 'checkbox', 'label' => 'A2. Vaccine quality defect-related reaction',
                'templates' => 'checkbox_formV2'
              ]);
              echo $this->Form->control('aefi_causalities.' . $ekey . '.consistent_iii', [
                'type' => 'checkbox', 'label' => 'A3. Immunization error-related reaction',
                'templates' => 'checkbox_formV2'
              ]);
              echo $this->Form->control('aefi_causalities.' . $ekey . '.consistent_iv', [
                'type' => 'checkbox', 'label' => 'A4. Immunization anxiety-related reaction <br> <b>(ITSR**)</b>', 'escape' => false,
                'templates' => 'checkbox_formV2'
              ]);
              ?>
                    </div>
                </div>
                <div class="col-xs-4 c2">
                    <div class="well" style="background-color: #FFFFCD">
                        <p><strong>B. Indeterminate</strong></p>
                        <?php
              echo $this->Form->control('aefi_causalities.' . $ekey . '.indeterminate_i', [
                'type' => 'checkbox', 'label' => 'B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event)',
                //'checked' => $saefi['aefi_causalities'][$ekey]['indeterminate'] ?? true,
                'templates' => 'checkbox_formV2'
              ]);
              echo $this->Form->control('aefi_causalities.' . $ekey . '.indeterminate_ii', ['type' => 'checkbox', 'label' => 'B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization', 'templates' => 'checkbox_formV2']);
              ?>
                    </div>
                </div>
                <div class="col-xs-3 c3">
                    <div class="well" style="background-color: #CDFFCC">
                        <p><strong>C. Inconsistent with causal association to immunization</strong></p>
                        <?php
              echo $this->Form->control('aefi_causalities.' . $ekey . '.inconsistent', ['type' => 'checkbox', 'label' => 'C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine', 'templates' => 'checkbox_formV2']);
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
              echo $this->Form->control('aefi_causalities.' . $ekey . '.unclassifiable', ['type' => 'checkbox', 'label' => '<b>Unclassifiable</b>', 'escape' => false, 'templates' => 'checkbox_formV2']);
              echo $this->Form->control('aefi_causalities.' . $ekey . '.unclassifiable_specify', ['label' => 'Specify the additional information required for classification:', 'templates' => 'app_form']);
              ?>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#" class="btn btn-info"
                        onclick="if (confirm('Are you sure you want to rerun the algorithm?')) { causality_assessment(); } event.returnValue = false; return false;">Rerun
                        Algorithm</a>
                </div>
            </div>

            <p>*B1: This is a potential signal and may be considered for investigation <br>**Immunization Triggered
                Stress Response</p>

            <div class="row">
                <div class="col-xs-12">
                    <p><strong>Summarize the classification logic in the order of priority:</strong></p>
                    <p> With available evidence, we could conclude that the classification is
                        <?= $this->Form->control('aefi_causalities.' . $ekey . '.conclude', ['label' => false, 'templates' => 'app_form']) ?>
                        because:
                        <?= $this->Form->control('aefi_causalities.' . $ekey . '.conclude_reason', ['label' => false, 'templates' => 'table_form']) ?>
                    </p>

                    <p> With available evidence, we could <b>NOT</b> classify the case because:
                        <?= $this->Form->control('aefi_causalities.' . $ekey . '.conclude_inability', ['label' => false, 'templates' => 'table_form']) ?>
                    </p>

                    <p> <strong class="text-center">References</strong>
                        <?= $this->Form->control('aefi_causalities.' . $ekey . '.references_text', ['label' => false, 'templates' => 'table_form']) ?>
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-6">
                    <?php
            // if ($prefix == 'manager') {                  
            //     echo $this->Form->control('aefi_causalities.'.$ekey.'.signature', ['type' => 'checkbox', 'label' => 'Approve the Evaluator’s review', 'escape' => false, 'templates' => 'app_form']);
            // } else {
            echo "<div class='control-label'><label>Signature<label></div>";
            echo $this->Form->control('aefi_causalities.' . $ekey . '.signature', ['type' => 'hidden', 'value' => 1, 'templates' => 'table_form']);
            // }
            ?>
                </div>
                <div class="col-xs-4">
                    <?php
            echo "<img src='" . $this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true) . "' style='width: 70%;' alt=''>";
            ?>
                </div>
                <div class="col-xs-2"> </div>
            </div>
            <br>

            <div class="row">
                <div class="form-group">
                    <div class="col-xs-12">
                        <p class="text-center">
                            <button type="submit" class="btn btn-success btn-lg active text-center" id="registerUser"
                                onclick="return confirm('Save?');"><i class="fa fa-save" aria-hidden="true"></i>
                                Submit</button>
                        </p>
                    </div>
                </div>
            </div>
        </fieldset>
        <?php echo $this->Form->end() ?>
    </div>
</div>

<?php } } ?>