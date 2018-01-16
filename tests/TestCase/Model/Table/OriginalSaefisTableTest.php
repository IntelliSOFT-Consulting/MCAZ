<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OriginalSaefisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OriginalSaefisTable Test Case
 */
class OriginalSaefisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OriginalSaefisTable
     */
    public $OriginalSaefis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.original_saefis',
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
        'app.aefi_list_of_vaccines',
        'app.aefi_list_of_diluents',
        'app.aefi_causalities',
        'app.saefis',
        'app.saefi_list_of_vaccines',
        'app.attachments',
        'app.reports',
        'app.reviews',
        'app.committees',
        'app.request_reporters',
        'app.messages',
        'app.request_evaluators',
        'app.aefi_followups',
        'app.sadrs',
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
        'app.adr_other_drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OriginalSaefis') ? [] : ['className' => OriginalSaefisTable::class];
        $this->OriginalSaefis = TableRegistry::get('OriginalSaefis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OriginalSaefis);

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
