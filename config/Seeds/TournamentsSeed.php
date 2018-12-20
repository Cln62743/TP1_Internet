<?php
use Migrations\AbstractSeed;

/**
 * Tournaments seed.
 */
class TournamentsSeed extends AbstractSeed
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
                'id' => '1',
                'name' => 'Tournament 1',
                'start_date' => '2018-10-24',
                'end_date' => '2018-10-26',
                'created' => '2018-10-07',
                'modified' => '2018-10-10',
                'city_id' => '1',
                'school_id' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Tournament 2',
                'start_date' => '2018-11-12',
                'end_date' => '2018-11-15',
                'created' => '2018-10-09',
                'modified' => '2018-10-09',
                'city_id' => '1',
                'school_id' => '2',
            ],
            [
                'id' => '3',
                'name' => 'Tournoi 3',
                'start_date' => '2018-11-04',
                'end_date' => '2018-11-04',
                'created' => '2018-11-04',
                'modified' => '2018-11-04',
                'city_id' => '1',
                'school_id' => '2',
            ],
            [
                'id' => '4',
                'name' => 'Tournoi 4',
                'start_date' => '2018-11-13',
                'end_date' => '2018-11-13',
                'created' => '2018-11-13',
                'modified' => '2018-11-13',
                'city_id' => '3',
                'school_id' => '5',
            ],
        ];

        $table = $this->table('tournaments');
        $table->insert($data)->save();
    }
}
