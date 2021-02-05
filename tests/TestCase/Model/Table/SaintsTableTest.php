<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaintsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaintsTable Test Case
 */
class SaintsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaintsTable
     */
    public $Saints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Saints',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Saints') ? [] : ['className' => SaintsTable::class];
        $this->Saints = TableRegistry::getTableLocator()->get('Saints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Saints);

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
