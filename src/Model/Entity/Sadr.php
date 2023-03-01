<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sadr Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $sadr_id
 * @property int $initial_id
 * @property string $messageid
 * @property int $assigned_to
 * @property int $assigned_by
 * @property \Cake\I18n\FrozenTime $assigned_date
 * @property int $province_id
 * @property string $reference_number
 * @property int $designation_id
 * @property string $report_type
 * @property string $name_of_institution
 * @property string $institution_code
 * @property string $institution_name
 * @property string $institution_address
 * @property string $patient_name
 * @property string $ip_no
 * @property string $date_of_birth
 * @property int $year_of_birth
 * @property int $month_of_birth
 * @property int $day_of_birth
 * @property string $age_group
 * @property int $in_utero
 * @property string $gender
 * @property string $weight
 * @property string $height
 * @property string $date_of_onset_of_reaction
 * @property string $date_of_end_of_reaction
 * @property string $duration_type
 * @property string $duration
 * @property string $description_of_reaction
 * @property string $severity
 * @property string $severity_reason
 * @property string $medical_history
 * @property string $past_drug_therapy
 * @property string $outcome
 * @property string $lab_test_results
 * @property string $any_other_information
 * @property string $reporter_name
 * @property string $reporter_email
 * @property string $reporter_phone
 * @property int $submitted
 * @property string $resubmit
 * @property \Cake\I18n\FrozenTime $submitted_date
 * @property string $action_taken
 * @property string $relatedness
 * @property string $status
 * @property bool $signature
 * @property int $emails
 * @property bool $active
 * @property int $device
 * @property int $notified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $action_date
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $copied
 * @property string $user_description
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\OriginalSadr $original_sadr
 * @property \App\Model\Entity\Sadr $initial_sadr
 * @property \App\Model\Entity\ReportStage[] $report_stages
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Upload[] $uploads
 * @property \App\Model\Entity\Reminder[] $reminders
 * @property \App\Model\Entity\Refid[] $refids
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Comment[] $sadr_comments
 * @property \App\Model\Entity\Review[] $committees
 * @property \App\Model\Entity\Notification[] $request_reporters
 * @property \App\Model\Entity\Notification[] $request_evaluators
 * @property \App\Model\Entity\SadrFollowup[] $sadr_followups
 * @property \App\Model\Entity\SadrListOfDrug[] $sadr_list_of_drugs
 * @property \App\Model\Entity\SadrOtherDrug[] $sadr_other_drugs
 * @property \App\Model\Entity\Reaction[] $reactions
 */
class Sadr extends Entity
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
        'user_id' => true,
        'sadr_id' => true,
        'initial_id' => true,
        'messageid' => true,
        'assigned_to' => true,
        'assigned_by' => true,
        'assigned_date' => true,
        'province_id' => true,
        'reference_number' => true,
        'designation_id' => true,
        'report_type' => true,
        'name_of_institution' => true,
        'institution_code' => true,
        'institution_name' => true,
        'institution_address' => true,
        'patient_name' => true,
        'ip_no' => true,
        'date_of_birth' => true,
        'year_of_birth' => true,
        'month_of_birth' => true,
        'day_of_birth' => true,
        'age_group' => true,
        'in_utero' => true,
        'gender' => true,
        'weight' => true,
        'height' => true,
        'date_of_onset_of_reaction' => true,
        'date_of_end_of_reaction' => true,
        'duration_type' => true,
        'duration' => true,
        'description_of_reaction' => true,
        'severity' => true,
        'severity_reason' => true,
        'medical_history' => true,
        'past_drug_therapy' => true,
        'outcome' => true,
        'lab_test_results' => true,
        'any_other_information' => true,
        'reporter_name' => true,
        'reporter_email' => true,
        'reporter_phone' => true,
        'submitted' => true,
        'resubmit' => true,
        'submitted_date' => true,
        'action_taken' => true,
        'relatedness' => true,
        'status' => true,
        'signature' => true,
        'emails' => true,
        'active' => true,
        'device' => true,
        'notified' => true,
        'created' => true,
        'modified' => true,
        'action_date' => true,
        'deleted' => true,
        'copied' => true,
        'user_description' => true,
        'user' => true,
        'designation' => true,
        'province' => true,
        'original_sadr' => true,
        'initial_sadr' => true,
        'report_stages' => true,
        'attachments' => true,
        'uploads' => true,
        'reminders' => true,
        'refids' => true,
        'reviews' => true,
        'sadr_comments' => true,
        'committees' => true,
        'request_reporters' => true,
        'request_evaluators' => true,
        'sadr_followups' => true,
        'sadr_list_of_drugs' => true,
        'sadr_other_drugs' => true,
        'reactions' => true
    ];
}
