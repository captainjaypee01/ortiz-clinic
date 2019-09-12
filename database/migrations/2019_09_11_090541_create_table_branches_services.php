<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBranchesServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_service', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->unsignedBigInteger('branch_id')->nullable(); 
            $table->unsignedBigInteger('service_id')->nullable(); 
            
            $table->foreign('branch_id')->references('id')->on('branches'); 
            $table->foreign('service_id')->references('id')->on('services'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_service');
    }
}
