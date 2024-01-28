<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePauseExamRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pause_exam_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('subject_name');
            $table->string('teacher_name');
            $table->date('exam_date');
            $table->text('reason')->nullable();
            $table->text('files');
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
        Schema::dropIfExists('pause_exam_requests');
    }
}
