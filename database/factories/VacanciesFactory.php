<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Companys;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VacanciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $optionsTime = ['integral', 'temporario'];
        $optionsModel = ['Presencial', 'Home Office', 'Hibrido'];
        $optionsHiring = ['CLT', 'PJ'];
        $optionsLevel = ['estagiario', 'junior', 'pleno', 'senior', 'especialista', 'gerente'];
        $optionsSituation = ['open', 'close'];
        
        return [
            'company_id' => Companys::all()->random()->id,
            'category_id' => Categories::all()->random()->id,
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->text(60),
            'qualifications' => $this->faker->text(60),
            'salary_intro' => $this->faker->randomFloat(2, 10, 15000),
            'salary_final' => $this->faker->randomFloat(2, 10, 15000),
            'quantity' => $this->faker->randomNumber(2),
            'localization' => $this->faker->city(),
            'model' => $this->faker->randomElement($optionsModel),
            'time' => $this->faker->randomElement($optionsTime),
            'hiring_type' => $this->faker->randomElement($optionsHiring),
            'level' => $this->faker->randomElement($optionsLevel),
            'situation' => $this->faker->randomElement($optionsSituation),
            'slug' => Str::slug($this->faker->sentence()),
        ];
    }
}
