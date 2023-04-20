<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('supply_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("medicine_id");
            $table->unsignedBigInteger("supplier_id");
            $table->text("detail")->nullable();
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('supply_histories');
    }
}
