<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("unit_id");
            $table->string("medicine_name");
            $table->string("medicine_image")->nullable();
            $table->integer("quantity");
            $table->integer("price");
            $table->integer("discount")->default(0);
            $table->text("instruction")->nullable();
            $table->string("barcode");
            $table->timestamp('expire_date');
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
        Schema::dropIfExists('medicines');
    }
}
