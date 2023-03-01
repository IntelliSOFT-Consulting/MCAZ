<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SadrsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SadrsTable Test Case
 */
class SadrsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SadrsTable
     */
    public $Sadrs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sadrs',
        'app.users',
        'app.designations',
        'app.provinces',
        'app.original_sadrs',
        'app.report_stages',
        'app.attachments',
        'app.uploads',
        'app.reminders',
        'app.refids',
        'app.reviews',
        'app.sadr_comments',
        'app.committees',
        'app.request_reporters',
        'app.request_evaluators',
        'app.sadr_followups',
        'app.sadr_list_of_drugs',
        'app.sadr_other_drugs',
        'app.reactions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sadrs') ? [] : ['className' => SadrsTable::class];
        $this->Sadrs = TableRegistry::get('Sadrs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sadrs);

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
     * Test searchManager method
     *
     * @return void
     */
    public function testSearchManager()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findByDrugName method
     *
     * @return void
     */
    public function testFindByDrugName()
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

    /**
     * Test findStatus method
     *
     * @return void
     */
    public function testFindStatus()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test query method
     *
     * @return void
     */
    public function testQuery()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deleteAll method
     *
     * @return void
     */
    public function testDeleteAll()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getSoftDeleteField method
     *
     * @return void
     */
    public function testGetSoftDeleteField()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test hardDelete method
     *
     * @return void
     */
    public function testHardDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test hardDeleteAll method
     *
     * @return void
     */
    public function testHardDeleteAll()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test restore method
     *
     * @return void
     */
    public function testRestore()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
