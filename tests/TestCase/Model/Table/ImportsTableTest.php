<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImportsTable Test Case
 */
class ImportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImportsTable
     */
    public $Imports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.imports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Imports') ? [] : ['className' => ImportsTable::class];
        $this->Imports = TableRegistry::get('Imports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Imports);

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
