<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComandosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComandosTable Test Case
 */
class ComandosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComandosTable
     */
    public $Comandos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Comandos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Comandos') ? [] : ['className' => ComandosTable::class];
        $this->Comandos = TableRegistry::getTableLocator()->get('Comandos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comandos);

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
