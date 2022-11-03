<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AefiReaction Entity
 *
 * @property int $id
 * @property int $aefi_id
 * @property string $reaction_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Aefi $aefi
 */
class AefiReaction extends Entity
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
        'aefi_id' => true,
        'reaction_name' => true,
        'created' => true,
        'modified' => true,
        'aefi' => true
    ];
}
