<?php

namespace Database\Factories;

use App\Models\NaufalPengguna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class NaufalPenggunaFactory extends Factory
{
    protected $model = NaufalPengguna::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345'),
            'role' => $this->faker->randomElement(['admin', 'user']),
        ];
    }
}
