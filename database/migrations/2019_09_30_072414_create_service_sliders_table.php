<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title1')->nullable();
            $table->string('sub_title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('sub_title2')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('activated');
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
        Schema::dropIfExists('service_sliders');
    }
}
