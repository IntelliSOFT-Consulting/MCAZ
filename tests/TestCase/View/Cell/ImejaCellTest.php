<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\ImejaCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\ImejaCell Test Case
 */
class ImejaCellTest extends TestCase
{

    /**
     * Request mock
     *
     * @var \Cake\Http\ServerRequest|\PHPUnit_Framework_MockObject_MockObject
     */
    public $request;

    /**
     * Response mock
     *
     * @var \Cake\Http\Response|\PHPUnit_Framework_MockObject_MockObject
     */
    public $response;

    /**
     * Test subject
     *
     * @var \App\View\Cell\ImejaCell
     */
    public $Imeja;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Http\ServerRequest')->getMock();
        $this->response = $this->getMockBuilder('Cake\Http\Response')->getMock();
        $this->Imeja = new ImejaCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Imeja);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        $this->Imeja->display();
        $this->assertStringContainsString('Technical Session', $this->Imeja->render());
    
    }
}
