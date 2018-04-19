<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meddra Entity
 *
 * @property int $id
 * @property string $terminology
 * @property string $description
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Meddra extends Entity
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
        'terminology' => true,
        'description' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true
    ];
}
