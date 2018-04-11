<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adr Entity
 */
class Adr extends Entity
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
    
/*    protected function _getDateOfBirth($dob)
    {  
        $a = explode('-', (empty($dob) ? '--' : $dob));
        return array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
    }*/

}
