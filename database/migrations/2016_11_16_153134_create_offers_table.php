<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->double('lat',20,10)->nullable();
            $table->double('lng',20,10)->nullable();
            $table->text('text');
            $table->string('image')->nullable();
            $table->string('media')->nullable();
            $table->string('download_pdf')->nullable();
            $table->string('view_pdf')->nullable();
            $table->string('slug')->nullable();
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
        Schema::drop('offers');
    }
}
