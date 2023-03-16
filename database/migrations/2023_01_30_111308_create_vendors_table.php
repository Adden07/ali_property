<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('contact_person_name', 50);
            $table->string('contact_no', 30);
            $table->string('email', 50);
            $table->string('password', 100);
            $table->string('image', 2000);
            $table->string('business_type', 50);
            $table->tinyInteger('status')->default(1);//1 means active 0 means deactive
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
        Schema::dropIfExists('vendors');
    }
}
