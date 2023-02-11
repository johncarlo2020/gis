@extends('layouts.app')

@section('content')
<section class="main-section">
        <div class="title-head">
            <h1>qualification</h1>
            <button class="btn add-btn" id="qualification_add">Add <span><i class="fa-solid fa-circle-plus"></i></span></button>
        </div>
        <div class="container-fluid">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qualifications as $qualification)
                        <tr>
                            <td class="text-center">{{ $qualification->id }}</td>
                            <td>{{ $qualification->name }}</td>
                            <td><span class="badge badge-info">{{$qualification->type}}</span>
</td>
                            <td>
                                <center>
                                  @if ($qualification->status == 1)
                                    <span class="badge badge-info">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inctive</span>
                                    @endif
                                </center>
                            </td>
                            <td class="text-center">
                                <span data-qualification_id="{{ $qualification->id }}" class="btn btn-sm btn-primary" id="qualification_view"><i class="fa-solid fa-eye"></i></span>
                                <span data-qualification_id="{{ $qualification->id }}" class="btn btn-sm btn-info" id="qualification_edit"><i class="fa-solid fa-pen"></i></span>
                                @if ($qualification->status == 1)
                                    <span span data-qualification_id="{{ $qualification->id }}" data-name="{{ $qualification->name }}" class="btn btn-sm btn-danger" id="qualification_delete"><i class="fa-solid fa-trash-can"></i></span>
                                @else
                                    <span data-qualification_id="{{ $qualification->id }}" data-name="{{ $qualification->name }}" class="btn btn-sm btn-success" id="qualification_recover"><i class="fa-solid fa-hammer"></i></span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="qualification_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                        <button type="button" class="btnclose btn btn-success qualificationmodalsave">Save</button>
                    </div>
                </div>
            </div>
    </section>
    @endsection

@section('scripts')
@parent
<script type="text/javascript">
// ================================REQUIRED==============================================
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
// ==============================================================================

$(document).ready(function () {
    $("#table_id").DataTable();
});

function reload_qualifications(){
  $('#table_id').DataTable().clear().destroy();

  $(".qualificationmodalsave").removeClass("qualification-recover");
  $(".qualificationmodalsave").removeClass("btn-delete");
  $(".qualificationmodalsave").removeClass("btn-warning");
  $(".qualificationmodalsave").addClass("btn-success");
  $(".qualificationmodalsave").text("Save");
  $(".qualificationmodalsave").removeClass("disabled");


  $('#table_id').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: "{{ route('qualification_reload') }}",
        type: 'POST',
      },
  });
}



$(document).on("click", "#qualification_add", function () {
    
    var tmp_body = `
        <h4>Add qualification</h4>
        <hr>
         <div class="form-row">
              <select class="form-select form-control" aria-label="Default select example">
                <option selected>Qualification Type</option>
                <option value="1">Short Term</option>
                <option value="2">Long Term</option>
              </select>
            </div>
        <div class="form-row mt-2">
              <input type="text" name="name" class="form-control addvalidator_qualification qualificationnamevalidator" placeholder="qualification Name* " required>
              <small id="required-qualificationname" class="d-none" style="color:red">Name Required</small>
              <small id="unique-qualificationname" class="d-none" style="color:red">Name Already Exist</small>
            </div>
          <div class="form-row mt-2">
              <textarea class="form-control description addvalidator_qualification" name="description" placeholder="Description*" rows="6"></textarea>
              <small id="required-description" class="d-none" style="color:red">Description Required</small>
          </div>
          <div class=" mt-2">
                <label class="">Status</label>
              <input class="" name="status" type="checkbox" checked>
            </div>
            
          </div>
        </div>`;
    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("qualification");
    $("#modal-form").append(tmp_body);
    $(".qualificationmodalsave").addClass("qualification_insert");
    $(".qualificationmodalsave").addClass("disabled");
    $(".qualificationmodalsave").removeClass("d-none");
    $("#qualification_modal").modal("show");


});

// add qualification validation

$(document).on("keyup", ".qualificationnamevalidator", function () {
  $.ajax({
      url: "{{ route('qualification_validate') }}",
      data: {
          data: $(this).val(),
      },
      dataType: "json",
      type: "post",
      success: function (data) {
        console.log(data);
          if (data > 0) {
            $('#unique-qualificationname').removeClass('d-none')
              $(".qualificationmodalsave").addClass("disabled");
              $('#unique-qualificationname').attr('status','1')
          }else{
            $('#unique-qualificationname').addClass('d-none')
              $('#unique-qualificationname').attr('status','0')
          }
      },
  });
});


