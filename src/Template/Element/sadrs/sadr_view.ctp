<?php 
    echo $this->fetch('actions');
    $this->Html->script('sadr_edit', ['block' => true]);
    $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
    $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';

?>

  <?= $this->Flash->render() ?>
  <?php $this->ValidationMessages->display($sadr->errors()) ?>

<div class="<?= $this->fetch('baseClass');?>">
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Spontenous Adverse Drug Reaction (ADR) Report Form</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12"><h5 class="text-center"> MCAZ Reference Number: <strong><?= ($sadr->reference_number) ? $sadr->reference_number : $sadr->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ; ?></strong></h5></div>          
  </div>



<hr>
  <div class="row">
    <div class="col-xs-12">
        <table class="table table-condensed vertical-table">
          <tr><th><h5 class="text-center">Patient details (to allow linkage with other reports)</h5></th>
              <td></td>
          </tr>
        </table>
          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Clinic/Hospital Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->name_of_institution ?></td>
                </tr>
                <tr><th><label>Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->patient_name ?></td>
                </tr>
                <tr><th><label>Date of Birth</label></th>
                    <td><?= $sadr->date_of_birth ?></td>
                </tr>
                <tr><th><label>OR Age at onset:</label></th>
                    <td><?= $sadr->year_of_birth ?> <small class="muted">years </small><br>
                        <?= $sadr->month_of_birth ?> <small class="muted">months </small> <br>
                        <?= $sadr->day_of_birth ?>   <small class="muted">days </small>            
                    </td>
                </tr>
              </table>    
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Clinic/Hospital Number <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->institution_code ?></td>
                </tr>
                <tr><th><label>VCT/OI/TB Number</label></th>
                    <td><?= $sadr->ip_no ?></td>
                </tr>
                <tr><th><label>Province</label></th>
                    <td><?= ($sadr->province_id) ? $provinces->toArray()[$sadr->province_id] : '' ?>  </td>
                </tr>
                <tr><th><label>Weight</label></th>
                    <td><?= $sadr->weight ?></td>
                </tr>
                <tr><th><label>Height</label></th>
                    <td><?= $sadr->height ?></td>
                </tr>
                <tr><th><label>Gender</label></th>
                    <td><?= $sadr->gender ?></td>
                </tr>
              </table>   
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Adverse Reaction</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date of onset of Reaction <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->date_of_onset_of_reaction ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Date of end of Reaction </br> <i>(if it ended)</i></label></th>
                    <td><?= $sadr->date_of_end_of_reaction ?></td>
                </tr>
              </table>  
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Description of ADR <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->description_of_reaction ?></td>
                </tr>
                <tr><th></th>
                    <td><?php
                          foreach ($sadr->reactions as $key => $reaction) {
                            echo $reaction->reaction_name;
                          }                           
                         ?>
                    </td>
                </tr>
              </table>   
               
              </div>
            <div class="col-xs-4"></div>
          </div>

          <div class="row">
            <div class="col-xs-4">
              <table class="table table-condensed vertical-table">
                <tr><th><b>Serious</b> <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <td><?= $sadr->severity ?></td>
                </tr>
              </table>   
            </div>

            <div class="col-xs-5" id="choice-severity">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Reason for Seriousness</label></th>
                    <td><?= $sadr->severity_reason ?></td>
                </tr>
              </table>  
                                                
            </div>
            <div class="col-xs-3"></div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Relevant Medical History, including Allergies</label></th>
                    <td><?= $sadr->medical_history ?></td>
                </tr>
              </table>                
            </div>
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Relevant Past Drug Therapy</label></th>
                    <td><?= $sadr->past_drug_therapy ?></td>
                </tr>
              </table>               
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Laboratory test Results</label></th>
                    <td><?= $sadr->lab_test_results ?></td>
                </tr>
              </table>           
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Current Medication</h4></div>
          </div>
          
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th colspan="2" > Generic Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Brand Name </th>
                    <th> Batch Number</th>
                    <th colspan="2" > Dose <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th colspan="2" > Route and Frequency <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Indication </th>
                    <th> Date Started <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Date Stopped </th>
                    <th> Tick Suspected Drug(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span> </th>
                  </tr>
                </thead>
                <tbody>                  
                
                <?php 
                //Dynamic fields                
                if (isset($followup_form)) {
                    $list_of_drugs = (!empty($followup['sadr_list_of_drugs'])) ? $followup['sadr_list_of_drugs'] : '';
                } else {
                    $list_of_drugs = (!empty($sadr['sadr_list_of_drugs'])) ? $sadr['sadr_list_of_drugs'] : '';
                }
                if (!empty($list_of_drugs)) {
                  for ($i = 0; $i <= count($list_of_drugs)-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['drug_name']; ?> </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['brand_name']; ?>   </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['batch_number']; ?>    </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['dose']; ?></td>
                    <td><?= ($sadr->sadr_list_of_drugs[$i]['dose_id']) ? $doses->toArray()[$sadr->sadr_list_of_drugs[$i]['dose_id']] : '' ?>
                         </td>
                    <td><?= ($sadr->sadr_list_of_drugs[$i]['route_id']) ? $routes->toArray()[$sadr->sadr_list_of_drugs[$i]['route_id']] : '' ?>
                         </td>
                    <td><?= ($sadr->sadr_list_of_drugs[$i]['frequency_id']) ? $frequencies->toArray()[$sadr->sadr_list_of_drugs[$i]['frequency_id']] : '' ?>   </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['indication']; ?> </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['start_date']; ?>   </td>
                    <td><?= $sadr->sadr_list_of_drugs[$i]['stop_date']; ?>  </td>
                    <td><?= ($sadr->sadr_list_of_drugs[$i]['suspected_drug']) ? $checked : $nChecked; ?>  </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
              </table>
            </div>
                    <?= $this->fetch('list_of_drugs'); ?>
          </div>        

          <div class="row">
            <div class="col-xs-4">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Action Taken: <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->action_taken ?></td>
                </tr>
              </table>  
            </div>
            <div class="col-xs-4">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Outcome <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></th>
                    <td><?= $sadr->outcome ?></td>
                </tr>
              </table>  
            </div>
            
            <div class="col-xs-4">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Relatedness of suspected medicine(s) to ADR:</label></th>
                    <td><?= $sadr->relatedness ?></td>
                </tr>
              </table>  
            </div>
          </div>

        <!-- <p>Attachments!!</p> -->
        <?php
          $att = $sadr['attachments'];
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
                    <td><?= $sadr->attachments[$i]['description']; ?>  </td>                    
                    <td>     </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
              </table>
            </div>
          </div>

          

          <div class="row">
            <div class="col-xs-12"><h4 class="text-center">Reported By:</h4></div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Reporter name </label></th>
                    <td><?= $sadr->reporter_name ?></td>
                </tr>
                <tr><th><label>Reporter email </label></th>
                    <td><?= $sadr->reporter_email ?></td>
                </tr>
                <tr><th><label>Institution Name </label></th>
                    <td><?= $sadr->institution_name ?></td>
                </tr>
              </table>  
            </div><!--/span-->
            <div class="col-xs-6">
              <table class="table table-condensed vertical-table">
                <tr><th><label>Designations </label></th>
                    <td><?= ($sadr->designation_id) ? $designations->toArray()[$sadr->designation_id] : '' ?>  </td>
                </tr>
                <tr><th><label>Reporter phone </label></th>
                    <td><?= $sadr->reporter_phone ?></td>
                </tr>
                <tr><th><label>Institution Address </label></th>
                    <td><?= $sadr->institution_address ?></td>
                </tr>
              </table>  
            </div><!--/span-->
          </div><!--/row-->

          <?php 
            // $this->start('submit_buttons'); 
              echo $this->fetch('submit_buttons');
            // $this->end(); 
          ?>

    </div>
  </div>

<?php 
    echo $this->fetch('other_tabs');
?>
</div>


    <?php echo $this->fetch('endjs') ?>