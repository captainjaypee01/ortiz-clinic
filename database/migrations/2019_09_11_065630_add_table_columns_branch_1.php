<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableColumnsBranch1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->string("contact_number")->nullable()->after("name");
            $table->string("tel_number")->nullable()->after("contact_number");
            
            $table->string("barangay")->nullable()->after("city");
            $table->string("province")->nullable()->after("barangay");
            $table->string("country")->nullable()->after("province");
            $table->string("address_line_1")->nullable()->after("country");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            //
        });
    }
}
