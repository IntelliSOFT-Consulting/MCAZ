<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuditTrails Model
 *
 * @method \App\Model\Entity\AuditTrail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuditTrail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuditTrail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuditTrail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuditTrail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuditTrail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuditTrail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuditTrailsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('audit_trails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    public function createLogEntry($foreign_key, $model, $message,$ipAddress)
    {
        $log = $this->newEntity([
            'foreign_key' => $foreign_key,
            'model' => $model,
            'message' => $message, 
            'ip' => $ipAddress, 
        ]);

        return $this->save($log);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('model')
            ->maxLength('model', 50)
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->scalar('message')
            ->maxLength('message', 16777215)
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 50)
            ->allowEmpty('ip');

        $validator
            ->scalar('hostname')
            ->maxLength('hostname', 50)
            ->allowEmpty('hostname');

        $validator
            ->scalar('uri')
            ->maxLength('uri', 16777215)
            ->allowEmpty('uri');

        $validator
            ->scalar('refer')
            ->maxLength('refer', 255)
            ->allowEmpty('refer');

        $validator
            ->scalar('user_agent')
            ->maxLength('user_agent', 255)
            ->allowEmpty('user_agent');

        return $validator;
    }
}
