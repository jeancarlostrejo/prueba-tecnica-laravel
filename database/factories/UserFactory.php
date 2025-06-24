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
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identifier' => fake()->unique()->numberBetween(1000, 9999999),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'), // Contraseña encriptada
            'name' => fake()->name(),
            'phone' => fake()->optional()->numerify('##########'), // Número de celular opcional
            'dni' => fake()->unique()->numerify('###########'), // Cédula única
            'birth_date' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // Fecha de nacimiento (mayor de 18 años)
            'city_id' => fake()->numberBetween(1, 27), // ID de ciudad, el maximo es 27 porque es el número de ciudades que hay
            'role' => 'user',
            'email_verified_at' => fake()->dateTime()->format('Y-m-d H:i:s'), // Fecha de 
            'remember_token' => Str::random(10), // Token de sesión
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
