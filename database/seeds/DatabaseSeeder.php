<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id'=>1,
            'name' => 'admin',
            'email' => 'stefano.stirati@triweb.it',
            'password' => bcrypt('triwebGlamore16'),
        ]);

        DB::table('roles')->insert([
        	'id'=>1,
            'name' => 'admin',
            'description' => 'Admin role',
        ]);

        DB::table('user_team_role')->insert([
        	'user_id' => 1,
            'role_id' => 1,
        ]);
       
    }
}
