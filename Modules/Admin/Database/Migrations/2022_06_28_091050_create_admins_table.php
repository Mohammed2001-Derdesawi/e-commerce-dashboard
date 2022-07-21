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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->date('last_login_at')->nullable();
<<<<<<< HEAD:Modules/Admin/Database/Migrations/2022_06_28_171133_create_admins_table.php
//            $table->timestamp('email_verified_at')->nullable();
            // $table->date('status')->default('1');
=======
            $table->integer('status')->default('1');
>>>>>>> refs/remotes/origin/main:Modules/Admin/Database/Migrations/2022_06_28_091050_create_admins_table.php
            $table->rememberToken();

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
        Schema::dropIfExists('admins');
    }
};
