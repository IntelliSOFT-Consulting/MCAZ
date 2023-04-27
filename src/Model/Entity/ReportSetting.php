<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReportSetting Entity
 *
 * @property int $id
 * @property int $adr_year
 * @property int $adr_month
 * @property int $adr_inst
 * @property int $adr_med
 * @property int $sae_year
 * @property int $sae_month
 * @property int $sae_inst
 * @property int $sae_med
 * @property int $aefi_year
 * @property int $aefi_month
 * @property int $aefi_inst
 * @property int $aefi_med
 * @property int $saefi_year
 * @property int $saefi_month
 * @property int $saefi_inst
 * @property int $saefi_med
 * @property int $adr_province
 * @property int $sae_province
 * @property int $aefi_province
 * @property int $saefi_province
 * @property int $adr_desig
 * @property int $sae_desig
 * @property int $aefi_desig
 * @property int $saefi_desig
 * @property \Cake\I18n\FrozenTime $created
 */
class ReportSetting extends Entity
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
        'adr_year' => true,
        'adr_month' => true,
        'adr_inst' => true,
        'adr_med' => true,
        'sae_year' => true,
        'sae_month' => true,
        'sae_inst' => true,
        'sae_med' => true,
        'aefi_year' => true,
        'aefi_month' => true,
        'aefi_inst' => true,
        'aefi_med' => true,
        'saefi_year' => true,
        'saefi_month' => true,
        'saefi_inst' => true,
        'saefi_med' => true,
        'adr_province' => true,
        'sae_province' => true,
        'aefi_province' => true,
        'saefi_province' => true,
        'adr_desig' => true,
        'sae_desig' => true,
        'aefi_desig' => true,
        'saefi_desig' => true,
        'created' => true
    ];
}
