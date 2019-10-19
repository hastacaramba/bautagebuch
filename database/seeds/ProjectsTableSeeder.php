<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('projects')->insert([
            'number' => '001',
            'name' => 'Wohnhaus Müller Musterstadt',
            'street' => 'Musterstraße',
            'housenumber' => '3a',
            'postcode' => '12345',
            'city' => 'Musterstadt',
            'photo' => 'wohnhaus.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'number' => '002',
            'name' => 'Gymnasium Petersplatz',
            'street' => 'Petersplatz',
            'housenumber' => '16',
            'postcode' => '98765',
            'city' => 'Petersstetten',
            'photo' => 'gymnasium.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'number' => '003',
            'name' => 'Turnhalle Vilshofen',
            'street' => 'Schulstraße',
            'housenumber' => '1a',
            'postcode' => '94474',
            'city' => 'Vilshofen',
            'photo' => 'turnhalle.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
