<?php

use Illuminate\Database\Seeder;

class SubareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subareas')->insert([
            'title' => 'Projektbeteiligter',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Hochbau',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Zimmererarbeiten',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Fensterbau',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Elektro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Trockenbau',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Sanitär',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Heizung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Fliesenleger',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Holzböden',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Innenausstattung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subareas')->insert([
            'title' => 'Schreinerarbeiten',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
