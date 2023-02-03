<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PasswordLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PasswordLogsTable Test Case
 */
class PasswordLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PasswordLogsTable
     */
    public $PasswordLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.password_logs',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PasswordLogs') ? [] : ['className' => PasswordLogsTable::class];
        $this->PasswordLogs = TableRegistry::get('PasswordLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PasswordLogs);

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
