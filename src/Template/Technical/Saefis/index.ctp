<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saefi[]|\Cake\Collection\CollectionInterface $saefis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Saefi'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefi Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefi List Of Vaccines'), ['controller' => 'SaefiListOfVaccines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi List Of Vaccine'), ['controller' => 'SaefiListOfVaccines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi List Of Vaccines'), ['controller' => 'AefiListOfVaccines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi List Of Vaccine'), ['controller' => 'AefiListOfVaccines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Aefi Causalities'), ['controller' => 'AefiCausalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aefi Causality'), ['controller' => 'AefiCausalities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Refids'), ['controller' => 'Refids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Refid'), ['controller' => 'Refids', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Reporters'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Reporter'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Saefi Reactions'), ['controller' => 'SaefiReactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Saefi Reaction'), ['controller' => 'SaefiReactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="saefis index large-9 medium-8 columns content">
    <h3><?= __('Saefis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saefi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initial_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aefi_report_ref') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_vaccination_site') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place_vaccination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place_vaccination_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_type_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccination_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccination_in_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complete_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patient_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_years') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_months') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_at_onset_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('symptom_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hospitalization_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_on_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('died_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autopsy_done') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autopsy_done_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autopsy_planned') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autopsy_planned_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('past_history') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adverse_event') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allergy_history') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comorbidity_disorder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('covid_positive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('existing_illness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hospitalization_history') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medication_vaccination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('faith_healers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('family_history') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pregnant_weeks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breastfeeding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('infant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_procedure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_examination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_documents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_verbal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examiner_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('person_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('person_designation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('person_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('when_vaccinated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_given') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prescribing_error') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_unsterile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_condition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_reconstitution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_handling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_administered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_vial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_session') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_locations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_cluster') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_cluster_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_cluster_vial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccinated_cluster_vial_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('syringes_used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('syringes_used_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('syringes_used_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution_multiple') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution_different') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution_vial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution_syringe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reconstitution_vaccines') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cold_temperature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cold_temperature_deviation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedure_followed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_items') ?></th>
                <th scope="col"><?= $this->Paginator->sort('partial_vaccines') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unusable_vaccines') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unusable_diluents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cold_transportation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vaccine_carrier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coolant_packs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('similar_events') ?></th>
                <th scope="col"><?= $this->Paginator->sort('similar_events_episodes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('affected_vaccinated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('affected_not_vaccinated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('affected_unknown') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resubmit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copied') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saefis as $saefi): ?>
            <tr>
                <td><?= $this->Number->format($saefi->id) ?></td>
                <td><?= $saefi->has('user') ? $this->Html->link($saefi->user->name, ['controller' => 'Users', 'action' => 'view', $saefi->user->id]) : '' ?></td>
                <td><?= $saefi->has('original_saefi') ? $this->Html->link($saefi->original_saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefi->original_saefi->id]) : '' ?></td>
                <td><?= $saefi->has('initial_saefi') ? $this->Html->link($saefi->initial_saefi->id, ['controller' => 'Saefis', 'action' => 'view', $saefi->initial_saefi->id]) : '' ?></td>
                <td><?= h($saefi->messageid) ?></td>
                <td><?= $saefi->has('province') ? $this->Html->link($saefi->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $saefi->province->id]) : '' ?></td>
                <td><?= h($saefi->district) ?></td>
                <td><?= h($saefi->aefi_report_ref) ?></td>
                <td><?= h($saefi->name_of_vaccination_site) ?></td>
                <td><?= h($saefi->reference_number) ?></td>
                <td><?= $this->Number->format($saefi->assigned_to) ?></td>
                <td><?= $this->Number->format($saefi->assigned_by) ?></td>
                <td><?= h($saefi->assigned_date) ?></td>
                <td><?= h($saefi->place_vaccination) ?></td>
                <td><?= h($saefi->place_vaccination_other) ?></td>
                <td><?= h($saefi->site_type) ?></td>
                <td><?= h($saefi->site_type_other) ?></td>
                <td><?= h($saefi->vaccination_in) ?></td>
                <td><?= h($saefi->vaccination_in_other) ?></td>
                <td><?= h($saefi->reporter_name) ?></td>
                <td><?= h($saefi->report_date) ?></td>
                <td><?= h($saefi->start_date) ?></td>
                <td><?= h($saefi->complete_date) ?></td>
                <td><?= $saefi->has('designation') ? $this->Html->link($saefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $saefi->designation->id]) : '' ?></td>
                <td><?= h($saefi->telephone) ?></td>
                <td><?= h($saefi->mobile) ?></td>
                <td><?= h($saefi->reporter_email) ?></td>
                <td><?= h($saefi->patient_name) ?></td>
                <td><?= h($saefi->gender) ?></td>
                <td><?= h($saefi->patient_address) ?></td>
                <td><?= h($saefi->date_of_birth) ?></td>
                <td><?= $this->Number->format($saefi->age_at_onset_years) ?></td>
                <td><?= $this->Number->format($saefi->age_at_onset_months) ?></td>
                <td><?= $this->Number->format($saefi->age_at_onset_days) ?></td>
                <td><?= h($saefi->age_group) ?></td>
                <td><?= h($saefi->symptom_date) ?></td>
                <td><?= h($saefi->hospitalization_date) ?></td>
                <td><?= h($saefi->status_on_date) ?></td>
                <td><?= h($saefi->died_date) ?></td>
                <td><?= h($saefi->autopsy_done) ?></td>
                <td><?= h($saefi->autopsy_done_date) ?></td>
                <td><?= h($saefi->autopsy_planned) ?></td>
                <td><?= h($saefi->autopsy_planned_date) ?></td>
                <td><?= h($saefi->past_history) ?></td>
                <td><?= h($saefi->adverse_event) ?></td>
                <td><?= h($saefi->allergy_history) ?></td>
                <td><?= h($saefi->comorbidity_disorder) ?></td>
                <td><?= h($saefi->covid_positive) ?></td>
                <td><?= h($saefi->existing_illness) ?></td>
                <td><?= h($saefi->hospitalization_history) ?></td>
                <td><?= h($saefi->medication_vaccination) ?></td>
                <td><?= h($saefi->faith_healers) ?></td>
                <td><?= h($saefi->family_history) ?></td>
                <td><?= h($saefi->pregnant) ?></td>
                <td><?= h($saefi->pregnant_weeks) ?></td>
                <td><?= h($saefi->breastfeeding) ?></td>
                <td><?= h($saefi->infant) ?></td>
                <td><?= $this->Number->format($saefi->birth_weight) ?></td>
                <td><?= h($saefi->delivery_procedure) ?></td>
                <td><?= h($saefi->source_examination) ?></td>
                <td><?= h($saefi->source_documents) ?></td>
                <td><?= h($saefi->source_verbal) ?></td>
                <td><?= h($saefi->source_other) ?></td>
                <td><?= h($saefi->examiner_name) ?></td>
                <td><?= h($saefi->person_details) ?></td>
                <td><?= h($saefi->person_designation) ?></td>
                <td><?= h($saefi->person_date) ?></td>
                <td><?= h($saefi->when_vaccinated) ?></td>
                <td><?= h($saefi->vaccine_given) ?></td>
                <td><?= h($saefi->prescribing_error) ?></td>
                <td><?= h($saefi->vaccine_unsterile) ?></td>
                <td><?= h($saefi->vaccine_condition) ?></td>
                <td><?= h($saefi->vaccine_reconstitution) ?></td>
                <td><?= h($saefi->vaccine_handling) ?></td>
                <td><?= h($saefi->vaccine_administered) ?></td>
                <td><?= $this->Number->format($saefi->vaccinated_vial) ?></td>
                <td><?= $this->Number->format($saefi->vaccinated_session) ?></td>
                <td><?= $this->Number->format($saefi->vaccinated_locations) ?></td>
                <td><?= h($saefi->vaccinated_cluster) ?></td>
                <td><?= $this->Number->format($saefi->vaccinated_cluster_number) ?></td>
                <td><?= h($saefi->vaccinated_cluster_vial) ?></td>
                <td><?= $this->Number->format($saefi->vaccinated_cluster_vial_number) ?></td>
                <td><?= h($saefi->syringes_used) ?></td>
                <td><?= h($saefi->syringes_used_specify) ?></td>
                <td><?= h($saefi->syringes_used_other) ?></td>
                <td><?= h($saefi->reconstitution_multiple) ?></td>
                <td><?= h($saefi->reconstitution_different) ?></td>
                <td><?= h($saefi->reconstitution_vial) ?></td>
                <td><?= h($saefi->reconstitution_syringe) ?></td>
                <td><?= h($saefi->reconstitution_vaccines) ?></td>
                <td><?= h($saefi->cold_temperature) ?></td>
                <td><?= h($saefi->cold_temperature_deviation) ?></td>
                <td><?= h($saefi->procedure_followed) ?></td>
                <td><?= h($saefi->other_items) ?></td>
                <td><?= h($saefi->partial_vaccines) ?></td>
                <td><?= h($saefi->unusable_vaccines) ?></td>
                <td><?= h($saefi->unusable_diluents) ?></td>
                <td><?= h($saefi->cold_transportation) ?></td>
                <td><?= h($saefi->vaccine_carrier) ?></td>
                <td><?= h($saefi->coolant_packs) ?></td>
                <td><?= h($saefi->similar_events) ?></td>
                <td><?= $this->Number->format($saefi->similar_events_episodes) ?></td>
                <td><?= $this->Number->format($saefi->affected_vaccinated) ?></td>
                <td><?= $this->Number->format($saefi->affected_not_vaccinated) ?></td>
                <td><?= h($saefi->affected_unknown) ?></td>
                <td><?= h($saefi->created) ?></td>
                <td><?= h($saefi->modified) ?></td>
                <td><?= h($saefi->action_date) ?></td>
                <td><?= $this->Number->format($saefi->submitted) ?></td>
                <td><?= h($saefi->resubmit) ?></td>
                <td><?= h($saefi->submitted_date) ?></td>
                <td><?= h($saefi->report_type) ?></td>
                <td><?= h($saefi->status) ?></td>
                <td><?= $this->Number->format($saefi->active) ?></td>
                <td><?= $this->Number->format($saefi->emails) ?></td>
                <td><?= h($saefi->signature) ?></td>
                <td><?= h($saefi->deleted) ?></td>
                <td><?= h($saefi->copied) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $saefi->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saefi->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefi->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
