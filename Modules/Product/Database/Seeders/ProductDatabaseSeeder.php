<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Attribute\Attribute;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Entities\Rate\Rate;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
<<<<<<< HEAD
        \Modules\Product\Entities\Attribute\Attribute::factory(20)->create();
=======
         Attribute::factory(20)->create();
        Comment::factory(20)->create();
        Rate::factory(20)->create();
>>>>>>> refs/remotes/origin/main

        // $this->call("OthersTableSeeder");
    }
}
