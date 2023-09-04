@extends('layout.master')
@section('parentPageTitle', 'Client')
@section('title', 'Client List')


@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-warning text-white"><i class="fa fa-ticket"></i> </div>
                <div class="content">
                    <span>Total Clients</span>
                    <h5 class="number mb-0">{{$totals['all_clients']}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-info text-white"><i class="fa fa-tags"></i> </div>
                <div class="content">
                    <span>Registered</span>
                    <h5 class="number mb-0">{{$totals['registered_clients']}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body top_counter">
                <div class="icon bg-danger text-white"><i class="fa fa-thumbs-o-down"></i> </div>
                <div class="content">
                    <span>Not Registered</span>
                    <h5 class="number mb-0">{{$totals['not_registered_clients']}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="body">
            <form action="{{url('clients')}}" method="get">
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
                        <th>Host name</th>
                        <th>Os name</th>
                        <th>System model</th>
                        <th>Computer</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sys_infos as $key => $sys_i)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            {{$sys_i->uuid}}
                        </td>
                        <td><a href="#"> {{$sys_i->host_name}}</a></td>
                        <td><span>{{$sys_i->os_name}}</span></td>
                        <td>{{$sys_i->system_model}}</td>

                        <td>
                            @if($sys_i->org_id == 0)
                            <a href="{{url('showClient',$sys_i->uuid)}}">   <span class="badge  badge-danger">Not Registered</span> </a>
                         
                            @else
                            <a href="{{route('computer.show',$sys_i->getCompId())}}">   <span class="badge  badge-default">{{$sys_i->getComp()}}</span> </a>
                         
                            
                            @endif
                        </td>
                        <td><span>{{$sys_i->created_at}}</span></td>
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