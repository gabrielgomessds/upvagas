<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $options = [
            'Marketing', 
            'Atendimento ao Cliente', 
            'Recursos Humanos',
            'Desenvolvedor',
            'Business Development',
            'Vendas',
            'Educação',
            'Design & Criativo'
        ];

        return [
            'title' => $this->faker->randomElement($options),
            'icon' => $this->faker->imageUrl(),
            'slug' => Str::slug($this->faker->sentence())
        ];
    }
}
