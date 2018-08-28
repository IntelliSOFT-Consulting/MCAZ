<?php 
    echo $this->fetch('actions');    
    $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
    $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';
?>
<?= $this->Flash->render() ?>
<?php $this->ValidationMessages->display($aefi->errors()) ?>

<div class="<?= $this->fetch('baseClass');?>">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"> 
      <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Adverse Event Following Immunization (AEFI) Report Form
      </h3>  
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI) </h5></div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= ($aefi->reference_number) ? $aefi->reference_number : $aefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>         
          </div>

          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Patient first name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->patient_name ?></td>
                </tr>
                <tr><th><label>Patient Surname <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->patient_surname ?></td>
                </tr>
                <tr><th><label>Patient next of Kin</label></th>
                    <td><?= $aefi->patient_next_of_kin ?></td>
                </tr>
                <tr><th><label>Patient's physical address <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->patient_address ?></td>
                </tr>
                <tr><th><label>Patient's phone number</label></th>
                    <td><?= $aefi->patient_telephone ?></td>
                </tr>
                <tr><th><label>Date of Birth <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->date_of_birth ?></td>
                </tr>
                <tr><th><label>OR Age at onset:</label></th>
                    <td><?= $aefi->age_at_onset_years ?> <small class="muted">years </small><br>
                        <?= $aefi->age_at_onset_months ?> <small class="muted">months </small> <br>
                        <?= $aefi->age_at_onset_days ?>   <small class="muted">days </small>            
                    </td>
                </tr>
              </table>        
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Reporter's name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->reporter_name ?></td>
                </tr>
                <tr><th><label>Designation</label></th>
                    <td><?= ($aefi->designation_id) ? $designations->toArray()[$aefi->designation_id] : '' ?></td>
                </tr>
                <tr><th><label>Reporter Institution</label></th>
                    <td><?= $aefi->reporter_institution ?></td>
                </tr>
                <tr><th><label>Department</label></th>
                    <td><?= $aefi->reporter_department ?></td>
                </tr>
                <tr><th><label>Address</label></th>
                    <td><?= $aefi->reporter_address ?></td>
                </tr>
                <tr><th><label>District</label></th>
                    <td><?= $aefi->reporter_district ?></td>
                </tr>
                <tr><th><label>Province</label></th>
                    <td><?= ($aefi->province_id) ? $provinces->toArray()[$aefi->province_id] : '' ?></td>
                </tr>
                <tr><th><label>Reporter phone</label></th>
                    <td><?= $aefi->reporter_phone ?></td>
                </tr>
                <tr><th><label>Reporter email</label></th>
                    <td><?= $aefi->reporter_email ?></td>
                </tr>
              </table> 
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Name of vaccination center <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->name_of_vaccination_center ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th colspan="7" style="width: 65%">Vaccine</th>
                    <th colspan="5">Diluent</th>
                  </tr>
                  <tr>
                    <th colspan="2" style="width: 20%"> Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th colspan="2" style="width: 20%"> <h5>Date and Time of Vaccination <span class="sterix fa fa-asterisk" aria-hidden="true"></span><br><small id="helpBlock" class="has-warning">Format dd-mm-yyyy hh24:min</small></h5></th>
                    <th style="width: 5%"> Dose (1st, 2nd...) <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th style="width: 5%"> Batch/Lot number <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Expiry date </th>
                    <th style="width: 5%"> Batch/ Lot Number </th>
                    <th > Expiry date </th>
                    <th> Time of reconstitution  </th>
                    <th> Tick Suspected Vaccine(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //Dynamic fields
                    $list_of_vaccines = (!empty($aefi['aefi_list_of_vaccines'])) ? $aefi['aefi_list_of_vaccines'] : '';
                    if (!empty($list_of_vaccines)) {
                      for ($i = 0; $i <= count($list_of_vaccines)-1; $i++) { 
                        // pr($aefi);
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['vaccine_name']; ?> </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['vaccination_date']; ?>  </td> 
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['vaccination_time']; ?> </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['dosage']; ?>  </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['batch_number']; ?> </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['expiry_date']; ?>  </td>
                    
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['diluent_batch_number']; ?>  </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['diluent_expiry_date']; ?>  </td>
                    <td><?= $aefi->aefi_list_of_vaccines[$i]['diluent_date']; ?>  </td>
                    <td><?= ($aefi->aefi_list_of_vaccines[$i]['suspected_drug']) ? $checked : $nChecked; ?>  </td>
                  </tr>
                
                <?php }} ?>

                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-2">
              <h4>Adverse Event(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>:</h4>
              <label>Seizures</label>

              <table class="table table-condensed vertical-table">
                <tr><th></th> <td><?= ($aefi->ae_afebrile) ? $checked : $nChecked; ?><label> afebrile</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_febrile) ? $checked : $nChecked; ?><label> febrile</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_3days) ? $checked : $nChecked; ?><label> >3 days</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_beyond_joint) ? $checked : $nChecked; ?><label> beyond nearest joint</label></td></tr>
              </table>  
            </div>
            <div class="col-xs-3">
              <br><br>
              <table class="table table-condensed vertical-table">
                <tr><th></th> <td><?= ($aefi->ae_encephalopathy) ? $checked : $nChecked; ?><label> Encephalopathy</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_abscess) ? $checked : $nChecked; ?><label>Abscess</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_sepsis) ? $checked : $nChecked; ?><label>Sepsis</label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_anaphylaxis) ? $checked : $nChecked; ?><label>Anaphylaxis </label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_fever) ? $checked : $nChecked; ?><label>Fever≥38°C </label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_toxic_shock) ? $checked : $nChecked; ?><label>Toxic shock syndrome </label></td></tr>
                <tr><th></th> <td><?= ($aefi->ae_thrombocytopenia) ? $checked : $nChecked; ?><label>Thrombocytopenia </label></td></tr>
              </table> 
            </div>
            <div class="col-xs-3">
              <br><br>
              <table class="table table-condensed vertical-table">
                <tr><th></th> <td><?= ($aefi->ae_other) ? $checked : $nChecked; ?><label>Other (specify)</label></td></tr>                
                <tr><th><label>If other, specify</label></th>
                    <td><?= $aefi->adverse_events_specify ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-3">
              <br><br><br>
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date & Time AEFI started</label></th>
                    <td><?= $aefi->aefi_date ?></td>
                </tr>
                <tr><th><label>Was patient hospitalized?</label></th>
                    <td><?= $aefi->patient_hospitalization ?></td>
                </tr>
                <tr><th><label>Date patient notified event to health system</label></th>
                    <td><?= $aefi->notification_date ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Describe AEFI (Signs and symptoms) <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->description_of_reaction ?></td>
                </tr>
                <tr><th><label>Treatment provided?</label></th>
                    <td><?= $aefi->treatment_provided ?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Serious?</span></label></th>
                    <td><?= $aefi->serious ?></td>
                </tr>
                <tr><th><label>If yes,</label></th>
                    <td><?= $aefi->serious_yes ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $aefi->outcome ?></td>
                </tr>
                <tr><th><label>If died, date of death</label></th>
                    <td><?= $aefi->died_date ?></td>
                </tr>
                <tr><th><label>Autopsy done</label></th>
                    <td><?= $aefi->autopsy ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Past medical history (including history of similar reaction or other allergies), concomitant medication and other relevant information 
  (e.g. other cases).</label></th>
                    <td><?= $aefi->past_medical_history ?></td>
                </tr>
              </table>
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->          
        <?php
          $att = $aefi['attachments'];
        ?>
        <div class="row">
            <div class="col-md-12">
                <h4>Do you have files that you would like to attach? click on the button to add them: </h4>
            </div>
        </div>
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> FILE </th>
                    <th> DESCRIPTION OF CONTENTS</th>
                    <th> Edit </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($att)) {
                  for ($i = 0; $i <= count($att)-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left">
                      <?php
                             echo $this->Html->link($att[$i]->file, substr($att[$i]->dir, 8) . '/' . $att[$i]->file, ['fullBase' => true]);
                        ?></p>
                    </td>
                    <td><?= $aefi->attachments[$i]['description']; ?>  </td>                    
                    <td>     </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
              </table>
            </div>
          </div>
          
          <p><b>First decision making level to complete (District level):</b></p>
          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date report received at district level</label></th>
                    <td><?= $aefi->district_receive_date ?></td>
                </tr>
              </table>
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Investigation needed</label></th>
                    <td><?= $aefi->investigation_needed ?></td>
                </tr>
                <tr><th><label>If yes, date investigation planned</label></th>
                    <td><?= $aefi->investigation_date ?></td>
                </tr>
              </table>
            </div>
          </div>

          <p><b>National level top complete:</b></p>
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date report received at national level</label></th>
                    <td><?= $aefi->national_receive_date ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Comments</label></th>
                    <td><?= $aefi->comments ?></td>
                </tr>
              </table>
            </div>          
          </div>

          <?php 
              echo $this->fetch('submit_buttons');
          ?>          

    </div>
  </div>

</div>

<?php 
  echo $this->fetch('other_tabs');
?>


 <?php echo $this->fetch('endjs') ?>