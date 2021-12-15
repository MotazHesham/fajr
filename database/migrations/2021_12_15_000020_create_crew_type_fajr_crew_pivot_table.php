<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewTypeFajrCrewPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crew_type_fajr_crew', function (Blueprint $table) {
            $table->unsignedBigInteger('fajr_crew_id');
            $table->foreign('fajr_crew_id', 'fajr_crew_id_fk_5595505')->references('id')->on('fajr_crews')->onDelete('cascade');
            $table->unsignedBigInteger('crew_type_id');
            $table->foreign('crew_type_id', 'crew_type_id_fk_5595505')->references('id')->on('crew_types')->onDelete('cascade');
        });
    }
}
