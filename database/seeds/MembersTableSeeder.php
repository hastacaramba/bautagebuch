<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'project_id' => 1,
            'contact_id' => 1,
            'subarea_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 2,
            'contact_id' => 1,
            'subarea_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 3,
            'contact_id' => 1,
            'subarea_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 1,
            'contact_id' => 2,
            'subarea_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 2,
            'contact_id' => 2,
            'subarea_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 3,
            'contact_id' => 2,
            'subarea_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 1,
            'contact_id' => 3,
            'subarea_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 2,
            'contact_id' => 3,
            'subarea_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('members')->insert([
            'project_id' => 3,
            'contact_id' => 3,
            'subarea_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
