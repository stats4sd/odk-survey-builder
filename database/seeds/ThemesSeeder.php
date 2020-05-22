<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
        	[
        	'id' =>'1',
            'title' => 'metadata',
            'logo' => '/metadata.png',
            'description' => 'Enumerator data, time and date, location, GPS,consent, enumerator notes',
        	],
        	[
        	'id' =>'2',
            'title' => 'Household demographics',
            'logo' => '/household_demographics.png',
            'description' => 'Name, sex, age, education,h/h population',
        	],

        	
        ]);
    }
}
