<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * County Entity
 *
 * @property int $id
 * @property string $county_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Pqmp[] $pqmps
 * @property \App\Model\Entity\SadrFollowup[] $sadr_followups
 * @property \App\Model\Entity\Sadr[] $sadrs
 * @property \App\Model\Entity\SubCounty[] $sub_counties
 * @property \App\Model\Entity\User[] $users
 */
class County extends Entity
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
        'county_name' => true,
        'created' => true,
        'modified' => true,
        'pqmps' => true,
        'sadr_followups' => true,
        'sadrs' => true,
        'sub_counties' => true,
        'users' => true
    ];
}
