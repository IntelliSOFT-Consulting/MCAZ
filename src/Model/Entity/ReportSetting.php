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
        'created' => true
    ];
}
