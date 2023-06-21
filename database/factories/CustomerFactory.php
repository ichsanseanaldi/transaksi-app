<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_cust'=> fake()->bothify('C-##?'),
            'nama_cust'=>fake()->name(),
            'telp_cust'=>'08'.fake()->randomNumber(9, true) 
        ];
    }
}
