<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        DB::table('users')->insert([
            [
                'role_id'=>1,
                'is_active'=>1,
                'name'=>'Filip',
                'email'=>'dbsajt@gmail.com',
                'password'=>bcrypt('Filip')
            ],
            [
                'role_id'=>2,
                'is_active'=>0,
                'name'=>'Pera',
                'email'=>'pera@pera.com',
                'password'=>bcrypt('Pera')
            ],
            [
                'role_id'=>3,
                'is_active'=>0,
                'name'=>'Mika',
                'email'=>'mika@mika.com',
                'password'=>bcrypt('Mika')
            ]
        ]);

    }
}
