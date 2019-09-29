<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMerchants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('image_url')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('suburb')->nullable();
            $table->string('area')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('address')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('suburb_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->text('notes')->nullable();
            $table->enum('gender',['MALE','FEMALE','NONE'])->default('NONE');
            $table->string('verification_code')->nullable();
            $table->boolean('status_verification')->default(1);
            $table->boolean('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
