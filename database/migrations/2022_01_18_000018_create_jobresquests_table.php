<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobresquestsTable extends Migration
{
    public function up()
    {
        Schema::create('jobresquests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('address');
            $table->string('job');
            $table->longText('extra_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