$(document).on("keyup", ".addvalidator_qualification", function () {
    validator_qualification();
});

function validator_qualification() {
    if ($('.description').val().length > 0) {
        $("#required-description").addClass("d-none");
    } else {
        $("#required-description").removeClass("d-none");
    }

    if ($("input[name=name]").val().length > 0) {
      $("#required-qualificationname").addClass("d-none");
  } else {
      $("#required-qualificationname").removeClass("d-none");
  }

    if ($('#unique-qualificationname').attr('status') == 0) {
      $.each($(".addvalidator_qualification"), function () {
              if ($(this).val() == "") {
            $(".qualificationmodalsave").addClass("disabled");
                  return false;
              } else {
                  $(".qualificationmodalsave").removeClass("disabled");
              }
      });
    }
  }


$(document).on("click", ".qualification_insert", function () {
  var data = {};
  $.each($("form").serializeArray(), function (i, field) {
      data[field.name] = field.value;
  });

  var status = $("input[name=status]").is(":checked")
  if (status == true) { data['status'] = 1}
  if (status == false) { data['status'] = 0}


  $.ajax({
      url: base_url() + "public/ajax/qualification-create",
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
        $("#qualification_modal").modal("hide");
        setTimeout(function() { 
          reload_qualifications(); 
          Swal.fire(
            'qualification',
            'Created Successfully!',
            'success'
          )
        }, 1000);
      },
  });
});

// ==========================================================================

$(document).on("click", "#qualification_view", function () {
    var id = $(this).data("qualification_id");
    $(".modal-dialog").addClass("modal-lg");
    $(".qualificationmodalsave").removeClass("d-none");
    $(".qualificationmodalsave").removeClass("disabled");

    $.ajax({
        url: "{{ route('qualification_view') }}",
        data: {
            id: id,
        },
        dataType: "json",
        type: "post",
        success: function (data) {

            var tmp_body = `
        <hr>
        <div class="form-row">
              <input type="text" class="form-control qualificationnamevalidator" value="`+data['0'].name+`" readonly>
            </div>
          <div class="form-row mt-2">
              <textarea class="form-control description" name="description" readonly rows="6">`+data['0'].type+`</textarea>
          </div>

          </div>
        </div>`;

            $("#modal-form").empty();
            $(".modal-title").empty();
            $(".modal-title").append("View qualification");
            $("#modal-form").append(tmp_body);
            $("#qualification_modal").modal("show");
            $(".qualificationmodalsave").addClass("d-none");
        },
    });
});

// // ======================= EDIT ======================================================

$(document).on("click", "#qualification_edit", function () {
    var id = $(this).data("qualification_id");
    $(".modal-dialog").addClass("modal-lg");
    $(".qualificationmodalsave").text("Save");
    $(".qualificationmodalsave").removeClass("d-none");
    $(".qualificationmodalsave").removeClass("disabled");

    $.ajax({
      url: "{{ route('qualification_view') }}",
      data: {
          id: id,
      },
      dataType: "json",
      type: "post",
      success: function (data) {

          var tmp_body = `
      <hr>
      <div class="form-row">
            <input type="text" name="name" class="form-control qualificationnamevalidatoredit schoupdate" id="`+id+`" value="`+data['0'].name+`" >
            <small id="unique-name" class="d-none" style="color:red">Name Already Exist</small>
            <small id="required-qualificationname" class="d-none" style="color:red">Name Required</small>
          </div>
        <div class="form-row mt-2">
            <textarea class="form-control description schoupdate" name="description"  rows="6">`+data['0'].description+`</textarea>
        </div>
        </div>
      </div>`;

          $("#modal-form").empty();
          $(".modal-title").empty();
          $(".modal-title").append("Edit qualification");
          $("#modal-form").append(tmp_body);
          $(".qualificationmodalsave").addClass("qualification_update");
          $(".qualificationmodalsave").attr("id",id);
          $("#qualification_modal").modal("show");
      },
  });
});


