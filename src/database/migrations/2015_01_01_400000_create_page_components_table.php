<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_path');
            $table->foreign('page_path')->references('path')->on('pages');
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');
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
        Schema::dropIfExists('page_components');
    }
}
