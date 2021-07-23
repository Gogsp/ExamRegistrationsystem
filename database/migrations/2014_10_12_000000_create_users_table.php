<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('index_no');
            $table->string('email')->unique();
            $table->string('image_path');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('user_type')->default(0);
            $table->unsignedBigInteger('uni_id')->nullable();
            $table->unsignedBigInteger('fac_id')->nullable();
            $table->unsignedBigInteger('dept_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('uni_id')->references('id')->on('universities')
            ->onDelete('cascade');
            
            $table->foreign('fac_id')->references('id')->on('faculties')
            ->onDelete('cascade');

            $table->foreign('dept_id')->references('id')->on('departments')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
