<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservartions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Foreign Keys
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger("employee_id")->nullable(); 
            $table->unsignedBigInteger('service_id')->nullable(); 
            $table->unsignedBigInteger('branch_id')->nullable(); 
            $table->unsignedBigInteger('room_id')->nullable();
            
            //Schedule
            $table->date("reservation_date")->nullable();
            $table->time("start_time")->nullable();
            $table->time("end_time")->nullable();

            // Amount
            $table->double("total_amount")->nullable();

            $table->text("payment_location")->nullabe();
            
            $table->tinyInteger("payment_status")->default(1)->nullable();
            $table->tinyInteger("status")->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservartions');
    }
}
