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

            $table->integer('location_id');

            $table->string('location_id');

            $table->text('text');
            $table->string('image')->nullable();
            $table->string('img')->nullable();
            $table->string('media')->nullable();
            $table->text('facilities')->nullable();
            $table->string('floor_plans')->nullable();
            $table->text('community_info')->nullable();
            $table->text('update')->nullable();
            $table->string('download_pdf')->nullable();
            $table->string('view_pdf')->nullable();
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
