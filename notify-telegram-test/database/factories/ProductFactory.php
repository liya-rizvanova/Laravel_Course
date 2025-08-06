<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Связь с моделью Product.
     */
    protected $model = Product::class;

    /**
     * Определяет состояние по умолчанию.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => strtoupper($this->faker->bothify('SKU-#####')),
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(3, 10, 999),
        ];
    }
}
