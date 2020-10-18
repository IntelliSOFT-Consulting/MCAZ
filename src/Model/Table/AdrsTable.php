<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Adrs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\AdrLabTestsTable|\Cake\ORM\Association\HasMany $AdrLabTests
 * @property \App\Model\Table\AdrListOfDrugsTable|\Cake\ORM\Association\HasMany $AdrListOfDrugs
 * @property \App\Model\Table\AdrOtherDrugsTable|\Cake\ORM\Association\HasMany $AdrOtherDrugs
 *
 * @method \App\Model\Entity\Adr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adr findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdrsTable extends Table
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

        $this->setTable('adrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Duplicatable.Duplicatable', [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators', 
                          'Reviews', 'Reviews.Users', 'Reviews.AdrComments', 'Reviews.AdrComments.Attachments',  
                          'Committees', 'Committees.Users', 'Committees.AdrComments', 'Committees.AdrComments.Attachments', 'ReportStages', 
                          'OriginalAdrs', 'OriginalAdrs.AdrListOfDrugs', 'OriginalAdrs.AdrOtherDrugs', 'OriginalAdrs.Attachments'],
            'remove' => ['created', 'modified', 'adr_list_of_drugs.created',  'attachments.created',
                          'adr_list_of_drugs.modified',  'attachments.modified'],
            'set' => [
                'submitted' => 2,
                'copied' => 'new copy'
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->belongsTo('OriginalAdrs', [
            'foreignKey' => 'adr_id',
            'dependent' => true,
            'conditions' => array('OriginalAdrs.copied' => 'old copy')
        ]);
        $this->hasMany('AdrLabTests', [
            'foreignKey' => 'adr_id'
        ]);
        $this->hasMany('AdrListOfDrugs', [
            'foreignKey' => 'adr_id'
        ]);
        $this->hasMany('AdrOtherDrugs', [
            'foreignKey' => 'adr_id'
        ]);

        $this->hasMany('ReportStages', [
            'className' => 'ReportStages',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ReportStages.model' => 'Adrs'),
        ]);
        $this->hasMany('Attachments', [
            'className' => 'Attachments',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Attachments.model' => 'Adrs', 'Attachments.category' => 'attachments'),
        ]);
        $this->hasMany('Reminders', [
            'className' => 'Reminders',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reminders.model' => 'Adrs'),
        ]);


        $this->hasMany('Refids', [
            'className' => 'Refids',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Refids.model' => 'Adrs'),
        ]);
        
        $this->hasMany('Reviews', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Reviews.model' => 'Adrs', 'Reviews.category' => 'causality'),
        ]);
        $this->hasMany('Committees', [
            'className' => 'Reviews',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('Committees.model' => 'Adrs', 'Committees.category' => 'committee'),
        ]);
        $this->hasMany('RequestReporters', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestReporters.model' => 'Adrs', 'RequestReporters.type' => 'request_reporter_info'),
        ]);
        $this->hasMany('RequestEvaluators', [
            'className' => 'Notifications',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('RequestEvaluators.model' => 'Adrs', 'RequestEvaluators.type' => 'request_evaluator_info'),
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
            ->like('mrcz_protocol_number') 
            ->like('mcaz_protocol_number')
            ->like('name_of_institution')
            ->like('study_title')
            ->value('report_type')
            ->value('adverse_event_type')
            ->value('sae_type')
            ->value('research_involves')
            ->like('reporter_name')
            ->like('outcome')
            ->like('reporter_email')
            ->value('designation_id')
            ->like('diagnosis')
            ->add('drug_name', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    $drug_name = $args['drug_name'];
                    $query->matching('AdrListOfDrugs', function ($q) use($drug_name) {
                        return $q->where(['AdrListOfDrugs.drug_name LIKE' => '%'.$drug_name.'%']);
                    });
                }
            ])
            ->like('participant_number');

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
            ->scalar('mrcz_protocol_number')
            ->notEmpty('mrcz_protocol_number', ['message' => 'Protocol no. required']);

        $validator
            ->scalar('mcaz_protocol_number')
            ->notEmpty('mcaz_protocol_number', ['message' => 'Protocol no. required']);

        $validator
            ->scalar('principal_investigator')
            ->notEmpty('principal_investigator', ['message' => 'Principal investigator required']);

        $validator
            ->scalar('reporter_name')
            ->notEmpty('reporter_name', ['message' => 'Reporter name required']);

        $validator
            ->scalar('reporter_email')
            ->notEmpty('reporter_email', ['message' => 'Reporter email required']);

        $validator
            ->scalar('reporter_phone')
            ->allowEmpty('reporter_phone');

        $validator
            ->scalar('name_of_institution')
            ->notEmpty('name_of_institution', ['message' => 'Institution required']);

        $validator
            ->scalar('institution_code')
            ->allowEmpty('institution_code');

        $validator
            ->scalar('study_title')
            ->notEmpty('study_title', ['message' => 'Study title required']);

        $validator
            ->scalar('study_sponsor')
            ->allowEmpty('study_sponsor');

        $validator
            ->add('date_of_adverse_event', 'doae-req', ['rule' => ['date', 'dmy'], 'message' => 'Kindly enter the date of adverse event in the format dd-mm-yyyy e.g. 22-03-2018'])
            ->notEmpty('date_of_adverse_event');

        $validator
            ->scalar('participant_number')
            ->allowEmpty('participant_number');

        $validator
            ->scalar('report_type')
            ->allowEmpty('report_type');

        // $validator
        //     ->date('date_of_site_awareness')
        //     ->allowEmpty('date_of_site_awareness');

        $validator
            ->scalar('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->scalar('gender')
            ->notEmpty('gender', ['message' => 'Gender required']);

        $validator
            ->scalar('study_week')
            ->allowEmpty('study_week');

        $validator
            ->scalar('visit_number')
            ->allowEmpty('visit_number');

        $validator
            ->scalar('adverse_event_type')
            ->allowEmpty('adverse_event_type');

        $validator
            ->scalar('sae_type')
            ->notEmpty('sae_type', ['message' => 'Report type required']);

        $validator
            ->scalar('sae_description')
            ->allowEmpty('sae_description');

        $validator
            ->scalar('toxicity_grade')
            ->allowEmpty('toxicity_grade');

        $validator
            ->scalar('previous_events')
            ->allowEmpty('previous_events');

        $validator
            ->scalar('previous_events_number')
            ->allowEmpty('previous_events_number');

        $validator
            ->scalar('total_saes')
            ->allowEmpty('total_saes');

        $validator
            ->scalar('location_event')
            ->allowEmpty('location_event');

        $validator
            ->scalar('location_event_specify')
            ->allowEmpty('location_event_specify');

        $validator
            ->scalar('research_involves')
            ->allowEmpty('research_involves');

        $validator
            ->scalar('research_involves_specify')
            ->allowEmpty('research_involves_specify');

        $validator
            ->scalar('name_of_drug')
            ->allowEmpty('name_of_drug');

        $validator
            ->scalar('drug_investigational')
            ->allowEmpty('drug_investigational');

        $validator
            ->scalar('patient_other_drug')
            ->allowEmpty('patient_other_drug');

        $validator
            ->scalar('report_to_mcaz')
            ->allowEmpty('report_to_mcaz');

        $validator
            ->scalar('designation_id')
            ->notEmpty('designation_id', ['message' => 'Designation required']);

        $validator
            ->scalar('diagnosis')
            ->notEmpty('diagnosis', ['message' => 'Diagnosis required']);

        //removed need to have suspected drug
        /*$validator->allowEmpty('suspected_drug', function ($context) {
            // return !$context['data']['is_taxable'];
            if (isset($context['data']['adr_list_of_drugs'])) {
                foreach ($context['data']['adr_list_of_drugs'] as $val){
                    if (strtolower($val['relationship_to_sae']) == 'definitely related' ||
                        strtolower($val['relationship_to_sae']) == 'probably related' ||
                        strtolower($val['relationship_to_sae']) == 'possibly related' ) {
                        return true;
                    }
                }
            }
            return false;
        }, ['message' => 'Kindly select at least one suspected drug']);*/


        //Age at onset values
        //date of birth or onset
        $validator
            ->allowEmpty('date_of_birth')
            ->add('date_of_birth', 'dob-or-door', [
                'rule' => function ($value, $context) {                    
                    $dob = ($value == '--') ? null : $value;
                    if(!$dob) return false;
                    return true;
            }, 'message' => 'Date of birth required'
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

        //date of birth less than date of adverse event
        $validator->add('date_of_birth', 'dob-less-doae', [
            'rule' => function ($value, $context) {
                //Normalize dob and door
                $dob = (($value)) ?? '--';
                $a = explode('-', $dob);
                $a[0] = (empty($a[0])) ? '01' : $a[0]; 
                $a[1] = (empty($a[1])) ? '01' : $a[1]; 
                $dob = implode('-', $a); 

                if($context['data']['in_utero']) return strtotime($dob) <= strtotime("+240 day", strtotime($context['data']['date_of_adverse_event'])); // can be before birth
                return strtotime($dob) <= strtotime($context['data']['date_of_adverse_event']);

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

                if (isset($context['data']['adr_list_of_drugs'])) {
                    foreach ($context['data']['adr_list_of_drugs'] as $val){
                        if (strtotime($dob) > strtotime( ($val['start_date']) ? $val['start_date'] : "now" )  && empty($context['data']['in_utero'])) return false;
                    }
                }
                
                return true;

            }, 'message' => 'Date of birth must be greater than drug start date'
        ]);

        // $validator
        //     ->date('report_to_mcaz_date')
        //     ->allowEmpty('report_to_mcaz_date');

        $validator
            ->scalar('report_to_mrcz')
            ->allowEmpty('report_to_mrcz');

        // $validator
        //     ->date('report_to_mrcz_date')
        //     ->allowEmpty('report_to_mrcz_date');

        $validator
            ->scalar('report_to_sponsor')
            ->allowEmpty('report_to_sponsor');

        // $validator
        //     ->date('report_to_sponsor_date')
        //     ->allowEmpty('report_to_sponsor_date');

        $validator
            ->scalar('report_to_irb')
            ->allowEmpty('report_to_irb');

        // $validator
        //     ->date('report_to_irb_date')
        //     ->allowEmpty('report_to_irb_date');

        $validator
            ->scalar('medical_history')
            ->allowEmpty('medical_history');

        $validator
            ->scalar('immediate_cause')
            ->allowEmpty('immediate_cause');

        $validator
            ->scalar('symptoms')
            ->allowEmpty('symptoms');

        $validator
            ->scalar('investigations')
            ->allowEmpty('investigations');

        $validator
            ->scalar('results')
            ->allowEmpty('results');

        $validator
            ->scalar('management')
            ->allowEmpty('management');

        $validator
            ->scalar('outcome')
            ->notEmpty('outcome', ['message' => 'Outcome required']);

        $validator
            ->scalar('d1_consent_form')
            ->allowEmpty('d1_consent_form');

        $validator
            ->scalar('d2_brochure')
            ->allowEmpty('d2_brochure');

        $validator
            ->scalar('d3_changes_sae')
            ->allowEmpty('d3_changes_sae');

        $validator
            ->scalar('d4_consent_sae')
            ->allowEmpty('d4_consent_sae');

        $validator
            ->scalar('changes_explain')
            ->allowEmpty('changes_explain');

        $validator
            ->scalar('assess_risk')
            ->allowEmpty('assess_risk');

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
