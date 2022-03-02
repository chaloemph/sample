<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipschedules', function (Blueprint $table) {
            $table->id();
            $table->time('starttime', 0);
            $table->time('starttime_expected', 0);
            $table->string('startpoint')->nullable();
            $table->string('endpoint')->nullable();
            $table->foreignId('ship_id');
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
        Schema::dropIfExists('shipschedules');
    }
}
