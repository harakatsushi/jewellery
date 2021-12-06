<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interms', function (Blueprint $table) {
            $table->bigIncrements('id');
                                $table->string('yyyymmdd');
            $table->string('name');
            $table->string('address');
            $table->string('tanto');
            $table->string('num');
            $table->string('type');
            $table->string('amount');
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interms');
    }
}
