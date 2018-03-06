<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReportStage Entity
 *
 * @property int $id
 * @property int $foreign_key
 * @property string $model
 * @property string $stage
 * @property string $description
 * @property \Cake\I18n\FrozenTime $stage_date
 * @property \Cake\I18n\FrozenDate $alt_date
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ReportStage extends Entity
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
        'foreign_key' => true,
        'model' => true,
        'stage' => true,
        'description' => true,
        'stage_date' => true,
        'alt_date' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true
    ];
}
