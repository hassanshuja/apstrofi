<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_l');
            $table->enum('type',['PERCENTAGE','FIXED']);
            $table->double('amount')->default(0);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->double('max_discount_amount')->default(0);
            $table->double('min_order_amount')->default(0);
            $table->text('description')->nullable();
            $table->text('description_l')->nullable();
            $table->tinyInteger('discount_related')->comment('0=>cart,1=>category,2=>product');
            $table->tinyInteger('offer_type')->default(0)->comment('0=>Individual,1=>Combine');
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
        Schema::dropIfExists('discounts');
    }
}
