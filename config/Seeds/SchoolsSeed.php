<?php
use Migrations\AbstractSeed;

/**
 * Schools seed.
 */
class SchoolsSeed extends AbstractSeed
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
                'name' => 'Académie De Roberval',
                'city_id' => '1',
                'created' => '2018-11-04',
                'modified' => '2018-11-04',
            ],
            [
                'id' => '2',
                'name' => 'École secondaire Chomedey-De Maisonneuve',
                'city_id' => '1',
                'created' => '2018-11-04',
                'modified' => '2018-11-04',
            ],
            [
                'id' => '3',
                'name' => 'École secondaire Curé-Antoine-Labelle',
                'city_id' => '2',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
            [
                'id' => '4',
                'name' => 'École secondaire Georges-Vanier',
                'city_id' => '2',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
            [
                'id' => '5',
                'name' => 'École secondaire Cardinal-Roy',
                'city_id' => '3',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
            [
                'id' => '6',
                'name' => 'École secondaire Jean-de-Brébeuf',
                'city_id' => '3',
                'created' => '2018-11-05',
                'modified' => '2018-11-05',
            ],
        ];

        $table = $this->table('schools');
        $table->insert($data)->save();
    }
}
