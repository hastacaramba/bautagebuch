<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Franz Dippl',
            'email' => 'franz.dippl@gmail.com',
            'password' => bcrypt('Mebis#17'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Leonhard Maier',
            'email' => 'leonhard.maier@arch-maier.de',
            'password' => bcrypt('maierl'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
