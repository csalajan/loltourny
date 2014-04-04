<?php

class TournamentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tournaments')->delete();

        User::create(array('email' => 'foo@bar.com'));
    }

}