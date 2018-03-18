<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Course::class, 20)->create()->each(function ($course) {
	        $course->templates()->saveMany(factory(App\Template::class, 3)->make());
	    });
    }
}
