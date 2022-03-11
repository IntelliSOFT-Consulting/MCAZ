<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReportStages Model
 *
 * @method \App\Model\Entity\ReportStage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReportStage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReportStage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReportStage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportStage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReportStage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReportStage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportStagesTable extends Table
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

        $this->setTable('report_stages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('foreign_key')
            ->allowEmpty('foreign_key');

        $validator
            ->scalar('model')
            ->allowEmpty('model');

        $validator
            ->scalar('stage')
            ->allowEmpty('stage');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->dateTime('stage_date')
            ->allowEmpty('stage_date');

        $validator
            ->date('alt_date')
            ->allowEmpty('alt_date');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }
}
