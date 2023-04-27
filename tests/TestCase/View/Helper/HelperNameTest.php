<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\HelperName;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\HelperName Test Case
 */
class HelperNameTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\HelperName
     */
    public $HelperName;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->HelperName = new HelperName($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HelperName);

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
