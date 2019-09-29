<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageBuilderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_builder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->longText('section_1')->nullable();
            $table->longText('section_2')->nullable();
            $table->longText('section_3')->nullable();
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
        Schema::dropIfExists('page_builder');
    }
}
