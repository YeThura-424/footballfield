<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentdetails', function (Blueprint $table) {
            $table->id();
            $table->string('starttime');
            $table->string('endtime');
            $table->date('rentdate');
            $table->text('renthour');
            $table->text('totalprice');
            $table->foreignId('pitch_id')->reference('id')->on('pitches')->onDelete('cascade');
            $table->foreignId('user_id')->reference('id')->on('users')->onDelete('cascade');
            $table->string('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('rentdetails');
    }
}
