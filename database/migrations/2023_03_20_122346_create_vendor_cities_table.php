<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_cities', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id')->unsigned();
            $table->string('city', 50);
            $table->timestamps();
            $table->index('vendor_id');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_cities');
    }
}
