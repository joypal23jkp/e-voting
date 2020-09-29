<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vote_review');
            $table->timestamps();
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('candidate_id');
            $table->unsignedInteger('sub_election_id')->nullable();
            $table->unsignedInteger('election_id')->nullable();
            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('candidate_id')->on('candidates')->references('id');
            $table->foreign('sub_election_id')->on('sub_elections')->references('id');
            $table->foreign('election_id')->on('elections')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
