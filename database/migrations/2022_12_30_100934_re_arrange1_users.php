<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReArrange1Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn("fname");
            $table->dropColumn("mname");
            $table->dropColumn("lname");
            $table->dropColumn("address");
            $table->dropColumn("mobile_no");
            $table->dropColumn("status");

        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->string('fname')->after("id");
            $table->string('mname')->after("fname");
            $table->string('lname')->after("mname");
            $table->string('address')->after("username");
            $table->string('mobile_no')->after("address");
            $table->string('status')->after("mobile_no");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
