<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AefiCausalities Model
 *
 * @property \App\Model\Table\AefisTable|\Cake\ORM\Association\BelongsTo $Aefis
 * @property \App\Model\Table\SaefisTable|\Cake\ORM\Association\BelongsTo $Saefis
 *
 * @method \App\Model\Entity\AefiCausality get($primaryKey, $options = [])
 * @method \App\Model\Entity\AefiCausality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AefiCausality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AefiCausality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AefiCausality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AefiCausality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AefiCausality findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefiCausalitiesTable extends Table
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

        $this->setTable('aefi_causalities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Aefis', [
            'foreignKey' => 'aefi_id'
        ]);
        $this->belongsTo('Saefis', [
            'foreignKey' => 'saefi_id'
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
            ->scalar('prescribing_error')
            ->allowEmpty('prescribing_error');

        $validator
            ->scalar('prescribing_error_specify')
            ->allowEmpty('prescribing_error_specify');

        $validator
            ->scalar('vaccine_unsterile')
            ->allowEmpty('vaccine_unsterile');

        $validator
            ->scalar('vaccine_unsterile_specify')
            ->allowEmpty('vaccine_unsterile_specify');

        $validator
            ->scalar('vaccine_condition')
            ->allowEmpty('vaccine_condition');

        $validator
            ->scalar('vaccine_condition_specify')
            ->allowEmpty('vaccine_condition_specify');

        $validator
            ->scalar('vaccine_reconstitution')
            ->allowEmpty('vaccine_reconstitution');

        $validator
            ->scalar('vaccine_reconstitution_specify')
            ->allowEmpty('vaccine_reconstitution_specify');

        $validator
            ->scalar('vaccine_handling')
            ->allowEmpty('vaccine_handling');

        $validator
            ->scalar('vaccine_handling_specify')
            ->allowEmpty('vaccine_handling_specify');

        $validator
            ->scalar('vaccine_administered')
            ->allowEmpty('vaccine_administered');

        $validator
            ->scalar('vaccine_administered_specify')
            ->allowEmpty('vaccine_administered_specify');

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
        $rules->add($rules->existsIn(['aefi_id'], 'Aefis'));
        $rules->add($rules->existsIn(['saefi_id'], 'Saefis'));

        return $rules;
    }
}
