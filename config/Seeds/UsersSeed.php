<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '17',
                'first_name' => 'Admin',
                'second_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'Admin@hotmail.com',
                'password' => '$2y$10$otFP/riOSRvZ.RzqLKbesensWlfQQWV3VgwJm8h91prr56q7NYg8a',
                'role' => 'admin',
                'player_id' => NULL,
                'created' => '2018-10-09',
                'modified' => '2018-10-10',
            ],
            [
                'id' => '18',
                'first_name' => 'Yvan',
                'second_name' => '',
                'last_name' => 'Nom de famille',
                'email' => 'Yvan@hotmail.com',
                'password' => '$2y$10$P.Ttdp8w4ui.Sy5bGSdKuu9aBfex.cC0.KXzhy2xOaUiuJnHiRC5W',
                'role' => 'player',
                'player_id' => '16',
                'created' => '2018-10-09',
                'modified' => '2018-10-10',
            ],
            [
                'id' => '19',
                'first_name' => 'Joseph',
                'second_name' => 'Deuxieme prenom',
                'last_name' => 'Nom de famille',
                'email' => 'Joseph@hotmail.com',
                'password' => '$2y$10$9gJTeLYjJTTDhEUehlANz.tDR1QkDi3BlsGnIZVB8o.ZChRFCwJjy',
                'role' => 'player',
                'player_id' => '17',
                'created' => '2018-10-09',
                'modified' => '2018-10-09',
            ],
            [
                'id' => '21',
                'first_name' => 'Arianne',
                'second_name' => 'Deuxieme prenom',
                'last_name' => 'Nom de famille',
                'email' => 'Arianne@hotmail.com',
                'password' => '$2y$10$Oora40t0FhVxVFC1BlO1S.5Q/kTH4JrUWGO5s1RR7Xra9nH76DHzO',
                'role' => 'player',
                'player_id' => '19',
                'created' => '2018-10-10',
                'modified' => '2018-10-10',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
