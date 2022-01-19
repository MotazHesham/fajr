<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('quotation_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('service');
            $table->datetime('date');
            $table->longText('extra_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
