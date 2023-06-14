<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config("dbseeder.projects");
        
        foreach($projects as $project){
            $newProject = new Project();
            $newProject->name = $project["name"];
            $newProject->description = $project["description"];
            $newProject->slug = Str::slug($project["name"], '-');
            $newProject->user_id = $project["user_id"];
            $newProject->save();
        }
    }
}
