<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('duration')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->text('itinary')->nullable();
            $table->double('price',10,2)->nullable();
            $table->text('policy')->nullable();
            $table->text('hotel')->nullable();
            $table->text('term_condition')->nullable();
            $table->string('photo')->nullable();
            $table->string('banner')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('status')->default('activated');
            $table->timestamps();
             $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
