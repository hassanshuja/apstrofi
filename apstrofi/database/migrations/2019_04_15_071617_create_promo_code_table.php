<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->enum('type',['FIXED','PERCENTAGE']);
            $table->integer('value')->default(0);
            $table->text('description')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();


           /* // The voucher code
            $table->string( 'code' )->nullable();

            // The human readable voucher code name
            $table->string( 'name' );

            // The description of the voucher - Not necessary
            $table->text( 'description' )->nullable();

            // The number of uses currently
            $table->integer('uses')->unsigned()->nullable();

            // The max uses this voucher has
            $table->integer( 'max_uses')->unsigned()->nullable();

            // How many times a user can use this voucher.
            $table->integer('max_uses_user')->unsigned()->nullable();

            // The type can be: voucher, discount, sale. What ever you want.
            $table->tinyInteger('type')->unsigned()->comment('1=>Promo Code,2=>discount,3=>Sale');

            // The amount to discount by (in pennies) in this example.
            $table->integer( 'discount_amount')->default(0);

            // The amount to discount by minimum purchase.
            $table->double('min_purchase')->default(0);

            $table->double('min_cart')->default(0);

            // Whether or not the voucher is a percentage or a fixed price.
            $table->boolean( 'is_fixed' )->default( true );

            // When the voucher begins
            $table->timestamp( 'starts_at' )->nullable();

            // When the voucher ends
            $table->timestamp( 'expires_at' )->nullable();

            // You know what this is...
            $table->timestamps( );

            // We like to horde data.
            $table->softDeletes( );*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
}
