<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vendor_id');
            $table->unsignedSmallInteger('country_id');
            $table->unsignedTinyInteger('pkg_type_id');
            $table->string('title', 100);
            $table->integer('infant')->nullable();
            $table->integer('child')->nullable();
            $table->integer('adult')->nullable();
            $table->integer('dinner')->nullable();
            $table->mediumText('description');
            $table->string('image', 1000);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_best_seller')->default(0);
            $table->tinyInteger('is_newest')->default(0);
            $table->tinyInteger('is_morning')->default(0);
            $table->tinyInteger('is_evening')->default(0);
            $table->enum('status', ['active', 'deactive', 'ban'])->default('ban');
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
        Schema::dropIfExists('vendor_packages');
    }
}
