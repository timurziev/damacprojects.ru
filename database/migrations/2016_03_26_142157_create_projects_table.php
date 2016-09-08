<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('city_id');
            $table->integer('country_id');
            $table->integer('region_id');
            $table->double('lat',20,10)->nullable();
            $table->double('lng',20,10)->nullable();
            $table->text('text');
            $table->string('image')->nullable();
            $table->string('media')->nullable();
            $table->text('facilities')->nullable();
            $table->text('community_info')->nullable();
            $table->text('update')->nullable();
            $table->string('download_pdf')->nullable();
            $table->string('view_pdf')->nullable();
            $table->tinyinteger('is_slide')->nullable();
            $table->tinyinteger('is_popular')->nullable();
            $table->string('slug')->nullable();
            $table->integer('category_id');
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
        Schema::drop('projects');
    }
}
