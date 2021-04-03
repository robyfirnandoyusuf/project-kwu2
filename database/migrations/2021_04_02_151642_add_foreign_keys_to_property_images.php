<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPropertyImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_images', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_images_ibfk_1')->references('id')->on('properties')->cascadeOnDelete();
            $table->foreign('media_id', 'property_images_ibfk_2')->references('id')->on('media')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_images', function (Blueprint $table) {
            $table->dropForeign('property_images_ibfk_1');
            $table->dropForeign('property_images_ibfk_2');
        });
    }
}
