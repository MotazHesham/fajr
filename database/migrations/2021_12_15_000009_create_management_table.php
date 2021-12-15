<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTable extends Migration
{
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
