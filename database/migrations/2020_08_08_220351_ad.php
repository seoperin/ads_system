<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ad extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->integer('price');
            $table->integer('amount');
            $table->integer('views')->default(0);
            $table->string('banner');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
