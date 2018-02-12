<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facilities Model
 *
 * @method \App\Model\Entity\Facility get($primaryKey, $options = [])
 * @method \App\Model\Entity\Facility newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Facility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Facility|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Facility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Facility[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Facility findOrCreate($search, callable $callback = null, $options = [])
 */
class FacilitiesTable extends Table
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

        $this->setTable('facilities');
        
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
            ->scalar('facility_code')
            ->allowEmpty('facility_code');

        $validator
            ->scalar('dhis2_code')
            ->allowEmpty('dhis2_code');

        $validator
            ->scalar('district')
            ->allowEmpty('district');

        $validator
            ->scalar('facility_name')
            ->allowEmpty('facility_name');

        $validator
            ->scalar('longitude')
            ->allowEmpty('longitude');

        $validator
            ->scalar('latitude')
            ->allowEmpty('latitude');

        return $validator;
    }

    public function findFacilityName(Query $query, array $options)
    {
        $term = $options['term'];
        return $query->where(['author_id' => $term]);
    }
}
