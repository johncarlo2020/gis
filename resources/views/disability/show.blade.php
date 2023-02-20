@extends('layouts.app')

@section('content')

<section class="main-section">
        <div class="title-head">
            <h1>Disability</h1>
            <div>
                <button class="btn add-btn trigger_btn" data-type="deleted_view" id="">Deleted</button>
                <button class="btn add-btn trigger_btn" data-type="new" id="">Add <span><i class="fa-solid fa-circle-plus"></i></span></button>
            </div>
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
                    @foreach ($disabilities as $a)
                        <tr>
                            <td class="text-center">{{ $a->id }}</td>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->description }}</td>
                            <td>
                                <center>
                                  @if ($a->status == 1)
                                    <span class="badge badge-info">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inctive</span>
                                    @endif
                                </center>
                            </td>
                            <td class="text-center">    
                                <span class="btn btn-sm btn-primary trigger_btn" data-id="{{ $a->id }}" data-type="view"><i class="fa-solid fa-eye"></i></span>
                                <span class="btn btn-sm btn-info trigger_btn"  data-id="{{ $a->id }}" data-type="edit"><i class="fa-solid fa-pen"></i></span>
                                @if ($a->status == 1)
                                    <span class="btn btn-sm btn-danger trigger_btn" data-id="{{ $a->id }}" data-name="{{ $a->name }}" data-type="status" data-status="delete"><i class="fa-solid fa-trash-can"></i></span>
                                @else
                                    <span class="btn btn-sm btn-success trigger_btn" data-id="{{ $a->id }}" data-name="{{ $a->name }}" data-type="status" data-status="recover"><i class="fa-solid fa-hammer"></i></span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                        <button type="button" data-id="" class="btnclose btn btn-success save_btn">Save</button>
                    </div>
                </div>
            </div>
    </section>

@endsection
@section('scripts')
<script>
// ================================REQUIRED==============================================
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $("#table_id").DataTable();
});
function disability_reload(status){

  $('#table_id').DataTable().clear().destroy();

  $('#table_id').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: "{{ route('disability_reload') }}",
        data: {status:status},
        dataType: "json",
        type: 'POST',
      },
  });
  
}
// ================================REQUIRED==============================================

