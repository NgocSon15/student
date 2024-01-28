<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscriptRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcript_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->boolean('is_all_semesters');
            $table->string('semesters');
            $table->tinyInteger('transcript_type');
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
        Schema::dropIfExists('transcript_requests');
    }
}
