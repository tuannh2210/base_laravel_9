<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'variant' => $this->faker->text(20),
            'stock_quantity' => $this->faker->randomNumber(),
            'product_id' => Product::inRandomOrder()->first()->id ?? 0,
        ];
    }
}
