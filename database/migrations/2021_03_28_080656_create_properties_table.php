<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->bigInteger('district_id')->unsigned();
            $table->string('postal_code');
            $table->string('address');
            $table->string('lat_long');
            $table->text('facs')->nullable();
            $table->text('poi')->nullable();
            $table->text('rules')->nullable();
            $table->integer('total');
            $table->integer('type');
            $table->string('square_meter');
            $table->integer('active_status')->default(0);
            $table->double('basic_price');
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
        Schema::dropIfExists('properties');
    }
}
