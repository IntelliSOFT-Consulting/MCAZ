<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dose Entity
 *
 * @property int $id
 * @property string $value
 * @property string $icsr_code
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SadrListOfDrug[] $sadr_list_of_drugs
 */
class Dose extends Entity
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
        'value' => true,
        'icsr_code' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'sadr_list_of_drugs' => true
    ];
}
