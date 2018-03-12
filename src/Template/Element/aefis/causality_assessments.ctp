<?php 
  use Cake\Utility\Hash; 
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
  
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

    <?php foreach ($aefi_causalities as $ikey => $aefi_causality) {  ?>
 <div class="row">
    <div class="col-xs-12">
        <a class="btn btn-primary" role="button" data-toggle="collapse" 
          href="#<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false" 
            aria-controls="<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
               Evaluated on: <?= $aefi_causality['created'] ?> by <?= $aefi_causality->user->name ?>
            </a>
            <p class="topper"><small><em class="text-success">evaluated on: <?= $aefi_causality['created'] ?> by <?= $aefi_causality->user->name ?></em></small></p>
        <?php
            if($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['action' => 'download', '_ext' => 'pdf', $aefi_causality->id, 'causality'], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
            if($this->request->params['_ext'] != 'pdf' and $aefi_causality->user_id == $this->request->session()->read('Auth.User.id')) {
                $template = $this->Form->getTemplates();
                $this->Form->resetTemplates();
                echo $this->Form->postLink(
                    '<span class="label label-info">Edit</span>',
                    [],
                    ['data' => ['causality_id' => $aefi_causality->id], 'escape' => false, 
                     'confirm' => __('Are you sure you want to edit aefi_causality {0}?', $aefi_causality->id)]
                );
                $this->Form->setTemplates($template);
            }
            echo "&nbsp;";
            if($aefi_causality->user_id != $this->request->session()->read('Auth.User.id') && $aefi->signature != 1) { 
                $template = $this->Form->getTemplates();
                $this->Form->resetTemplates();
                echo $this->Form->postLink('<span class="label label-success">Attach signature?</span>', 
                    ['action' => 'attachSignature', $aefi_causality->id, 'prefix' => $prefix], 
                    ['escape' => false, 'confirm' => 'Are you sure you want to attach your signature to assessment?', 'class' => 'label-link']);
                $this->Form->setTemplates($template);                              
            }        
        ?>
    <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $aefi_causality->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
            <div class="row">
                <div class="col-xs-4">
                    <p><b>Patient ID/Name</b></p>
                    <?=  $aefi['patient_name'].' '.$aefi['patient_surname'] ?>
                </div>
                <div class="col-xs-4">        
                    <p><b>DOB/Age</b></p>
                    <?php  
                    if(!empty($aefi['date_of_birth'])) echo $aefi['date_of_birth'].'<br>';
                    if(!empty($aefi['age_at_onset_days']) or !empty($aefi['age_at_onset_months']) or !empty($aefi['age_at_onset_years'])) echo $aefi['age_at_onset_days'].' days-'.$aefi['age_at_onset_months'].' months-'.$aefi['age_at_onset_years'].' years'.'<br>';
                    if(!empty($aefi['age_group'])) echo $aefi['age_group'].'<br>';
                    ?>
                </div>
                <div class="col-xs-4">        
                    <p><b>Sex</b></p>
                    <?=  $aefi['gender'] ?>
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
                    if(!empty($aefi['aefi_list_of_vaccines'])) {
                        foreach ($aefi['aefi_list_of_vaccines'] as $aefi_list_of_vaccines) {
                        echo "<span>".$aefi_list_of_vaccines['vaccine_name']."</span><br>";
                        }
                    }
                ?>
            </div>
            <div class="col-xs-4">
                <p><b>What is the Valid Diagnosis</b></p>
                <?php 
                    echo $aefi_causality->valid_diagnosis;
                ?>   
            </div>
            <div class="col-xs-4">
                <p><b>Does the diagnosis meet a case definition</b></p>
                <?= $aefi_causality->diagnosis_meet ?>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-xs-12">
                <h5 class="text-center">Create your question on causality here</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                Has the <?= $aefi_causality->primary_vaccine ?>
            </div>
            <div class="col-xs-3">
                <b>vaccine / vaccination caused </b>
            </div>
            <div class="col-xs-5">
                <?php 
                    echo $aefi_causality->causality_question;
                ?>
                <label>(The event for review in step 2: valid diagnosis)</label>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <?php 
                    echo $aefi_causality->case_eligibility;
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h4 class="text-warning" style="text-decoration-line: underline;">Step 2 (Event Checklist)</h4>
            </div>
        </div>
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
                                <?= $aefi_causality->clinical_examination ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->clinical_examination_specify ?>
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
                                <?= $aefi_causality->evidence_literature ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->evidence_literature_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2. Is there a biological plausibility that the vaccine could cause the event?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->biological_plausibility ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->biological_plausibility_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>3. In this patient, did a specific test demonstrate the causal role of the vaccine?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->causal_role ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->causal_role_specify ?>
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
                              <?= $aefi_causality->vaccine_quality ?>
                 </div>
                          </td>
                          <td>
                              <?= $aefi_causality->vaccine_quality_specify ?>
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
                                <?= $aefi_causality->prescribing_error ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->prescribing_error_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>6. In this patient, was the vaccine (or diluent) administered in an unsterile manner?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->vaccine_unsterile ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_unsterile_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>7. In this patient, was the vaccine's physical condition (e.g. colour, turbidity, foreign substances etc.) abnormal when admnistered?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->vaccine_condition ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_condition_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>8. When this patient was vaccinated, was there an error in vaccine constitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper mixing, improper syringe filling etc.)?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->vaccine_reconstitution ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_reconstitution_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>9. In this patient, was there an error in vaccine handling (e.g. a break in the cold chain during transport, storage and/or immunization session etc.)?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->vaccine_handling ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_handling_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>10. In this patient, was the vaccine administered incorrectly (e.g. wrong does, site or route of administration, wrong needle size etc.?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->vaccine_administered ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_administered_specify ?>
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
                                <?= $aefi_causality->vaccine_anxiety ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->vaccine_anxiety_specify ?>
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
                                <?= $aefi_causality->time_window ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->time_window_specify ?>
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
                                <?= $aefi_causality->causal_association ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->causal_association_specify ?>
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
                                <?= $aefi_causality->comparable_event ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->comparable_event_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2. In this patient, did such an event occur in the past independent of vaccination?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->occur_past ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->occur_past_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>3. Could the current event have occurred in this patient without vaccination?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->independent_vaccination ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->independent_vaccination_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>4. Did this patient have an illness, pre-existing condition or risk factor that could have contributed to the event?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->acute_illness ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->acute_illness_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>5. Was this patient taking any medicatoin prior to vaccination?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->taking_medication ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->taking_medication_specify ?>
                            </td>
                        </tr>
                        <tr>
                            <td>6. Was this patient exposed to a potential factor (other than vaccine) prior to the event (e.g. allergen, drug, herbal product etc.)?</td>
                            <td>
                              <div class="col-xs-12">
                                <?= $aefi_causality->exposure_risk ?>
                   </div>
                            </td>
                            <td>
                                <?= $aefi_causality->exposure_risk_specify ?>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

       <div class="row">
            <div class="col-xs-12">
                <h4 class="text-warning" style="text-decoration-line: underline;">Step 3 (Algorithm) review all steps and 
                    <i class="fa fa-check" aria-hidden="true"></i>  all the appropriate boxes</h4>
                <?php 
                    echo $this->Html->image('causality_algorithm.png', ['fullBase' => true, 'style' => 'width: 70%;']); 
                    echo $aefi_causality->causality_notes;
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
                        // pr($vbrown);
                        // pr($a->clinical_examination);
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
                          echo $rowo.$brown.$blue1.$green_dark.$green2.$rowc; 
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
        <br>

        <div class="row">
            <div class="col-xs-12">
                <h4 class="text-warning" style="text-decoration-line: underline;">Step 4 (Classification) <i class="fa fa-check" aria-hidden="true"></i> all boxes that apply</h4>        
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-1">
              <label>Adequate information available</label>
            </div>
            <div class="col-xs-4">
              <div class="well" style="background-color: #FECCFF">
                <p><strong>A. Consistent with causal associatioin to Immunization</strong></p>
                <?php
                    echo ($aefi_causality->consistent_i) ? $checked : $nChecked; 
                    echo "<label>A1. Vaccine product-related reaction (As per published literature)</label>";   
                    echo ($aefi_causality->consistent_ii)  ? $checked : $nChecked; 
                    echo "<label>A2. Vaccine quality defect-related reaction</label>";
                    echo ($aefi_causality->consistent_iii) ? $checked : $nChecked; 
                    echo "<label>A3. Immunization error-related reaction</label>";
                    echo ($aefi_causality->consistent_iv) ? $checked : $nChecked; 
                    echo "<label>A4. Immunization anxiety-related reaction <br> <b>(ITSR**)</b></label>";          
                ?>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="well" style="background-color: #FFFFCD">
                <p><strong>B. Indeterminate</strong></p>
                <?php
                   echo ($aefi_causality->indeterminate_i) ? $checked : $nChecked; 
                   echo "<label>B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event)</label>"; 
                   echo ($aefi_causality->indeterminate_ii) ? $checked : $nChecked; 
                   echo "<label>B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization</label>";           
                ?>
              </div>        
            </div>
            <div class="col-xs-3">
              <div class="well" style="background-color: #CDFFCC"> 
                <p><strong>C. Inconsistent with causal association to immunization</strong></p>         
                <?php
                    echo ($aefi_causality->inconsistent) ? $checked : $nChecked; 
                    echo "<label>C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine</label>";

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
                  echo ($aefi_causality->unclassifiable) ? $checked : $nChecked; 
                  echo "<label><b>Unclassifiable</b></label><br>";
                  echo "<label>Specify the additional information required for classification</label><br>";                   
                  echo $aefi_causality->unclassifiable_specify;
                ?>
              </div>  
            </div>
        </div>
        <p>*B1: This is a potential signal and may be considered for investigation <br>**Immunization Triggered Stress Response</p>
      
        <div class="row">
            <div class="col-xs-12">
              <p><strong>Summarize the classification logic in the order of priority:</strong></p>
              <p> With available evidence, we could conclude that the classification is 
                <?= $aefi_causality->conclude ?> because:
                <?= $aefi_causality->conclude_reason?>
              </p>

              <p> With available evidence, we could <b>NOT</b> classify the case because:
                <?= $aefi_causality->conclude_inability?>
              </p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label><?= ($aefi_causality->signature) ? $checked : $nChecked; ?> Signature</label>
            </div>
            <div class="col-xs-8">
                <h4 class="form-control-static text-info text-left"><?php          
                echo ($aefi_causality->signature) ? "<img src='".$this->Url->build(substr($aefi_causality->user->dir, 8) . '/' . $aefi_causality->user->file, true)."' style='width: 30%;' alt=''>" : '';
                ?>                    
                </h4>
            </div>
        </div>

        <?php if($aefi_causality->chosen == 1) { ?>
        <div class="row">
            <div class="col-xs-4">
                <label>Signature</label>
            </div>
            <div class="col-xs-8">
                <h4 class="form-control-static text-info text-left">
                    <?php          
                        echo "<img src='".$this->Url->build(substr(Hash::combine($users->toArray(), '{n}.id', '{n}.dir')[$aefi->assigned_by], 8) . '/' . Hash::combine($users->toArray(), '{n}.id', '{n}.file')[$aefi->assigned_by], true)."' style='width: 30%;' alt=''>";
                    ?>
                </h4>
            </div>
        </div>                          
        <?php 
        //If the current user did not submit the review and review final submission not yet done
        }  
        ?>
        <br>

    </div>
  </div>
</div>
    <?php } ?>