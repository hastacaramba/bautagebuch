<?php

use Illuminate\Database\Seeder;

class VisitationnotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitationnotes')->insert([
            'visit_id' => 1,
            'title' => 'Estrich noch feucht',
            'category' => 'Mangel',
            'notes' => 'Der Estrich wurde nicht korrekt aufgeheizt un d muss noch komplett getrocknet werden.',
            'deadline' => '2019-11-20',
            'done' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visitationnotes')->insert([
            'visit_id' => 2,
            'title' => 'Verputz noch feucht',
            'category' => 'Mangel',
            'notes' => 'Der Putz ist feucht. Mauertrockung erforderlich',
            'deadline' => '2019-11-15',
            'done' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('visitationnotes')->insert([
            'visit_id' => 1,
            'title' => 'Verputz noch feucht',
            'category' => 'Mangel',
            'notes' => 'Der Putz ist feucht. Mauertrockung erforderlich',
            'deadline' => '2019-11-15',
            'done' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
