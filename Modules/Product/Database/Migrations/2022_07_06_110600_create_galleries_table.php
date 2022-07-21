<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:Modules/Product/Database/Migrations/2022_07_06_110600_create_galleries_table.php
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();

            $table->string('path');
            $table->integer('is_main')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
========
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('price');
            $table->integer('quantity');
>>>>>>>> refs/remotes/origin/main:Modules/Order/Database/Migrations/2022_07_01_220831_create_orders_details_table.php

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:Modules/Product/Database/Migrations/2022_07_06_110600_create_galleries_table.php
        Schema::dropIfExists('galleries');
========
        Schema::dropIfExists('orders_details');
>>>>>>>> refs/remotes/origin/main:Modules/Order/Database/Migrations/2022_07_01_220831_create_orders_details_table.php
    }
};
