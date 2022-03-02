<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleschedules', function (Blueprint $table) {
            $table->id();
            $table->time('starttime', 0);
            $table->time('starttime_expected', 0);
            $table->foreignId('vehicle_id');
            $table->foreignId('startpoint_id')->nullable();
            $table->foreignId('endpoint_id')->nullable();
            $table->foreignId('vehiclepoint_id')->nullable();
            $table->enum('type', ['go', 'back']);
            $table->boolean('status')->nullable()->default(1);
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
        Schema::dropIfExists('vehicleschedules');
    }
}
