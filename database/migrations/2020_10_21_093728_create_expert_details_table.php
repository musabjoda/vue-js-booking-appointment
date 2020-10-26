<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_details', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('users');
            $table->string('job_title');
            $table->time('work_from', 0);
            $table->time('work_to', 0);	
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
        Schema::dropIfExists('expert_details');
    }
}
