<?php
use Migrations\AbstractSeed;

/**
 * Clubs seed.
 */
class ClubsSeed extends AbstractSeed
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
                'id' => '2',
                'club_name' => 'club-2',
                'created' => '2018-09-07',
                'modified' => '2018-09-07',
                'icon' => '',
                'icon_dir' => '',
            ],
            [
                'id' => '3',
                'club_name' => 'Club 3',
                'created' => '2018-10-09',
                'modified' => '2018-11-01',
                'icon' => 'Files/Z.png',
                'icon_dir' => '',
            ],
            [
                'id' => '4',
                'club_name' => 'Club 4',
                'created' => '2018-10-31',
                'modified' => '2018-11-01',
                'icon' => 'Files/Z.png',
                'icon_dir' => '',
            ],
            [
                'id' => '19',
                'club_name' => 'Club 5',
                'created' => '2018-11-01',
                'modified' => '2018-11-01',
                'icon' => 'Files/A.png',
                'icon_dir' => '',
            ],
        ];

        $table = $this->table('clubs');
        $table->insert($data)->save();
    }
}
