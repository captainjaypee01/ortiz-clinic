<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableColumnsServices1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id"); 
            $table->double("price")->nullable()->after("name"); 
            $table->text("description")->nullable()->after("price");
            $table->string("filename")->nullable()->after("description");
            $table->string("location")->nullable()->after("filename");
            $table->string("type")->nullable()->after("location");
            $table->integer("size")->nullable()->after("type");
            $table->string("hash")->nullable()->after("size");
            $table->string("ip_address")->nullable()->after("hash");

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
}
