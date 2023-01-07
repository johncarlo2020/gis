@extends('layouts.app')

@section('content')
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
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td class="text-center">{{$user->id}}</td>
            <td>{{$user->fname}} {{$user->mname}} {{$user->lname}}</td>
            <td>{{$user->email}}</td>
            <td class="text-center">{{$user->role}}</td>
            <td class="text-center">{{$user->created_at}}</td>
            <td class="text-center">{{$user->updated_at}}</td>
            <td class="text-center">
                <span class="btn btn-sm btn-info" id="user_view">View</span>
                <span class="btn btn-sm btn-primary" id="user_edit">Edit</span>
                <span class="btn btn-sm btn-danger" id="user_delete">Delete</span>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>


<!-- Modal -->
<div class="modal fade" id="user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Personal Information</h4>
        <hr>
        <form action="" method="POST">
          @csrf
        <div class="form-row">
            <div class="col">
              <input type="text" name="fname" class="form-control" placeholder="First name*">
            </div>
            <div class="col">
              <input type="text" name="lname" class="form-control" placeholder="Last name*">
            </div>
            <div class="col">
              <input type="text" name="mname" class="form-control" placeholder="Middle name*">
            </div>
          </div>
          <div class="form-row mt-2">
            <div class="col-8">
              <input type="text" name="address" class="form-control" placeholder="Address*">
            </div>
            <div class="col-4">
              <input type="number" name="contact" class="form-control" placeholder="Contact Number*">
            </div>
          </div>
          <h4>Account Information</h4>
          <hr>
          <div class="form-row mt-2">
            <div class="col-8">
              <input type="email" name="email" class="form-control" placeholder="Email address*">
            </div>
            <div class="col-4">
              <input type="text" name="role" class="form-control" placeholder="Role*">
            </div>
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


