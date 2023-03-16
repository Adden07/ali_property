<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelToursBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_tours_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('vendor_package_id')->unsigned();
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('phone_no', 50);
            $table->string('departure_city', 100);
            $table->smallInteger('no_of_infant')->unsigned()->default(0);
            $table->smallInteger('no_of_child')->unsigned()->default(0);
            $table->smallInteger('no_of_adult')->unsigned()->default(0);
            $table->integer('infant_amount')->unsigned()->default(0);
            $table->integer('child_amount')->unsigned()->default(0);
            $table->integer('adult_amount')->unsigned()->default(0);
            $table->integer('dinner')->unsigned()->default(0);
            $table->enum('timing', ['morning', 'evening']);
            $table->enum('status', ['approved', 'reject', 'pending'])->default('pending');
            $table->text('add_ons')->nullable();
            $table->date('travel_date');
            $table->integer('total_amount')->unsigned();
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
        Schema::dropIfExists('travel_tours_bookings');
    }
}
