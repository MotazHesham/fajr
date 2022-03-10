<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('writer_name');
            $table->string('short_description');
            $table->date('date');
            $table->longText('long_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
