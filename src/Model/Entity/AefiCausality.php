<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AefiCausality Entity
 *
 * @property int $id
 * @property int $aefi_id
 * @property int $saefi_id
 * @property string $prescribing_error
 * @property string $prescribing_error_specify
 * @property string $vaccine_unsterile
 * @property string $vaccine_unsterile_specify
 * @property string $vaccine_condition
 * @property string $vaccine_condition_specify
 * @property string $vaccine_reconstitution
 * @property string $vaccine_reconstitution_specify
 * @property string $vaccine_handling
 * @property string $vaccine_handling_specify
 * @property string $vaccine_administered
 * @property string $vaccine_administered_specify
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Aefi $aefi
 * @property \App\Model\Entity\Saefi $saefi
 */
class AefiCausality extends Entity
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
