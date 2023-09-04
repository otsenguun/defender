<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinfos', function (Blueprint $table) {
            $table->id();
            $table->string('AMEngineVersion')->nullable();
            $table->string('AMProductVersion')->nullable();
            $table->string('AMRunningMode')->nullable();
            $table->boolean('AMServiceEnabled')->unsigned()->nullable();
            $table->string('AMServiceVersion')->nullable();
            $table->boolean('AntispywareEnabled')->unsigned()->nullable();
            $table->integer('AntispywareSignatureAge')->nullable();
            $table->dateTime('AntispywareSignatureLastUpdated', $precision = 0);
            $table->string('AntispywareSignatureVersion')->nullable();
            $table->boolean('AntivirusEnabled')->unsigned()->nullable();
            $table->integer('AntivirusSignatureAge')->nullable();
            $table->dateTime('AntivirusSignatureLastUpdated', $precision = 0);
            $table->string('AntivirusSignatureVersion')->nullable();
            $table->boolean('BehaviorMonitorEnabled')->unsigned()->nullable();
            $table->string('ComputerID')->nullable();
            $table->integer('ComputerState')->nullable();
            $table->boolean('DefenderSignaturesOutOfDate')->unsigned()->nullable();
            $table->string('DeviceControlDefaultEnforcement')->nullable();
            $table->dateTime('DeviceControlPoliciesLastUpdated', $precision = 0);
            $table->string('DeviceControlState')->nullable();
            $table->integer('FullScanAge')->nullable();
            $table->dateTime('FullScanEndTime', $precision = 0);
            $table->boolean('FullScanOverdue')->unsigned()->nullable();
            $table->boolean('FullScanRequired')->unsigned()->nullable();
            $table->string('FullScanSignatureVersion')->nullable();
            $table->dateTime('FullScanStartTime', $precision = 0);
            $table->boolean('IoavProtectionEnabled')->unsigned()->nullable();
            $table->boolean('IsTamperProtected')->unsigned()->nullable();
            $table->boolean('IsVirtualMachine')->unsigned()->nullable();
            $table->integer('LastFullScanSource')->nullable();
            $table->integer('LastQuickScanSource')->nullable();
            $table->boolean('NISEnabled')->unsigned()->nullable();
            $table->string('NISEngineVersion')->nullable();
            $table->integer('NISSignatureAge')->nullable();
            $table->dateTime('NISSignatureLastUpdated', $precision = 0);
            $table->string('NISSignatureVersion')->nullable();
            $table->boolean('OnAccessProtectionEnabled')->unsigned()->nullable();
            $table->bigInteger('ProductStatus')->nullable();
            $table->integer('QuickScanAge')->nullable();
            $table->dateTime('QuickScanEndTime', $precision = 0);
            $table->boolean('QuickScanOverdue')->unsigned()->nullable();
            $table->string('QuickScanSignatureVersion')->nullable();
            $table->dateTime('QuickScanStartTime', $precision = 0);
            $table->boolean('RealTimeProtectionEnabled')->unsigned()->nullable();
            $table->integer('RealTimeScanDirection')->nullable();
            $table->boolean('RebootRequired')->unsigned()->nullable();
            $table->string('TamperProtectionSource')->nullable();
            $table->string('TDTMode')->nullable();
            $table->string('TDTStatus')->nullable();
            $table->string('TDTTelemetry')->nullable();
            $table->string('TroubleShootingDailyMaxQuota')->nullable();
            $table->string('TroubleShootingDailyQuotaLeft')->nullable();
            $table->string('TroubleShootingEndTime')->nullable();
            $table->string('TroubleShootingExpirationLeft')->nullable();
            $table->string('TroubleShootingMode')->nullable();
            $table->string('TroubleShootingModeSource')->nullable();
            $table->string('TroubleShootingQuotaResetTime')->nullable();
            $table->string('TroubleShootingStartTime')->nullable();
            $table->string('PSComputerName')->nullable();

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
        Schema::dropIfExists('dinfos');
    }
}
