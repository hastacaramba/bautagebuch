<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'firstname' => 'Klaus',
            'surname' => 'Clever',
            'company' => 'Clever Elektro',
            'street' => 'Musterstraße',
            'housenumber' => '3a',
            'postcode' => "12345",
            'city' => 'Musterstadt',
            'email' => 'klaus.clever@mailomat.de',
            'phone' => '012312334',
            'mobile' => '0151123456',
            'fax' => '012312335',
            'info' => 'zertifiziert und etabliert, hat bereits andere Projekte erfolgreich bei uns gemacht',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('contacts')->insert([
            'firstname' => 'Jens',
            'surname' => 'Jever',
            'company' => 'Jever Hochbau',
            'street' => 'Testweg',
            'housenumber' => '4',
            'postcode' => "94474",
            'city' => 'Vilshofen',
            'email' => 'jens.Jever@mailomat.de',
            'phone' => '012312334',
            'mobile' => '0151123456',
            'info' => 'Baugeschäft mit guter Ausstattung an Maschinen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('contacts')->insert([
            'firstname' => 'Franz',
            'surname' => 'Huber',
            'company' => 'Zimmerei Huber',
            'street' => 'Dorfstraße',
            'housenumber' => '8a',
            'postcode' => "94474",
            'city' => 'Vilshofen',
            'email' => 'zimmererhuber@huber.de',
            'phone' => '08547123498',
            'mobile' => '0152345678',
            'fax' => '085471234922',
            'info' => 'Familienbetrieb',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
