<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'email' => 'example@gmail.com'
        ])->create();
        Product::factory()
            ->has(ProductVariant::factory()->count(3), 'productVariants')
            ->count(20)
            ->create();

    }
}
