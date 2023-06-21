<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang'=> fake()->bothify('B-##?'),
            'nama_barang'=>fake()->lexify('Barang ?'),
            'harga_barang'=>round(fake()->randomDigitNotNull()*100000)
        ];
    }
}
