@extends('layout.master')
@section('parentPageTitle', 'Computer')
@section('title', 'Computer Details')


@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
    <div class="card">
            <div class="header">
                <h2>Computer Info</h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                   
                    <p class="mb-0"> <small class="text-muted">Name: </small>{{$computer->name}}</p>
                </li>
                <li class="list-group-item">
                    
                    <p  class="mb-0"><small class="text-muted">UUID: </small>{{$computer->uuid}}</p>
                </li>
                <li class="list-group-item">
                       
                        <p  class="mb-0"> <small class="text-muted">Token: </small>{{$computer->token}}</p>
                    </li>
                <li class="list-group-item">
                   
                    <p  class="mb-0"> <small class="text-muted">Date: </small>{{$computer->created_at}}</p>
                </li>
                <li class="list-group-item">
                  
                    <p  class="mb-0">  <small class="text-muted">Company: </small>{{$computer->GetCompanyName()}}</p>
                </li>
            </ul>
        </div>
        @if(isset($info['sysinfo']))
        <div class="card">
            <div class="header">
                <h2>System info</h2>
            </div>
            <div class="body">
            <ul class="list-group">
                <li class="list-group-item">
                  
                    <p class="mb-0">  <small class="text-muted">Version: </small>{{$info['sysinfo']->version}}</p>
                </li>
                <li class="list-group-item">
                   
                    <p  class="mb-0"> <small class="text-muted">Interval: </small>{{$info['sysinfo']->interval}}</p>
                </li>
                <li class="list-group-item">
                      
                        <p  class="mb-0">  <small class="text-muted">OS name: </small>{{$info['sysinfo']->os_name}}</p>
                    </li>
                <li class="list-group-item">
                  
                    <p  class="mb-0">  <small class="text-muted">OS version: </small>{{$info['sysinfo']->os_version}}</p>
                </li>
                <li class="list-group-item">
                 
                    <p  class="mb-0">   <small class="text-muted">System manufacturer: </small>{{$info['sysinfo']->system_manufacturer}}</p>
                </li>
                <li class="list-group-item">
                
                    <p  class="mb-0">    <small class="text-muted">System model: </small>{{$info['sysinfo']->system_model}}</p>
                </li>
                <li class="list-group-item">
                   
                    <p  class="mb-0"> <small class="text-muted">Host name: </small> {{$info['sysinfo']->host_name}}</p>
                </li>
               
            </ul>
            </div>                        
        </div>
        @endif

        @if(isset($info['fwinfo']))
        <div class="card">
            <div class="header">
                <h2>Firewall Info</h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                  
                    <p class="mb-0">  <small class="text-muted">Domain: {!!$button_info[$info['fwinfo']->Domain]!!}</small>
         
                    </p>
                </li>
                <li class="list-group-item">
                 
                    <p  class="mb-0">   <small class="text-muted">Private: {!!$button_info[$info['fwinfo']->Private]!!}</small>
    
                    </p>
                </li>
                <li class="list-group-item">
                      
                        <p  class="mb-0">  <small class="text-muted">Public: {!!$button_info[$info['fwinfo']->Public]!!}</small>
                
                    </p>
                </li>
             
            </ul>
        </div>
        @endif
    </div>
    <div class="col-lg-8 col-md-12">
   
    @if(isset($info['dinfo']))
        <div class="card">
            <div class="header">
                <h2>Defender Info</h2>
               
            </div>
            <div class="body">
        

                <div class="row">
                    <div class="col-md-12">
                        <p  class="mb-0"> <small class="text-muted">ComputerID: </small> {{$info['dinfo']->ComputerID}}</p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AMEngineVersion: </small> {{$info['dinfo']->AMEngineVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AMProductVersion: </small> {{$info['dinfo']->AMProductVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AMRunningMode: </small> {{$info['dinfo']->AMRunningMode}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AMServiceEnabled: </small> {!!$button_info[$info['dinfo']->AMServiceEnabled]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AMServiceVersion: </small> {{$info['dinfo']->AMServiceVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntispywareEnabled: </small> {!!$button_info[$info['dinfo']->AntispywareEnabled]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntispywareSignatureAge: </small> {{$info['dinfo']->AntispywareSignatureAge}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntispywareSignatureLastUpdated: </small> {{$info['dinfo']->AntispywareSignatureLastUpdated}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntispywareSignatureVersion: </small> {{$info['dinfo']->AntispywareSignatureVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntivirusEnabled: </small> {!!$button_info[$info['dinfo']->AntivirusEnabled]!!} </p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntivirusSignatureAge: </small> {{$info['dinfo']->AntivirusSignatureAge}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntivirusSignatureLastUpdated: </small> {{$info['dinfo']->AntivirusSignatureLastUpdated}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">AntivirusSignatureVersion: </small> {{$info['dinfo']->AntivirusSignatureVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">BehaviorMonitorEnabled: </small> {!!$button_info[$info['dinfo']->BehaviorMonitorEnabled]!!}</p>
                    </div>
                  
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">ComputerState: </small> {{$info['dinfo']->ComputerState}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">DefenderSignaturesOutOfDate: </small> {!!$button_info[$info['dinfo']->DefenderSignaturesOutOfDate]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">DeviceControlDefaultEnforcement: </small> {{$info['dinfo']->DeviceControlDefaultEnforcement}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">DeviceControlPoliciesLastUpdated: </small> {{$info['dinfo']->DeviceControlPoliciesLastUpdated}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">DeviceControlState: </small>  {!!$button_info[$info['dinfo']->DeviceControlState]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanAge: </small> {{$info['dinfo']->FullScanAge}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanEndTime: </small> {{$info['dinfo']->FullScanEndTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanOverdue: </small> {!!$button_info[$info['dinfo']->FullScanOverdue]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanRequired: </small> {!!$button_info[$info['dinfo']->FullScanRequired]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanSignatureVersion: </small> {{$info['dinfo']->FullScanSignatureVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">FullScanStartTime: </small> {{$info['dinfo']->FullScanStartTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">IoavProtectionEnabled: </small> {!!$button_info[$info['dinfo']->IoavProtectionEnabled]!!} </p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">IsTamperProtected: </small> {!!$button_info[$info['dinfo']->IsTamperProtected]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">IsVirtualMachine: </small> {!!$button_info[$info['dinfo']->IsVirtualMachine]!!} </p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">LastFullScanSource: </small> {{$info['dinfo']->LastFullScanSource}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">LastQuickScanSource: </small> {{$info['dinfo']->LastQuickScanSource}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">NISEnabled: </small> {!!$button_info[$info['dinfo']->NISEnabled]!!} </p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">NISEngineVersion: </small> {{$info['dinfo']->NISEngineVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">NISSignatureAge: </small> {{$info['dinfo']->NISSignatureAge}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">NISSignatureLastUpdated: </small> {{$info['dinfo']->NISSignatureLastUpdated}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">NISSignatureVersion: </small> {{$info['dinfo']->NISSignatureVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">OnAccessProtectionEnabled: </small> {!!$button_info[$info['dinfo']->OnAccessProtectionEnabled]!!} </p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">ProductStatus: </small> {{$info['dinfo']->ProductStatus}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">QuickScanAge: </small> {{$info['dinfo']->QuickScanAge}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">QuickScanEndTime: </small> {{$info['dinfo']->QuickScanEndTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">QuickScanOverdue: </small> {!!$button_info[$info['dinfo']->QuickScanOverdue]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">QuickScanSignatureVersion: </small> {{$info['dinfo']->QuickScanSignatureVersion}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">QuickScanStartTime: </small> {{$info['dinfo']->QuickScanStartTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">RealTimeProtectionEnabled: </small> {!!$button_info[$info['dinfo']->RealTimeProtectionEnabled]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">RealTimeScanDirection: </small> {{$info['dinfo']->RealTimeScanDirection}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">RebootRequired: </small> {!!$button_info[$info['dinfo']->RebootRequired]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TamperProtectionSource: </small> {{$info['dinfo']->TamperProtectionSource}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TDTMode: </small> {{$info['dinfo']->TDTMode}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TDTStatus: </small> {!!$button_info[$info['dinfo']->TDTStatus]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TDTTelemetry: </small> {!!$button_info[$info['dinfo']->TDTTelemetry]!!}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingDailyMaxQuota: </small> {{$info['dinfo']->TroubleShootingDailyMaxQuota}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingDailyQuotaLeft: </small> {{$info['dinfo']->TroubleShootingDailyQuotaLeft}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingEndTime: </small> {{$info['dinfo']->TroubleShootingEndTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingExpirationLeft: </small> {{$info['dinfo']->TroubleShootingExpirationLeft}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingMode: </small> {{$info['dinfo']->TroubleShootingMode}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingModeSource: </small> {{$info['dinfo']->TroubleShootingModeSource}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingQuotaResetTime: </small> {{$info['dinfo']->TroubleShootingQuotaResetTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">TroubleShootingStartTime: </small> {{$info['dinfo']->TroubleShootingStartTime}}</p>
                    </div>
                    <div class="col-md-6">
                        <p  class="mb-0"> <small class="text-muted">PSComputerName: </small> {{$info['dinfo']->PSComputerName}}</p>
                    </div>

                </div>

            </div>
        </div>
    @endif

   
    </div>
    <div class="col-md-12">

    @if(isset($info['treport']))
        <div class="card">
            <div class="header">
                <h2>Threats</h2>
            </div>
            <div class="body">

                <div class="table-responsive">
                    <table class="table">

                    <thead>
                        <th>#</th>
                        <th>Theart Name</th>
                        <th>Status</th>
                       
                        <th>Date</th>
                    </thead>
                    <tbody>
                    
                        @foreach($info['treport'] as $key => $thre)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$thre->ThreatName}}</td>
                            <td>{!!$button_info[$thre->ActionSuccess]!!}</td>
                         
                            <td>{{$thre->InitialDetectionTime}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    </table>
                </div>

            </div>
          
        </div>
    @endif  

    </div>
  
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
@stop