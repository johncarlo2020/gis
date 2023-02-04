<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('status');
            $table->bigInteger('createdBy_id')->unsigned()->index()->nullable();
            $table->foreign('createdBy_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('updatedBy_id')->unsigned()->index()->nullable();
            $table->foreign('updatedBy_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('disabilities');
    }
}
