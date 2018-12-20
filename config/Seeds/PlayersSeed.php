<?php
use Migrations\AbstractSeed;

/**
 * Players seed.
 */
class PlayersSeed extends AbstractSeed
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
                'id' => '16',
                'club_id' => '3',
                'created' => '2018-10-09',
                'modified' => '2018-10-10',
            ],
            [
                'id' => '17',
                'club_id' => '3',
                'created' => '2018-10-09',
                'modified' => '2018-10-09',
            ],
            [
                'id' => '19',
                'club_id' => '3',
                'created' => '2018-10-10',
                'modified' => '2018-10-10',
            ],
        ];

        $table = $this->table('players');
        $table->insert($data)->save();
    }
}
