<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userPers = User::where('type', 'person')->pluck('id')->toArray();
        $vancancies = Vacancies::where('situation', 'open')->pluck('id')->toArray();
        //approved/refused/analyzing
        $options = ['approved', 'refused','analyzing'];

        return [
            'vacancy_id' => $this->faker->randomElement($vancancies),
            'user_id' => $this->faker->randomElement($userPers),
            'situation' => $this->faker->randomElement($options)
        ];
    }
}
