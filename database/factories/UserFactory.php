<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

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
        $faker = \Faker\Factory::create('es_ES'); // Usando el locale español
        
        return [
            'name' => $faker->firstName(),
            'lastname' => $faker->lastName(),
            'email' => $faker->unique()->safeEmail(),
            'dni' => $faker->randomElement([null, $faker->numerify('########')]),
            'carnet_extrangeria' => function (array $attributes) use ($faker) {
                return $attributes['dni'] === null ? $faker->numerify('############') : null;
            },
            'date_of_birth' => $faker->dateTimeBetween('-75 years', '-24 years')->format('Y-m-d'),
            'phone' => '9' . $faker->numerify('########'),
            'address' => $faker->streetAddress(),
            'country' => 'Perú',
            'city' => 'Lima',
            'postal_code' => $faker->numerify('#####'),
            'role' => $faker->randomElement(['professional', 'patient']),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(?callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
