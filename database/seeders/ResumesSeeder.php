<?php

namespace Database\Seeders;

use App\Models\Resumes;
use Illuminate\Database\Seeder;

class ResumesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resumes::factory(3)->create();
    }
}
