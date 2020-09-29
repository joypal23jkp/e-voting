<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubElectionCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_election_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sub_election_id');
            $table->unsignedInteger('candidate_id');
            $table->foreign('sub_election_id')->on('sub_elections')->references('id');
            $table->foreign('candidate_id')->on('candidates')->references('id');
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
        Schema::dropIfExists('sub_election_candidates');
    }
}
