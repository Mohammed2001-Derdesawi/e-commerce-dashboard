<?php

namespace Modules\Order\Database\factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order\OrderDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'=>random_int(1,10),
            'product_id'=>random_int(1,10),
            'price'=>random_int(10,20),
            'quantity'=>random_int(1,5),

        ];
    }
}

