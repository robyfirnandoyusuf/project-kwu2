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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->string('title');
            $table->text('desc');
            $table->string('building_age');
            $table->string('postal_code');
            $table->double('square_meter');
            $table->string('price');
            $table->text('address');
            $table->text('contact_name');
            $table->text('contact_email');
            $table->text('contact_phone');
            $table->enum('type', ['sale', 'rent']);
            $table->enum('status', [0, 1]);
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
