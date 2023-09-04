@extends('layout.master')
@section('parentPageTitle', 'Threat')
@section('title', 'Threat List')


@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-warning text-white"><i class="fa fa-frown-o"></i> </div>
                <div class="content">
                    <span>Total threats</span>
                    <h5 class="number mb-0">{{$totals['all_threats']}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-info text-white"><i class="fa fa-thumbs-o-up"></i> </div>
                <div class="content">
                    <span>Success</span>
                    <h5 class="number mb-0">{{$totals['success_threats']}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-danger text-white"><i class="fa fa-thumbs-o-down"></i> </div>
                <div class="content">
                    <span>Failed</span>
                    <h5 class="number mb-0">{{$totals['failed_threats']}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="body">
                <form action="{{url('Threats')}}" method="get">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" name="s" class="form-control" value="{{$s}}">
                        </div>
                    </div>
                
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <button class="btn btn-sm btn-primary btn-block" type="submit">Search</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-custom2 table-hover">
                <thead>
                 
                    <tr>
                        <th>#</th>
                        <th>UUID</th>
                        <th>ThreatName</th>
                        <th>Computer</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threats as $key => $thre)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            {{$thre->uuid}}
                        </td>
                        <td> {{$thre->ThreatName}}</td>
                
                        <td>
                            @if($thre->org_id == 0)
                            <a href="{{url('showClient',$thre->uuid)}}">   <span class="badge  badge-danger">Not Registered</span> </a>
                         
                            @else
                            <a href="{{route('computer.show',$thre->getCompId())}}">   <span class="badge  badge-default">{{$thre->getComp()}}</span> </a>
                            @endif
                        </td>
                        <td>
                        @if($thre->ActionSuccess == 1)
                        <span class="badge  badge-success">Success</span>
                        @else
                        <span class="badge  badge-danger">Failed</span>
                        @endif
                        </td>
                        <td><span>{{$thre->created_at}}</span></td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('page-styles')
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
@stop