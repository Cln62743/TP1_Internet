<?php
use Migrations\AbstractSeed;

/**
 * PlayerTournamentParticipations seed.
 */
class PlayerTournamentParticipationsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'player_id' => '16',
                'tournament_id' => '1',
                'created' => '2018-11-14',
                'modified' => '2018-11-14',
            ],
            [
                'player_id' => '17',
                'tournament_id' => '1',
                'created' => NULL,
                'modified' => '2018-11-01',
            ],
        ];

        $table = $this->table('player_tournament_participations');
        $table->insert($data)->save();
    }
}
