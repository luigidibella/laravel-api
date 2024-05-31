<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* for($i = 0; $i < 50; $i++){

            $project = Project::inRandomOrder()->first();

            $technology_id = Technology::inRandomOrder()->first()->id;

            $project->technologies()->attach($technology_id);

        } */

        for ($i = 0; $i < 50; $i++) {
            $project = Project::inRandomOrder()->first();

            // Ottieni gli ID delle tecnologie già associate al progetto
            $existingTechnologyIds = $project->technologies->pluck('id')->toArray();

            do {
                // Trova un technology_id che non sia già associato al progetto
                $technology_id = Technology::inRandomOrder()->first()->id;
            } while (in_array($technology_id, $existingTechnologyIds));

            // Associa la nuova tecnologia al progetto
            $project->technologies()->attach($technology_id);
        }

    }
}
