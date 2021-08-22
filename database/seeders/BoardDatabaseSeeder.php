<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoardDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Board::factory(10)->create();
    }
}
