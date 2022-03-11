<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReactionsTable Test Case
 */
class ReactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReactionsTable
     */
    public $Reactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reactions',
        'app.sadrs',
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
        'app.adrs',
        'app.original_adrs',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.doses',
        'app.sadr_list_of_drugs',
        'app.routes',
        'app.frequencies',
        'app.adr_other_drugs',
        'app.committees',
        'app.ce2bs',
        'app.report_stages',
        'app.request_reporters',
        'app.messages',
        'app.request_evaluators',
        'app.sadr_comments',
        'app.adr_comments',
        'app.aefi_comments',
        'app.saefi_comments',
        'app.ce2b_comments',
        'app.reminders',
        'app.aefi_list_of_diluents',
        'app.aefi_followups',
        'app.sadr_other_drugs',
        'app.sub_counties',
        'app.countries',
        'app.feedbacks',
        'app.groups',
        'app.original_sadrs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reactions') ? [] : ['className' => ReactionsTable::class];
        $this->Reactions = TableRegistry::get('Reactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reactions);

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
