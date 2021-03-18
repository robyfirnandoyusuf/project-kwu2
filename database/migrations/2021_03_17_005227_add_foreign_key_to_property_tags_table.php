<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_tags', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
            $table->foreign('property_id')->references('id')->on('properties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_tags', function (Blueprint $table) {
            //
        });
    }
}
