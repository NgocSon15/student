<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotFinishedSubjectRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_finished_subject_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->integer('number_of_copies_vi');
            $table->integer('number_of_copies_en');
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('not_finished_subject_requests');
    }
}
