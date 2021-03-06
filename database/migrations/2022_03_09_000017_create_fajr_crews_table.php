<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFajrCrewsTable extends Migration
{
    public function up()
    {
        Schema::create('fajr_crews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('job_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
