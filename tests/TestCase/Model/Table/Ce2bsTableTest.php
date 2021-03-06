<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Ce2bsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Ce2bsTable Test Case
 */
class Ce2bsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Ce2bsTable
     */
    public $Ce2bs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ce2bs',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadr_followups',
        'app.provinces',
        'app.aefis',
        'app.original_aefis',
        'app.aefi_list_of_vaccines',
        'app.saefis',
        'app.original_saefis',
        'app.saefi_list_of_vaccines',
        'app.aefi_causalities',
        'app.attachments',
        'app.reports',
        'app.reviews',
        'app.sadrs',
        'app.original_sadrs',
        'app.committees',
        'app.adrs',
        'app.original_adrs',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.doses',
        'app.sadr_list_of_drugs',
        'app.routes',
        'app.frequencies',
        'app.adr_other_drugs',
        'app.request_reporters',
        'app.messages',
        'app.request_evaluators',
        'app.report_stages',
        'app.sadr_comments',
        'app.adr_comments',
        'app.aefi_comments',
        'app.saefi_comments',
        'app.sadr_other_drugs',
        'app.aefi_list_of_diluents',
        'app.aefi_followups',
        'app.sub_counties',
        'app.countries',
        'app.feedbacks',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ce2bs') ? [] : ['className' => Ce2bsTable::class];
        $this->Ce2bs = TableRegistry::get('Ce2bs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ce2bs);

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
