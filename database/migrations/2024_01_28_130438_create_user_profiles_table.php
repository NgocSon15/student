<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('birth_city_id')->nullable();
            $table->integer('birth_district_id')->nullable();
            $table->integer('birth_ward_id')->nullable();
            $table->integer('residence_city_id')->nullable();
            $table->integer('residence_district_id')->nullable();
            $table->integer('residence_ward_id')->nullable();
            $table->string('identity_number');
            $table->date('identity_date');
            $table->integer('identity_place')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('ethnic')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('admission_code')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('health_insurance_code')->nullable();
            $table->string('householder_name')->nullable();
            $table->date('householder_dob')->nullable();
            $table->tinyInteger('householder_gender')->nullable();
            $table->string('householder_relationship')->nullable();
            $table->string('father_name')->nullable();
            $table->date('father_dob')->nullable();
            $table->string('father_phone_number')->nullable();
            $table->string('father_job')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('mother_phone_number')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('student_types')->nullable();
            $table->integer('tuition_fee_type')->nullable();
            $table->string('image_file');
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
        Schema::dropIfExists('user_profiles');
    }
}
