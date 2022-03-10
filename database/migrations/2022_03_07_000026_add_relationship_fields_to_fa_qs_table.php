<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFaQsTable extends Migration
{
    public function up()
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_6155639')->references('id')->on('services');
        });
    }
}
