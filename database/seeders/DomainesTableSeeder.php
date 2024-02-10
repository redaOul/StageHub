<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domaines')->insert([
            'titre' => 'informatique',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('domaines')->insert([
            'titre' => 'mecanique',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('domaines')->insert([
            'titre' => 'economique',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
