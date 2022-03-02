<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentbankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentbankings', function (Blueprint $table) {
            $table->id();
            $table->char('account_number', 255)->nullable();
            $table->char('account_name', 255)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_img')->nullable();
            $table->boolean('status')->nullable()->default(0);
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
        Schema::dropIfExists('paymentbankings');
    }
}
