<?php

namespace Modules\Order\Database\factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status'=>$this->faker->randomElement(['cancelled','completed','denied','expired','failed','pending','processing','refunded','delivered','delivering']),
            'user_id'=>random_int(1,10),
        ];
    }
}

