<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_l');
            $table->string('slug')->unique();
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->boolean('status')->default(1);
            $table->text('description')->nullable();
            $table->text('description_l')->nullable();
            $table->text('image_url')->nullable();
            $table->integer('order')->nullable();
            $table->integer('old_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /*$table->foreign('parent_id')->references('id')->on('categories');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
