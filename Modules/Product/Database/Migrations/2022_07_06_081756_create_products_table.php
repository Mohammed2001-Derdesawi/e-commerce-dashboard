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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->float('width');
            $table->float('height');
            $table->float('length');
            $table->float('weight');
            $table->string('meta_name');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('is_tax');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->index(['description']); //'price','quantity','name','description','sku'
            $table->index(['name']); //'price','quantity','name','description','sku'


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
        Schema::dropIfExists('products');
    }
};
