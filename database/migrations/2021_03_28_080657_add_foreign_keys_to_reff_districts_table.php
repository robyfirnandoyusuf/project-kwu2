<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReffDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reff_districts', function (Blueprint $table) {
            $table->foreign('city_id', 'reff_districts_ibfk_1')->references('id')->on('reff_cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reff_districts', function (Blueprint $table) {
            $table->dropForeign('reff_districts_ibfk_1');
        });
    }
}
