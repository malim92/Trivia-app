<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('search_history', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email');
            $table->integer('questions-num');
            $table->enum('difficulty', ['easy', 'medium', 'hard']);
            $table->enum('type', ['multiple', 'boolean']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('search_history');
    }
}