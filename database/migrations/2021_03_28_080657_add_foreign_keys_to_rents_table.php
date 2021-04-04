<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->foreign('property_id', 'rents_ibfk_1')->references('id')->on('properties')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'rents_ibfk_2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('active_status', 'rents_ibfk_3')->references('ref')->on('ref_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropForeign('rents_ibfk_1');
            $table->dropForeign('rents_ibfk_2');
            $table->dropForeign('rents_ibfk_3');
        });
    }
}
