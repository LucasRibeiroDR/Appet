<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hour', function (Blueprint $table) {
            // $table->dateTime('date');
            // $table->time('hour');
            // $table->primary(['date', 'hour'])->unique();
            // $table->timestamps();
            $table->id();
            $table->foreignId('appointment_id')->references('id')->on('appointments');
            $table->enum('hour', ['08:00','09:00','10:00','11:00','14:00','15:00','16:00','17:00']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hour');
    }
}
