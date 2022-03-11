<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SadrFollowups Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\SadrsTable|\Cake\ORM\Association\BelongsTo $Sadrs
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany $Feedbacks
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\SadrListOfDrugsTable|\Cake\ORM\Association\HasMany $SadrListOfDrugs
 *
 * @method \App\Model\Entity\SadrFollowup get($primaryKey, $options = [])
 * @method \App\Model\Entity\SadrFollowup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SadrFollowup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SadrFollowup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SadrFollowup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SadrFollowup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SadrFollowup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SadrFollowupsTable extends Table
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

        $this->setTable('sadrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Duplicatable.Duplicatable', [
            'contain' => ['SadrListOfDrugs', 'Attachments'],
            'remove' =>  ['created', 'modified', 'sadr_list_of_drugs.created',  'attachments.created', 'messageid', 'copied',
                          'sadr_list_of_drugs.modified',  'attachments.modified'],
            'set' => [
                'report_type' => 'FollowUp',
                'status' => 'Unsubmitted',
                'submitted' => 0
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Sadrs', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Reviews', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reviews.model' => 'Sadrs'),
        ]);
        $this->hasMany('RequestReporters', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestReporters.model' => 'Sadrs', 'RequestReporters.type' => 'request_reporter_info'),
        ]);
        $this->hasMany('SadrListOfDrugs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->hasMany('SadrOtherDrugs', [
            'foreignKey' => 'sadr_id'
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
            ->scalar('description_of_reaction')
            ->allowEmpty('description_of_reaction');

        $validator
            ->scalar('outcome')
            ->allowEmpty('outcome');

        $validator
            ->scalar('reporter_email')
            ->allowEmpty('reporter_email');

        $validator
            ->scalar('reporter_phone')
            ->allowEmpty('reporter_phone');

        $validator
            ->allowEmpty('submitted');

        $validator
            ->allowEmpty('emails');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('device');

        $validator
            ->allowEmpty('notified');

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
        // $rules->add($rules->existsIn(['county_id'], 'Counties'));
        // $rules->add($rules->existsIn(['sadr_id'], 'Sadrs'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));

        return $rules;
    }
}
