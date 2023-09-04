@extends('layout.master')
@section('parentPageTitle', 'Company')
@section('title', 'Company create')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form action="{{route('company.store')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-sm-12">
                        Name
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="">
                        </div>
                        Info
                        <textarea class="form-control"  name="details" id="" cols="30" rows="10"></textarea>
                    </div>
                   

                <div class="row clearfix">
                                               
                    
                    <div class="col-sm-12">
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script>
    $('#multiselect3-all').multiselect({
        includeSelectAllOption: true,
    });
</script>
@stop