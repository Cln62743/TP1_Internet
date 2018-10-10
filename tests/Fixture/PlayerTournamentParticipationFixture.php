<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayerTournamentParticipationFixture
 *
 */
class PlayerTournamentParticipationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'player_tournament_participation';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'player_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tournament_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'final_result' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'tournament_key' => ['type' => 'index', 'columns' => ['tournament_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['player_id', 'tournament_id'], 'length' => []],
            'player_tournament_participation_ibfk_1' => ['type' => 'foreign', 'columns' => ['player_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'player_tournament_participation_ibfk_2' => ['type' => 'foreign', 'columns' => ['tournament_id'], 'references' => ['tournaments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'player_id' => 1,
                'tournament_id' => 1,
                'final_result' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-08-30',
                'modified' => '2018-08-30'
            ],
        ];
        parent::init();
    }
}
