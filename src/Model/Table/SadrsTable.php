<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Sadrs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\SubCountiesTable|\Cake\ORM\Association\BelongsTo $SubCounties
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\VigiflowsTable|\Cake\ORM\Association\BelongsTo $Vigiflows
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany $Feedbacks
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\SadrFollowupsTable|\Cake\ORM\Association\HasMany $SadrFollowups
 * @property \App\Model\Table\SadrListOfDrugsTable|\Cake\ORM\Association\HasMany $SadrListOfDrugs
 *
 * @method \App\Model\Entity\Sadr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sadr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sadr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sadr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sadr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sadr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sadr findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SadrsTable extends Table
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

        $this->setTable('sadrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');        
        $this->addBehavior('Search.Search');
        $this->addBehavior('Duplicatable.Duplicatable', [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators',
                          'Reviews', 'Reviews.Users', 'Reviews.SadrComments', 'Reviews.SadrComments.Attachments',  
                          'Committees', 'Committees.Users', 'Committees.SadrComments', 'Committees.SadrComments.Attachments', 
                          'ReportStages', 'Reactions',
                          'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments',
                          'OriginalSadrs', 'OriginalSadrs.SadrListOfDrugs', 'OriginalSadrs.Attachments',
                          ],
            'remove' =>  ['created', 'modified', 'sadr_list_of_drugs.created',  'reactions.created',  'attachments.created',
                          'sadr_list_of_drugs.modified',  'reactions.modified',  'attachments.modified'],
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
        $this->belongsTo('OriginalSadrs', [
            'foreignKey' => 'sadr_id',
            'dependent' => true,
            'conditions' => array('OriginalSadrs.copied' => 'old copy')
        ]);
        $this->hasMany('ReportStages', [
            'className' => 'ReportStages',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ReportStages.model' => 'Sadrs'),
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Sadrs', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Reminders', [
            'className' => 'Reminders',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminders.model' => 'Sadrs'),
        ]);
        $this->hasMany('Refids', [
            'className' => 'Refids',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Refids.model' => 'Sadrs'),
        ]);
        $this->hasMany('Reviews', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            // 'bindingKey' => 'id',
            'dependent' => true,
            'conditions' => array('Reviews.model' => 'Sadrs', 'Reviews.category' => 'causality'),
        ]);
        $this->hasMany('Committees', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Committees.model' => 'Sadrs', 'Committees.category' => 'committee'),
        ]);
        $this->hasMany('RequestReporters', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestReporters.model' => 'Sadrs', 'RequestReporters.type' => 'request_reporter_info'),
        ]);
        $this->hasMany('RequestEvaluators', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestEvaluators.model' => 'Sadrs', 'RequestEvaluators.type' => 'request_evaluator_info'),
        ]);
        // $this->hasMany('Feedbacks', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        // $this->hasMany('Messages', [
        //     'foreignKey' => 'sadr_id'
        // ]);
        $this->hasMany('SadrFollowups', [
            'foreignKey' => 'sadr_id',
            'dependent' => true,
            'conditions' => array('SadrFollowups.report_type' => 'FollowUp'),
        ]);
        $this->hasMany('SadrListOfDrugs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->hasMany('SadrOtherDrugs', [
            'foreignKey' => 'sadr_id'
        ]);
        $this->hasMany('Reactions', [
            'foreignKey' => 'sadr_id'
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
            ->like('name_of_institution')
            ->compare('created_start', ['operator' => '>=', 'field' => ['created']])
            ->compare('created_end', ['operator' => '<=', 'field' => ['created']])
            ->like('description_of_reaction')
            ->value('severity_reason')
            ->value('severity')
            ->value('outcome')
            ->value('action_taken')
            ->value('relatedness')
            ->value('province_id')
            ->like('reporter_name')
            ->like('reporter_email')
            ->value('designation_id')
            ->add('drug_name', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    $drug_name = $args['drug_name'];
                    $query->matching('SadrListOfDrugs', function ($q) use($drug_name) {
                        return $q->where(['SadrListOfDrugs.drug_name LIKE' => '%'.$drug_name.'%']);
                    });
                }
            ])
            // ->Finder('drug_name', ['finder' => 'byDrugName'])
            ->like('patient_name');

        return $searchManager;
    }

    public function findByDrugName(Query $query, array $options)
    {
        $drug_name = $options['drug_name'];
        $query->matching('SadrListOfDrugs', function ($q) use($drug_name) {
            return $q->where(['SadrListOfDrugs.drug_name LIKE' => '%'.$drug_name.'%']);
        });
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
            ->scalar('name_of_institution')
            ->notEmpty('name_of_institution', ['message' => 'Please enter the institution name']);

        $validator
            ->scalar('institution_code')
            ->notEmpty('institution_code', ['message' => 'Please enter the institution code']);

        /*$validator
            ->allowEmpty('suspected_drugy')
            ->add('suspected_drugy', 'custom', [
            'rule' => function ($value, $context) {
                // Custom logic that returns true/false
                if (isset($context['data']['sadr_list_of_drugs'])) {
                    foreach ($context['data']['sadr_list_of_drugs'] as $val){
                        if ($val['suspected_drug'] == 1) {
                            //$this->data['Sadr']['list'] = 1;
                            $context['data']['suspected_drugy'] = 1;
                            return true;
                        }
                    }
                }
                return false;
            },
            'message' => 'Kindly select at least one suspected drug'
        ]);*/

        $validator->allowEmpty('suspected_drugy', function ($context) {
            // return !$context['data']['is_taxable'];
            if (isset($context['data']['sadr_list_of_drugs'])) {
                foreach ($context['data']['sadr_list_of_drugs'] as $val){
                    if ($val['suspected_drug']) {
                        //$this->data['Sadr']['list'] = 1;
                        $context['data']['suspected_drugy'] = 1;
                        return true;
                    }
                }
            }
            return false;
        }, ['message' => 'Kindly select at least one suspected drug']);

        $validator
            ->scalar('patient_name')
            ->notEmpty('patient_name', ['message' => 'Patient Initials required!']);   

        //Age at onset values
        $validator
            ->scalar('year_of_birth')
            ->allowEmpty('year_of_birth')
            ->add('year_of_birth', 'year-range', [
                'rule' => function ($value, $context) { 
                    return (($value > 0 && $value < 140));
                }, 'message' => 'Year at onset must be between 1 and 140']);
            
        $validator
            ->allowEmpty('month_of_birth')
            ->add('month_of_birth', 'month-range', [
                'rule' => function ($value, $context) {
                    return $value > 0 && $value < 1280;
                }, 'message' => 'Months at onset must be between than 1 and 1280']);

        $validator
            ->allowEmpty('day_of_birth')
            ->add('day_of_birth', 'days-range', [
                'rule' => function ($value, $context) {
                    return $value > 0 && $value < 613200;
            }, 'message' => 'Days at onset must be between 1 and 613200']);

        //date of birth or onset
        $validator
            ->allowEmpty('date_of_birth')
            ->add('date_of_birth', 'dob-or-door', [
                'rule' => function ($value, $context) {                    
                    $dob = ($value == '--') ? null : $value;
                    if(!$dob && empty($context['data']['year_of_birth']) 
                             && empty($context['data']['month_of_birth']) 
                             && empty($context['data']['day_of_birth'])) return false;
                    if($dob && !empty($context['data']['year_of_birth'])) return false;
                    return true;
            }, 'message' => 'Date of birth OR age at onset required'
            ])
            //date of birth: year of birth required
            ->add('date_of_birth', 'dob-select-year', [
               'rule' => function ($value, $context) {          
                $dob = (($value)) ?? '--';
                $a = explode('-', $dob);
                if($value != '--')
                    if($a[2] < (date('Y')-120) || $a[2] > date('Y')) return false;
                return true;
            }, 'message' => 'Year of birth required']);

        //date of onset of reaction: year of reaction required
        $validator
            ->add('date_of_onset_of_reaction', 'door-select-year', [
                'rule' => function ($value, $context) {
                $door = (($value)) ?? '--';
                $a = explode('-', $door);
                if ($a[2] > (date('Y')-120) && $a[2] <= date('Y')) return true;
                return false;
            }, 'message' => 'Year of onset of reaction required']);
        //date of birth less than date of onset of reaction
        $validator->add('date_of_birth', 'dob-less-door', [
            'rule' => function ($value, $context) {
                //Normalize dob and door
                $dob = (($value)) ?? '--';
                $a = explode('-', $dob);
                $a[0] = (empty($a[0])) ? '01' : $a[0]; 
                $a[1] = (empty($a[1])) ? '01' : $a[1]; 
                $dob = implode('-', $a); 

                $door = (($context['data']['date_of_onset_of_reaction'])) ?? '--';
                $b = explode('-', $door);
                $b[0] = (empty($b[0])) ? '01' : $b[0]; 
                $b[1] = (empty($b[1])) ? '01' : $b[1];
                $door = implode('-', $b); 

                if($context['data']['in_utero']) return strtotime($dob) <= strtotime("+240 day", strtotime($door)); // can be before birth
                return strtotime($dob) <= strtotime($door);

            }, 'message' => 'Date of birth must less than or equal to date of onset of reaction'
        ]);
        //date of birth less than drug start dates
        $validator->add('date_of_birth', 'dob-less-drug-dates', [
            'rule' => function ($value, $context) {
                //Normalize dob and door
                $dob = (($value)) ?? '--';
                $a = explode('-', $dob);
                $a[0] = (empty($a[0])) ? '01' : $a[0]; 
                $a[1] = (empty($a[1])) ? '01' : $a[1]; 
                $dob = implode('-', $a); 

                if (isset($context['data']['sadr_list_of_drugs'])) {
                    foreach ($context['data']['sadr_list_of_drugs'] as $val){
                        if (strtotime($dob) > strtotime($val['start_date']) && empty($context['data']['in_utero'])) return false;
                    }
                }
                
                return true;

            }, 'message' => 'Date of birth must less than drug start date'
        ]);
        //date of onset of reaction must be less than reaction end date
        $validator->add('date_of_onset_of_reaction', 'door-less-doer', [
            'rule' => function ($value, $context) {
                //Normalize dob and door
                if(isset($context['data']['date_of_end_of_reaction']) &&
                   $context['data']['date_of_end_of_reaction'] != '--' &&
                   !empty($context['data']['date_of_end_of_reaction'])) {                    
                    $doer = (($context['data']['date_of_end_of_reaction'])) ?? '--';
                    $a = explode('-', $doer);
                    $a[0] = (empty($a[0])) ? '01' : $a[0]; 
                    $a[1] = (empty($a[1])) ? '01' : $a[1]; 
                    $a[2] = (empty($a[2])) ? date('Y') : $a[2]; 
                    $doer = implode('-', $a); 

                    $door = (($value)) ?? '--';
                    $b = explode('-', $door);
                    $b[0] = (empty($b[0])) ? '01' : $b[0]; 
                    $b[1] = (empty($b[1])) ? '01' : $b[1];
                    $door = implode('-', $b); 
                    // debug($door);
                    // debug($doer);
                    return strtotime($door) <= strtotime($doer);
                }
                return true;

            }, 'message' => 'Date of onset of reaction must less than or equal to date of end of reaction'
        ]);


        $validator
            ->scalar('gender')
            ->notEmpty('gender', ['message' => 'Gender required!']);

        $validator
            ->scalar('description_of_reaction')
            ->notEmpty('description_of_reaction', ['message' => 'Description of reaction required']);

        $validator
            ->scalar('severity')
            ->notEmpty('severity', ['message' => 'Severity required!']);
            
        $validator
            ->scalar('outcome')
            ->notEmpty('outcome', ['message' => 'Outcome required!']);

        $validator
            ->scalar('action_taken')
            ->notEmpty('action_taken', ['message' => 'Action taken required!']);

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
        //$rules->add($rules->existsIn(['county_id'], 'Counties'));
        //$rules->add($rules->existsIn(['sub_county_id'], 'SubCounties'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        //$rules->add($rules->existsIn(['vigiflow_id'], 'Vigiflows'));

        return $rules;
    }

    public function findStatus(Query $query, array $options)
    {
        $status = $options['status'];
        return $query->where(['status' => $status]);
    }

    /*
    public function beforeSave($event,$entity,$options) {


        if(!empty($entity->Sadr['age'])){

            $age_group = $entity->Sadr['age'];
            if($age_group > 60){
                  $age_group='elderly';
              }elseif($age_group > 17 && $age_group < 61){
                  $age_group='adult';
              }elseif($age_group > 12 && $age_group < 18){
                  $age_group='adolescent';
              }elseif($age_group > 2 && $age_group < 13){
                  $age_group='child';
              }elseif($age_group < 3){
                  $age_group='infant';
              }
  
            $entity->Sadr['age_group'] = $age_group;
        }

        return true;
    }
    */
}
