<?php

use Illuminate\Database\Seeder;

class add_category_name extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->insert([[
		  	'name' => 'Completed',
		],[
		    'name' => 'In_progress',
		]]);
		    }
}
