<?php

namespace Modules\Order\Database\factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(6),
            'price'=>random_int(10,20),
            'quantity'=>random_int(1,5),
            'description'=>$this->faker->text(10),
            'sku'=>random_int(1,10),

        ];
    }
}

