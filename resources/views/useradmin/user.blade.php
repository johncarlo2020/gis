@extends('layouts.app')

@section('content')
    <section class="main-section">
        <div class="title-head">
            <h1>User</h1>
            <button class="btn add-btn" id="user_add">Add <span><i class="fa-solid fa-circle-plus"></i></span></button>
        </div>
        <div class="container-fluid">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <!-- <th class="text-center">Status</th> -->
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center"><b>
                                    @if ($user->role == 1)
                                        <span class="badge badge-info">Admin</span>
                                    @elseif($user->role == 2)
                                        <span class="badge badge-info">Registrar</span>
                                    @elseif($user->role == 3)
                                        <span class="badge badge-info">Encoder</span>
                                    @endif
                                </b></td>
                            <td class="text-center">{{ $user->created_at }}</td>
                            <td class="text-center">{{ $user->updated_at }}</td>


                            <td class="text-center">
                                <span data-user_id="{{ $user->id }}" class="btn btn-sm btn-primary" id="user_view"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i
                                        class="fa-solid fa-eye"></i></span>
                                <span data-user_id="{{ $user->id }}" class="btn btn-sm btn-info"
                                    id="user_edit"data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                        class="fa-solid fa-pen"></i></span>
                                @if ($user->status == 1)
                                    <span span data-user_id="{{ $user->id }}"
                                        data-name="{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}"
                                        class="btn btn-sm btn-danger" id="user_delete" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete"><i class="fa-solid fa-trash-can"></i></span>
                                @else
                                    <span data-user_id="{{ $user->id }}"
                                        data-name="{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}"
                                        class="btn btn-sm btn-success" id="user_recover" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Restore"><i class="fa-solid fa-hammer"></i></span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header px-0">
                        <span class="top-design"></span>
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close btnclose" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-0">
                        <form action="" method="POST">
                            @csrf
                            <div id="modal-form">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-danger cancel-btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btnclose btn btn-primary usermodalsave save-btn">Save</button>
                    </div>
                </div>
            </div>
    </section>
@endsection
