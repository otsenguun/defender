<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dinfo;
use App\fwinfo;
use App\Sysinfo;
use App\Rawdata;
use App\treport;
use App\Company;
use App\SysinfoLast;
use App\dinfoLast;
use App\fwinfoLast;
use App\Computer;
use DB;
use Auth;
class DataController extends Controller
{
    public function dashboardComp(){
        // print_r("here");
       $org_id = Auth::user()->org_id;
    //    print_r($org_id);
        $sysinfos = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(*) as count,os_name'))
        ->where("org_id",$org_id)
        ->groupBy('os_name')
        ->orderBy('count',"desc")
        ->get();

        $threat_totals =  DB::table('treports')
        ->select(DB::raw('count(*) as count,ActionSuccess'))
        ->where("org_id",$org_id)
        ->groupBy('ActionSuccess')
        ->orderBy('count',"desc")
        ->get();

        $fire_wall_issue = DB::table('fwinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id",$org_id)
        ->orWhere('Domain', 0)
        ->orWhere('Private', 0)
        ->orWhere('Public', 0)
        ->get();

        $SignaturesOutOfDate = DB::table('dinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id",$org_id)
        ->where("DefenderSignaturesOutOfDate",1)
        ->get();

        $Threat = DB::table('treports')
        ->select(DB::raw('count(id) as count'))
        ->where("ThreatID","!=","")
        ->where("org_id",$org_id)
        // ->groupBy('uuid')
        // ->orderBy('count',"asc")
        ->get();

        $Threat_hosts = DB::table('treports')
        ->select(DB::raw('count(id) as count,uuid'))
        ->where("ThreatID","!=","")
        ->where("org_id",$org_id)
        ->groupBy('uuid')
        ->orderBy('count',"desc")
        ->get(10);

        // dump($Threat_hosts);

        
        $totalcc = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id",$org_id)
        ->get();
        
        $topthreads =  DB::table('treports')
        ->select(DB::raw('count(id) as count,ThreatName'))
        ->where("org_id",$org_id)
        ->groupBy('ThreatName')
        ->get();


        $total_enj = $fire_wall_issue[0]->count + $SignaturesOutOfDate[0]->count + $Threat[0]->count;
        $proected =  $totalcc[0]->count - $total_enj;

        if($proected < 0 ){
            $proected = 0;
        }

        $totals = [
            "Threat_hosts" => $Threat_hosts,
            "topthreads" => $topthreads,
            "fire_wall_issue" => $fire_wall_issue[0]->count,
            "SignaturesOutOfDate" => $SignaturesOutOfDate[0]->count,
            "Threat" => $Threat[0]->count,
            "protected" => $proected,
            "clients" => $totalcc[0]->count,
            "threat_totals_true" => $threat_totals[0]->count,
            "threat_totals_false" => $threat_totals[1]->count,
            "threat_percent" => intval(($threat_totals[0]->count - $threat_totals[1]->count)*100/($threat_totals[0]->count +$threat_totals[1]->count))
        ];

        return view("mainpages.dashboardcomp",["sysinfos"=>$sysinfos,"totals" => $totals]);

    }

    public function dashboard(){

        if(Auth::user()->type == 1){
            // die("asd");
            // $this->dashboardComp();
            // continue;
            // break;
            return redirect("home2");
        }
        $sysinfos = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(*) as count,os_name'))
        ->groupBy('os_name')
        ->orderBy('count',"desc")
        ->get();

        $threat_totals =  DB::table('treports')
        ->select(DB::raw('count(*) as count,ActionSuccess'))
        ->groupBy('ActionSuccess')
        ->orderBy('count',"desc")
        ->get();

        $fire_wall_issue = DB::table('fwinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->orWhere('Domain', 0)
        ->orWhere('Private', 0)
        ->orWhere('Public', 0)
        ->get();

        $SignaturesOutOfDate = DB::table('dinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("DefenderSignaturesOutOfDate",1)
        ->get();

        $Threat = DB::table('treports')
        ->select(DB::raw('count(id) as count'))
        ->where("ThreatID","!=","")
        // ->groupBy('uuid')
        // ->orderBy('count',"asc")
        ->get();

        $Threat_hosts = DB::table('treports')
        ->select(DB::raw('count(id) as count,uuid'))
        ->where("ThreatID","!=","")
        ->groupBy('uuid')
        ->orderBy('count',"desc")
        ->get(10);

        // dump($Threat_hosts);

        
        $totalcc = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->get();

        $unreg = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id",0)
        ->get();

        
        $topthreads =  DB::table('treports')
        ->select(DB::raw('count(id) as count,ThreatName'))
        ->groupBy('ThreatName')
        ->get();


        $total_enj = $fire_wall_issue[0]->count + $SignaturesOutOfDate[0]->count + $Threat[0]->count;
        $proected =  $totalcc[0]->count - $total_enj;

        if($proected < 0 ){
            $proected = 0;
        }

        $totals = [
            "Threat_hosts" => $Threat_hosts,
            "topthreads" => $topthreads,
            "fire_wall_issue" => $fire_wall_issue[0]->count,
            "SignaturesOutOfDate" => $SignaturesOutOfDate[0]->count,
            "Threat" => $Threat[0]->count,
            "protected" => $proected,
            "clients" => $totalcc[0]->count,
            "unreg" => $unreg[0]->count,
            "unregper" => intval((($totalcc[0]->count-$unreg[0]->count)*100/$totalcc[0]->count)),
            "threat_totals_true" => $threat_totals[0]->count,
            "threat_totals_false" => $threat_totals[1]->count,
            "threat_percent" => intval(($threat_totals[0]->count - $threat_totals[1]->count)*100/($threat_totals[0]->count +$threat_totals[1]->count))
        ];


        // dump($totals);


        return view("mainpages.dashboard",["sysinfos"=>$sysinfos,"totals" => $totals]);

    }

    public function showSingle(){
        
        return view("mainpages.single");

    }


    public function dateFix($par){

        $date_arr = explode(" ",$par);
        $dd_arr = explode("/",$date_arr[0]);
        // print_r($dd_arr);

        return $dd_arr[2]."-".$dd_arr[1]."-".$dd_arr[0]." ".$date_arr[1];

    }

    public function boolFix($par){

        $val = true;
        if($par == "False"){
            $val = false;
        }
        return $val;

    }
    // public function dateFix($par){
    // }
    public function GetData(){


        $headers = getallheaders();
        // print_r($headers);

        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);

        $sysinfo =  $result->sysinfo;
        $dinfo = $result->dinfo;
        $fwinfo = $result->fwinfo;
        $treport_ar = $result->treport;

        $key = strtotime("Y-d-m h:i:s");

        $org_id = 0;
      

        $uuid = $headers["uuid"];
        $check_comp = Computer::where("uuid",$uuid)->get();
        if(count($check_comp) >0){
            $org_id = $check_comp[0]->org_id;
        }
        // $uuid = 0;
        // $token = $headers["Authorization"];

        $sysinfo_i = new Sysinfo;
        $sysinfo_i->version = $sysinfo->version;
        $sysinfo_i->interval = $sysinfo->interval;
        $sysinfo_i->os_name = $sysinfo->os_name;
        $sysinfo_i->os_version = $sysinfo->os_version;
        $sysinfo_i->system_manufacturer = $sysinfo->system_manufacturer;
        $sysinfo_i->system_model = $sysinfo->system_model;
        $sysinfo_i->host_name = $sysinfo->host_name;
        $sysinfo_i->org_id = $org_id;
        $sysinfo_i->uuid = $uuid;
        $sysinfo_i->save();



        $check1 = SysinfoLast::where("uuid",$uuid)->get();
       
        if(count($check1) > 0){
            $sysinfo_i_last = $check1[0];
        }else{
            $sysinfo_i_last = new SysinfoLast;
        }
       
        $sysinfo_i_last->version = $sysinfo->version;
        $sysinfo_i_last->interval = $sysinfo->interval;
        $sysinfo_i_last->os_name = $sysinfo->os_name;
        $sysinfo_i_last->os_version = $sysinfo->os_version;
        $sysinfo_i_last->system_manufacturer = $sysinfo->system_manufacturer;
        $sysinfo_i_last->system_model = $sysinfo->system_model;
        $sysinfo_i_last->host_name = $sysinfo->host_name;
        $sysinfo_i_last->org_id = $org_id;
        $sysinfo_i_last->uuid = $uuid;
        $sysinfo_i_last->save();


        // print_r($this->dateFix($dinfo->AntispywareSignatureLastUpdated));

        $dinfo_i = new dinfo();
        $dinfo_i->AMEngineVersion = $dinfo->AMEngineVersion;
        $dinfo_i->AMProductVersion = $dinfo->AMProductVersion;
        $dinfo_i->AMRunningMode = $dinfo->AMRunningMode;
        $dinfo_i->AMServiceEnabled = $this->boolFix($dinfo->AMServiceEnabled);
        $dinfo_i->AMServiceVersion = $dinfo->AMServiceVersion;
        $dinfo_i->AntispywareEnabled = $this->boolFix($dinfo->AntispywareEnabled);
        $dinfo_i->AntispywareSignatureAge = $dinfo->AntispywareSignatureAge;
        $dinfo_i->AntispywareSignatureLastUpdated = $this->dateFix($dinfo->AntispywareSignatureLastUpdated);
        $dinfo_i->AntispywareSignatureVersion = $dinfo->AntispywareSignatureVersion;
        $dinfo_i->AntivirusEnabled = $this->boolFix($dinfo->AntivirusEnabled);
        $dinfo_i->AntivirusSignatureAge = $dinfo->AntivirusSignatureAge;
        $dinfo_i->AntivirusSignatureLastUpdated = $this->dateFix($dinfo->AntivirusSignatureLastUpdated);
        $dinfo_i->AntivirusSignatureVersion = $dinfo->AntivirusSignatureVersion;
        $dinfo_i->BehaviorMonitorEnabled = $this->boolFix($dinfo->BehaviorMonitorEnabled);
        $dinfo_i->ComputerID = $dinfo->ComputerID;
        $dinfo_i->ComputerState = $dinfo->ComputerState;
        $dinfo_i->DefenderSignaturesOutOfDate = $this->boolFix($dinfo->DefenderSignaturesOutOfDate);
        $dinfo_i->DeviceControlDefaultEnforcement = $dinfo->DeviceControlDefaultEnforcement;
        $dinfo_i->DeviceControlPoliciesLastUpdated = $this->dateFix($dinfo->DeviceControlPoliciesLastUpdated);
        $dinfo_i->DeviceControlState = $dinfo->DeviceControlState;
        $dinfo_i->FullScanAge = $dinfo->FullScanAge;
        $dinfo_i->FullScanEndTime = $this->dateFix($dinfo->FullScanEndTime);
        $dinfo_i->FullScanOverdue = $this->boolFix($dinfo->FullScanOverdue);
        $dinfo_i->FullScanRequired = $this->boolFix($dinfo->FullScanRequired);
        $dinfo_i->FullScanSignatureVersion = $dinfo->FullScanSignatureVersion;
        $dinfo_i->FullScanStartTime = $this->dateFix($dinfo->FullScanStartTime);
        $dinfo_i->IoavProtectionEnabled = $this->boolFix($dinfo->IoavProtectionEnabled);
        $dinfo_i->IsTamperProtected = $this->boolFix($dinfo->IsTamperProtected);
        $dinfo_i->IsVirtualMachine = $this->boolFix($dinfo->IsVirtualMachine);
        $dinfo_i->LastFullScanSource = $dinfo->LastFullScanSource;
        $dinfo_i->LastQuickScanSource = $dinfo->LastQuickScanSource;
        $dinfo_i->NISEnabled = $this->boolFix($dinfo->NISEnabled);
        $dinfo_i->NISEngineVersion = $dinfo->NISEngineVersion;
        $dinfo_i->NISSignatureAge = $dinfo->NISSignatureAge;
        $dinfo_i->NISSignatureLastUpdated = $this->dateFix($dinfo->NISSignatureLastUpdated);
        $dinfo_i->NISSignatureVersion = $dinfo->NISSignatureVersion;
        $dinfo_i->OnAccessProtectionEnabled = $this->boolFix($dinfo->OnAccessProtectionEnabled);
        $dinfo_i->ProductStatus = $dinfo->ProductStatus;
        $dinfo_i->QuickScanAge = $dinfo->QuickScanAge;
        $dinfo_i->QuickScanEndTime = $this->dateFix($dinfo->QuickScanEndTime);
        $dinfo_i->QuickScanOverdue = $this->boolFix($dinfo->QuickScanOverdue);
        $dinfo_i->QuickScanSignatureVersion = $dinfo->QuickScanSignatureVersion;
        $dinfo_i->QuickScanStartTime = $this->dateFix($dinfo->QuickScanStartTime);
        $dinfo_i->RealTimeProtectionEnabled = $this->boolFix($dinfo->RealTimeProtectionEnabled);
        $dinfo_i->RealTimeScanDirection = $dinfo->RealTimeScanDirection;
        $dinfo_i->RebootRequired = $this->boolFix($dinfo->RebootRequired);
        $dinfo_i->TamperProtectionSource = $dinfo->TamperProtectionSource;
        $dinfo_i->TDTMode = $dinfo->TDTMode;
        $dinfo_i->TDTStatus = $dinfo->TDTStatus;
        $dinfo_i->TDTTelemetry = $dinfo->TDTTelemetry;
        $dinfo_i->TroubleShootingDailyMaxQuota = $dinfo->TroubleShootingDailyMaxQuota;
        $dinfo_i->TroubleShootingDailyQuotaLeft = $dinfo->TroubleShootingDailyQuotaLeft;
        $dinfo_i->TroubleShootingEndTime = $dinfo->TroubleShootingEndTime;
        $dinfo_i->TroubleShootingExpirationLeft = $dinfo->TroubleShootingExpirationLeft;
        $dinfo_i->TroubleShootingMode = $dinfo->TroubleShootingMode;
        $dinfo_i->TroubleShootingModeSource = $dinfo->TroubleShootingModeSource;
        $dinfo_i->TroubleShootingQuotaResetTime = $dinfo->TroubleShootingQuotaResetTime;
        $dinfo_i->TroubleShootingStartTime = $dinfo->TroubleShootingStartTime;
        $dinfo_i->PSComputerName = $dinfo->PSComputerName;
        $dinfo_i->org_id = $org_id;
        $dinfo_i->uuid = $uuid;
        $dinfo_i->save();


        $check2 = dinfoLast::where("uuid",$uuid)->get();
       
        if(count($check2) > 0){
            $dinfo_i_last = $check2[0];
        }else{
            $dinfo_i_last = new dinfoLast;
        }
        
        $dinfo_i_last->AMEngineVersion = $dinfo->AMEngineVersion;
        $dinfo_i_last->AMProductVersion = $dinfo->AMProductVersion;
        $dinfo_i_last->AMRunningMode = $dinfo->AMRunningMode;
        $dinfo_i_last->AMServiceEnabled = $this->boolFix($dinfo->AMServiceEnabled);
        $dinfo_i_last->AMServiceVersion = $dinfo->AMServiceVersion;
        $dinfo_i_last->AntispywareEnabled = $this->boolFix($dinfo->AntispywareEnabled);
        $dinfo_i_last->AntispywareSignatureAge = $dinfo->AntispywareSignatureAge;
        $dinfo_i_last->AntispywareSignatureLastUpdated = $this->dateFix($dinfo->AntispywareSignatureLastUpdated);
        $dinfo_i_last->AntispywareSignatureVersion = $dinfo->AntispywareSignatureVersion;
        $dinfo_i_last->AntivirusEnabled = $this->boolFix($dinfo->AntivirusEnabled);
        $dinfo_i_last->AntivirusSignatureAge = $dinfo->AntivirusSignatureAge;
        $dinfo_i_last->AntivirusSignatureLastUpdated = $this->dateFix($dinfo->AntivirusSignatureLastUpdated);
        $dinfo_i_last->AntivirusSignatureVersion = $dinfo->AntivirusSignatureVersion;
        $dinfo_i_last->BehaviorMonitorEnabled = $this->boolFix($dinfo->BehaviorMonitorEnabled);
        $dinfo_i_last->ComputerID = $dinfo->ComputerID;
        $dinfo_i_last->ComputerState = $dinfo->ComputerState;
        $dinfo_i_last->DefenderSignaturesOutOfDate = $this->boolFix($dinfo->DefenderSignaturesOutOfDate);
        $dinfo_i_last->DeviceControlDefaultEnforcement = $dinfo->DeviceControlDefaultEnforcement;
        $dinfo_i_last->DeviceControlPoliciesLastUpdated = $this->dateFix($dinfo->DeviceControlPoliciesLastUpdated);
        $dinfo_i_last->DeviceControlState = $dinfo->DeviceControlState;
        $dinfo_i_last->FullScanAge = $dinfo->FullScanAge;
        $dinfo_i_last->FullScanEndTime = $this->dateFix($dinfo->FullScanEndTime);
        $dinfo_i_last->FullScanOverdue = $this->boolFix($dinfo->FullScanOverdue);
        $dinfo_i_last->FullScanRequired = $this->boolFix($dinfo->FullScanRequired);
        $dinfo_i_last->FullScanSignatureVersion = $dinfo->FullScanSignatureVersion;
        $dinfo_i_last->FullScanStartTime = $this->dateFix($dinfo->FullScanStartTime);
        $dinfo_i_last->IoavProtectionEnabled = $this->boolFix($dinfo->IoavProtectionEnabled);
        $dinfo_i_last->IsTamperProtected = $this->boolFix($dinfo->IsTamperProtected);
        $dinfo_i_last->IsVirtualMachine = $this->boolFix($dinfo->IsVirtualMachine);
        $dinfo_i_last->LastFullScanSource = $dinfo->LastFullScanSource;
        $dinfo_i_last->LastQuickScanSource = $dinfo->LastQuickScanSource;
        $dinfo_i_last->NISEnabled = $this->boolFix($dinfo->NISEnabled);
        $dinfo_i_last->NISEngineVersion = $dinfo->NISEngineVersion;
        $dinfo_i_last->NISSignatureAge = $dinfo->NISSignatureAge;
        $dinfo_i_last->NISSignatureLastUpdated = $this->dateFix($dinfo->NISSignatureLastUpdated);
        $dinfo_i_last->NISSignatureVersion = $dinfo->NISSignatureVersion;
        $dinfo_i_last->OnAccessProtectionEnabled = $this->boolFix($dinfo->OnAccessProtectionEnabled);
        $dinfo_i_last->ProductStatus = $dinfo->ProductStatus;
        $dinfo_i_last->QuickScanAge = $dinfo->QuickScanAge;
        $dinfo_i_last->QuickScanEndTime = $this->dateFix($dinfo->QuickScanEndTime);
        $dinfo_i_last->QuickScanOverdue = $this->boolFix($dinfo->QuickScanOverdue);
        $dinfo_i_last->QuickScanSignatureVersion = $dinfo->QuickScanSignatureVersion;
        $dinfo_i_last->QuickScanStartTime = $this->dateFix($dinfo->QuickScanStartTime);
        $dinfo_i_last->RealTimeProtectionEnabled = $this->boolFix($dinfo->RealTimeProtectionEnabled);
        $dinfo_i_last->RealTimeScanDirection = $dinfo->RealTimeScanDirection;
        $dinfo_i_last->RebootRequired = $this->boolFix($dinfo->RebootRequired);
        $dinfo_i_last->TamperProtectionSource = $dinfo->TamperProtectionSource;
        $dinfo_i_last->TDTMode = $dinfo->TDTMode;
        $dinfo_i_last->TDTStatus = $dinfo->TDTStatus;
        $dinfo_i_last->TDTTelemetry = $dinfo->TDTTelemetry;
        $dinfo_i_last->TroubleShootingDailyMaxQuota = $dinfo->TroubleShootingDailyMaxQuota;
        $dinfo_i_last->TroubleShootingDailyQuotaLeft = $dinfo->TroubleShootingDailyQuotaLeft;
        $dinfo_i_last->TroubleShootingEndTime = $dinfo->TroubleShootingEndTime;
        $dinfo_i_last->TroubleShootingExpirationLeft = $dinfo->TroubleShootingExpirationLeft;
        $dinfo_i_last->TroubleShootingMode = $dinfo->TroubleShootingMode;
        $dinfo_i_last->TroubleShootingModeSource = $dinfo->TroubleShootingModeSource;
        $dinfo_i_last->TroubleShootingQuotaResetTime = $dinfo->TroubleShootingQuotaResetTime;
        $dinfo_i_last->TroubleShootingStartTime = $dinfo->TroubleShootingStartTime;
        $dinfo_i_last->PSComputerName = $dinfo->PSComputerName;
        $dinfo_i_last->org_id = $org_id;
        $dinfo_i_last->uuid = $uuid;
        $dinfo_i_last->save();


        $fwinfo_i = new fwinfo;
        $fwinfo_i->Domain = $this->boolFix($fwinfo->Domain);
        $fwinfo_i->Private = $this->boolFix($fwinfo->Private);
        $fwinfo_i->Public = $this->boolFix($fwinfo->Public);
        $fwinfo_i->org_id = $org_id;
        $fwinfo_i->uuid = $uuid;
        $fwinfo_i->save();


        $check3 = fwinfoLast::where("uuid",$uuid)->get();
       
        if(count($check3) > 0){
            $fwinfo_i_last = $check3[0];
        }else{
            $fwinfo_i_last = new fwinfoLast;
        }

        $fwinfo_i_last->Domain = $this->boolFix($fwinfo->Domain);
        $fwinfo_i_last->Private = $this->boolFix($fwinfo->Private);
        $fwinfo_i_last->Public = $this->boolFix($fwinfo->Public);
        $fwinfo_i_last->org_id = $org_id;
        $fwinfo_i_last->uuid = $uuid;
        $fwinfo_i_last->save();



        if(count($treport_ar) > 0){
            foreach($treport_ar as $treport){
        
                $treport_i = new treport;
                $treport_i->ActionSuccess = $this->boolFix($treport->ActionSuccess);
                $treport_i->AdditionalActionsBitMask = $treport->AdditionalActionsBitMask;
                $treport_i->AMProductVersion = $treport->AMProductVersion;
                $treport_i->CleaningActionID = $treport->CleaningActionID;
                $treport_i->CurrentThreatExecutionStatusID = $treport->CurrentThreatExecutionStatusID;
                $treport_i->DetectionID = $treport->DetectionID;
                $treport_i->DetectionSourceTypeID = $treport->DetectionSourceTypeID;
                $treport_i->DomainUser = $treport->DomainUser;
                $treport_i->InitialDetectionTime = $this->dateFix($treport->InitialDetectionTime);
                $treport_i->LastThreatStatusChangeTime = $this->dateFix($treport->LastThreatStatusChangeTime);
                $treport_i->ProcessName = $treport->ProcessName;
                $treport_i->RemediationTime = $this->dateFix($treport->RemediationTime);
                $treport_i->Resources = $treport->Resources;
                $treport_i->ThreatID = $treport->ThreatID;
                $treport_i->ThreatStatusErrorCode = $treport->ThreatStatusErrorCode;
                $treport_i->ThreatStatusID = $treport->ThreatStatusID;
                $treport_i->PSComputerName = $treport->PSComputerName;
                $treport_i->SeverityID = $treport->SeverityID;
                $treport_i->ThreatName = $treport->ThreatName;
                $treport_i->org_id = $org_id;
                $treport_i->uuid = $uuid;
                $treport_i->save();
                
            }
        }
        // print_r($array);
        // Sysinfo::create($array); 
        // $this->Return();

    }

    public function Return(){

        // $get_returns = Return::get()->all();

        // $get_returns
        foreach($get_returns as $ret){

            switch($ret->type){
                case 1 : 
                    // {
                    //     "message": {
                    //     "status_code": "ok",
                    //     "response": {
                    //         "new_version": true,
                    //         "download_path": "https://defender.bloomlink.mn/defenderantivirusmanager/latest/dam.exe",
                    //         "new_interval": true,
                    //         "interval": 180,
                    //         "full_scan": true
                    //     }
                    //     }
                    // }
                case 2 :
                    // {
                    //     "message": {
                    //         "status_code": "ok",
                    //         "response": {
                    //             "new_version": "false",
                    //             "download_path": "",
                    //             "new_interval": "false",
                    //             "interval": 0,
                    //             "full_scan": "false"
                    //         }
                    //     }
                    // }
                case 3 :
                    // {
                    //     "message": {
                    //     "status_code": "ok",
                    //     "response": {
                    //         "message": null
                    //     }
                    //     }
                    // }
                case 4 :
                    // {
                    //     "message": {
                    //     "status_code": "failed",
                    //     "response": {
                    //         "message": "Error message"
                    //     }
                    //     }
                    // }
                    default:
                            //default

            }

        }
        

    }


}
