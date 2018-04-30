<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacture_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seed_type');
            $table->string('seed_plant');
            $table->integer('seed_cost');
            $table->string('date-produce-start',7);
            $table->string('date-produce-stop',7);
            $table->integer('seed_quantity');
            $table->string('date-distribute-start',7);
            $table->string('date-distribute-stop',7);
            $table->integer('distribute_quantity');
            $table->string('distribute_area');
            $table->string('materials');
            $table->string('agency_code');
            $table->string('user_create');
            $table->string('user_update');
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
        Schema::dropIfExists('manufacture_plans');
    }
}
