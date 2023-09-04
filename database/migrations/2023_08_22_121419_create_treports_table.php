<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treports', function (Blueprint $table) {
            $table->id();
            $table->boolean('ActionSuccess')->unsigned()->nullable();
            $table->integer('AdditionalActionsBitMask')->nullable();
            $table->string('AMProductVersion')->nullable();
            $table->integer('CleaningActionID')->nullable();
            $table->integer('CurrentThreatExecutionStatusID')->nullable();
            $table->string('DetectionID')->nullable();
            $table->integer('DetectionSourceTypeID')->nullable();
            $table->string('DomainUser')->nullable();
            $table->dateTime('InitialDetectionTime', $precision = 0);
            $table->dateTime('LastThreatStatusChangeTime', $precision = 0);
            $table->string('ProcessName')->nullable();
            $table->dateTime('RemediationTime', $precision = 0);
            $table->mediumText('Resources')->nullable();
            $table->string('ThreatID')->nullable();
            $table->bigInteger('ThreatStatusErrorCode')->nullable();
            $table->integer('ThreatStatusID')->nullable();
            $table->string('PSComputerName')->nullable();
            $table->integer('SeverityID')->nullable();
            $table->string('ThreatName')->nullable();

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
        Schema::dropIfExists('treports');
    }
}
