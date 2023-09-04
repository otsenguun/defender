<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFwinfoLastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fwinfo_lasts', function (Blueprint $table) {
            $table->id();
            $table->boolean('Domain')->unsigned()->nullable();
            $table->boolean('Private')->unsigned()->nullable();
            $table->boolean('Public')->unsigned()->nullable();
            $table->string('uuid')->unique();
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
        Schema::dropIfExists('fwinfo_lasts');
    }
}
