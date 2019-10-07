<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
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
            $table->string('name')->nullable();
            $table->string('name_l')->nullable();
            $table->string('modal')->nullable();
            $table->enum('sizing_gender',['MEN','WOMEN','NONE'])->default('NONE');
            $table->enum('sizing_type',['TOPS','BOTTOM','SHOES','NONE'])->default('NONE');
            $table->double('weight')->default(0)->nullable();
            $table->integer('brand_id')->default(0)->nullable();
            $table->integer('category_id')->default(0)->nullable();
            $table->integer('merchant_id')->default(0)->nullable();
            $table->string('sku')->nullable();
            $table->integer('attribute_value_color_id')->nullable()->comment('Color id');
            $table->integer('total_qty')->default(0);
            $table->double('price')->nullable();
            $table->double('sale_price')->nullable();
            $table->text('slug')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('description')->nullable();
            $table->text('description_l')->nullable();
            $table->text('sizing_detail')->nullable();
            $table->text('sizing_detail_l')->nullable();
            $table->text('shipping_return_detail')->nullable();
            $table->text('shipping_return_detail_l')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_new_arrival')->default(0);
            $table->boolean('stock_availability')->default(1);
            $table->boolean('is_sustainable')->default(0);
            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('products');
    }
}
