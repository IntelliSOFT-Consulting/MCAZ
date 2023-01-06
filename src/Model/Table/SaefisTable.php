<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Saefis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\SaefiListOfVaccinesTable|\Cake\ORM\Association\HasMany $SaefiListOfVaccines
 *
 * @method \App\Model\Entity\Saefi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Saefi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Saefi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Saefi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saefi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Saefi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Saefi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaefisTable extends Table
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

        $this->setTable('saefis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        // add Duplicatable behavior
        $this->addBehavior('Duplicatable.Duplicatable', [
            'contain' => [
                'SaefiListOfVaccines', 'AefiListOfVaccines', 'Uploads', 'RequestReporters', 'RequestEvaluators', 'Committees',
                'SaefiComments', 'SaefiComments.Attachments',
                'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments',
                'ReportStages', 'AefiCausalities', 'AefiCausalities.Users', 'Reports','SaefiReactions',
                'OriginalSaefis', 'OriginalSaefis.SaefiListOfVaccines', 'OriginalSaefis.Attachments', 'OriginalSaefis.Reports','OriginalSaefis.SaefiReactions',
                'InitialSaefis', 'InitialSaefis.SaefiListOfVaccines', 'InitialSaefis.Attachments', 'InitialSaefis.Reports','InitialSaefis.SaefiReactions'
            ],
            'remove' => [
                'created', 'modified', 'saefi_list_of_vaccines.created',  'attachments.created', 'reports.created',
                'saefi_list_of_vaccines.modified',  'attachments.modified', 'reports.modified'
            ],
            // mark invoice as copied
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
        $this->belongsTo('OriginalSaefis', [
            'className' => 'Saefis',
            'foreignKey' => 'saefi_id',
            'dependent' => true,
            'conditions' => array('OriginalSaefis.copied' => 'old copy')
        ]);
        $this->belongsTo('InitialSaefis', [
            'className' => 'Saefis',
            'foreignKey' => 'initial_id',
            'dependent' => true,
            'conditions' => array('InitialSaefis.report_type' => 'Initial')
        ]);
        
        $this->hasMany('SaefiComments', [
            'className' => 'Comments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('SaefiComments.model' => 'Saefis'),
        ]);

        $this->hasMany('SaefiListOfVaccines', [
            'foreignKey' => 'saefi_id'
        ]);
        $this->hasMany('AefiListOfVaccines', [
            'foreignKey' => 'saefi_id'
        ]);
        $this->hasMany('AefiCausalities', [
            'foreignKey' => 'saefi_id'
        ]);

        $this->hasMany('ReportStages', [
            'className' => 'ReportStages',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ReportStages.model' => 'Saefis'),
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Saefis', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Uploads', [
            'className' => 'Uploads',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Uploads.model' => 'Saefis', 'Uploads.category' => 'attachments'),
        ]);
        $this->hasMany('Reports', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reports.model' => 'Saefis', 'Reports.category' => 'reports'),
        ]);
        $this->hasMany('Reminders', [
            'className' => 'Reminders',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminders.model' => 'Saefis'),
        ]);

        $this->hasMany('Refids', [
            'className' => 'Refids',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Refids.model' => 'Saefis'),
        ]);

        $this->hasMany('Reviews', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reviews.model' => 'Saefis', 'Reviews.category' => 'causality'),
        ]);
        $this->hasMany('Committees', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Committees.model' => 'Saefis', 'Committees.category' => 'committee'),
        ]);
        $this->hasMany('RequestReporters', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestReporters.model' => 'Saefis', 'RequestReporters.type' => 'request_reporter_info'),
        ]);
        $this->hasMany('RequestEvaluators', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestEvaluators.model' => 'Saefis', 'RequestEvaluators.type' => 'request_evaluator_info'),
        ]);
        // Added section for Reactions
        $this->hasMany('SaefiReactions', [
            'foreignKey' => 'saefi_id'
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
            ->compare('created_start', ['operator' => '>=', 'field' => ['created']])
            ->compare('created_end', ['operator' => '<=', 'field' => ['created']])
            ->compare('report_date_start', ['operator' => '>=', 'field' => ['report_date']])
            ->compare('report_date_end', ['operator' => '<=', 'field' => ['report_date']])
            ->value('status_on_date')
            ->value('pregnant')
            ->value('infant')
            ->value('delivery_procedure')
            ->like('reporter_name')
            ->like('mobile')
            ->like('reporter_email')
            ->value('designation_id')
            ->like('patient_name');

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
            ->scalar('name_of_vaccination_site')
            ->notEmpty('name_of_vaccination_site', ['message' => 'Name of vaccination site required']);

        $validator
            ->scalar('designation_id')
            ->notEmpty('designation_id', ['message' => 'Designation required']);

        $validator
            ->scalar('reporter_name')
            ->notEmpty('reporter_name', ['message' => 'Reporter name required']);

        $validator
            ->scalar('patient_name')
            ->notEmpty('patient_name', ['message' => 'Patient name required']);

        $validator
            ->scalar('gender')
            ->notEmpty('gender', ['message' => 'Gender required']);

        $validator
            ->scalar('signs_symptoms')
            ->notEmpty('signs_symptoms', ['message' => 'Signs and symptoms required']);

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

        //date of birth or onset
        $validator
            ->allowEmpty('date_of_birth')
            ->add('date_of_birth', 'dob-or-door', [
                'rule' => function ($value, $context) {
                    $dob = ($value == '--') ? null : $value;
                    if (!$dob && empty($context['data']['age_at_onset_years'])) return false;
                    if ($dob && !empty($context['data']['age_at_onset_years'])) return false;
                    return true;
                }, 'message' => 'Date of birth OR age at onset required'
            ]);

        $validator->add('date_of_birth', 'dob-less-vaccine-dates', [
            'rule' => function ($value, $context) {
                if (isset($context['data']['aefi_list_of_vaccines'])) {
                    foreach ($context['data']['aefi_list_of_vaccines'] as $val) {
                        if (strtotime($value) > strtotime($val['vaccination_date'])) return false;
                    }
                }

                return true;
            }, 'message' => 'Date of birth must less than vaccine date'
        ]);

        $validator
            ->allowEmpty('report_date')
            ->add('report_date', 'drd-or-dip', [
                'rule' => function ($value, $context) {
                    if (isset($context['data']['start_date'])) {
                        if (strtotime($value) > strtotime($context['data']['start_date'])) return false;
                    }
                    return true;
                }, 'message' => 'Date AEFI reported must be before date investigation started'
            ]);

        $validator
            ->allowEmpty('start_date')
            ->add('start_date', 'drd-or-dip', [
                'rule' => function ($value, $context) {
                    if (isset($context['data']['report_date'])) {
                        if (strtotime($value) < strtotime($context['data']['report_date'])) return false;
                    }
                    return true;
                }, 'message' => 'Date investigation started must be after date AEFI reported'
            ]);

        $validator
            ->allowEmpty('symptom_date')
            ->add('symptom_date', 'drd-or-dip', [
                'rule' => function ($value, $context) {
                    if (isset($context['data']['complete_date'])) {
                        if (strtotime($value) > strtotime($context['data']['complete_date'])) return false;
                    }
                    return true;
                }, 'message' => 'Date and time of 1st key symptom should be before the date and time the report is completed'
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
