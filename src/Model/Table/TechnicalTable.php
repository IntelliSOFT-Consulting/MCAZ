<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Technical Model
 *
 * @method \App\Model\Entity\Technical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Technical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Technical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Technical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Technical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Technical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Technical findOrCreate($search, callable $callback = null, $options = [])
 */
class TechnicalTable extends Table
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

        $this->setTable('technical');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
    }


    public function searchManager()
    {
        # code...
        $searchManager = $this->behaviors()->Search->searchManager();
        // Define the field names and conditions
        $searchManager
            ->value('name')
            ->like('description');

        return $searchManager;
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        return $validator;
    }
}
