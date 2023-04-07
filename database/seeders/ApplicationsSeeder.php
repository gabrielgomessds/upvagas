<?php

namespace Database\Seeders;

use App\Models\Applications;
use Illuminate\Database\Seeder;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applications::factory(10)->create();
    }
}
