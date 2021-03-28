<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReffCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reff_cities', function (Blueprint $table) {
            $table->foreign('province_id', 'reff_cities_ibfk_1')->references('id')->on('reff_provinces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('province_id', 'reff_cities_ibfk_2')->references('id')->on('reff_provinces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reff_cities', function (Blueprint $table) {
            $table->dropForeign('reff_cities_ibfk_1');
            $table->dropForeign('reff_cities_ibfk_2');
        });
    }
}
