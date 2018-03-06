<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportStagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportStagesTable Test Case
 */
class ReportStagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportStagesTable
     */
    public $ReportStages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.report_stages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReportStages') ? [] : ['className' => ReportStagesTable::class];
        $this->ReportStages = TableRegistry::get('ReportStages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportStages);

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
}
