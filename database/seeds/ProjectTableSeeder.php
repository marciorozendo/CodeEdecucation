<?php

use CodeEducation\Entities\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Project::truncate();
        factory(Project::class, 10)->create();
    }
}
