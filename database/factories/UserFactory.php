<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\User>
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
            'name'           => fake()->name(),
            'email'          => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'       => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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

    public function superAdmin(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Super Admin')->first();

            return ['role_id' => $role->id];
        });
    }

    public function admin(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Admin')->first();

            return ['role_id' => $role->id];
        });
    }

    public function vendorManager(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Vendor Manager')->first();

            return ['role_id' => $role->id];
        });
    }

    public function vendor(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Vendor')->first();

            return [
                'role_id' => $role->id,
                'name'    => fake()->firstName() . ' Vendor Representative',
            ];
        });
    }

    public function customerService(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Customer Service')->first();

            return [
                'role_id' => $role->id,
                'name'    => 'CS - ' . fake()->name(),
            ];
        });
    }

    public function contentManager(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Content Manager')->first();

            return ['role_id' => $role->id];
        });
    }

    public function user(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'User')->first();

            return ['role_id' => $role->id];
        });
    }

    public function guest(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Guest')->first();

            return ['role_id' => $role->id];
        });
    }
}
