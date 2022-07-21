<?php

namespace Modules\Product\Database\factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\Product\Entities\Attribute\Attribute;
>>>>>>> refs/remotes/origin/main

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $model = \Modules\Product\Entities\Attribute\Attribute::class;
=======
    protected $model = Attribute::class;
>>>>>>> refs/remotes/origin/main

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
            'name'=>$this->faker->name('5'),
            'type'=>$this->faker->name('5'),
=======
            'name'=>$this->faker->name(5),
            'type'=>$this->faker->name(5),
>>>>>>> refs/remotes/origin/main

        ];
    }
}

