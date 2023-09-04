@extends('layout.master')
@section('parentPageTitle', 'Companies')
@section('title', 'Company List')


@section('content')
<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="body">
                <form action="{{route('company.index')}}" method="get">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-3 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                    </div>
                  
                    <div class="col-lg-1 col-md-12 col-sm-12">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Search</a>
                    </div>
                    <div class="col-lg-1 col-md-12 col-sm-12">
                        <a href="{{route('company.create')}}" class="btn btn-sm btn-success btn-block" title="">Create</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
                <thead>
                    <tr>
                        <th>-</th>
                        <th>Name</th>                                    
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companys as $key => $com)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="{{route('company.show',$com->id)}}">{{$com->name}}</a></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach()

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