<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->foreign('user_id', 'properties_ibfk_1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('active_status', 'properties_ibfk_3')->references('ref')->on('ref_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('type', 'properties_ibfk_4')->references('ref')->on('ref_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('district_id', 'properties_ibfk_5')->references('id')->on('ref_districts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign('properties_ibfk_1');
            $table->dropForeign('properties_ibfk_3');
            $table->dropForeign('properties_ibfk_4');
            $table->dropForeign('properties_ibfk_5');
        });
    }
}
