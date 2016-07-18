<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1');
        DB::table('roles')->insert([
            [
                'name'=>'administrator'
            ],
            [
                'name'=>'author'
            ],
            [
                'name'=>'subscriber'
            ]
        ]);

    }
}
