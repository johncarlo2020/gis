<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('qualification_type_id')->unsigned()->index()->nullable();
            $table->foreign('qualification_type_id')->references('id')->on('qualification_types')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('qualifications');
    }
}
