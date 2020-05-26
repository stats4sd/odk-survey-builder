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
	            'title' => 'Decision Making',
	            'logo' => '/decision_making.png',
	            'description' => '',
        	],
        	[
	        	'id' =>'2',
	            'title' => 'On Farm',
	            'logo' => '/on_farm.png',
	            'description' => '',
        	],
        	[
	        	'id' =>'3',
	            'title' => 'Food',
	            'logo' => '/food.png',
	            'description' => '',
        	],
        	[
	        	'id' =>'4',
	            'title' => 'Poverty Dynamics',
	            'logo' => '/poverty_dynamics.png',
	            'description' => '',
        	],
        	[
	        	'id' =>'5',
	            'title' => 'Trees',
	            'logo' => '/trees.png',
	            'description' => '',
        	],
        	[
	        	'id' =>'6',
	            'title' => 'Gender',
	            'logo' => '/gender.png',
	            'description' => '',
        	],


        	
        ]);
    }
}
