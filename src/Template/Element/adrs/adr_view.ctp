<?php 
    echo $this->fetch('actions');
    $this->Html->script('adr_edit', ['block' => true]);
    $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
    $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';
?>
<?= $this->Flash->render() ?>
<?php $this->ValidationMessages->display($adr->errors()) ?>

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

          <div class="row">
            <div class="col-xs-12"><h5 class="text-center">MCAZ Reference Number: <strong><?= $adr->reference_number ?></strong></h5></div>          
          </div>

          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>MRCZ Protocol #  </label></th>
                    <td><?= $adr->mrcz_protocol_number ?></td>
                </tr>
                <tr><th><label>MCAZ Protocol #  </label></th>
                    <td><?= $adr->mcaz_protocol_number ?></td>
                </tr>
              </table>  
            </div>      
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Institution <span class="sterix fa fa-asterisk" aria-hidden="true"></span> </label></th>
                    <td><?= $adr->name_of_institution ?></td>
                </tr>
              </table>  
            </div>      
           
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Study Title  </label></th>
                    <td><?= $adr->study_title ?></td>
                </tr>
              </table>          
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date of Adverse Event  </label></th>
                    <td><?= $adr->date_of_adverse_event ?></td>
                </tr>
                <tr><th><label>Study Sponsor </label></th>
                    <td><?= $adr->study_sponsor ?></td>
                </tr>
              </table> 
            </div>
          </div>
          <br/><br/>
          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Principal Investigator  </label></th>
                    <td><?= $adr->principal_investigator ?></td>
                </tr>
                <tr><th><label>Reporter Name </label></th>
                    <td><?= $adr->reporter_name ?></td>
                </tr>
                <tr><th><label>Reporter Email </label></th>
                    <td><?= $adr->reporter_email ?></td>
                </tr>
                <tr><th><label>Designation in the study </label></th>
                    <td><?= $adr->designation_study ?></td>
                </tr>
                <tr><th><label>Reporter Phone </label></th>
                    <td><?= $adr->reporter_phone ?></td>
                </tr>
              </table>          
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Participant ID </label></th>
                    <td><?= $adr->participant_number ?></td>
                </tr>
                <tr><th><label><b>Type of Report </b> </label></th>
                    <td><?= $adr->report_type ?></td>
                </tr>
                <tr><th><label>Date of Birth </label></th>
                    <td><?= $adr->date_of_birth ?></td>
                </tr>
                <tr><th><label><b>Gender </b> </label></th>
                    <td><?= $adr->gender ?></td>
                </tr>
                <tr><th><label>Study Week </label></th>
                    <td><?= $adr->study_week ?></td>
                </tr>
                <tr><th><label>Visit number </label></th>
                    <td><?= $adr->visit_number ?></td>
                </tr>
                <tr><th><label>Date of site Awareness </label></th>
                    <td><?= $adr->date_of_site_awareness ?></td>
                </tr>
              </table>   
            </div>
          </div>
         <br/><br/>
          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Section B</h4></div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>1. What type of adverse event is this?</b> </label></th>
                    <td><?= $adr->adverse_event_type ?></td>
                </tr>
                <tr><th><label>2a) If SAE, is it </label></th>
                    <td><?= $adr->sae_type ?></td>
                </tr>
                <tr><th><label>If Other, specify </label></th>
                    <td><?= $adr->sae_description ?></td>
                </tr>
              </table>           
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>2b) Toxicity Grade</b> </label></th>
                    <td><?= $adr->toxicity_grade ?></td>
                </tr>
              </table>
            </div>
          </div>


          <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>3a) Any previous Adverse Events report on this participant?</b> </label></th>
                    <td><?= $adr->previous_events ?></td>
                </tr>
              </table>          
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>If yes, how many? </label></th>
                    <td><?= $adr->previous_events_number ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>3b) Total Number of SAEs to date for the whole study </label></th>
                    <td><?= $adr->total_saes ?></td>
                </tr>
              </table>  
            </div>
          </div>


          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>4) Location of the current Adverse Event</b> </label></th>
                    <td><?= $adr->location_event ?></td>
                </tr>
                <tr><th><label>If Other, specify </label></th>
                    <td><?= $adr->location_event_specify ?></td>
                </tr>
              </table>  
            </div>
          </div>
 
          <div class="row">
            <div class="col-xs-8">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>5) Research involves</b> </label></th>
                    <td><?= $adr->research_involves ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>if other, specify </label></th>
                    <td><?= $adr->research_involves_specify ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>6) Name of Drug, Device or Procedure </label></th>
                    <td><?= $adr->name_of_drug ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>7) Is the drug/device investigational</b> </label></th>
                    <td><?= $adr->drug_investigational ?></td>
                </tr>
                <tr><th><label>Did reaction occur in utero?</label></th>
                    <td><?= ($adr->in_utero) ? $checked : $nChecked; ?></td>
                </tr>
              </table>  
            </div>
          </div>    

          <div class="row">
            <div class="col-xs-12"><b class="text-center"><p>Section C</p>
            8a. List all study / intervention drugs being taken at the time of onset of the SAE, or within 30 days prior to onset, and describe their relationship to the SAE:</b></div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
              <div class="col-xs-12">
                  <table class="table table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th colspan="2" > Drug/Device/Vaccine </th>
                          <th colspan="2" style="width: 18%"> Dose </th>
                          <th colspan="2" > Route and Frequency </th>
                          <th> Date commenced </th>
                          <th> Taking drug at onset of SAE?</th>
                          <th> Relationship of SAE to drug </th>
                        </tr>
                      </thead>
                      <tbody>
                                            
                    <?php 
                      //Dynamic fields
                      if (!empty($adr['adr_list_of_drugs'])) {
                        for ($i = 0; $i <= count($adr['adr_list_of_drugs'])-1; $i++) { 
                          // pr($adr);
                    ?>

                        <tr>
                          <td><?= $i+1; ?></td>
                          <td><?= $adr->adr_list_of_drugs[$i]['drug_name']; ?> </td>
                          <td><?= $adr->adr_list_of_drugs[$i]['dosage']; ?> </td>                    
                          <td><?= ($adr->adr_list_of_drugs[$i]['dose_id']) ? $doses->toArray()[$adr->adr_list_of_drugs[$i]['dose_id']] : '' ?> </td>                 
                          <td><?= ($adr->adr_list_of_drugs[$i]['route_id']) ? $routes->toArray()[$adr->adr_list_of_drugs[$i]['route_id']] : '' ?> </td>
                          <td><?= ($adr->adr_list_of_drugs[$i]['frequency_id']) ? $frequencies->toArray()[$adr->adr_list_of_drugs[$i]['frequency_id']] : '' ?>  </td>
                          <td><?= $adr->adr_list_of_drugs[$i]['start_date']; ?>  </td>
                          <td><?= $adr->adr_list_of_drugs[$i]['taking_drug']; ?>   </td>
                          <td><?= $adr->adr_list_of_drugs[$i]['relationship_to_sae']; ?>  </td>
                        </tr>
                        <?php } } ; ?>

                      </tbody>
                </table>
              </div><!--/span-->
          </div><!--/row-->
          <hr>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label><b>9.Was the patient taking any other drug at the time of onset of the AE? </b> </label></th>
                    <td><?= $adr->patient_other_drug ?></td>
                </tr>
              </table>  
            </div>
          </div>  
          <hr>
        
        <div class="concomitant">      
          <div class="row">
            <div class="col-xs-12"><b>10.If yes, then list all concomitant medication being taken at least one month before the onset of the SAE and describe the relationship to the SAE: 
                            </b></div>
          </div>

          <div class="row">
              <div class="col-xs-12">
                  <table id="listOfConcomitantTable"  class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" style="width: 45%;"> Concomitant medication: </th>
                          <th> Date Started </th>
                          <th> Date Stopped </th>
                          <th  style="width: 25%;"> Relationship of SAE to medication </th>
                        </tr>
                      </thead>
                      <tbody>                  
                    <?php 
                      //Dynamic fields
                      if (!empty($adr['adr_other_drugs'])) {
                        for ($i = 0; $i <= count($adr['adr_other_drugs'])-1; $i++) { 
                          // pr($adr);
                    ?>
                        <tr>
                          <td><?= $i+1; ?></td>
                          <td><?= $adr->adr_other_drugs[$i]['drug_name']; ?>  </td>                    
                          <td><?= $adr->adr_other_drugs[$i]['start_date']; ?>  </td>
                          <td><?= $adr->adr_other_drugs[$i]['stop_date']; ?> </td>
                          <td><?= $adr->adr_other_drugs[$i]['relationship_to_sae']; ?>   </td> 
                        </tr>
                    <?php } } ; ?>

                      </tbody>
                </table>
              </div><!--/span-->
          </div><!--/row-->
        </div>
          <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <p><b>11.Has the Adverse Event been reported to:</b></p>
            </div>            
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(b)MRCZ  </label></th>
                    <td><?= $adr->report_to_mcaz ?></td>
                </tr>
                <tr><th><label>Date </label></th>
                    <td><?= $adr->report_to_mcaz_date ?></td>
                </tr>
              </table> 
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(a)MCAZ  </label></th>
                    <td><?= $adr->report_to_mrcz ?></td>
                </tr>
                <tr><th><label>Date </label></th>
                    <td><?= $adr->report_to_mrcz_date ?></td>
                </tr>
              </table> 
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(c)Sponsor </label></th>
                    <td><?= $adr->report_to_sponsor ?></td>
                </tr>
                <tr><th><label>Date </label></th>
                    <td><?= $adr->report_to_sponsor_date ?></td>
                </tr>
              </table> 
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(d) IRB </label></th>
                    <td><?= $adr->report_to_irb ?></td>
                </tr>
                <tr><th><label>Date </label></th>
                    <td><?= $adr->report_to_irb_date ?></td>
                </tr>
              </table> 
            </div>
          </div> 

          <div class="row">
            <div class="col-xs-12"><b class="text-center"> 12.Describe the SAE with diagnosis, immediate cause or precipitating events, symptoms, any investigations, management, results and outcome (with dates where possible). Include relevant medical history. Additional narrative, photocopies of results of abnormal investigations and a hospital discharge letter may be attached:</b></div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Summary of relevant past medical history of participant </label></th>
                    <td><?= $adr->medical_history ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(a) Diagnosis  </label></th>
                    <td><?= $adr->diagnosis ?></td>
                </tr>
                <tr><th><label>(b) Immediate Cause </label></th>
                    <td><?= $adr->immediate_cause ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(c) Symptoms </label></th>
                    <td><?= $adr->symptoms ?></td>
                </tr>
                <tr><th><label>(d) Investigations-Laboratory and any other significant investigations conducted </label></th>
                    <td><?= $adr->investigations ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-12">
                  <h4>Add Lab test: </h4>
                </div>
              </div>

              <div class="row">
                  <div class="col-xs-12">
                      <table id="adrLabTestsTable"  class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th> Lab test </th>
                              <th> Abnormal Result </th>
                              <th> Site Normal Range </th>
                              <th> Collection date</th>
                              <th> Lab value previous or subsequent to this event </th>
                              <th> Collection date </th>
                            </tr>
                          </thead>
                          <tbody>                 
                        
                        <?php 
                          //Dynamic fields
                          if (!empty($adr['adr_lab_tests'])) {
                            for ($i = 0; $i <= count($adr['adr_lab_tests'])-1; $i++) { 
                              // pr($adr);
                        ?>

                            <tr>
                              <td><?= $i+1; ?></td>
                              <td><?= $adr->adr_lab_tests[$i]['lab_test']; ?> </td>
                              <td><?= $adr->adr_lab_tests[$i]['abnormal_result']; ?> </td>                    
                              <td><?= $adr->adr_lab_tests[$i]['site_normal_range']; ?> </td>                 
                              <td><?= $adr->adr_lab_tests[$i]['collection_date']; ?> </td>
                              <td><?= $adr->adr_lab_tests[$i]['lab_value']; ?>  </td>
                              <td><?= $adr->adr_lab_tests[$i]['lab_value_date']; ?>   </td>
                            </tr>
                            <?php } } ; ?>

                          </tbody>
                    </table>
                  </div><!--/span-->
              </div><!--/row-->
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>(e) Results </label></th>
                    <td><?= $adr->results ?></td>
                </tr>
                <tr><th><label>(f) Management (Include management of study treatment, continued, temporarily held, reduced dose, permanent discontinuation, off Product) </label></th>
                    <td><?= $adr->management ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-12">              
              <table class="table table-condensed vertical-table">
                <tr><th><label>Outcome  </label></th>
                    <td><?= $adr->outcome ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <p><b>NB</b> If the outcome is death, please complete and attach the death form. </p>

          <div class="row">
            <div class="col-xs-6">            
              <table class="table table-condensed vertical-table">
                <tr><th><label>D1.  Was this Adverse Event originally addressed in the protocol and consent form? </label></th>
                    <td><?= $adr->d1_consent_form ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-6">        
              <table class="table table-condensed vertical-table">
                <tr><th><label>D2. Was this Adverse Event originally addressed in Investigators Brochure? </label></th>
                    <td><?= $adr->d2_brochure ?></td>
                </tr>
              </table>  
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">     
              <table class="table table-condensed vertical-table">
                <tr><th><label>D3. Are changes required to the protocol as a result of this SAE? </label></th>
                    <td><?= $adr->d3_changes_sae ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-6">     
              <table class="table table-condensed vertical-table">
                <tr><th><label>D4. Are changes required to the consent form as a result of this SAE? </label></th>
                    <td><?= $adr->d4_consent_sae ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <!-- <p>Attachments!!</p> -->
          <div class="row">
            <div class="col-xs-12">
              <?php
          $att = $adr['attachments'];
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
                        <td><?= $adr->attachments[$i]['description']; ?>  </td>                    
                        <td>     </td>
                      </tr>
                      <?php } } ; ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <p>If changes are <b>required</b>, please attach a copy of the revised protocol/consent form with changes highlighted with a bright coloured  highlighter. </p>

          <p>If changes are <b>not required</b>, please explain as to why changes to the protocol /consent form are not necessary based on the event.   </p>
          
          <div class="row">
            <div class="col-xs-12"> 
              <table class="table table-condensed vertical-table">
                <tr><th> </th>
                    <td><?= $adr->changes_explain ?></td>
                </tr>
              </table> 
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th> From the data obtained or from currently available information, do you see any need to reassess the risks and benefits to the subjects in this research.</th>
                    <td><?= $adr->assess_risk ?></td>
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