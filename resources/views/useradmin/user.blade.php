@extends('layouts.app')

@section('content')
<div style="width: 90%;margin-left: 6em;">
  <div class="row">
    <h1 class="col">User</h1>
    <div class="col text-right">
      <h1 class="btn btn-primary" id="user_add">User</h1>
    </div>
  </div>  
    <div class="container-fluid">
      <table class="table table-striped" id="table_id">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
            <th class="text-center">Created At</th>
            <th class="text-center">Updated At</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td class="text-center">{{$user->id}}</td>
            <td>{{$user->fname}} {{$user->mname}} {{$user->lname}}</td>
            <td>{{$user->email}}</td>
            <td class="text-center"><b>
              @if($user->role==1)
                Admin
              @elseif($user->role==2)
                Registrar
              @elseif($user->role==3)
                Encoder
            @endif
          </b></td>
            <td class="text-center">{{$user->created_at}}</td>
            <td class="text-center">{{$user->updated_at}}</td>
            <td class="text-center"> 
            @if($user->status==1)
                <b style="color:green">Active</b>
            @else
                <b style="color:red">Inactive</b>
            @endif
            </td>
            <td class="text-center">
                <span data-user_id="{{$user->id}}" class="btn btn-sm btn-info" id="user_view">View</span>
                <span data-user_id="{{$user->id}}" class="btn btn-sm btn-primary" id="user_edit">Edit</span>
                @if($user->status==1)
                  <span span data-user_id="{{$user->id}}" data-name="{{$user->fname}} {{$user->mname}} {{$user->lname}}" class="btn btn-sm btn-danger" id="user_delete">Delete</span>
                @else
                  <span data-user_id="{{$user->id}}" data-name="{{$user->fname}} {{$user->mname}} {{$user->lname}}" class="btn btn-sm btn-success" id="user_recover">Recover</span>
                @endif

            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="" method="POST">
        @csrf
          <div id="modal-form">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success usermodalsave">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection


