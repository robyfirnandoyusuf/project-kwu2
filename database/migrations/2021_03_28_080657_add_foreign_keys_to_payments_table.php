<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('rent_id', 'payments_ibfk_1')->references('id')->on('rents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('payment_method_id', 'payments_ibfk_2')->references('id')->on('reff_payment_methods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_ibfk_1');
            $table->dropForeign('payments_ibfk_2');
        });
    }
}
