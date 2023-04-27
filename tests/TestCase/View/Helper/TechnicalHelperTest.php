<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\TechnicalHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\TechnicalHelper Test Case
 */
class TechnicalHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\TechnicalHelper
     */
    public $Technical;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Technical = new TechnicalHelper($view);
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
