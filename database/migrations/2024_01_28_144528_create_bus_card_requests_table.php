<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusCardRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_card_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('bus_number')->nullable();
            $table->integer('interline_bus_type')->nullable();
            $table->string('address');
            $table->string('phone_number');
            $table->string('process_place');
            $table->integer('fee')->nullable();
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
        Schema::dropIfExists('bus_card_requests');
    }
}
