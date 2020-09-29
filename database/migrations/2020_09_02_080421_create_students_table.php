<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('national_id');
            $table->string('academic_id');
            $table->string('date_of_birth');
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id');
            $table->foreign('address_id')->on('address')->references('id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
}
