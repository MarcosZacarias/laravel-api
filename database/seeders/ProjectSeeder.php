<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck('id');
        
        $types[] = null;

        for ($i=0; $i < 50; $i++) { 
            $type_id = $faker->randomElement($types);

            $project = new Project();
            $project->type_id = $type_id;
            $project->name = $faker->words(2, true);
            $project->repo_path = $faker->url();
            $project->slug = Str::slug($project->name);
            $project->description = $faker->paragraphs(3,true);
            $project->save();
        }
    }
}