<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userCop = User::where('type', 'corporation')->pluck('id')->toArray();

        return [
            "user_id" => $this->faker->randomElement($userCop),
            'about' => $this->faker->text(),
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl()
        ];
    }
}
