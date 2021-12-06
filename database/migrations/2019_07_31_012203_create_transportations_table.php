<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->bigIncrements('id');
                        $table->string('yyyymmdd');
            $table->string('name');
            $table->string('address');
            $table->string('tanto');
            $table->string('num');
            $table->string('type');
            $table->string('car_number');
             $table->string('packing');
            $table->integer('cnt'); 
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
        Schema::dropIfExists('transportations');
    }
}
