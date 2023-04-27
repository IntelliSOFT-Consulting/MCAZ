<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saefi $saefi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Saefi'), ['action' => 'edit', $saefi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Saefi'), ['action' => 'delete', $saefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Saefis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Original Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Original Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Initial Saefis'), ['controller' => 'Saefis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Initial Saefi'), ['controller' => 'Saefis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefi Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefi List Of Vaccines'), ['controller' => 'SaefiListOfVaccines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi List Of Vaccine'), ['controller' => 'SaefiListOfVaccines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['controller' => 'AefiListOfVaccines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['controller' => 'AefiListOfVaccines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['controller' => 'AefiCausalities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['controller' => 'AefiCausalities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Refids'), ['controller' => 'Refids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refid'), ['controller' => 'Refids', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Committees'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Committee'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Evaluators'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Evaluator'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Saefi Reactions'), ['controller' => 'SaefiReactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Saefi Reaction'), ['controller' => 'SaefiReactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="saefis view large-9 medium-8 columns content">
    <h3><?= h($saefi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $saefi->has('user') ? $this->Html->link($saefi->user->name, ['controller' => 'Users', 'action' => 'view', $saefi->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Original Saefi') ?></th>
            <td><?= $saefi->has('original_saefi') ? $this->Html->link($saefi->original_saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefi->original_saefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Saefi') ?></th>
            <td><?= $saefi->has('initial_saefi') ? $this->Html->link($saefi->initial_saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefi->initial_saefi->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Messageid') ?></th>
            <td><?= h($saefi->messageid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $saefi->has('province') ? $this->Html->link($saefi->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $saefi->province->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($saefi->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aefi Report Ref') ?></th>
            <td><?= h($saefi->aefi_report_ref) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Vaccination Site') ?></th>
            <td><?= h($saefi->name_of_vaccination_site) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($saefi->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place Vaccination') ?></th>
            <td><?= h($saefi->place_vaccination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place Vaccination Other') ?></th>
            <td><?= h($saefi->place_vaccination_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Type') ?></th>
            <td><?= h($saefi->site_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Type Other') ?></th>
            <td><?= h($saefi->site_type_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccination In') ?></th>
            <td><?= h($saefi->vaccination_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccination In Other') ?></th>
            <td><?= h($saefi->vaccination_in_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($saefi->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $saefi->has('designation') ? $this->Html->link($saefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $saefi->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($saefi->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($saefi->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($saefi->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Name') ?></th>
            <td><?= h($saefi->patient_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($saefi->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Address') ?></th>
            <td><?= h($saefi->patient_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($saefi->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status On Date') ?></th>
            <td><?= h($saefi->status_on_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autopsy Done') ?></th>
            <td><?= h($saefi->autopsy_done) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autopsy Planned') ?></th>
            <td><?= h($saefi->autopsy_planned) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Past History') ?></th>
            <td><?= h($saefi->past_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adverse Event') ?></th>
            <td><?= h($saefi->adverse_event) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allergy History') ?></th>
            <td><?= h($saefi->allergy_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comorbidity Disorder') ?></th>
            <td><?= h($saefi->comorbidity_disorder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Covid Positive') ?></th>
            <td><?= h($saefi->covid_positive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Existing Illness') ?></th>
            <td><?= h($saefi->existing_illness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hospitalization History') ?></th>
            <td><?= h($saefi->hospitalization_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medication Vaccination') ?></th>
            <td><?= h($saefi->medication_vaccination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Faith Healers') ?></th>
            <td><?= h($saefi->faith_healers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family History') ?></th>
            <td><?= h($saefi->family_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pregnant') ?></th>
            <td><?= h($saefi->pregnant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pregnant Weeks') ?></th>
            <td><?= h($saefi->pregnant_weeks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breastfeeding') ?></th>
            <td><?= h($saefi->breastfeeding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Infant') ?></th>
            <td><?= h($saefi->infant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Procedure') ?></th>
            <td><?= h($saefi->delivery_procedure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Examiner Name') ?></th>
            <td><?= h($saefi->examiner_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person Details') ?></th>
            <td><?= h($saefi->person_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person Designation') ?></th>
            <td><?= h($saefi->person_designation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('When Vaccinated') ?></th>
            <td><?= h($saefi->when_vaccinated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Given') ?></th>
            <td><?= h($saefi->vaccine_given) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prescribing Error') ?></th>
            <td><?= h($saefi->prescribing_error) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Unsterile') ?></th>
            <td><?= h($saefi->vaccine_unsterile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Condition') ?></th>
            <td><?= h($saefi->vaccine_condition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Reconstitution') ?></th>
            <td><?= h($saefi->vaccine_reconstitution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Handling') ?></th>
            <td><?= h($saefi->vaccine_handling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Administered') ?></th>
            <td><?= h($saefi->vaccine_administered) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Cluster') ?></th>
            <td><?= h($saefi->vaccinated_cluster) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Cluster Vial') ?></th>
            <td><?= h($saefi->vaccinated_cluster_vial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Syringes Used') ?></th>
            <td><?= h($saefi->syringes_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Syringes Used Specify') ?></th>
            <td><?= h($saefi->syringes_used_specify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Syringes Used Other') ?></th>
            <td><?= h($saefi->syringes_used_other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution Multiple') ?></th>
            <td><?= h($saefi->reconstitution_multiple) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution Different') ?></th>
            <td><?= h($saefi->reconstitution_different) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution Vial') ?></th>
            <td><?= h($saefi->reconstitution_vial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution Syringe') ?></th>
            <td><?= h($saefi->reconstitution_syringe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reconstitution Vaccines') ?></th>
            <td><?= h($saefi->reconstitution_vaccines) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cold Temperature') ?></th>
            <td><?= h($saefi->cold_temperature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cold Temperature Deviation') ?></th>
            <td><?= h($saefi->cold_temperature_deviation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedure Followed') ?></th>
            <td><?= h($saefi->procedure_followed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Items') ?></th>
            <td><?= h($saefi->other_items) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Partial Vaccines') ?></th>
            <td><?= h($saefi->partial_vaccines) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unusable Vaccines') ?></th>
            <td><?= h($saefi->unusable_vaccines) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unusable Diluents') ?></th>
            <td><?= h($saefi->unusable_diluents) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cold Transportation') ?></th>
            <td><?= h($saefi->cold_transportation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccine Carrier') ?></th>
            <td><?= h($saefi->vaccine_carrier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coolant Packs') ?></th>
            <td><?= h($saefi->coolant_packs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Similar Events') ?></th>
            <td><?= h($saefi->similar_events) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Affected Unknown') ?></th>
            <td><?= h($saefi->affected_unknown) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resubmit') ?></th>
            <td><?= h($saefi->resubmit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($saefi->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($saefi->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copied') ?></th>
            <td><?= h($saefi->copied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($saefi->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned To') ?></th>
            <td><?= $this->Number->format($saefi->assigned_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned By') ?></th>
            <td><?= $this->Number->format($saefi->assigned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Years') ?></th>
            <td><?= $this->Number->format($saefi->age_at_onset_years) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Months') ?></th>
            <td><?= $this->Number->format($saefi->age_at_onset_months) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age At Onset Days') ?></th>
            <td><?= $this->Number->format($saefi->age_at_onset_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Weight') ?></th>
            <td><?= $this->Number->format($saefi->birth_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Vial') ?></th>
            <td><?= $this->Number->format($saefi->vaccinated_vial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Session') ?></th>
            <td><?= $this->Number->format($saefi->vaccinated_session) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Locations') ?></th>
            <td><?= $this->Number->format($saefi->vaccinated_locations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Cluster Number') ?></th>
            <td><?= $this->Number->format($saefi->vaccinated_cluster_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vaccinated Cluster Vial Number') ?></th>
            <td><?= $this->Number->format($saefi->vaccinated_cluster_vial_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Similar Events Episodes') ?></th>
            <td><?= $this->Number->format($saefi->similar_events_episodes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Affected Vaccinated') ?></th>
            <td><?= $this->Number->format($saefi->affected_vaccinated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Affected Not Vaccinated') ?></th>
            <td><?= $this->Number->format($saefi->affected_not_vaccinated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($saefi->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($saefi->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($saefi->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned Date') ?></th>
            <td><?= h($saefi->assigned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Date') ?></th>
            <td><?= h($saefi->report_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($saefi->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complete Date') ?></th>
            <td><?= h($saefi->complete_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($saefi->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Symptom Date') ?></th>
            <td><?= h($saefi->symptom_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hospitalization Date') ?></th>
            <td><?= h($saefi->hospitalization_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Died Date') ?></th>
            <td><?= h($saefi->died_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autopsy Done Date') ?></th>
            <td><?= h($saefi->autopsy_done_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autopsy Planned Date') ?></th>
            <td><?= h($saefi->autopsy_planned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person Date') ?></th>
            <td><?= h($saefi->person_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($saefi->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($saefi->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Date') ?></th>
            <td><?= h($saefi->action_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted Date') ?></th>
            <td><?= h($saefi->submitted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($saefi->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Examination') ?></th>
            <td><?= $saefi->source_examination ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Documents') ?></th>
            <td><?= $saefi->source_documents ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Verbal') ?></th>
            <td><?= $saefi->source_verbal ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Other') ?></th>
            <td><?= $saefi->source_other ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $saefi->signature ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Past History Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->past_history_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Adverse Event Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->adverse_event_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Allergy History Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->allergy_history_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comorbidity Disorder Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->comorbidity_disorder_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Covid Positive Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->covid_positive_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Existing Illness Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->existing_illness_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Hospitalization History Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->hospitalization_history_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medication Vaccination Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->medication_vaccination_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Faith Healers Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->faith_healers_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Family History Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->family_history_remarks)); ?>
    </div>
    <div class="row">
        <h4><?= __('Delivery Procedure Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->delivery_procedure_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Verbal Source') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->verbal_source)); ?>
    </div>
    <div class="row">
        <h4><?= __('Source Other Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->source_other_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Sources') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->other_sources)); ?>
    </div>
    <div class="row">
        <h4><?= __('Signs Symptoms') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->signs_symptoms)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical Care') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->medical_care)); ?>
    </div>
    <div class="row">
        <h4><?= __('Not Medical Care') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->not_medical_care)); ?>
    </div>
    <div class="row">
        <h4><?= __('Final Diagnosis') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->final_diagnosis)); ?>
    </div>
    <div class="row">
        <h4><?= __('When Vaccinated Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->when_vaccinated_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Prescribing Error Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->prescribing_error_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Unsterile Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccine_unsterile_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Condition Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccine_condition_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Reconstitution Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccine_reconstitution_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Handling Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccine_handling_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccine Administered Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccine_administered_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Vaccinated Locations Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->vaccinated_locations_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Syringes Used Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->syringes_used_findings)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reconstitution Observations') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->reconstitution_observations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cold Temperature Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->cold_temperature_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Observations') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->additional_observations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Transport Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->transport_findings)); ?>
    </div>
    <div class="row">
        <h4><?= __('Similar Events Describe') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->similar_events_describe)); ?>
    </div>
    <div class="row">
        <h4><?= __('Community Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->community_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Relevant Findings') ?></h4>
        <?= $this->Text->autoParagraph(h($saefi->relevant_findings)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($saefi->saefi_comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Model Id') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Sender') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->saefi_comments as $saefiComments): ?>
            <tr>
                <td><?= h($saefiComments->id) ?></td>
                <td><?= h($saefiComments->foreign_key) ?></td>
                <td><?= h($saefiComments->user_id) ?></td>
                <td><?= h($saefiComments->model_id) ?></td>
                <td><?= h($saefiComments->model) ?></td>
                <td><?= h($saefiComments->category) ?></td>
                <td><?= h($saefiComments->sender) ?></td>
                <td><?= h($saefiComments->subject) ?></td>
                <td><?= h($saefiComments->content) ?></td>
                <td><?= h($saefiComments->deleted) ?></td>
                <td><?= h($saefiComments->created) ?></td>
                <td><?= h($saefiComments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $saefiComments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $saefiComments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $saefiComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiComments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Saefi List Of Vaccines') ?></h4>
        <?php if (!empty($saefi->saefi_list_of_vaccines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Vaccine Name') ?></th>
                <th scope="col"><?= __('Vaccination Doses') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->saefi_list_of_vaccines as $saefiListOfVaccines): ?>
            <tr>
                <td><?= h($saefiListOfVaccines->id) ?></td>
                <td><?= h($saefiListOfVaccines->saefi_id) ?></td>
                <td><?= h($saefiListOfVaccines->vaccine_name) ?></td>
                <td><?= h($saefiListOfVaccines->vaccination_doses) ?></td>
                <td><?= h($saefiListOfVaccines->created) ?></td>
                <td><?= h($saefiListOfVaccines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SaefiListOfVaccines', 'action' => 'view', $saefiListOfVaccines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SaefiListOfVaccines', 'action' => 'edit', $saefiListOfVaccines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaefiListOfVaccines', 'action' => 'delete', $saefiListOfVaccines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiListOfVaccines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi List Of Vaccines') ?></h4>
        <?php if (!empty($saefi->aefi_list_of_vaccines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Vaccine Name') ?></th>
                <th scope="col"><?= __('Manufacturer') ?></th>
                <th scope="col"><?= __('Vaccination Date') ?></th>
                <th scope="col"><?= __('Vaccination Time') ?></th>
                <th scope="col"><?= __('Dosage') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Diluent Batch Number') ?></th>
                <th scope="col"><?= __('Diluent Date') ?></th>
                <th scope="col"><?= __('Diluent Expiry Date') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->aefi_list_of_vaccines as $aefiListOfVaccines): ?>
            <tr>
                <td><?= h($aefiListOfVaccines->id) ?></td>
                <td><?= h($aefiListOfVaccines->aefi_id) ?></td>
                <td><?= h($aefiListOfVaccines->saefi_id) ?></td>
                <td><?= h($aefiListOfVaccines->vaccine_name) ?></td>
                <td><?= h($aefiListOfVaccines->manufacturer) ?></td>
                <td><?= h($aefiListOfVaccines->vaccination_date) ?></td>
                <td><?= h($aefiListOfVaccines->vaccination_time) ?></td>
                <td><?= h($aefiListOfVaccines->dosage) ?></td>
                <td><?= h($aefiListOfVaccines->batch_number) ?></td>
                <td><?= h($aefiListOfVaccines->expiry_date) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_batch_number) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_date) ?></td>
                <td><?= h($aefiListOfVaccines->diluent_expiry_date) ?></td>
                <td><?= h($aefiListOfVaccines->suspected_drug) ?></td>
                <td><?= h($aefiListOfVaccines->created) ?></td>
                <td><?= h($aefiListOfVaccines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiListOfVaccines', 'action' => 'view', $aefiListOfVaccines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiListOfVaccines', 'action' => 'edit', $aefiListOfVaccines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiListOfVaccines', 'action' => 'delete', $aefiListOfVaccines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiListOfVaccines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Aefi Causalities') ?></h4>
        <?php if (!empty($saefi->aefi_causalities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Aefi Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Diagnosis Meet') ?></th>
                <th scope="col"><?= __('Valid Diagnosis') ?></th>
                <th scope="col"><?= __('Primary Vaccine') ?></th>
                <th scope="col"><?= __('Causality Question') ?></th>
                <th scope="col"><?= __('Case Eligibility') ?></th>
                <th scope="col"><?= __('Causality Notes') ?></th>
                <th scope="col"><?= __('Clinical Examination') ?></th>
                <th scope="col"><?= __('Clinical Examination Specify') ?></th>
                <th scope="col"><?= __('Evidence Literature Specify') ?></th>
                <th scope="col"><?= __('Evidence Literature') ?></th>
                <th scope="col"><?= __('Causal Role') ?></th>
                <th scope="col"><?= __('Causal Role Specify') ?></th>
                <th scope="col"><?= __('Vaccine Quality') ?></th>
                <th scope="col"><?= __('Vaccine Quality Specify') ?></th>
                <th scope="col"><?= __('Prescribing Error') ?></th>
                <th scope="col"><?= __('Prescribing Error Specify') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile') ?></th>
                <th scope="col"><?= __('Vaccine Unsterile Specify') ?></th>
                <th scope="col"><?= __('Vaccine Condition') ?></th>
                <th scope="col"><?= __('Vaccine Condition Specify') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution') ?></th>
                <th scope="col"><?= __('Vaccine Reconstitution Specify') ?></th>
                <th scope="col"><?= __('Vaccine Handling') ?></th>
                <th scope="col"><?= __('Vaccine Handling Specify') ?></th>
                <th scope="col"><?= __('Vaccine Administered') ?></th>
                <th scope="col"><?= __('Vaccine Administered Specify') ?></th>
                <th scope="col"><?= __('Vaccine Anxiety') ?></th>
                <th scope="col"><?= __('Vaccine Anxiety Specify') ?></th>
                <th scope="col"><?= __('Time Window') ?></th>
                <th scope="col"><?= __('Time Window Specify') ?></th>
                <th scope="col"><?= __('Causal Association') ?></th>
                <th scope="col"><?= __('Causal Association Specify') ?></th>
                <th scope="col"><?= __('Independent Vaccination') ?></th>
                <th scope="col"><?= __('Independent Vaccination Specify') ?></th>
                <th scope="col"><?= __('Manifest Health') ?></th>
                <th scope="col"><?= __('Manifest Health Specify') ?></th>
                <th scope="col"><?= __('Comparable Event') ?></th>
                <th scope="col"><?= __('Comparable Event Specify') ?></th>
                <th scope="col"><?= __('Exposure Risk') ?></th>
                <th scope="col"><?= __('Exposure Risk Specify') ?></th>
                <th scope="col"><?= __('Acute Illness') ?></th>
                <th scope="col"><?= __('Acute Illness Specify') ?></th>
                <th scope="col"><?= __('Occur Past') ?></th>
                <th scope="col"><?= __('Occur Past Specify') ?></th>
                <th scope="col"><?= __('Taking Medication') ?></th>
                <th scope="col"><?= __('Taking Medication Specify') ?></th>
                <th scope="col"><?= __('Biological Plausibility') ?></th>
                <th scope="col"><?= __('Biological Plausibility Specify') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Conclude') ?></th>
                <th scope="col"><?= __('Conclude Reason') ?></th>
                <th scope="col"><?= __('Conclude Inability') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->aefi_causalities as $aefiCausalities): ?>
            <tr>
                <td><?= h($aefiCausalities->id) ?></td>
                <td><?= h($aefiCausalities->user_id) ?></td>
                <td><?= h($aefiCausalities->aefi_id) ?></td>
                <td><?= h($aefiCausalities->saefi_id) ?></td>
                <td><?= h($aefiCausalities->diagnosis_meet) ?></td>
                <td><?= h($aefiCausalities->valid_diagnosis) ?></td>
                <td><?= h($aefiCausalities->primary_vaccine) ?></td>
                <td><?= h($aefiCausalities->causality_question) ?></td>
                <td><?= h($aefiCausalities->case_eligibility) ?></td>
                <td><?= h($aefiCausalities->causality_notes) ?></td>
                <td><?= h($aefiCausalities->clinical_examination) ?></td>
                <td><?= h($aefiCausalities->clinical_examination_specify) ?></td>
                <td><?= h($aefiCausalities->evidence_literature_specify) ?></td>
                <td><?= h($aefiCausalities->evidence_literature) ?></td>
                <td><?= h($aefiCausalities->causal_role) ?></td>
                <td><?= h($aefiCausalities->causal_role_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_quality) ?></td>
                <td><?= h($aefiCausalities->vaccine_quality_specify) ?></td>
                <td><?= h($aefiCausalities->prescribing_error) ?></td>
                <td><?= h($aefiCausalities->prescribing_error_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_unsterile) ?></td>
                <td><?= h($aefiCausalities->vaccine_unsterile_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_condition) ?></td>
                <td><?= h($aefiCausalities->vaccine_condition_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_reconstitution) ?></td>
                <td><?= h($aefiCausalities->vaccine_reconstitution_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_handling) ?></td>
                <td><?= h($aefiCausalities->vaccine_handling_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_administered) ?></td>
                <td><?= h($aefiCausalities->vaccine_administered_specify) ?></td>
                <td><?= h($aefiCausalities->vaccine_anxiety) ?></td>
                <td><?= h($aefiCausalities->vaccine_anxiety_specify) ?></td>
                <td><?= h($aefiCausalities->time_window) ?></td>
                <td><?= h($aefiCausalities->time_window_specify) ?></td>
                <td><?= h($aefiCausalities->causal_association) ?></td>
                <td><?= h($aefiCausalities->causal_association_specify) ?></td>
                <td><?= h($aefiCausalities->independent_vaccination) ?></td>
                <td><?= h($aefiCausalities->independent_vaccination_specify) ?></td>
                <td><?= h($aefiCausalities->manifest_health) ?></td>
                <td><?= h($aefiCausalities->manifest_health_specify) ?></td>
                <td><?= h($aefiCausalities->comparable_event) ?></td>
                <td><?= h($aefiCausalities->comparable_event_specify) ?></td>
                <td><?= h($aefiCausalities->exposure_risk) ?></td>
                <td><?= h($aefiCausalities->exposure_risk_specify) ?></td>
                <td><?= h($aefiCausalities->acute_illness) ?></td>
                <td><?= h($aefiCausalities->acute_illness_specify) ?></td>
                <td><?= h($aefiCausalities->occur_past) ?></td>
                <td><?= h($aefiCausalities->occur_past_specify) ?></td>
                <td><?= h($aefiCausalities->taking_medication) ?></td>
                <td><?= h($aefiCausalities->taking_medication_specify) ?></td>
                <td><?= h($aefiCausalities->biological_plausibility) ?></td>
                <td><?= h($aefiCausalities->biological_plausibility_specify) ?></td>
                <td><?= h($aefiCausalities->inconsistent) ?></td>
                <td><?= h($aefiCausalities->consistent_i) ?></td>
                <td><?= h($aefiCausalities->consistent_iii) ?></td>
                <td><?= h($aefiCausalities->consistent_ii) ?></td>
                <td><?= h($aefiCausalities->consistent_iv) ?></td>
                <td><?= h($aefiCausalities->indeterminate_i) ?></td>
                <td><?= h($aefiCausalities->indeterminate_ii) ?></td>
                <td><?= h($aefiCausalities->unclassifiable) ?></td>
                <td><?= h($aefiCausalities->unclassifiable_specify) ?></td>
                <td><?= h($aefiCausalities->conclude) ?></td>
                <td><?= h($aefiCausalities->conclude_reason) ?></td>
                <td><?= h($aefiCausalities->conclude_inability) ?></td>
                <td><?= h($aefiCausalities->signature) ?></td>
                <td><?= h($aefiCausalities->chosen) ?></td>
                <td><?= h($aefiCausalities->reviewed_by) ?></td>
                <td><?= h($aefiCausalities->deleted) ?></td>
                <td><?= h($aefiCausalities->created) ?></td>
                <td><?= h($aefiCausalities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AefiCausalities', 'action' => 'view', $aefiCausalities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AefiCausalities', 'action' => 'edit', $aefiCausalities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AefiCausalities', 'action' => 'delete', $aefiCausalities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefiCausalities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Report Stages') ?></h4>
        <?php if (!empty($saefi->report_stages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Stage') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Stage Date') ?></th>
                <th scope="col"><?= __('Alt Date') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->report_stages as $reportStages): ?>
            <tr>
                <td><?= h($reportStages->id) ?></td>
                <td><?= h($reportStages->foreign_key) ?></td>
                <td><?= h($reportStages->model) ?></td>
                <td><?= h($reportStages->stage) ?></td>
                <td><?= h($reportStages->description) ?></td>
                <td><?= h($reportStages->stage_date) ?></td>
                <td><?= h($reportStages->alt_date) ?></td>
                <td><?= h($reportStages->deleted) ?></td>
                <td><?= h($reportStages->created) ?></td>
                <td><?= h($reportStages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ReportStages', 'action' => 'view', $reportStages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReportStages', 'action' => 'edit', $reportStages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReportStages', 'action' => 'delete', $reportStages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportStages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($saefi->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->attachments as $attachments): ?>
            <tr>
                <td><?= h($attachments->id) ?></td>
                <td><?= h($attachments->foreign_key) ?></td>
                <td><?= h($attachments->file) ?></td>
                <td><?= h($attachments->dir) ?></td>
                <td><?= h($attachments->size) ?></td>
                <td><?= h($attachments->type) ?></td>
                <td><?= h($attachments->model) ?></td>
                <td><?= h($attachments->category) ?></td>
                <td><?= h($attachments->description) ?></td>
                <td><?= h($attachments->created) ?></td>
                <td><?= h($attachments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Uploads') ?></h4>
        <?php if (!empty($saefi->uploads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->uploads as $uploads): ?>
            <tr>
                <td><?= h($uploads->id) ?></td>
                <td><?= h($uploads->foreign_key) ?></td>
                <td><?= h($uploads->file) ?></td>
                <td><?= h($uploads->dir) ?></td>
                <td><?= h($uploads->size) ?></td>
                <td><?= h($uploads->type) ?></td>
                <td><?= h($uploads->model) ?></td>
                <td><?= h($uploads->category) ?></td>
                <td><?= h($uploads->description) ?></td>
                <td><?= h($uploads->created) ?></td>
                <td><?= h($uploads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Uploads', 'action' => 'view', $uploads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Uploads', 'action' => 'edit', $uploads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Uploads', 'action' => 'delete', $uploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($saefi->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->foreign_key) ?></td>
                <td><?= h($reports->file) ?></td>
                <td><?= h($reports->dir) ?></td>
                <td><?= h($reports->size) ?></td>
                <td><?= h($reports->type) ?></td>
                <td><?= h($reports->model) ?></td>
                <td><?= h($reports->category) ?></td>
                <td><?= h($reports->description) ?></td>
                <td><?= h($reports->created) ?></td>
                <td><?= h($reports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $reports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $reports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reminders') ?></h4>
        <?php if (!empty($saefi->reminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Reminder Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->reminders as $reminders): ?>
            <tr>
                <td><?= h($reminders->id) ?></td>
                <td><?= h($reminders->foreign_key) ?></td>
                <td><?= h($reminders->model) ?></td>
                <td><?= h($reminders->user_id) ?></td>
                <td><?= h($reminders->reminder_type) ?></td>
                <td><?= h($reminders->created) ?></td>
                <td><?= h($reminders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reminders', 'action' => 'view', $reminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reminders', 'action' => 'edit', $reminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reminders', 'action' => 'delete', $reminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refids') ?></h4>
        <?php if (!empty($saefi->refids)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Refid') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->refids as $refids): ?>
            <tr>
                <td><?= h($refids->id) ?></td>
                <td><?= h($refids->foreign_key) ?></td>
                <td><?= h($refids->model) ?></td>
                <td><?= h($refids->refid) ?></td>
                <td><?= h($refids->year) ?></td>
                <td><?= h($refids->created) ?></td>
                <td><?= h($refids->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Refids', 'action' => 'view', $refids->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Refids', 'action' => 'edit', $refids->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Refids', 'action' => 'delete', $refids->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refids->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($saefi->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Literature Review') ?></th>
                <th scope="col"><?= __('References Text') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Clinical Findings') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Outcome Date') ?></th>
                <th scope="col"><?= __('Causality Decision') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->foreign_key) ?></td>
                <td><?= h($reviews->category) ?></td>
                <td><?= h($reviews->model) ?></td>
                <td><?= h($reviews->comments) ?></td>
                <td><?= h($reviews->literature_review) ?></td>
                <td><?= h($reviews->references_text) ?></td>
                <td><?= h($reviews->drug_name) ?></td>
                <td><?= h($reviews->reaction_name) ?></td>
                <td><?= h($reviews->medical_history) ?></td>
                <td><?= h($reviews->clinical_findings) ?></td>
                <td><?= h($reviews->file) ?></td>
                <td><?= h($reviews->dir) ?></td>
                <td><?= h($reviews->size) ?></td>
                <td><?= h($reviews->type) ?></td>
                <td><?= h($reviews->outcome_date) ?></td>
                <td><?= h($reviews->causality_decision) ?></td>
                <td><?= h($reviews->status) ?></td>
                <td><?= h($reviews->inconsistent) ?></td>
                <td><?= h($reviews->consistent_i) ?></td>
                <td><?= h($reviews->consistent_iii) ?></td>
                <td><?= h($reviews->consistent_ii) ?></td>
                <td><?= h($reviews->consistent_iv) ?></td>
                <td><?= h($reviews->indeterminate_i) ?></td>
                <td><?= h($reviews->indeterminate_ii) ?></td>
                <td><?= h($reviews->unclassifiable) ?></td>
                <td><?= h($reviews->unclassifiable_specify) ?></td>
                <td><?= h($reviews->signature) ?></td>
                <td><?= h($reviews->chosen) ?></td>
                <td><?= h($reviews->reviewed_by) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td><?= h($reviews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($saefi->committees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Literature Review') ?></th>
                <th scope="col"><?= __('References Text') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Clinical Findings') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Outcome Date') ?></th>
                <th scope="col"><?= __('Causality Decision') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Inconsistent') ?></th>
                <th scope="col"><?= __('Consistent I') ?></th>
                <th scope="col"><?= __('Consistent Iii') ?></th>
                <th scope="col"><?= __('Consistent Ii') ?></th>
                <th scope="col"><?= __('Consistent Iv') ?></th>
                <th scope="col"><?= __('Indeterminate I') ?></th>
                <th scope="col"><?= __('Indeterminate Ii') ?></th>
                <th scope="col"><?= __('Unclassifiable') ?></th>
                <th scope="col"><?= __('Unclassifiable Specify') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Reviewed By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->committees as $committees): ?>
            <tr>
                <td><?= h($committees->id) ?></td>
                <td><?= h($committees->user_id) ?></td>
                <td><?= h($committees->foreign_key) ?></td>
                <td><?= h($committees->category) ?></td>
                <td><?= h($committees->model) ?></td>
                <td><?= h($committees->comments) ?></td>
                <td><?= h($committees->literature_review) ?></td>
                <td><?= h($committees->references_text) ?></td>
                <td><?= h($committees->drug_name) ?></td>
                <td><?= h($committees->reaction_name) ?></td>
                <td><?= h($committees->medical_history) ?></td>
                <td><?= h($committees->clinical_findings) ?></td>
                <td><?= h($committees->file) ?></td>
                <td><?= h($committees->dir) ?></td>
                <td><?= h($committees->size) ?></td>
                <td><?= h($committees->type) ?></td>
                <td><?= h($committees->outcome_date) ?></td>
                <td><?= h($committees->causality_decision) ?></td>
                <td><?= h($committees->status) ?></td>
                <td><?= h($committees->inconsistent) ?></td>
                <td><?= h($committees->consistent_i) ?></td>
                <td><?= h($committees->consistent_iii) ?></td>
                <td><?= h($committees->consistent_ii) ?></td>
                <td><?= h($committees->consistent_iv) ?></td>
                <td><?= h($committees->indeterminate_i) ?></td>
                <td><?= h($committees->indeterminate_ii) ?></td>
                <td><?= h($committees->unclassifiable) ?></td>
                <td><?= h($committees->unclassifiable_specify) ?></td>
                <td><?= h($committees->signature) ?></td>
                <td><?= h($committees->chosen) ?></td>
                <td><?= h($committees->reviewed_by) ?></td>
                <td><?= h($committees->created) ?></td>
                <td><?= h($committees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $committees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $committees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $committees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $committees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($saefi->request_reporters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('System Message') ?></th>
                <th scope="col"><?= __('User Message') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->request_reporters as $requestReporters): ?>
            <tr>
                <td><?= h($requestReporters->id) ?></td>
                <td><?= h($requestReporters->user_id) ?></td>
                <td><?= h($requestReporters->sender_id) ?></td>
                <td><?= h($requestReporters->type) ?></td>
                <td><?= h($requestReporters->model) ?></td>
                <td><?= h($requestReporters->foreign_key) ?></td>
                <td><?= h($requestReporters->title) ?></td>
                <td><?= h($requestReporters->url) ?></td>
                <td><?= h($requestReporters->system_message) ?></td>
                <td><?= h($requestReporters->user_message) ?></td>
                <td><?= h($requestReporters->deleted) ?></td>
                <td><?= h($requestReporters->created) ?></td>
                <td><?= h($requestReporters->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $requestReporters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $requestReporters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $requestReporters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestReporters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($saefi->request_evaluators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('System Message') ?></th>
                <th scope="col"><?= __('User Message') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->request_evaluators as $requestEvaluators): ?>
            <tr>
                <td><?= h($requestEvaluators->id) ?></td>
                <td><?= h($requestEvaluators->user_id) ?></td>
                <td><?= h($requestEvaluators->sender_id) ?></td>
                <td><?= h($requestEvaluators->type) ?></td>
                <td><?= h($requestEvaluators->model) ?></td>
                <td><?= h($requestEvaluators->foreign_key) ?></td>
                <td><?= h($requestEvaluators->title) ?></td>
                <td><?= h($requestEvaluators->url) ?></td>
                <td><?= h($requestEvaluators->system_message) ?></td>
                <td><?= h($requestEvaluators->user_message) ?></td>
                <td><?= h($requestEvaluators->deleted) ?></td>
                <td><?= h($requestEvaluators->created) ?></td>
                <td><?= h($requestEvaluators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $requestEvaluators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $requestEvaluators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $requestEvaluators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestEvaluators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Saefi Reactions') ?></h4>
        <?php if (!empty($saefi->saefi_reactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Saefi Id') ?></th>
                <th scope="col"><?= __('Reaction Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($saefi->saefi_reactions as $saefiReactions): ?>
            <tr>
                <td><?= h($saefiReactions->id) ?></td>
                <td><?= h($saefiReactions->saefi_id) ?></td>
                <td><?= h($saefiReactions->reaction_name) ?></td>
                <td><?= h($saefiReactions->created) ?></td>
                <td><?= h($saefiReactions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SaefiReactions', 'action' => 'view', $saefiReactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SaefiReactions', 'action' => 'edit', $saefiReactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SaefiReactions', 'action' => 'delete', $saefiReactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefiReactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
