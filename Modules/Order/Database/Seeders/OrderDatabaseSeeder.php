<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order\Order;
use Modules\Order\Entities\Order\OrderDetails;
use Modules\Order\Entities\Order\Product;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Order::factory(10)->create();
        Product::factory(10)->create();
        OrderDetails::factory(10)->create();

        // $this->call("OthersTableSeeder");
    }
}
