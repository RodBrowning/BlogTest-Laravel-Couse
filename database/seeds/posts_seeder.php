<?php

use Illuminate\Database\Seeder;


class posts_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		
    	factory(App\Post::class, 30)->create();
    	
    }
}
