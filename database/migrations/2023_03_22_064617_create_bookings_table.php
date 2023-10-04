<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('booking_notes')->nullable();
            $table->string('booked_type')->nullable();
            $table->string('booked_room')->nullable();
            $table->string('booking_package')->nullable();
            $table->double('booking_fee')->nullable();
            $table->double('total_payment')->nullable();
            $table->string('rentEquip')->nullable();
            $table->dateTime('start_dateTime');
            $table->dateTime('end_dateTime');
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
        Schema::dropIfExists('bookings');
    }
};
