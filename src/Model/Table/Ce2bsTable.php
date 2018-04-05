<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Ce2bs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Ce2b get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ce2b newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ce2b[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ce2b|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ce2b patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ce2b[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ce2b findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class Ce2bsTable extends Table
{
    use SoftDeleteTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ce2bs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'e2b_file' => [],
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Ce2bs', 'Attachments.category' => 'attachments'),
        ]);
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
            ->scalar('messageid')
            ->allowEmpty('messageid');

        $validator
            ->scalar('company_name')
            ->notEmpty('company_name', ['message' => 'Company name required']);

        $validator
            ->email('reporter_email')
            ->notEmpty('reporter_email', ['message' => 'Reporter email required']);

        $validator
            ->integer('assigned_by')
            ->allowEmpty('assigned_by');

        $validator
            ->scalar('e2b_content')
            ->allowEmpty('e2b_content');

        $validator
            ->dateTime('assigned_date')
            ->allowEmpty('assigned_date');

        $validator
            ->boolean('signature')
            ->allowEmpty('signature');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
