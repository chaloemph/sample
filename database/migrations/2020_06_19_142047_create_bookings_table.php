<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('startpoint_id')->nullable();
            $table->foreignId('endpoint_id')->nullable();
            $table->date('checkin_date')->nullable();
            $table->date('checkout_date')->nullable();
            $table->integer('adult')->nullable();
            $table->enum('tour_type', ['oneway', 'roundtrip'])->nullable();
            $table->enum('tour_type_oneway', ['go', 'back'])->nullable();
            $table->foreignId('ship_id')->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->foreignId('trip_id')->nullable();
            $table->date('trip_date')->nullable();
            $table->integer('insurance_amount')->nullable();
            $table->integer('trip_rent_amount')->nullable();
            $table->foreignId('shipschedules_go')->nullable();
            $table->foreignId('shipschedules_back')->nullable();
            $table->integer('ship_rent_amount')->nullable();
            $table->foreignId('vehicleschedules_go')->nullable();
            $table->foreignId('vehicleschedules_back')->nullable();
            $table->string('vehicleschedules_go_detail')->nullable();
            $table->string('vehicleschedules_back_detail')->nullable();
            $table->integer('vehicle_rent_amount')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->char('ref', 255)->nullable();
            $table->double('sum', 15, 8)->nullable()->default(0);
            $table->string('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
