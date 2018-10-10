<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MatchesFixture
 *
 */
class MatchesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'tournament_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'player_id_1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'player_id_2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start_time' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_time' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'result_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'player1_key' => ['type' => 'index', 'columns' => ['player_id_1'], 'length' => []],
            'result_key' => ['type' => 'index', 'columns' => ['result_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tournament_id', 'player_id_1', 'player_id_2', 'start_time'], 'length' => []],
            'matches_ibfk_1' => ['type' => 'foreign', 'columns' => ['tournament_id'], 'references' => ['tournaments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'matches_ibfk_2' => ['type' => 'foreign', 'columns' => ['player_id_1'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'matches_ibfk_3' => ['type' => 'foreign', 'columns' => ['result_id'], 'references' => ['ref_results', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'tournament_id' => 1,
                'player_id_1' => 1,
                'player_id_2' => 1,
                'start_time' => '2018-08-30',
                'end_time' => '2018-08-30',
                'result_id' => 1,
                'created' => '2018-08-30',
                'modified' => '2018-08-30'
            ],
        ];
        parent::init();
    }
}
