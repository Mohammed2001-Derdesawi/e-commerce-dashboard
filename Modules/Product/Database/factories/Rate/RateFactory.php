<?php

namespace Modules\Product\Database\factories\Rate;

use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Rate\Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'rate'=>rand(1,5),
            'rateable_id'=>rand(1,10),
            'rateable_type'=>'Modules\Product\Entities\Product\Product',
        ];
    }
}

