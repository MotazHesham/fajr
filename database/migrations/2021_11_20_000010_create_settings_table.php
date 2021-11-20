<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('experience');
            $table->integer('projects');
            $table->integer('clients');
            $table->integer('solutions');
            $table->longText('projects_text');
            $table->longText('news_text');
            $table->longText('building_text');
            $table->longText('trmem');
            $table->longText('fix_text');
            $table->longText('decore_text');
            $table->longText('about_us');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
