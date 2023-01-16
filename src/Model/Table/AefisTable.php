<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Aefis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property |\Cake\ORM\Association\HasMany $AefiListOfVaccines
 *
 * @method \App\Model\Entity\Aefi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aefi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aefi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aefi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aefi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aefi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefisTable extends Table
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

        $this->setTable('aefis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Duplicatable.Duplicatable', [
            'contain' => [
                'AefiListOfVaccines', 'Uploads', 'AefiCausalities', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators',
                'AefiCausalities.Users', 'AefiComments', 'AefiComments.Attachments',
                'Committees', 'Committees.Users', 'Committees.AefiComments', 'Committees.AefiComments.Attachments',
                'ReportStages',
                'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments',
                'OriginalAefis', 'OriginalAefis.AefiListOfVaccines', 'OriginalAefis.Attachments',
                'InitialAefis', 'InitialAefis.AefiListOfVaccines', 'InitialAefis.Attachments',
                 'AefiReactions'
            ],
            'remove' => ['created', 'modified'],
            'set' => [
                'copied' => 'new copy'
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
        $this->belongsTo('OriginalAefis', [
            'foreignKey' => 'aefi_id',
            'dependent' => true,
            'conditions' => array('OriginalAefis.copied' => 'old copy')
        ]);
        $this->belongsTo('InitialAefis', [
            'className' => 'Aefis',
            'foreignKey' => 'initial_id',
            'dependent' => true,
            'conditions' => array('InitialAefis.report_type' => 'Initial')
        ]);
        $this->hasMany('AefiListOfVaccines', [
            'foreignKey' => 'aefi_id'
        ]);
        $this->hasMany('AefiListOfDiluents', [
            'foreignKey' => 'aefi_id'
        ]);
        $this->hasMany('AefiCausalities', [
            'foreignKey' => 'aefi_id'
        ]);


        $this->hasMany('AefiComments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('AefiComments.model' => 'Aefis'),
        ]);
        $this->hasMany('ReportStages', [
            'className' => 'ReportStages',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ReportStages.model' => 'Aefis'),
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Aefis', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Uploads', [
            'className' => 'Uploads',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Uploads.model' => 'Aefis', 'Uploads.category' => 'attachments'),
        ]);
        $this->hasMany('Reminders', [
            'className' => 'Reminders',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminders.model' => 'Aefis'),
        ]);

        $this->hasMany('Refids', [
            'className' => 'Refids',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Refids.model' => 'Aefis'),
        ]);

        $this->hasMany('Reviews', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reviews.model' => 'Aefis', 'Reviews.category' => 'causality'),
        ]);
        $this->hasMany('Committees', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Committees.model' => 'Aefis', 'Committees.category' => 'committee'),
        ]);
        $this->hasMany('RequestReporters', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestReporters.model' => 'Aefis', 'RequestReporters.type' => 'request_reporter_info'),
        ]);
        $this->hasMany('RequestEvaluators', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestEvaluators.model' => 'Aefis', 'RequestEvaluators.type' => 'request_evaluator_info'),
        ]);

        $this->hasMany('AefiFollowups', [
            'foreignKey' => 'aefi_id',
            'dependent' => true,
            'conditions' => array('AefiFollowups.report_type' => 'FollowUp'),
        ]);

        // Added section for Reactions
        $this->hasMany('AefiReactions', [
            'foreignKey' => 'aefi_id'
        ]);
    }

    /**
     * @return \Search\Manager
     */
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->value('status')
            ->like('reference_number')
            ->like('name_of_vaccination_center')
            ->compare('created_start', ['operator' => '>=', 'field' => ['created']])
            ->compare('created_end', ['operator' => '<=', 'field' => ['created']])
            ->like('reporter_institution')
            ->boolean('ae_severe_local_reaction')
            ->boolean('ae_seizures')
            ->boolean('ae_abscess')
            ->boolean('ae_sepsis')
            ->boolean('ae_encephalopathy')
            ->boolean('ae_toxic_shock')
            ->boolean('ae_thrombocytopenia')
            ->boolean('ae_anaphylaxis')
            ->boolean('ae_fever')
            ->boolean('ae_3days')
            ->boolean('ae_febrile')
            ->boolean('ae_beyond_joint')
            ->boolean('ae_afebrile')
            ->like('description_of_reaction')
            ->value('investigation_needed')
            ->value('serious')
            ->value('outcome')
            ->value('serious_yes')
            ->value('province_id')
            ->like('reporter_name')
            ->like('reporter_email')
            ->value('designation_id')
            ->add('vaccine_name', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    $vaccine_name = $args['vaccine_name'];
                    $query->matching('AefiListOfVaccines', function ($q) use ($vaccine_name) {
                        return $q->where(['AefiListOfVaccines.vaccine_name LIKE' => '%' . $vaccine_name . '%']);
                    });
                }
            ])
            ->like('patient_name', ['field' => ['patient_name', 'patient_surname']]);

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
            ->scalar('patient_name')
            ->notEmpty('patient_name', ['message' => 'Patient name required']);

        $validator
            ->scalar('patient_surname')
            ->notEmpty('patient_surname', ['message' => 'Patient surname required']);

        $validator
            ->scalar('patient_address')
            ->notEmpty('patient_address', ['message' => 'Patient address required']);

        $validator
            ->scalar('gender')
            ->notEmpty('gender', ['message' => 'Gender required']);

        $validator
            ->scalar('description_of_reaction')
            ->notEmpty('description_of_reaction', ['message' => 'Description of reaction required']);

        $validator
            ->scalar('dosage')
            ->notEmpty('dosage', ['message' => 'Dosage required']);

        $validator
            ->scalar('designation_id')
            ->notEmpty('designation_id', ['message' => 'Designation required']);


        $validator->allowEmpty('suspected_drug', function ($context) {
            // return !$context['data']['is_taxable'];
            if (isset($context['data']['aefi_list_of_vaccines'])) {
                foreach ($context['data']['aefi_list_of_vaccines'] as $val) {
                    if ($val['suspected_drug']) {
                        return true;
                    }
                }
            }
            return false;
        }, ['message' => 'Kindly select at least one suspected vaccine']);

        //Age at onset values
        $validator
            ->scalar('age_at_onset_years')
            ->allowEmpty('age_at_onset_years')
            ->add('age_at_onset_years', 'year-range', [
                'rule' => function ($value, $context) {
                    return (($value > 0 && $value < 140));
                }, 'message' => 'Year at onset must be between 1 and 140'
            ]);

        $validator
            ->allowEmpty('age_at_onset_months')
            ->add('age_at_onset_months', 'month-range', [
                'rule' => function ($value, $context) {
                    return $value > 0 && $value < 1280;
                }, 'message' => 'Months at onset must be between than 1 and 1280'
            ]);

        $validator
            ->allowEmpty('age_at_onset_days')
            ->add('age_at_onset_days', 'days-range', [
                'rule' => function ($value, $context) {
                    return $value > 0 && $value < 613200;
                }, 'message' => 'Days at onset must be between 1 and 613200'
            ]);

        //date of birth or onset or age_group
        $validator
            ->allowEmpty('date_of_birth')
            ->add('date_of_birth', 'dob-or-door', [
                'rule' => function ($value, $context) {
                    $dob = ($value == '--') ? null : $value;
                    if (
                        !$dob && empty($context['data']['age_at_onset_years'])
                        && empty($context['data']['age_at_onset_months'])
                        && empty($context['data']['age_at_onset_days'])
                        && empty($context['data']['age_group'])
                    ) return false;
                    if ($dob && !empty($context['data']['age_at_onset_years'])) return false;
                    return true;
                }, 'message' => 'Date of birth OR age at onset required'
            ])
            //date of birth: year of birth required
            ->add('date_of_birth', 'dob-select-year', [
                'rule' => function ($value, $context) {
                    $dob = (($value)) ?? '--';
                    $a = explode('-', $dob);
                    if ($value != '--')
                        if ($a[2] < (date('Y') - 120) || $a[2] > date('Y')) return false;
                    return true;
                }, 'message' => 'Year of birth required'
            ]);

        $validator->add('date_of_birth', 'dob-less-vaccine-dates', [
            'rule' => function ($value, $context) {
                //Normalize dob and door
                $dob = (($value)) ?? '--';
                $a = explode('-', $dob);
                $a[0] = (empty($a[0])) ? '01' : $a[0];
                $a[1] = (empty($a[1])) ? '01' : $a[1];
                $dob = implode('-', $a);

                if (isset($context['data']['aefi_list_of_vaccines'])) {
                    foreach ($context['data']['aefi_list_of_vaccines'] as $val) {
                        if (strtotime($dob) > strtotime($val['vaccination_date'])) return false;
                    }
                }

                return true;
            }, 'message' => 'Date of birth must less than vaccine date'
        ]);

        $validator
            ->scalar('reporter_name')
            ->notEmpty('reporter_name', ['message' => 'Reporter name required']);

        $validator
            ->scalar('reporter_email')
            ->notEmpty('reporter_email', ['message' => 'Reporter email required']);

        $validator
            ->allowEmpty('district_receive_date')
            ->add('district_receive_date', 'drd-or-dip', [
                'rule' => function ($value, $context) {
                    if (isset($context['data']['investigation_date'])) {
                        if (strtotime($value) > strtotime($context['data']['investigation_date'])) return false;
                    }
                    return true;
                }, 'message' => 'Date report received at district level must be before date investigation planned'
            ]);

        $validator
            ->allowEmpty('investigation_date')
            ->add('investigation_date', 'drd-or-dip', [
                'rule' => function ($value, $context) {
                    if (isset($context['data']['district_receive_date'])) {
                        if (strtotime($value) < strtotime($context['data']['district_receive_date'])) return false;
                    }
                    return true;
                }, 'message' => 'Date investigation planned must be after date report receieved'
            ]);

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
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));

        return $rules;
    }
}
