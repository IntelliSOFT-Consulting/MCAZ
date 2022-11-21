<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportSettingsTable Test Case
 */
class ReportSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportSettingsTable
     */
    public $ReportSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.report_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReportSettings') ? [] : ['className' => ReportSettingsTable::class];
        $this->ReportSettings = TableRegistry::get('ReportSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportSettings);

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
