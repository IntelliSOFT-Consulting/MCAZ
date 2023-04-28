<?php
if (!isset($nfetch)) echo $this->fetch('actions');
$this->Html->script('saefi_edit', ['block' => true]);
$checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;';
$nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i> &nbsp;';
?>
<?= $this->Flash->render() ?>
<?php $this->ValidationMessages->display($saefi->errors()) ?>


<div class="<?= $this->fetch('baseClass'); ?>">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="text-center">
                <span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span>
                <br>
                Adverse Event After Immunization (AEFI) Investigation Form
            </h3>
            <div class="row">
                <div class="col-xs-12">
                    <h5 class="text-center has-error">(Only for Serious Adverse Events Following Immunization <i class="fa fa-minus" aria-hidden="true"></i> Death / Disability / Hospitalization / Cluster)
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h5 class="text-center">MCAZ Reference Number:
                        <strong><?= ($saefi->reference_number) ? $saefi->reference_number : $saefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss'); ?></strong>
                    </h5>
                </div>
            </div>

            <h4>Section A: <span class="text-center">Basic Details </span></h4>

            <div class="row">
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Provinces </label></th>
                            <td><?= ($saefi->province_id) ? $provinces->toArray()[$saefi->province_id] : '' ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>District </label></th>
                            <td><?= $saefi->district ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>AEFI Report ID </label></th>
                            <td><?= $saefi->aefi_report_ref ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Name of vaccination site </label></th>
                            <td><?= $saefi->name_of_vaccination_site ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Name of Investigating Health Worker </label></th>
                            <td><?= $saefi->reporter_name ?></td>
                        </tr>
                        <tr>
                            <th><label>Designation </label></th>
                            <td><?= ($saefi->designation_id) ? $designations->toArray()[$saefi->designation_id] : '' ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Telephone # Landline (with code) </label></th>
                            <td><?= $saefi->telephone ?></td>
                        </tr>
                        <tr>
                            <th><label>Mobile </label></th>
                            <td><?= $saefi->mobile ?></td>
                        </tr>
                        <tr>
                            <th><label>Reporter email </label></th>
                            <td><?= $saefi->reporter_email ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label><b>Place of vaccination</b> </label></th>
                            <td><?= $saefi->place_vaccination ?></td>
                        </tr>
                        <tr>
                            <th><label>Other, (specify) </label></th>
                            <td><?= $saefi->place_vaccination_other ?></td>
                        </tr>
                        <tr>
                            <th><label><b>Type of site</b></label></th>
                            <td><?= $saefi->site_type ?></td>
                        </tr>
                        <tr>
                            <th><label>Other, (specify) </label></th>
                            <td><?= $saefi->site_type_other ?></td>
                        </tr>
                        <tr>
                            <th><label>Vaccination in </label></th>
                            <td><?= $saefi->vaccination_in ?></td>
                        </tr>
                        <tr>
                            <th><label>Other, (specify) </label></th>
                            <td><?= $saefi->vaccination_in_other ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-3">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Date AEFI reported </label></th>
                            <td><?= $saefi->report_date ?></td>
                        </tr>
                        <tr>
                            <th><label>Date investigation started </label></th>
                            <td><?= $saefi->start_date ?></td>
                        </tr>
                        <tr>
                            <th><label>Date investigation completed </label></th>
                            <td><?= $saefi->complete_date ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Patient Name </label></th>
                            <td><?= $saefi->patient_name ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Gender </label></th>
                            <td><?= $saefi->gender ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Patient’s physical address <small class="muted">(Street name, house number,
                                        ward/village, phone number etc.)</small>: </label></th>
                            <td><?= $saefi->patient_address ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-xs-offset-1">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Date of birth </label></th>
                            <td><?= $saefi->date_of_birth ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>OR Age at onset:</label></th>
                            <td><?= $saefi->age_at_onset_years ?> <small class="muted">years </small><br>
                                <?= $saefi->age_at_onset_months ?> <small class="muted">months </small> <br>
                                <?= $saefi->age_at_onset_days ?> <small class="muted">days </small>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label><b>OR</b> Age group </label></th>
                            <td><?= $saefi->age_group ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <h4>*Complete below table if vaccination information missing on the AEFI reporting form</h4>
                <div class="col-xs-12">

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th colspan="7" style="width: 65%">Vaccine</th>
                                        <th colspan="5">Diluent</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style="width: 20%"> Name of vaccine<br>(Generic) </th>
                                        <th colspan="1" style="width: 20%"> *Brand Name <br>incl. Name of<br>Manufacturer </th>
                                        <th colspan="2" style="width: 20%">
                                            <h5>Date and Time of Vaccination <br><small id="helpBlock" class="has-warning">Format dd-mm-yyyy hh24:min</small></h5>
                                        </th>
                                        <th style="width: 5%"> Dose (1st, 2nd...) </th>
                                        <th style="width: 5%"> Batch/Lot number </th>
                                        <th> Expiry date </th>
                                        <th style="width: 5%"> Batch/ Lot Number </th>
                                        <th> Expiry date </th>
                                        <th> Time of reconstitution </th>
                                        <th> Tick Suspected Vaccine(s)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //Dynamic fields
                                    $list_of_vaccines = (!empty($saefi['aefi_list_of_vaccines'])) ? $saefi['aefi_list_of_vaccines'] : '';
                                    if (!empty($list_of_vaccines)) {
                                        for ($i = 0; $i <= count($list_of_vaccines) - 1; $i++) {
                                            // pr($saefi);
                                    ?>
                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['vaccine_name']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['manufacturer']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['vaccination_date']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['vaccination_time']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['dosage']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['batch_number']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['expiry_date']; ?> </td>

                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['diluent_batch_number']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['diluent_expiry_date']; ?> </td>
                                                <td><?= $saefi->aefi_list_of_vaccines[$i]['diluent_date']; ?> </td>
                                                <td><?= ($saefi->aefi_list_of_vaccines[$i]['suspected_drug']) ? $checked : $nChecked; ?>
                                                </td>
                                            </tr>

                                    <?php }
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-7">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Date and time of first/key symptom </label></th>
                            <td><?= $saefi->symptom_date ?></td>
                        </tr>
                        <tr>
                            <th><label>Date of hospitalization </label></th>
                            <td><?= $saefi->hospitalization_date ?></td>
                        </tr>
                        <tr>
                            <th><label><b>Status on the date of investigation</b> </label></th>
                            <td><?= $saefi->status_on_date ?></td>
                        </tr>
                        <tr>
                            <th><label>If died, date and time of death </label></th>
                            <td><?= $saefi->died_date ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label><b>Autopsy done?</b> </label></th>
                            <td><?= $saefi->autopsy_done ?></td>
                        </tr>
                        <tr>
                            <th><label>If yes, date: </label></th>
                            <td><?= $saefi->autopsy_done_date ?></td>
                        </tr>
                        <tr>
                            <th><label><b>Autopsy Planned?</b> </label></th>
                            <td><?= $saefi->autopsy_planned ?></td>
                        </tr>
                        <tr>
                            <th><label>If yes, date: </label></th>
                            <td><?= $saefi->autopsy_planned_date ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <h4>Section B: <span class="text-center">Relevant patient information prior to immunization </span></h4>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 50%;" class="text-center">Criteria</th>
                                <th class="text-center">Finding</th>
                                <th class="text-center">Remarks (If yes, provide details)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label>Past history of similar event</label></td>
                                <td><?= $saefi->past_history ?> </td>
                                <td><?= $saefi->past_history_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Adverse event after previous vaccination(s)</label></td>
                                <td><?= $saefi->adverse_event ?> </td>
                                <td><?= $saefi->adverse_event_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>History of allergy to vaccine, drug or food</label></td>
                                <td><?= $saefi->allergy_history ?> </td>
                                <td><?= $saefi->allergy_history_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Pre-existing comorbidity/ congenital disorder</label></td>
                                <td><?= $saefi->comorbidity_disorder ?> </td>
                                <td><?= $saefi->comorbidity_disorder_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Pre-existing acute illness (30 days) prior to vaccination</label></td>
                                <td><?= $saefi->existing_illness ?> </td>
                                <td><?= $saefi->existing_illness_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Has the patient tested Covid19 positive prior to vaccination</label></td>
                                <td><?= $saefi->covid_positive ?> </td>
                                <td><?= $saefi->covid_positive_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>History of hospitalization in last 30 days, with cause</label></td>
                                <td><?= $saefi->hospitalization_history ?> </td>
                                <td><?= $saefi->hospitalization_history_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Was patient on medication at time of vaccination?
                                        (If yes, name the drug, indication, doses & treatment dates)</label></td>
                                <td><?= $saefi->medication_vaccination ?> </td>
                                <td><?= $saefi->medication_vaccination_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Did patient consult faith healers before/after vaccination?
                                        *specify</label></td>
                                <td><?= $saefi->faith_healers ?> </td>
                                <td><?= $saefi->faith_healers_remarks ?> </td>
                            </tr>
                            <tr>
                                <td><label>Family history of any disease (relevant to AEFI) or allergy</label></td>
                                <td><?= $saefi->family_history ?> </td>
                                <td><?= $saefi->family_history_remarks ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <p><b>For Adult Women:</b></p>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-5">
                                <table class="table table-condensed vertical-table">
                                    <tr>
                                        <th><label>Currently pregnant?</label></th>
                                        <td><?= $saefi->pregnant ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-4" id="choice-pregnancy">
                                <table class="table table-condensed vertical-table">
                                    <tr>
                                        <th><label>Weeks</label></th>
                                        <td><?= $saefi->pregnant_weeks ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-5">
                            <table class="table table-condensed vertical-table">
                                <tr>
                                    <th><label>Currently breastfeeding?</label></th>
                                    <td><?= $saefi->breastfeeding ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <p><b>For Infants:</b></p>
                    <div class="row">
                        <div class="col-xs-8">
                            <table class="table table-condensed vertical-table">
                                <tr>
                                    <th><label>The birth was:</label></th>
                                    <td><?= $saefi->infant ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-4">
                            <table class="table table-condensed vertical-table">
                                <tr>
                                    <th><label>Birth Weight</label></th>
                                    <td><?= $saefi->birth_weight ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">

                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Delivery procedure was:</label></th>
                            <td><?= $saefi->delivery_procedure ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>If complication, specify</label></th>
                            <td><?= $saefi->delivery_procedure_specify ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <h4>Section C Details of first examination** of serious AEFI case</h4>
            <p><b>Source of information (tick all that apply)</b></p>
            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th></th>
                            <td><?= ($saefi->source_verbal) ? $checked : $nChecked; ?><label> Verbal autopsy</label>
                            </td>
                        </tr>
                        <tr>
                            <th>If verbal autopsy, please mention the source</th>
                            <td><?= $saefi->verbal_source ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th></th>
                            <td><?= ($saefi->source_documents) ? $checked : $nChecked; ?><label> Documents</label></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><?= ($saefi->source_other) ? $checked : $nChecked; ?><label> Other</label></td>
                        </tr>
                        <tr>
                            <th>If other, specify</th>
                            <td><?= $saefi->source_other_specify ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Name of the person who first examined/treated the patient:</label></th>
                            <td><?= $saefi->examiner_name ?></td>
                        </tr>
                        <tr>
                            <th><label>Other sources who provided information (specify):</label></th>
                            <td><?= $saefi->other_sources ?></td>
                        </tr>
                        <tr>
                            <th><label>Signs and symptoms in chronological order from the time of vaccination: </label>
                            </th>
                            <td><?= $saefi->signs_symptoms ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-xs-offset-1">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Name and contact information of person completing these clinical details:</label>
                            </th>
                            <td><?= $saefi->person_details ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Designation</label></th>
                            <td><?= $saefi->person_designation ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Date/time</label></th>
                            <td><?= $saefi->person_date ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5><strong>**Instructions – Attach copies of ALL available documents (including case sheet, discharge
                    summary, case notes, laboratory reports and autopsy reports, prescriptions for concomitant medication)) and then complete additional
                    information NOT AVAILABLE in existing documents, i.e.</strong> </h5><br>
            <ul>
                <li><strong>If patient has received medical care </strong>– attach copies of all available documents
                    (including case sheet, discharge summary, laboratory reports and autopsy reports, if available) and
                    write only the information that is not available in the attached documents below
                </li>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-condensed vertical-table">
                            <tr>
                                <th> </th>
                                <td><?= $saefi->medical_care ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <li>
                    <strong>If patient has not received medical care </strong> – obtain history, examine the patient and
                    write down your findings below (add additional sheets if necessary)
                </li>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-condensed vertical-table">
                            <tr>
                                <th> </th>
                                <td><?= $saefi->not_medical_care ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </ul>
            </h4>
            <div class="row">
                <div class="col-xs-4">
                    <div class="control-label"><label>Autopsy report (if available):</label></div>
                </div>
                <div class="col-xs-7">
                    <?php
                    if (!empty($saefi['reports'])) {
                        echo '<p><b>File attachment:</b></p>';
                        echo $this->Html->link($saefi['reports'][0]->file, substr($saefi['reports'][0]->dir, 8) . '/' . $saefi['reports'][0]->file, ['fullBase' => true]);
                    }
                    ?>
                </div>
            </div>
            <!-- <p>Attachments!!</p> -->
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    $att = $saefi['attachments'];
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
                                        for ($i = 0; $i <= count($att) - 1; $i++) {
                                    ?>

                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td>
                                                    <p class="text-info text-left">
                                                        <?php
                                                        echo $this->Html->link($att[$i]->file, substr($att[$i]->dir, 8) . '/' . $att[$i]->file, ['fullBase' => true]);
                                                        ?></p>
                                                </td>
                                                <td><?= $saefi->attachments[$i]['description']; ?> </td>
                                                <td> </td>
                                            </tr>
                                    <?php }
                                    }; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th>Provisional / Final diagnosis: </th>
                            <td><?= $saefi->final_diagnosis ?></td>
                        </tr>
                        <!-- Added option for other reactions -->

                        <?php
                        foreach ($saefi->saefi_reactions as $key => $reaction) { ?>
                            <tr>
                                <th></th>
                                <td><?php echo $reaction->reaction_name; ?></td>
                            </tr>

                        <?php }
                        ?>

                    </table>
                </div>
            </div>

            <h4>Section D Details of vaccines provided at the site linked to AEFI on the corresponding day
            </h4>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="text-center">Number vaccinated for each antigen at session site. Attach record if
                            available. </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Vaccine Name</th>
                                    <th> Number of doses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($saefi['saefi_list_of_vaccines'])) {
                                    for ($i = 0; $i <= count($saefi['saefi_list_of_vaccines']) - 1; $i++) {
                                ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $saefi->saefi_list_of_vaccines[$i]['vaccine_name']; ?> </td>
                                            <td><?= $saefi->saefi_list_of_vaccines[$i]['vaccination_doses']; ?> </td>
                                        </tr>

                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <p><b>a) When was the patient vaccinated:</b> <b style="color: green;">(select answer below and
                            respond to ALL questions)</b></p>
                    <div class="col-xs-12">
                        <table class="table table-condensed vertical-table">
                            <tr>
                                <th> </th>
                                <td><?= $saefi->when_vaccinated ?></td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <br />
                    <p><b>In case of multidose vials, was the vaccine given</b></p>
                    <div class="col-xs-12">
                        <table class="table table-condensed vertical-table">
                            <tr>
                                <th> </th>
                                <td><?= $saefi->vaccine_given ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-condensed vertical-table">
                            <tr>
                                <th><label>Specify:</label> </th>
                                <td><?= $saefi->when_vaccinated_specify ?></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

            <p> <b style="color:red;">It is compulsory for you to provide explanations for ‘yes’ answers separately</b>
            </p>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 55%;" class="text-center"></th>
                                <th class="text-center"> Response</th>
                                <th class="text-center">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label>b) Was there an error in prescribing or non-adherence to recommendations for
                                        use of this vaccine?</label></td>
                                <td><?= $saefi->prescribing_error ?> </td>
                                <td><?= $saefi->prescribing_error_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>c) Based on your investigation, do you feel that the vaccine (ingredients)
                                        administered could have been unsterile?</label></td>
                                <td><?= $saefi->vaccine_unsterile ?> </td>
                                <td><?= $saefi->vaccine_unsterile_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>d) Based on your investigation, do you feel that the vaccine's physical
                                        condition (e.g. colour, turbidity, foreign substances etc.) was abnormal at the
                                        time of administration?</label></td>
                                <td><?= $saefi->vaccine_condition ?> </td>
                                <td><?= $saefi->vaccine_condition_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>e) Based on your investigation, do you feel that there was an error in
                                        vaccine reconstitution/preparation by the vaccinator (e.g. wrong product, wrong
                                        diluent, improper mixing, improper syringe filling etc.)?</label></td>
                                <td><?= $saefi->vaccine_reconstitution ?> </td>
                                <td><?= $saefi->vaccine_reconstitution_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>f) Based on your investigation, do you feel that there was an error in
                                        vaccine handling (e.g. cold chain failure during transport, storage and/or
                                        immunization session etc.)?</label></td>
                                <td><?= $saefi->vaccine_handling ?> </td>
                                <td><?= $saefi->vaccine_handling_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>g) Based on your investigation, do you feel that the vaccine was administered
                                        incorrectly (e.g. wrong dose, site or route of administration, wrong needle
                                        size, not following good injection practice etc.)?</label></td>
                                <td><?= $saefi->vaccine_administered ?> </td>
                                <td><?= $saefi->vaccine_administered_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>h) Number vaccinated from the concerned vaccine vial/ampoule </label></td>
                                <td><?= $saefi->vaccinated_vial ?> </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>i) Number vaccinated with the concerned vaccine in the same session</label>
                                </td>
                                <td><?= $saefi->vaccinated_session ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td><label>j) Number vaccinated with the concerned vaccine having the same batch number
                                        in other locations. Specify locations: </label></td>
                                <td><?= $saefi->vaccinated_locations ?> </td>
                                <td><?= $saefi->vaccinated_locations_specify ?> </td>
                            </tr>
                            <tr>
                                <td><label>k) Is this case a part of a cluster?</label></td>
                                <td><?= $saefi->vaccinated_cluster ?> </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>i. If yes, how many other cases have been detected in the cluster?</label>
                                </td>
                                <td><?= $saefi->vaccinated_cluster_number ?> </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>a. Did all the cases in the cluster receive vaccine from the same
                                        vial?</label></td>
                                <td><?= $saefi->vaccinated_cluster_vial ?> </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>b. If no, number of vials used in the cluster (enter details
                                        separately)</label></td>
                                <td><?= $saefi->vaccinated_cluster_vial_number ?> </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h4>
                Section E Immunization practices at the place(s) where concerned vaccine was used <br>
                <small>(Complete this section by asking and/or observing practice)</small>
            </h4>
            <p><strong>Syringes and needles used:</strong></p>
            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Are AD syringes used for immunization?</label></th>
                            <td><?= $saefi->syringes_used ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>If no, specify the type of syringes used:</label></th>
                            <td><?= $saefi->syringes_used_specify ?></td>
                        </tr>
                        <tr>
                            <th><label>If other, specify</label></th>
                            <td><?= $saefi->syringes_used_other ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Specific key findings/additional observations and comments:</label></th>
                            <td><?= $saefi->syringes_used_findings ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <p><strong>Reconstitution: (complete only if applicable, NA if not applicable)</strong></p>
            <p><b>Reconstitution procedure :</b></p>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Same reconstitution syringe used for multiple vials of same vaccine?</label></th>
                            <td><?= $saefi->reconstitution_multiple ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Same reconstitution syringe used for reconstituting different vaccines?</label>
                            </th>
                            <td><?= $saefi->reconstitution_different ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Separate reconstitution syringe for each vaccine vial?</label></th>
                            <td><?= $saefi->reconstitution_vial ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Separate reconstitution syringe for each vaccination?</label></th>
                            <td><?= $saefi->reconstitution_syringe ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Are the vaccines and diluents used the same as those recommended by the
                                    manufacturer?</label></th>
                            <td><?= $saefi->reconstitution_vaccines ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Specific key findings/additional observations and comments:</label></th>
                            <td><?= $saefi->reconstitution_observations ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <p><strong>Reconstitution: (complete only if applicable, NA if not applicable)</strong></p>
            <p><b>Reconstitution procedure :</b></p>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Same reconstitution syringe used for multiple vials of same vaccine?</label></th>
                            <td><?= $saefi->reconstitution_multiple ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <h4> Section F Cold chain and transport <br>
                <small>(Complete this section by asking and/or observing practice)</small>
            </h4>
            <p><strong>Last vaccine storage point:</strong></p>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Is the temperature of the vaccine storage refrigerator monitored?</label></th>
                            <td><?= $saefi->cold_temperature ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>If “yes”, was there any deviation outside of 2-8° C after the vaccine was placed
                                    inside?</label></th>
                            <td><?= $saefi->cold_temperature_deviation ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>If “yes”, provide details of monitoring separately.</label></th>
                            <td><?= $saefi->cold_temperature_specify ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Was the correct procedure for storing vaccines, diluents and syringes
                                    followed?</label></th>
                            <td><?= $saefi->procedure_followed ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Was any other item (other than EPI vaccines and diluents) in the refrigerator or
                                    freezer?</label></th>
                            <td><?= $saefi->other_items ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Were any partially used reconstituted vaccines in the refrigerator?</label></th>
                            <td><?= $saefi->partial_vaccines ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Were any unusable vaccines (expired, no label, VVM at stages 3 or 4, frozen) in
                                    the refrigerator?</label></th>
                            <td><?= $saefi->unusable_vaccines ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Were any unusable diluents (expired, manufacturer not matched, cracked, dirty
                                    ampoule) in the store?</label></th>
                            <td><?= $saefi->unusable_diluents ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Specific key findings/additional observations and comments:</label></th>
                            <td><?= $saefi->additional_observations ?></td>
                        </tr>
                    </table>
                </div>
                <p><strong>Vaccine transportation from the refrigerator to the vaccination centre:</strong></p>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Was cold chain properly maintained during transportation?</label></th>
                            <td><?= $saefi->cold_transportation ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Was the vaccine carrier sent to the site on the same day as vaccination?</label>
                            </th>
                            <td><?= $saefi->vaccine_carrier ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Were conditioned coolant-packs used?</label></th>
                            <td><?= $saefi->coolant_packs ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Specific key findings/additional observations and comments:</label></th>
                            <td><?= $saefi->transport_findings ?></td>
                        </tr>
                    </table>
                </div>

            </div>

            <h4>Section G Community investigation (Please visit locality and interview parents/others)</h4>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-condensed vertical-table">
                        <tr>
                            <th><label>Were any similar events reported within a time period similar to when the adverse
                                    event occurred and in the same locality?</label></th>
                            <td><?= $saefi->similar_events ?></td>
                        </tr>
                        <tr>
                            <th><label>If yes, describe:</label></th>
                            <td><?= $saefi->similar_events_describe ?></td>
                        </tr>
                        <tr>
                            <th><label>If yes, how many events/episodes?</label></th>
                            <td><?= $saefi->similar_events_episodes ?> <p>Of those affected, how many are:</p>
                            </td>
                        </tr>
                        <tr>
                            <th><label>Vaccinated:</label></th>
                            <td><?= $saefi->affected_vaccinated ?></td>
                        </tr>
                        <tr>
                            <th><label>Not Vaccinated:</label></th>
                            <td><?= $saefi->affected_not_vaccinated ?></td>
                        </tr>
                        <tr>
                            <th><label>Unknown</label></th>
                            <td><?= $saefi->affected_unknown ?></td>
                        </tr>
                        <tr>
                            <th><label>Other comments:</label></th>
                            <td><?= $saefi->community_comments ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <h4>Section H Other relevant findings/observations/comments</h4>
            <table class="table table-condensed vertical-table">
                <tr>
                    <th> </th>
                    <td><?= $saefi->relevant_findings ?></td>
                </tr>
            </table>

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