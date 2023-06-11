<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectTechnology;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectTechnologies = config("dbseeder.projectsTechnologies");

        foreach($projectTechnologies as $projectTechnology){
            $newProjectTechnology = new ProjectTechnology();
            $newProjectTechnology->project_id = $projectTechnology["project_id"];
            $newProjectTechnology->technology_id = $projectTechnology["technology_id"];
            $newProjectTechnology->save();
        }
    }
}
