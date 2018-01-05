<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Facility Entity
 *
 * @property string $facility_code
 * @property string $dhis2_code
 * @property string $district
 * @property string $facility_name
 * @property string $longitude
 * @property string $latitude
 */
class Facility extends Entity
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
        'facility_code' => true,
        'dhis2_code' => true,
        'district' => true,
        'facility_name' => true,
        'longitude' => true,
        'latitude' => true
    ];
}
