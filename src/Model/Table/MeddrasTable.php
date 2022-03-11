<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meddras Model
 *
 * @method \App\Model\Entity\Meddra get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meddra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meddra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meddra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meddra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meddra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meddra findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeddrasTable extends Table
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

        $this->setTable('meddras');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
    }

    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->like('name', ['field' => ['terminology']]);

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
            ->scalar('terminology')
            ->requirePresence('terminology', 'create')
            ->notEmpty('terminology');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        /*$validator
            ->dateTime('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');*/

        return $validator;
    }
}
