<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('Account');
            $table->integer('BalanceBroughtForward');
            $table->integer('MiscellaneousCharges');
            $table->integer('PropertyRates');
            $table->integer('WasteManagement');
            $table->integer('Water');
            $table->integer('Sanitation');
            $table->integer('VAT14');
            $table->integer('VAT15');
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
        Schema::dropIfExists('records');
    }
}
