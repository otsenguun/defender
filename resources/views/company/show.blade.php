@extends('layout.master')
@section('parentPageTitle', 'Company')
@section('title', $company->name)


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">

                <p for="">Name : {{$company->name}}</p>
                <p for="">Details : {{$company->details}}</p>

               
                <div class="table-responsive">
                <h6> Users         <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".new-user-modal">Add User</button>
                   </h6> 
             
                    <table class="table">

                        <thead>
                            <th>-</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @foreach($company->getUsers() as $key => $co_user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$co_user->name}}</td>
                                <td>{{$co_user->email}}</td>
                                <td> 
                                    <button table="user" data_id ="{{$co_user->id}}" class="btn edit_button btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button table="user" data_id ="{{$co_user->id}}" class="btn delete_button btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>

                </div>

                <div class="table-responsive">
                <h6> Computers         <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".new-computer-modal">Add Computer</button>
                   </h6> 
             <table class="table">

                        <thead>
                            <th>-</th>
                            <th>UUID</th>
                            <th>Name</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @foreach($company->getComputers() as $key => $co_comp)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$co_comp->uuid}}</td>
                                <td>{{$co_comp->name}}</td>
                                <td> 
                                    
                                    <a href="{{route('computer.show',$co_comp->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-align-justify"></i> </a>

                                    <button table="computer" data_id ="{{$co_comp->id}}" class="btn edit_button btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button table="computer" data_id ="{{$co_comp->id}}" class="btn delete_button btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>

                </div>

              
               
            </div>
        </div>
    </div>
</div>


<div class="modal fade new-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('user.store')}}" method="post" autocomplete="off">
         @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User on {{$company->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off">
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                </div>
                <input type="hidden" name="org_id" value="{{$company->id}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-round btn-success">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade new-computer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('computer.store')}}" method="post" autocomplete="off">
         @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Computer on {{$company->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="uuid" placeholder="UUID" autocomplete="off">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="token" placeholder="token" autocomplete="off">
                </div>
                <input type="hidden" name="org_id" value="{{$company->id}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-round btn-success">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog edit_body" role="document">
        
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>

<script>

    $(".edit_button ").click(function(){

        let id = $(this).attr("data_id");
        let table = $(this).attr("table");

        $.get("{{url('updateData')}}/" + id +"/"+table, function(data, status){

            $(".edit-modal").modal("show");
            $(".edit_body").html(data);
                
        });


    });

   

    $('#multiselect3-all').multiselect({
        includeSelectAllOption: true,
    });
    @if($message = Session::get('success')){
        swal("Good job!", "{{ $message }}", "success");
    }
    @elseif($message = Session::get('failed')){
        swal("Oops!", "{{ $message }}", "warning");
    }
    @endif

    $(".delete_button").click(function(){

        let id = $(this).attr("data_id");
        let table = $(this).attr("table");

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
               
                if(table == "user"){
                    window.location.href = "{{url('delete_user')}}/"+id;
                }else{
                    window.location.href = "{{url('delete_computer')}}/"+id;
                }
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });

       

    });

   



</script>
@stop