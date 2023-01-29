@extends('layouts.app')

@section('content')
<section class="main-section">
        <div class="title-head">
            <h1>Scholarship</h1>
            <button class="btn add-btn" id="scholarship_add">Add <span><i class="fa-solid fa-circle-plus"></i></span></button>
        </div>
        <div class="container-fluid">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scholarships as $scholarship)
                        <tr>
                            <td class="text-center">{{ $scholarship->id }}</td>
                            <td>{{ $scholarship->name }}</td>
                            <td>{{ $scholarship->description }}</td>
                            <td>
                                  @if ($scholarship->status == 1)
                                  <span class="badge badge-info">Active</span>
                                @else
                                  <span class="badge badge-danger">Inctive</span>

                                @endif
                            </td>
                            <td class="text-center">
                                <span data-scholarship_id="{{ $scholarship->id }}" class="btn btn-sm btn-primary" id="scholarship_view"><i
                                        class="fa-solid fa-eye"></i></span>
                                <span data-scholarship_id="{{ $scholarship->id }}" class="btn btn-sm btn-info" id="scholarship_edit"><i
                                        class="fa-solid fa-pen"></i></span>
                                @if ($scholarship->status == 1)
                                    <span span data-scholarship_id="{{ $scholarship->id }}"
                                        data-name=""
                                        class="btn btn-sm btn-danger" id="scholarship_delete"><i
                                            class="fa-solid fa-trash-can"></i></span>
                                @else
                                    <span data-scholarship_id="{{ $scholarship->id }}"
                                        data-name=""
                                        class="btn btn-sm btn-success" id="scholarship_recover"><i
                                            class="fa-solid fa-hammer"></i></span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="scholarship_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div id="modal-form">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btnclose btn btn-success scholarshipmodalsave">Save</button>
                    </div>
                </div>
            </div>
    </section>
@endsection
