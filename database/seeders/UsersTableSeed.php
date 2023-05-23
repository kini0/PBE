<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creat des fauts candidates pour le projet
        for ($i = 0; $i < 10; $i++)
        {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'=> "Candidat$i",
                "email"=> "candidat$i@fbe.org",
                "role" => "1",
                "confirmation_token" => NULL,
                "password"=> bcrypt('00000000'),
            ]);
        }

        //creat des fauts admis pour le projet
        for ($i = 0; $i < 10; $i++)
        {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'=> "Admi$i",
                "email"=> "admi$i@fbe.org",
                "role" => "3",
                "confirmation_token" => NULL,
                "password"=> bcrypt('00000000'),
            ]);
        }

        //creat des fauts jurys pour le projet
        for ($i = 0; $i < 10; $i++)
        {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'=> "Jury$i",
                "email"=> "jury$i@fbe.org",
                "role" => "2",
                "confirmation_token" => NULL,
                "password"=> bcrypt('00000000'),
            ]);
        }
    }
}
