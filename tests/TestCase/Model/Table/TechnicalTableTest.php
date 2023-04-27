<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TechnicalTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TechnicalTable Test Case
 */
class TechnicalTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TechnicalTable
     */
    public $Technical;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.technical'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Technical') ? [] : ['className' => TechnicalTable::class];
        $this->Technical = TableRegistry::get('Technical', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Technical);

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
