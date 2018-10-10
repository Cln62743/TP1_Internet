<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayerTournamentParticipationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerTournamentParticipationTable Test Case
 */
class PlayerTournamentParticipationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayerTournamentParticipationTable
     */
    public $PlayerTournamentParticipation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.player_tournament_participation',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('PlayerTournamentParticipation') ? [] : ['className' => PlayerTournamentParticipationTable::class];
        $this->PlayerTournamentParticipation = TableRegistry::getTableLocator()->get('PlayerTournamentParticipation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlayerTournamentParticipation);

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
