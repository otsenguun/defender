<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysinfos', function (Blueprint $table) {
            $table->id();
            $table->string('version')->nullable();
            $table->integer('interval')->nullable();
            $table->string('os_name')->nullable();
            $table->string('os_version')->nullable();
            $table->string('system_manufacturer')->nullable();
            $table->string('system_model')->nullable();
            $table->string('host_name')->nullable();

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
        Schema::dropIfExists('sysinfos');
    }
}
