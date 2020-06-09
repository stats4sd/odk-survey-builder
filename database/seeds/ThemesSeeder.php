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
	        	'id' => 'decision-making',
	            'title' => 'Decision Making',
	            'logo' => '/decision_making.png',
	            'description' => '',
        	],
        	[
	        	'id' => 'on-farm',
	            'title' => 'On Farm',
	            'logo' => '/on_farm.png',
	            'description' => '',
        	],
        	[
	        	'id' => 'food',
	            'title' => 'Food',
	            'logo' => '/food.png',
	            'description' => '',
        	],
        	[
	        	'id' => 'poverty-dynamics',
	            'title' => 'Poverty Dynamics',
	            'logo' => '/poverty_dynamics.png',
	            'description' => '',
        	],
        	[
	        	'id' => 'trees',
	            'title' => 'Trees',
	            'logo' => '/trees.png',
	            'description' => '',
        	],
        	[
	        	'id' => 'gender',
	            'title' => 'Gender',
	            'logo' => '/gender.png',
	            'description' => '',
        	],



        ]);
    }
}
