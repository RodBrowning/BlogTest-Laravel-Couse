<?php

use Illuminate\Database\Seeder;

class tags_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 15)->create();
    }
}
