<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayerTournamentParticipationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerTournamentParticipationsTable Test Case
 */
class PlayerTournamentParticipationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayerTournamentParticipationsTable
     */
    public $PlayerTournamentParticipationsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.player_tournament_participations',
        'app.players',
        'app.tournaments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PlayerTournamentParticipations') ? [] : ['className' => PlayerTournamentParticipationsTable::class];
        $this->PlayerTournamentParticipationsTable = TableRegistry::getTableLocator()->get('PlayerTournamentParticipations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlayerTournamentParticipationsTable);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
