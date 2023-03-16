<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name', 300);
            $table->string('short_desc', 1000);
            $table->string('long_desc', 65000);
            $table->string('image', 1000);
            $table->tinyInteger('is_form')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_best_seller')->default(0);
            $table->tinyInteger('is_newest')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('software_services');
    }
}