$(document).on("keyup", ".qualificationnamevalidatoredit", function () {

  var length = 0;
  var unique = 0;

  if ($("input[name=name]").val().length > 0) {
    $("#required-qualificationname").addClass("d-none");
    length = 1;
  } else {
      $("#required-qualificationname").removeClass("d-none");
    length = 0;

  }

  $.ajax({
      url: "{{ route('qualification_validate_edit') }}",
      data: {
          data: $(this).val(),
      },
      dataType: "json",
      type: "post",
      success: function (data) {
          if (parseInt(data) > 0) {
            $('#unique-name').removeClass('d-none');
            unique = 0;
          }else{
            $('#unique-name').addClass('d-none');
            unique = 1;
          }
          console.log('length = ' + length);
          console.log('unique = ' + unique);
          if(length == 1 && unique == 1){
            $(".qualificationmodalsave").removeClass("disabled");
          }else{
            $(".qualificationmodalsave").addClass("disabled");
          }
      },
  });


});


$(document).on("click", ".qualification_update", function () {
  var data = {};
    data["id"] = $(this).attr("id");
  $.each($("form").serializeArray(), function (i, field) {
      data[field.name] = field.value;
  });

  $.ajax({
      url: "{{ route('qualification_update') }}",
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
        $("#qualification_modal").modal("hide");
        if (data == "success") {
          setTimeout(function() { 
            reload_qualifications(); 
            Swal.fire(
              'qualification Update',
              'Updated Successfully!',
              'success'
            )
          }, 1000);
        }else{
          setTimeout(function() { 
            reload_qualifications(); 
            Swal.fire(
              'qualification',
              'Updated Failed Successfully!',
              'warning'
            )
          }, 1000);
        }
      },
  });
});



// // ========================= DELETE ======================================================

$(document).on("click", "#qualification_delete", function () {
    var name = $(this).data("name");
    $(".qualificationmodalsave").removeClass("d-none");
    $(".qualificationmodalsave").removeClass("qualification_recover");
    $(".qualificationmodalsave").removeClass("disabled");

    $(".modal-dialog").removeClass("modal-lg");

    var tmp_body =  `<h4>Are you sure you want to delete <b>` + name +  `</b> ? </h4>`;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Delete User");
    $("#modal-form").append(tmp_body);
    $("#qualification_modal").modal("show");
    $(".qualificationmodalsave").addClass("qualification-delete");
    $(".qualificationmodalsave").addClass("btn-warning");
    $(".qualificationmodalsave").removeClass("btn-success");
    $(".qualificationmodalsave").text("Delete");
    $(".qualification-delete").attr("id", $(this).data("qualification_id"));
});

$(document).on("click", ".qualification-delete", function () {
    var id = $(this).attr("id");
    $.ajax({
        url: "{{ route('qualification_destroy') }}",
        data: {
            id: id,
            status: 0,
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
          $("#qualification_modal").modal("hide");
          setTimeout(function() { 
            reload_qualifications(); 
            Swal.fire(
              'qualification',
              'Deleted Successfully!',
              'success'
            )
          }, 1000);
        },
    });
});

// // ========================= RECOVER ======================================================

$(document).on("click", "#qualification_recover", function () {
    var name = $(this).data("name");
    $(".qualificationmodalsave").removeClass("d-none");
    $(".qualificationmodalsave").removeClass("qualification_delete");
    $(".modal-dialog").removeClass("modal-lg");
    $(".qualificationmodalsave").removeClass("disabled");

    var tmp_body =
        `
          <h4>Are you sure you want to recover <b>` +name + `</b> ?</h4> `;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Recover User");
    $("#modal-form").append(tmp_body);
    $("#qualification_modal").modal("show");
    $(".qualificationmodalsave").addClass("qualification-recover");
    $(".qualificationmodalsave").removeClass("btn-success");
    $(".qualificationmodalsave").addClass("btn-warning");
    $(".qualificationmodalsave").text("Recover");
    $(".qualification-recover").attr("id", $(this).data("qualification_id"));
});

$(document).on("click", ".qualification-recover", function () {
    var id = $(this).attr("id");
    $.ajax({
        url: "{{ route('qualification_destroy') }}",
        data: {
            id: id,
            status: 1,
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
         },
        success: function (data) {
          $("#qualification_modal").modal("hide");
          setTimeout(function() { 
            reload_qualifications(); 
            Swal.fire(
              'qualification',
              'Recovered Successfully!',
              'success'
            )
          }, 1000);
        },
    });
});

    </script>
@endsection
