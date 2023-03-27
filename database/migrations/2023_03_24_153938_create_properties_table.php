<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('purpose',20);
            $table->string('property_type',50);
            $table->string('address',3000);
            $table->integer('area_size')->unsigned();
            $table->string('area_size_unit',30);
            $table->integer('price')->unsigned();
            $table->tinyInteger('bedrooms')->unsigned();
            $table->tinyInteger('bathrooms')->unsigned();
            $table->string('title', 1000);
            $table->text('description', 65000)->nullable();
            $table->string('email', 50);
            $table->string('contact_no', 30);
            $table->string('image');
            $table->timestamps();
            $table->index('vendor_id');
            $table->index('city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
