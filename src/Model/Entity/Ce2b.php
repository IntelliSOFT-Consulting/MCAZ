<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ce2b Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $messageid
 * @property int $assigned_to
 * @property int $assigned_by
 * @property string $e2b_content
 * @property \Cake\I18n\FrozenTime $assigned_date
 * @property bool $signature
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\User $user
 */
class Ce2b extends Entity
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
