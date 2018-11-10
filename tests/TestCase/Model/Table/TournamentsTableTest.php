<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentsTable Test Case
 */
class TournamentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentsTable
     */
    public $TournamentsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tournaments',
        'app.i18n',
        'app.players',
        'app.cities',
        'app.schools'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tournaments') ? [] : ['className' => TournamentsTable::class];
        $this->TournamentsTable = TableRegistry::getTableLocator()->get('Tournaments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TournamentsTable);

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