$(document).on("click", ".trigger_btn", function () {

    var id = $(this).attr('data-id')
    var type = $(this).attr('data-type')
    var name = $(this).attr('data-name')

    $("#modal-form").empty();
    $(".modal-title").empty();
    $('.save_btn').attr("data-id",'');
    $(".save_btn").removeClass("btn-warning");
    $(".save_btn").removeClass("btn-danger");
    $(".save_btn").addClass("btn-success");

    $('.save_btn').attr("data-id",id);
    $(".save_btn").removeClass("d-none");
    $(".save_btn").text("Save");

    if (type == 'deleted_view') {
        $(this).text('Active View');
        $(this).attr('data-type','default_view');
        disability_reload(0); 
        return false;
    }
    if (type == 'default_view') {
        $(this).text('Deleted');
        $(this).attr('data-type','deleted_view');
        disability_reload(1); 
        return false;
    }
    if (type == 'new') {
            var tmp_body = `
                <div class="form-row">
                    <input type="text" name="name" data-type="validate_new" class="form-control validator" placeholder="Disability Name*" required>
                    <small id="required-name" class="d-none" style="color:red">Name Required</small>
                    <small id="unique-name" class="d-none" style="color:red">Name Already Exist</small>
                </div>
                <div class="form-row mt-2">
                    <textarea class="form-control description validator" data-type="validate_new" name="description" placeholder="Description*" rows="6"></textarea>
                    <small id="required-description" class="d-none" style="color:red">Description Required</small>
                </div>
                <div class=" mt-2">
                    <label class="">Status</label>
                    <input class="" name="status" type="checkbox" checked>
                </div>`;
            $("#modal-form").append(tmp_body);
            $(".modal-title").append("Add Disability");
            $(".save_btn").attr("data-type","store");
            $(".save_btn").addClass("disabled");
    }
    if (type == 'view') {

        $.ajax({
            url: "{{ route('disability_view') }}",
            data: {id: id,},
            dataType: "json",
            type: "post",
            success: function (data) {
            var tmp_body = `
                <div class="form-row">
                <input type="text" class="form-control scholarshipnamevalidator" value="`+data['0'].name+`" readonly>
                </div>
            <div class="form-row mt-2">
                <textarea class="form-control description" name="description" readonly rows="6">`+data['0'].description+`</textarea>
            </div>
            </div>`;
                $(".modal-title").append("View Scholarship");
                $("#modal-form").append(tmp_body);
                $(".save_btn").addClass("d-none");

            },
        });
    }

    if (type == 'edit') {
        $.ajax({
            url: "{{ route('disability_view') }}",
            data: {id: id,},
            dataType: "json",
            type: "post",
            success: function (data) {
            var tmp_body = `
            <div class="form-row">
                    <input type="text" name="name" data-type="validate_edit" data-id="`+data['0'].id+`" class="form-control validator" value="`+data['0'].name+`" placeholder="Disability Name*" required>
                    <small id="required-name" class="d-none" style="color:red">Name Required</small>
                    <small id="unique-name" class="d-none" style="color:red">Name Already Exist</small>
                </div>
                <div class="form-row mt-2">
                    <textarea class="form-control description validator" data-type="validate_edit" name="description" placeholder="Description*" rows="6">`+data['0'].description+`</textarea>
                    <small id="required-description" class="d-none" style="color:red">Description Required</small>
                </div>
                <div class=" mt-2">
                    <label class="">Status</label>
                    <input class="" name="status" type="checkbox" checked>
                </div>`;
                $("#modal-form").append(tmp_body); 
                $(".modal-title").append("Edit Disability");
                $(".save_btn").attr("data-type","edit");

            },
        });
    }
    if (type == 'status') {
        var status = $(this).data('status');
        if (status == 'delete') {
            var tmp_body =  `<h4>Are you sure you want to delete <b>` + name +  `</b> ? </h4>`;
            $(".modal-title").append("Delete Disability");
            $(".save_btn").text("Delete");
            $(".save_btn").addClass("btn-danger");
            $(".save_btn").removeClass("btn-success");
            $(".save_btn").attr("data-type","status");
        }    
        if (status == 'recover') {
            var tmp_body =  `<h4>Are you sure you want to recover <b>` + name +  `</b> ? </h4>`;
            $(".modal-title").append("Recover Disability");
            $(".save_btn").text("Recover");
            $(".save_btn").addClass("btn-warning");
            $(".save_btn").removeClass("btn-success");
            $(".save_btn").attr("data-type","status");
        }    
        $("#modal-form").append(tmp_body);
    }
    
    $("#modal").modal("show");

});



