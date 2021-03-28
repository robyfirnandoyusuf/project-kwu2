<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRefDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_districts', function (Blueprint $table) {
            $table->foreign('city_id', 'ref_districts_ibfk_1')->references('id')->on('ref_cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_districts', function (Blueprint $table) {
            $table->dropForeign('ref_districts_ibfk_1');
        });
    }
}
