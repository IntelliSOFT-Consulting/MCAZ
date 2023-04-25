<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr $adr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adr'), ['action' => 'edit', $adr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adr'), ['action' => 'delete', $adr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Original Adrs'), ['controller' => 'OriginalAdrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Original Adr'), ['controller' => 'OriginalAdrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Initial Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Initial Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['controller' => 'AdrLabTests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['controller' => 'AdrLabTests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['controller' => 'AdrListOfDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['controller' => 'AdrListOfDrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['controller' => 'AdrOtherDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['controller' => 'AdrOtherDrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report Stages'), ['controller' => 'ReportStages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Stage'), ['controller' => 'ReportStages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
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
        <li><?= $this->Html->link(__('List Adr Followups'), ['controller' => 'AdrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Followup'), ['controller' => 'AdrFollowups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adrs view large-9 medium-8 columns content">
    <h3><?= h($adr->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $adr->has('user') ? $this->Html->link($adr->user->name, ['controller' => 'Users', 'action' => 'view', $adr->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Original Adr') ?></th>
            <td><?= $adr->has('original_adr') ? $this->Html->link($adr->original_adr->id, ['controller' => 'OriginalAdrs', 'action' => 'view', $adr->original_adr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Adr') ?></th>
            <td><?= $adr->has('initial_adr') ? $this->Html->link($adr->initial_adr->id, ['controller' => 'Adrs', 'action' => 'view', $adr->initial_adr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Messageid') ?></th>
            <td><?= h($adr->messageid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($adr->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mrcz Protocol Number') ?></th>
            <td><?= h($adr->mrcz_protocol_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mcaz Protocol Number') ?></th>
            <td><?= h($adr->mcaz_protocol_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Principal Investigator') ?></th>
            <td><?= h($adr->principal_investigator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($adr->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($adr->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $adr->has('designation') ? $this->Html->link($adr->designation->name, ['controller' => 'Designations', 'action' => 'view', $adr->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation Study') ?></th>
            <td><?= h($adr->designation_study) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($adr->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($adr->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($adr->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Title') ?></th>
            <td><?= h($adr->study_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Sponsor') ?></th>
            <td><?= h($adr->study_sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant Number') ?></th>
            <td><?= h($adr->participant_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($adr->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($adr->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($adr->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Week') ?></th>
            <td><?= h($adr->study_week) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Number') ?></th>
            <td><?= h($adr->visit_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adverse Event Type') ?></th>
            <td><?= h($adr->adverse_event_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Type') ?></th>
            <td><?= h($adr->sae_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Toxicity Grade') ?></th>
            <td><?= h($adr->toxicity_grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Events') ?></th>
            <td><?= h($adr->previous_events) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Events Number') ?></th>
            <td><?= h($adr->previous_events_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Saes') ?></th>
            <td><?= h($adr->total_saes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Event') ?></th>
            <td><?= h($adr->location_event) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Research Involves') ?></th>
            <td><?= h($adr->research_involves) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Investigational') ?></th>
            <td><?= h($adr->drug_investigational) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Other Drug') ?></th>
            <td><?= h($adr->patient_other_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mcaz') ?></th>
            <td><?= h($adr->report_to_mcaz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mrcz') ?></th>
            <td><?= h($adr->report_to_mrcz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Sponsor') ?></th>
            <td><?= h($adr->report_to_sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Irb') ?></th>
            <td><?= h($adr->report_to_irb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D1 Consent Form') ?></th>
            <td><?= h($adr->d1_consent_form) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D2 Brochure') ?></th>
            <td><?= h($adr->d2_brochure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D3 Changes Sae') ?></th>
            <td><?= h($adr->d3_changes_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D4 Consent Sae') ?></th>
            <td><?= h($adr->d4_consent_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assess Risk') ?></th>
            <td><?= h($adr->assess_risk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resubmit') ?></th>
            <td><?= h($adr->resubmit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($adr->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copied') ?></th>
            <td><?= h($adr->copied) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned To') ?></th>
            <td><?= $this->Number->format($adr->assigned_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned By') ?></th>
            <td><?= $this->Number->format($adr->assigned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= $this->Number->format($adr->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('In Utero') ?></th>
            <td><?= $this->Number->format($adr->in_utero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($adr->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($adr->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($adr->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigned Date') ?></th>
            <td><?= h($adr->assigned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Adverse Event') ?></th>
            <td><?= h($adr->date_of_adverse_event) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Site Awareness') ?></th>
            <td><?= h($adr->date_of_site_awareness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mcaz Date') ?></th>
            <td><?= h($adr->report_to_mcaz_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mrcz Date') ?></th>
            <td><?= h($adr->report_to_mrcz_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Sponsor Date') ?></th>
            <td><?= h($adr->report_to_sponsor_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Irb Date') ?></th>
            <td><?= h($adr->report_to_irb_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted Date') ?></th>
            <td><?= h($adr->submitted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adr->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adr->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action Date') ?></th>
            <td><?= h($adr->action_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($adr->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $adr->signature ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sae Description') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->sae_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Location Event Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->location_event_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Research Involves Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->research_involves_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Name Of Drug') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->name_of_drug)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical History') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->medical_history)); ?>
    </div>
    <div class="row">
        <h4><?= __('Diagnosis') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->diagnosis)); ?>
    </div>
    <div class="row">
        <h4><?= __('Immediate Cause') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->immediate_cause)); ?>
    </div>
    <div class="row">
        <h4><?= __('Symptoms') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->symptoms)); ?>
    </div>
    <div class="row">
        <h4><?= __('Investigations') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->investigations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Results') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->results)); ?>
    </div>
    <div class="row">
        <h4><?= __('Management') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->management)); ?>
    </div>
    <div class="row">
        <h4><?= __('Outcome') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->outcome)); ?>
    </div>
    <div class="row">
        <h4><?= __('Changes Explain') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->changes_explain)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr Lab Tests') ?></h4>
        <?php if (!empty($adr->adr_lab_tests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Lab Test') ?></th>
                <th scope="col"><?= __('Abnormal Result') ?></th>
                <th scope="col"><?= __('Site Normal Range') ?></th>
                <th scope="col"><?= __('Collection Date') ?></th>
                <th scope="col"><?= __('Lab Value') ?></th>
                <th scope="col"><?= __('Lab Value Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_lab_tests as $adrLabTests): ?>
            <tr>
                <td><?= h($adrLabTests->id) ?></td>
                <td><?= h($adrLabTests->adr_id) ?></td>
                <td><?= h($adrLabTests->lab_test) ?></td>
                <td><?= h($adrLabTests->abnormal_result) ?></td>
                <td><?= h($adrLabTests->site_normal_range) ?></td>
                <td><?= h($adrLabTests->collection_date) ?></td>
                <td><?= h($adrLabTests->lab_value) ?></td>
                <td><?= h($adrLabTests->lab_value_date) ?></td>
                <td><?= h($adrLabTests->created) ?></td>
                <td><?= h($adrLabTests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrLabTests', 'action' => 'view', $adrLabTests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrLabTests', 'action' => 'edit', $adrLabTests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrLabTests', 'action' => 'delete', $adrLabTests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrLabTests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr List Of Drugs') ?></h4>
        <?php if (!empty($adr->adr_list_of_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Dosage') ?></th>
                <th scope="col"><?= __('Dose Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Taking Drug') ?></th>
                <th scope="col"><?= __('Relationship To Sae') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_list_of_drugs as $adrListOfDrugs): ?>
            <tr>
                <td><?= h($adrListOfDrugs->id) ?></td>
                <td><?= h($adrListOfDrugs->adr_id) ?></td>
                <td><?= h($adrListOfDrugs->drug_name) ?></td>
                <td><?= h($adrListOfDrugs->dosage) ?></td>
                <td><?= h($adrListOfDrugs->dose_id) ?></td>
                <td><?= h($adrListOfDrugs->route_id) ?></td>
                <td><?= h($adrListOfDrugs->frequency_id) ?></td>
                <td><?= h($adrListOfDrugs->start_date) ?></td>
                <td><?= h($adrListOfDrugs->stop_date) ?></td>
                <td><?= h($adrListOfDrugs->taking_drug) ?></td>
                <td><?= h($adrListOfDrugs->relationship_to_sae) ?></td>
                <td><?= h($adrListOfDrugs->created) ?></td>
                <td><?= h($adrListOfDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrListOfDrugs', 'action' => 'view', $adrListOfDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrListOfDrugs', 'action' => 'edit', $adrListOfDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrListOfDrugs', 'action' => 'delete', $adrListOfDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrListOfDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr Other Drugs') ?></h4>
        <?php if (!empty($adr->adr_other_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Relationship To Sae') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_other_drugs as $adrOtherDrugs): ?>
            <tr>
                <td><?= h($adrOtherDrugs->id) ?></td>
                <td><?= h($adrOtherDrugs->adr_id) ?></td>
                <td><?= h($adrOtherDrugs->drug_name) ?></td>
                <td><?= h($adrOtherDrugs->start_date) ?></td>
                <td><?= h($adrOtherDrugs->stop_date) ?></td>
                <td><?= h($adrOtherDrugs->relationship_to_sae) ?></td>
                <td><?= h($adrOtherDrugs->created) ?></td>
                <td><?= h($adrOtherDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrOtherDrugs', 'action' => 'view', $adrOtherDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrOtherDrugs', 'action' => 'edit', $adrOtherDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrOtherDrugs', 'action' => 'delete', $adrOtherDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrOtherDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Report Stages') ?></h4>
        <?php if (!empty($adr->report_stages)): ?>
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
            <?php foreach ($adr->report_stages as $reportStages): ?>
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
        <?php if (!empty($adr->attachments)): ?>
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
            <?php foreach ($adr->attachments as $attachments): ?>
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
        <?php if (!empty($adr->uploads)): ?>
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
            <?php foreach ($adr->uploads as $uploads): ?>
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
        <h4><?= __('Related Reminders') ?></h4>
        <?php if (!empty($adr->reminders)): ?>
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
            <?php foreach ($adr->reminders as $reminders): ?>
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
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($adr->adr_comments)): ?>
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
            <?php foreach ($adr->adr_comments as $adrComments): ?>
            <tr>
                <td><?= h($adrComments->id) ?></td>
                <td><?= h($adrComments->foreign_key) ?></td>
                <td><?= h($adrComments->user_id) ?></td>
                <td><?= h($adrComments->model_id) ?></td>
                <td><?= h($adrComments->model) ?></td>
                <td><?= h($adrComments->category) ?></td>
                <td><?= h($adrComments->sender) ?></td>
                <td><?= h($adrComments->subject) ?></td>
                <td><?= h($adrComments->content) ?></td>
                <td><?= h($adrComments->deleted) ?></td>
                <td><?= h($adrComments->created) ?></td>
                <td><?= h($adrComments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $adrComments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $adrComments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $adrComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrComments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refids') ?></h4>
        <?php if (!empty($adr->refids)): ?>
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
            <?php foreach ($adr->refids as $refids): ?>
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
        <?php if (!empty($adr->reviews)): ?>
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
            <?php foreach ($adr->reviews as $reviews): ?>
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
        <?php if (!empty($adr->committees)): ?>
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
            <?php foreach ($adr->committees as $committees): ?>
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
        <?php if (!empty($adr->request_reporters)): ?>
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
            <?php foreach ($adr->request_reporters as $requestReporters): ?>
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
        <?php if (!empty($adr->request_evaluators)): ?>
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
            <?php foreach ($adr->request_evaluators as $requestEvaluators): ?>
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
        <h4><?= __('Related Adr Followups') ?></h4>
        <?php if (!empty($adr->adr_followups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Initial Id') ?></th>
                <th scope="col"><?= __('Messageid') ?></th>
                <th scope="col"><?= __('Reference Number') ?></th>
                <th scope="col"><?= __('Assigned To') ?></th>
                <th scope="col"><?= __('Assigned By') ?></th>
                <th scope="col"><?= __('Assigned Date') ?></th>
                <th scope="col"><?= __('Mrcz Protocol Number') ?></th>
                <th scope="col"><?= __('Mcaz Protocol Number') ?></th>
                <th scope="col"><?= __('Principal Investigator') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Designation Study') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Study Title') ?></th>
                <th scope="col"><?= __('Study Sponsor') ?></th>
                <th scope="col"><?= __('Date Of Adverse Event') ?></th>
                <th scope="col"><?= __('Participant Number') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Date Of Site Awareness') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Age') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Study Week') ?></th>
                <th scope="col"><?= __('Visit Number') ?></th>
                <th scope="col"><?= __('Adverse Event Type') ?></th>
                <th scope="col"><?= __('Sae Type') ?></th>
                <th scope="col"><?= __('Sae Description') ?></th>
                <th scope="col"><?= __('Toxicity Grade') ?></th>
                <th scope="col"><?= __('Previous Events') ?></th>
                <th scope="col"><?= __('Previous Events Number') ?></th>
                <th scope="col"><?= __('Total Saes') ?></th>
                <th scope="col"><?= __('Location Event') ?></th>
                <th scope="col"><?= __('Location Event Specify') ?></th>
                <th scope="col"><?= __('Research Involves') ?></th>
                <th scope="col"><?= __('Research Involves Specify') ?></th>
                <th scope="col"><?= __('Name Of Drug') ?></th>
                <th scope="col"><?= __('Drug Investigational') ?></th>
                <th scope="col"><?= __('Patient Other Drug') ?></th>
                <th scope="col"><?= __('Report To Mcaz') ?></th>
                <th scope="col"><?= __('Report To Mcaz Date') ?></th>
                <th scope="col"><?= __('Report To Mrcz') ?></th>
                <th scope="col"><?= __('Report To Mrcz Date') ?></th>
                <th scope="col"><?= __('Report To Sponsor') ?></th>
                <th scope="col"><?= __('Report To Sponsor Date') ?></th>
                <th scope="col"><?= __('Report To Irb') ?></th>
                <th scope="col"><?= __('Report To Irb Date') ?></th>
                <th scope="col"><?= __('Medical History') ?></th>
                <th scope="col"><?= __('Diagnosis') ?></th>
                <th scope="col"><?= __('Immediate Cause') ?></th>
                <th scope="col"><?= __('Symptoms') ?></th>
                <th scope="col"><?= __('Investigations') ?></th>
                <th scope="col"><?= __('Results') ?></th>
                <th scope="col"><?= __('Management') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('D1 Consent Form') ?></th>
                <th scope="col"><?= __('D2 Brochure') ?></th>
                <th scope="col"><?= __('D3 Changes Sae') ?></th>
                <th scope="col"><?= __('D4 Consent Sae') ?></th>
                <th scope="col"><?= __('Changes Explain') ?></th>
                <th scope="col"><?= __('Assess Risk') ?></th>
                <th scope="col"><?= __('In Utero') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Resubmit') ?></th>
                <th scope="col"><?= __('Submitted Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Action Date') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Copied') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_followups as $adrFollowups): ?>
            <tr>
                <td><?= h($adrFollowups->id) ?></td>
                <td><?= h($adrFollowups->user_id) ?></td>
                <td><?= h($adrFollowups->adr_id) ?></td>
                <td><?= h($adrFollowups->initial_id) ?></td>
                <td><?= h($adrFollowups->messageid) ?></td>
                <td><?= h($adrFollowups->reference_number) ?></td>
                <td><?= h($adrFollowups->assigned_to) ?></td>
                <td><?= h($adrFollowups->assigned_by) ?></td>
                <td><?= h($adrFollowups->assigned_date) ?></td>
                <td><?= h($adrFollowups->mrcz_protocol_number) ?></td>
                <td><?= h($adrFollowups->mcaz_protocol_number) ?></td>
                <td><?= h($adrFollowups->principal_investigator) ?></td>
                <td><?= h($adrFollowups->reporter_name) ?></td>
                <td><?= h($adrFollowups->reporter_email) ?></td>
                <td><?= h($adrFollowups->designation_id) ?></td>
                <td><?= h($adrFollowups->designation_study) ?></td>
                <td><?= h($adrFollowups->reporter_phone) ?></td>
                <td><?= h($adrFollowups->name_of_institution) ?></td>
                <td><?= h($adrFollowups->institution_code) ?></td>
                <td><?= h($adrFollowups->study_title) ?></td>
                <td><?= h($adrFollowups->study_sponsor) ?></td>
                <td><?= h($adrFollowups->date_of_adverse_event) ?></td>
                <td><?= h($adrFollowups->participant_number) ?></td>
                <td><?= h($adrFollowups->report_type) ?></td>
                <td><?= h($adrFollowups->date_of_site_awareness) ?></td>
                <td><?= h($adrFollowups->date_of_birth) ?></td>
                <td><?= h($adrFollowups->age) ?></td>
                <td><?= h($adrFollowups->gender) ?></td>
                <td><?= h($adrFollowups->study_week) ?></td>
                <td><?= h($adrFollowups->visit_number) ?></td>
                <td><?= h($adrFollowups->adverse_event_type) ?></td>
                <td><?= h($adrFollowups->sae_type) ?></td>
                <td><?= h($adrFollowups->sae_description) ?></td>
                <td><?= h($adrFollowups->toxicity_grade) ?></td>
                <td><?= h($adrFollowups->previous_events) ?></td>
                <td><?= h($adrFollowups->previous_events_number) ?></td>
                <td><?= h($adrFollowups->total_saes) ?></td>
                <td><?= h($adrFollowups->location_event) ?></td>
                <td><?= h($adrFollowups->location_event_specify) ?></td>
                <td><?= h($adrFollowups->research_involves) ?></td>
                <td><?= h($adrFollowups->research_involves_specify) ?></td>
                <td><?= h($adrFollowups->name_of_drug) ?></td>
                <td><?= h($adrFollowups->drug_investigational) ?></td>
                <td><?= h($adrFollowups->patient_other_drug) ?></td>
                <td><?= h($adrFollowups->report_to_mcaz) ?></td>
                <td><?= h($adrFollowups->report_to_mcaz_date) ?></td>
                <td><?= h($adrFollowups->report_to_mrcz) ?></td>
                <td><?= h($adrFollowups->report_to_mrcz_date) ?></td>
                <td><?= h($adrFollowups->report_to_sponsor) ?></td>
                <td><?= h($adrFollowups->report_to_sponsor_date) ?></td>
                <td><?= h($adrFollowups->report_to_irb) ?></td>
                <td><?= h($adrFollowups->report_to_irb_date) ?></td>
                <td><?= h($adrFollowups->medical_history) ?></td>
                <td><?= h($adrFollowups->diagnosis) ?></td>
                <td><?= h($adrFollowups->immediate_cause) ?></td>
                <td><?= h($adrFollowups->symptoms) ?></td>
                <td><?= h($adrFollowups->investigations) ?></td>
                <td><?= h($adrFollowups->results) ?></td>
                <td><?= h($adrFollowups->management) ?></td>
                <td><?= h($adrFollowups->outcome) ?></td>
                <td><?= h($adrFollowups->d1_consent_form) ?></td>
                <td><?= h($adrFollowups->d2_brochure) ?></td>
                <td><?= h($adrFollowups->d3_changes_sae) ?></td>
                <td><?= h($adrFollowups->d4_consent_sae) ?></td>
                <td><?= h($adrFollowups->changes_explain) ?></td>
                <td><?= h($adrFollowups->assess_risk) ?></td>
                <td><?= h($adrFollowups->in_utero) ?></td>
                <td><?= h($adrFollowups->submitted) ?></td>
                <td><?= h($adrFollowups->resubmit) ?></td>
                <td><?= h($adrFollowups->submitted_date) ?></td>
                <td><?= h($adrFollowups->status) ?></td>
                <td><?= h($adrFollowups->active) ?></td>
                <td><?= h($adrFollowups->emails) ?></td>
                <td><?= h($adrFollowups->signature) ?></td>
                <td><?= h($adrFollowups->created) ?></td>
                <td><?= h($adrFollowups->modified) ?></td>
                <td><?= h($adrFollowups->action_date) ?></td>
                <td><?= h($adrFollowups->deleted) ?></td>
                <td><?= h($adrFollowups->copied) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrFollowups', 'action' => 'view', $adrFollowups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrFollowups', 'action' => 'edit', $adrFollowups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrFollowups', 'action' => 'delete', $adrFollowups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrFollowups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
