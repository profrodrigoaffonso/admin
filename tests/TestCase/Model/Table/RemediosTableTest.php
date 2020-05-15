<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemediosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemediosTable Test Case
 */
class RemediosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RemediosTable
     */
    public $Remedios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Remedios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Remedios') ? [] : ['className' => RemediosTable::class];
        $this->Remedios = TableRegistry::getTableLocator()->get('Remedios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Remedios);

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
