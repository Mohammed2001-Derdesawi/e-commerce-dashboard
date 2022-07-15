<?php

namespace Modules\Product\Database\factories\Comment;

use Illuminate\Database\Eloquent\Factories\Factory;

class  CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Comment\Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=>$this->faker->text(30),
            'user_id'=>rand(1,10),
            'commentable_id'=>rand(1,10),
            'commentable_type'=>'Modules\Product\Entities\Product\Product',

        ];
    }
}

