<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $userPers = User::where('type', 'person')->pluck('id')->toArray();
        
        return [
            'user_id' => $this->faker->randomElement($userPers),
            'description' => $this->faker->text(30),
            'localization' => $this->faker->text(30),
            'phone' => $this->faker->phoneNumber(),
            'experience' => $this->faker->text(30),
            'formations' => $this->faker->text(30),
            'qualifications' => $this->faker->text(30),
            'skills' => $this->faker->text(30),
            'languages' => $this->faker->text(30),
        ];
    }

}
