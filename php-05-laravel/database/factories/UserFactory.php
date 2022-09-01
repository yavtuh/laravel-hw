<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'birthdate' => fake()->dateTimeBetween('-70 years','-18years')->format('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->e164PhoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
        ];
    }

    public function withEmail(string $email)
    {
        return $this->state(function (array $attributes) use ($email) {
            return [
                'email' => $email,
            ];
        });
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */

}