// ================================= btn save ======================================
$(document).on("click", ".save_btn", function () {

    var id = $(this).attr('data-id')
    var type = $(this).attr('data-type')
    var status = $(this).attr('data-status')

    if (type == "store") {
            var data = {};
            $.each($("form").serializeArray(), function (i, field) {
                data[field.name] = field.value;
            });

            var status = $("input[name=status]").is(":checked")
            if (status == true) { data['status'] = 1}
            if (status == false) { data['status'] = 0}

            $.ajax({
                url: "{{ route('disability_store') }}",
                data: {
                    data: data,
                },
                dataType: "json",
                type: "post",
                beforeSend: function(){
                    Swal.fire({
                    title: 'Uploading...',
                    html: 'Please wait...',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                    });
                },success: function (data) {
                    $("#modal").modal("hide");
                    setTimeout(function() { 
                        disability_reload(1); 
                    Swal.fire(
                        'Disability',
                        'Created Successfully!',
                        'success'
                    )
                    }, 1000);
                },
            });
    }

    if (type == "edit") {
        var data = {};
        data["id"] = id;
        $.each($("form").serializeArray(), function (i, field) {
            data[field.name] = field.value;
        });

        $.ajax({
            url: "{{ route('disability_edit') }}",
            data: {
                data: data,
            },
            dataType: "json",
            type: "post",
            beforeSend: function(){
                Swal.fire({
                title: 'Uploading...',
                html: 'Please wait...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
                });
            },success: function (data) {
                $("#modal").modal("hide");
                if (data == "success") {
                setTimeout(function() { 
                    disability_reload(1); 
                    Swal.fire(
                    'Disability',
                    'Updated Successfully!',
                    'success'
                    )
                }, 1000);
                }else{
                setTimeout(function() { 
                    disability_reload(1); 
                    Swal.fire(
                    'Disability',
                    'Updated Failed Successfully!',
                    'warning'
                    )
                }, 1000);
                }
            },
        });
    }

    if (type == "status") {
        $.ajax({
            url: "{{ route('disability_status') }}",
            data: {
                id: id,
            },
            dataType: "json",
            type: "post",
            beforeSend: function(){
            Swal.fire({
                title: 'Uploading...',
                html: 'Please wait...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                Swal.showLoading()
                }
            });
            },success: function (data) {
            $("#modal").modal("hide");
            if (data == 1) { 
                disability_reload(0); 
                var status = 'Recovered';
            }else{ 
                disability_reload(1); 
                var status = "Deleted";
            }
            setTimeout(function() { 
                Swal.fire(
                'Scholarship',
                status+' Successfully!',
                'success'
                )
            }, 1000);
            },
        });
    }
});

// ============================= validator ====================================
$(document).on("keyup", ".validator", function () {
    var type = $(this).data('type')
    validator_scholarship(type);
});

function validator_scholarship(type) {
    if (type == "validate_new") {
        if ($('.description').val().length > 0) {
            $("#required-description").addClass("d-none");
        } else {
            $("#required-description").removeClass("d-none");
        }
        if ($("input[name=name]").val().length > 0) {
        $("#required-name").addClass("d-none");
        } else {
        $("#required-name").removeClass("d-none");
        }

        $.ajax({
            url: "{{ route('disability_validate') }}",
            data: {data: $("input[name=name]").val(),type: type,},
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data == 0) {
                    $("#unique-name").addClass("d-none");
                    $.each($(".validator"), function () {
                            if ($(this).val() == "") {
                                $(".save_btn").addClass("disabled");
                                return false;
                            } else {
                                $(".save_btn").removeClass("disabled");
                            }
                    });
                }else{
                    $("#unique-name").removeClass("d-none");
                    $(".save_btn").addClass("disabled");
                    return false;
                }
            },
        });
    }
    if (type == "validate_edit") {
        if ($('.description').val().length > 0) {
            $("#required-description").addClass("d-none");
        } else {
            $("#required-description").removeClass("d-none");
        }

        if ($("input[name=name]").val().length > 0) {
        $("#required-name").addClass("d-none");
        } else {
        $("#required-name").removeClass("d-none");
        }
        $.ajax({
            url: "{{ route('disability_validate') }}",
            data: {
                data: $("input[name=name]").val(),
                data_id: $("input[name=name]").attr('data-id'),
                type: type,
            },
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data == 0) {
                    $("#unique-name").addClass("d-none");
                    $.each($(".validator"), function () {
                            if ($(this).val() == "") {
                                $(".save_btn").addClass("disabled");
                                return false;
                            } else {
                                $(".save_btn").removeClass("disabled");
                            }
                    });
                }else{
                    $("#unique-name").removeClass("d-none");
                    $(".save_btn").addClass("disabled");
                    return false;
                }
            },
        });
    }
}


</script>
@endsection

