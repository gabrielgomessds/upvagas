<?php

namespace Database\Seeders;

use App\Models\Companys;
use Illuminate\Database\Seeder;

class CompanysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Companys::factory(8)->create();
    }
}
