<?php

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'project_id' => 1,
            'title' => 'Baustellenbegehung',
            'date' => '2019-10-19',
            'time' => '10:00',
            'notes' => 'Wetter: 25°C, leichter Wind, Sonnenschein, Fenster wurden geliefert',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 1,
            'title' => 'Jour Fix',
            'date' => '2019-10-10',
            'time' => '09:00',
            'notes' => 'Wetter: 20°C, leichter Wind, Regen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 2,
            'title' => 'Baustellenbegehung',
            'date' => '2019-10-19',
            'time' => '10:00',
            'notes' => 'Wetter: 25°C, leichter Wind, Sonnenschein, Fenster wurden geliefert',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 3,
            'title' => 'Jour Fix',
            'date' => '2019-10-10',
            'time' => '09:00',
            'notes' => 'Wetter: 20°C, leichter Wind, Regen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
