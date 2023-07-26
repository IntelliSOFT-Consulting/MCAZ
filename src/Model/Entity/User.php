<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property int $designation_id
 * @property int $county_id
 * @property string $username
 * @property string $password
 * @property string $confirm_password
 * @property string $name
 * @property string $email
 * @property int $group_id
 * @property string $name_of_institution
 * @property string $institution_address
 * @property string $institution_code
 * @property string $institution_contact
 * @property string $ward
 * @property string $phone_no
 * @property int $forgot_password
 * @property int $initial_email
 * @property bool $is_active
 * @property bool $is_admin
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Pqmp[] $pqmps
 * @property \App\Model\Entity\SadrFollowup[] $sadr_followups
 * @property \App\Model\Entity\Sadr[] $sadrs
 */
class User extends Entity
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
        // 'password' => false,
        // 'confirm_password' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'confirm_password'
    ];

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $groupId = $this->group_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $groupId = $user->group_id;
        }
        if (!$groupId) {
            return null;
        }
        return ['Groups' => ['id' => $groupId]];
    }
    public function __construct(array $properties = [], array $options = [])
    {
        parent::__construct($properties, $options);

        // Store the original data when the entity is first created
        $this->originalData = $this->toArray();
    }

    // Override the `__set` method to track changes and log them
    public function __set($property, $value)
    {
        // Save the current IP address
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $columns = $usersTable->getSchema()->columns();
        // Check if the property is a field that you want to track (in this case, any column in the table)
        if (in_array($property, $columns)) {
            // Check if the property has been changed
            if ($this->$property !== $value) {
              // Create a new log entry
              $log = $this->user_logs[] = new AuditTrail([
                  'model' => 'User',
                  'column' => $property,
                  'foreign_key' =>'1', 
                  'model' => 'Users',
                  'message' =>'Change of User Details',
                  'old_value' => $this->originalData[$property] ?? null,
                  'new_value' => $value,
                  'ip' => $ipAddress,
              ]);
              
          }
      }

      parent::__set($property, $value);
  }
}


