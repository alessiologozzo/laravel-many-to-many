<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config("dbseeder.technologies");

        foreach($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->save(); 
        }
    }
}
