<?php
namespace App\Test\TestCase\Controller\Technical;

use App\Controller\Technical\AdrsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Technical\AdrsController Test Case
 */
class AdrsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adrs',
        'app.users',
        'app.designations',
        'app.original_adrs',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.adr_other_drugs',
        'app.report_stages',
        'app.attachments',
        'app.uploads',
        'app.reminders',
        'app.adr_comments',
        'app.refids',
        'app.reviews',
        'app.committees',
        'app.request_reporters',
        'app.request_evaluators',
        'app.adr_followups'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
