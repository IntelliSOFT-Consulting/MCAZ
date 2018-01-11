<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AefiCausalitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AefiCausalitiesTable Test Case
 */
class AefiCausalitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AefiCausalitiesTable
     */
    public $AefiCausalities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aefi_causalities',
        'app.aefis',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadr_followups',
        'app.provinces',
        'app.sadrs',
        'app.attachments',
        'app.reviews',
        'app.committees',
        'app.request_reporters',
        'app.messages',
        'app.request_evaluators',
        'app.sadr_list_of_drugs',
        'app.doses',
        'app.routes',
        'app.frequencies',
        'app.sadr_other_drugs',
        'app.sub_counties',
        'app.countries',
        'app.feedbacks',
        'app.groups',
        'app.adrs',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.adr_other_drugs',
        'app.saefis',
        'app.saefi_list_of_vaccines',
        'app.reports',
        'app.aefi_list_of_vaccines',
        'app.aefi_list_of_diluents',
        'app.aefi_followups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AefiCausalities') ? [] : ['className' => AefiCausalitiesTable::class];
        $this->AefiCausalities = TableRegistry::get('AefiCausalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AefiCausalities);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
