

<form action="{{route('computer.update',$computer->id)}}" method="post" autocomplete="off">
        @csrf
        {{ method_field('PUT') }}
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$computer->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$computer->name}}" name="name" placeholder="Name" autocomplete="off">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$computer->uuid}}" name="uuid" placeholder="UUID" autocomplete="off">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$computer->token}}" name="token" placeholder="token" autocomplete="off">
            </div>
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-round btn-success">Save changes</button>
        </div>
    </div>
</form>