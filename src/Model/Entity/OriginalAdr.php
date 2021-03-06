<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adr Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $mrcz_protocol_number
 * @property string $mcaz_protocol_number
 * @property string $principal_investigator
 * @property string $reporter_name
 * @property string $reporter_email
 * @property int $designation_id
 * @property string $reporter_phone
 * @property string $name_of_institution
 * @property string $institution_code
 * @property string $study_title
 * @property string $study_sponsor
 * @property \Cake\I18n\FrozenDate $date_of_adverse_event
 * @property string $participant_number
 * @property string $report_type
 * @property \Cake\I18n\FrozenDate $date_of_site_awareness
 * @property string $date_of_birth
 * @property string $gender
 * @property string $study_week
 * @property string $visit_number
 * @property string $adverse_event_type
 * @property string $sae_type
 * @property string $sae_description
 * @property string $toxicity_grade
 * @property string $previous_events
 * @property string $previous_events_number
 * @property string $total_saes
 * @property string $location_event
 * @property string $location_event_specify
 * @property string $research_involves
 * @property string $research_involves_specify
 * @property string $name_of_drug
 * @property string $drug_investigational
 * @property string $patient_other_drug
 * @property string $report_to_mcaz
 * @property \Cake\I18n\FrozenDate $report_to_mcaz_date
 * @property string $report_to_mrcz
 * @property \Cake\I18n\FrozenDate $report_to_mrcz_date
 * @property string $report_to_sponsor
 * @property \Cake\I18n\FrozenDate $report_to_sponsor_date
 * @property string $report_to_irb
 * @property \Cake\I18n\FrozenDate $report_to_irb_date
 * @property string $medical_history
 * @property string $diagnosis
 * @property string $immediate_cause
 * @property string $symptoms
 * @property string $investigations
 * @property string $results
 * @property string $management
 * @property string $outcome
 * @property string $d1_consent_form
 * @property string $d2_brochure
 * @property string $d3_changes_sae
 * @property string $d4_consent_sae
 * @property string $changes_explain
 * @property string $assess_risk
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\AdrLabTest[] $adr_lab_tests
 * @property \App\Model\Entity\AdrListOfDrug[] $adr_list_of_drugs
 * @property \App\Model\Entity\AdrOtherDrug[] $adr_other_drugs
 */
class OriginalAdr extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,       
    ];
}
