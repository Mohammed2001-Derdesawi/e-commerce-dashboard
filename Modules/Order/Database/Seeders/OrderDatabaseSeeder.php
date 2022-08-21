<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order\Order;
use Modules\Order\Entities\Order\OrderDetails;
use Modules\Order\Entities\Order\Product;
use Modules\Order\Entities\Payment\Payment;
use Modules\Order\Entities\Shipment\Shipment;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // Order::factory(10)->create();
        // Product::factory(10)->create();
        // OrderDetails::factory(10)->create();
         Payment::create(['name'=>'Paypal']);
         Payment::create(['name'=>'Stripe']);
         Shipment::create(['name'=>'Shippo']);
        // $this->call("OthersTableSeeder");
    }
}
