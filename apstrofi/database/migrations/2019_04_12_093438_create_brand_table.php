<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name_l')->nullable();
            $table->string('slug')/*->unique()*/;
            $table->string('country_name')->nullable();
            $table->string('country_name_l')->nullable();
            $table->integer('brand_since')->nullable();
            $table->text('description')->nullable();
            $table->text('description_l')->nullable();
            $table->text('image_url')->nullable();
            $table->text('banner_url')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('brands');
    }
}
