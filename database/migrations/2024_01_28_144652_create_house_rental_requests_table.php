<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseRentalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_rental_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('priority');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('contact_method');
            $table->text('files');
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
        Schema::dropIfExists('house_rental_requests');
    }
}
