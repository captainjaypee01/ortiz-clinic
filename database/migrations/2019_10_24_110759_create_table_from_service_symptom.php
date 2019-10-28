<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFromServiceSymptom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_symptom', function (Blueprint $table) {
            $table->bigIncrements('id');
             
            $table->unsignedBigInteger('service_id')->nullable(); 
            $table->unsignedBigInteger('symptom_id')->nullable(); 
            
            $table->foreign('service_id')->references('id')->on('services'); 
            $table->foreign('symptom_id')->references('id')->on('symptoms'); 
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_symptom');
    }
}
