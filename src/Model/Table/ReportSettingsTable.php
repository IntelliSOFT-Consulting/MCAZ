<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReportSettings Model
 *
 * @method \App\Model\Entity\ReportSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReportSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReportSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReportSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReportSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReportSetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportSettingsTable extends Table
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

        $this->setTable('report_settings');
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
            ->allowEmpty('adr_year');

        $validator
            ->allowEmpty('adr_month');

        $validator
            ->allowEmpty('adr_inst');

        $validator
            ->allowEmpty('adr_med');

        $validator
            ->allowEmpty('sae_year');

        $validator
            ->allowEmpty('sae_month');

        $validator
            ->allowEmpty('sae_inst');

        $validator
            ->allowEmpty('sae_med');

        $validator
            ->allowEmpty('aefi_year');

        $validator
            ->allowEmpty('aefi_month');

        $validator
            ->allowEmpty('aefi_inst');

        $validator
            ->allowEmpty('aefi_med');

        $validator
            ->allowEmpty('saefi_year');

        $validator
            ->allowEmpty('saefi_month');

        $validator
            ->allowEmpty('saefi_inst');

        $validator
            ->allowEmpty('saefi_med');

        $validator
            ->allowEmpty('adr_province');

        $validator
            ->allowEmpty('sae_province');

        $validator
            ->allowEmpty('aefi_province');

        $validator
            ->allowEmpty('saefi_province');

        $validator
            ->allowEmpty('adr_desig');

        $validator
            ->allowEmpty('sae_desig');

        $validator
            ->allowEmpty('aefi_desig');

        $validator
            ->allowEmpty('saefi_desig');

        return $validator;
    }
}
