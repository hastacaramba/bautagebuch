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
            'weather' => 'Wetter: 25°C, leichter Wind, Sonnenschein',
            'description' => 'Fenster wurden geliefert',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 1,
            'title' => 'Jour Fix',
            'date' => '2019-10-10',
            'time' => '09:00',
            'weather' => 'Wetter: 20°C, windstill, bewölkt',
            'description' => 'Wieder Probleme mit der Abdichtung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 2,
            'title' => 'Baustellenbegehung',
            'date' => '2019-10-19',
            'time' => '10:00',
            'weather' => 'Wetter: 23°C, starker Wind, bewölkt',
            'description' => 'Müll wurde nicht entsorgt',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visits')->insert([
            'project_id' => 3,
            'title' => 'Jour Fix',
            'date' => '2019-10-10',
            'time' => '09:00',
            'weather' => 'Wetter: 23°C, starker Wind, bewölkt',
            'description' => 'Tür falsch herum montiert',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
