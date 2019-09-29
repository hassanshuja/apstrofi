<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('blog_category_id');
            $table->string('author')->nullable();
            $table->string('author_l')->nullable();
            $table->string('title')->nullable();
            $table->string('title_l')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('subtitle_l')->nullable();
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->longText('description_l')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_home_show')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
