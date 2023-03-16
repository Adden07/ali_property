<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageAddOnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_add_ons', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->unsigned();
            $table->string('title', 100);
            $table->integer('price')->unsigned();
            $table->enum('type', ['morning', 'evening']);
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
        Schema::dropIfExists('package_add_ons');
    }
}
