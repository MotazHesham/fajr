<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessPartnersTable extends Migration
{
    public function up()
    {
        Schema::create('success_partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
