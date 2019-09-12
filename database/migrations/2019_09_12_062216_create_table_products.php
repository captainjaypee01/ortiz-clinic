<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("name")->nullable();
            $table->text("description")->nullable();
            $table->double("price")->nullable();
            $table->text("unit")->nullable();
            
            $table->tinyInteger("status")->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes(); 

            $table->index(['user_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
