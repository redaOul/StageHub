<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample projects
        DB::table('projects')->insert([
            'titre' => 'Project 1',
            'description' => 'Description for Project 1.',
            'framework' => 'Laravel Framework',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('projects')->insert([
            'titre' => 'Project 2',
            'description' => 'Description for Project 2.',
            'framework' => 'React Framework',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
