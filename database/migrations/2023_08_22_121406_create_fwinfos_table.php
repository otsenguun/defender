<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFwinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fwinfos', function (Blueprint $table) {
            $table->id();
            $table->boolean('Domain')->unsigned()->nullable();
            $table->boolean('Private')->unsigned()->nullable();
            $table->boolean('Public')->unsigned()->nullable();
            $table->string('uuid')->nullable();
            $table->integer('org_id')->nullable();
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
        Schema::dropIfExists('fwinfos');
    }
}
