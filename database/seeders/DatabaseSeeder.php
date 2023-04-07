<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Resumes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         $this->call([
            UserSeeder::class,
            ResumesSeeder::class,
            CompanysSeeder::class,
            CategoriesSeeder::class,
            VacanciesSeeder::class,
            ApplicationsSeeder::class,
            ContactsSeeder::class
         ]);
         
         
    }
}
