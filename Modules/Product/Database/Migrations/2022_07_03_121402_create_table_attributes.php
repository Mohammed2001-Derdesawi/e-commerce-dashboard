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
<<<<<<<< HEAD:Modules/Product/Database/Migrations/2022_07_03_121402_create_table_attributes.php
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('type')->default('text');
            $table->index('name');
========
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('body');
            $table->morphs('commentable');

>>>>>>>> refs/remotes/origin/main:Modules/Product/Database/Migrations/2022_07_14_205457_create_comments_table.php

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
<<<<<<<< HEAD:Modules/Product/Database/Migrations/2022_07_03_121402_create_table_attributes.php
        Schema::dropIfExists('');
========
        Schema::dropIfExists('comments');
>>>>>>>> refs/remotes/origin/main:Modules/Product/Database/Migrations/2022_07_14_205457_create_comments_table.php
    }
};
