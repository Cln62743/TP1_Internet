<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefResultsTable Test Case
 */
class RefResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefResultsTable
     */
    public $RefResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ref_results'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RefResults') ? [] : ['className' => RefResultsTable::class];
        $this->RefResults = TableRegistry::getTableLocator()->get('RefResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefResults);

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
