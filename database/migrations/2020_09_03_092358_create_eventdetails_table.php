<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventdetails', function (Blueprint $table) {
            $table->id();
            $table->date('startdate');
            $table->date('enddate');
            $table->string('teamname');
            $table->text('teamno');
            $table->foreignId('event_id')->reference('id')->on('events')->onDelete('cascade');
            $table->foreignId('pitch_id')->reference('id')->on('pitches')->onDelete('cascade');
            $table->foreignId('user_id')->reference('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventdetails');
    }
}
