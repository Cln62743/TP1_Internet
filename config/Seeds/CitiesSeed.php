<?php
use Migrations\AbstractSeed;

/**
 * Cities seed.
 */
class CitiesSeed extends AbstractSeed
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
                'name' => 'Montreal',
                'created' => '2018-11-04',
                'modified' => '2018-11-13',
            ],
            [
                'id' => '2',
                'name' => 'Laval',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
            [
                'id' => '3',
                'name' => 'Quebec',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
            [
                'id' => '5',
                'name' => 'Rosemere',
                'created' => '2018-11-13',
                'modified' => '2018-11-13',
            ],
            [
                'id' => '9',
                'name' => 'Blainville',
                'created' => '2018-11-13',
                'modified' => '2018-11-13',
            ],
        ];

        $table = $this->table('cities');
        $table->insert($data)->save();
    }
}
