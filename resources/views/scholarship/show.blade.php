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
                                <center>
                                  @if ($scholarship->status == 1)
                                    <span class="badge badge-info">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inctive</span>
                                    @endif
                                </center>
                            </td>
                            <td class="text-center">
                                <span data-scholarship_id="{{ $scholarship->id }}" class="btn btn-sm btn-primary" id="scholarship_view"><i class="fa-solid fa-eye"></i></span>
                                <span data-scholarship_id="{{ $scholarship->id }}" class="btn btn-sm btn-info" id="scholarship_edit"><i class="fa-solid fa-pen"></i></span>
                                @if ($scholarship->status == 1)
                                    <span span data-scholarship_id="{{ $scholarship->id }}" data-name="{{ $scholarship->name }}" class="btn btn-sm btn-danger" id="scholarship_delete"><i class="fa-solid fa-trash-can"></i></span>
                                @else
                                    <span data-scholarship_id="{{ $scholarship->id }}" data-name="{{ $scholarship->name }}" class="btn btn-sm btn-success" id="scholarship_recover"><i class="fa-solid fa-hammer"></i></span>
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
    <script type="text/javascript">
        // ================================REQUIRED==============================================
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function base_url() {
    var pathparts = location.pathname.split("/");
    if (location.host == "localhost") {
        var url = location.origin + "/" + pathparts[1].trim("/") + "/";
    } else {
        var url = location.origin + "/gis/";
  }
  
    return url;
}
// ==============================================================================

$(document).ready(function () {
    $("#table_id").DataTable();
});

function reload_scholarships(){
  $('#table_id').DataTable().clear().destroy();

  $(".scholarshipmodalsave").removeClass("scholarship-recover");
  $(".scholarshipmodalsave").removeClass("btn-delete");
  $(".scholarshipmodalsave").removeClass("btn-warning");
  $(".scholarshipmodalsave").addClass("btn-success");
  $(".scholarshipmodalsave").text("Save");
  $(".scholarshipmodalsave").removeClass("disabled");


  $('#table_id').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: base_url() + "public/ajax/scholarship-reload",
        type: 'POST',
      },
  });
}



$(document).on("click", "#scholarship_add", function () {
    
    var tmp_body = `
        <h4>Add Scholarship</h4>
        <hr>
        <div class="form-row">
              <input type="text" name="name" class="form-control addvalidator_scholarship scholarshipnamevalidator" placeholder="Scholarship Name* " required>
              <small id="required-scholarshipname" class="d-none" style="color:red">Name Required</small>
              <small id="unique-scholarshipname" class="d-none" style="color:red">Name Already Exist</small>
            </div>
          <div class="form-row mt-2">
              <textarea class="form-control description addvalidator_scholarship" name="description" placeholder="Description*" rows="6"></textarea>
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
    $(".modal-title").append("Scholarship");
    $("#modal-form").append(tmp_body);
    $(".scholarshipmodalsave").addClass("scholarship_insert");
    $(".scholarshipmodalsave").addClass("disabled");
    $(".scholarshipmodalsave").removeClass("d-none");
    $("#scholarship_modal").modal("show");


});

// add scholarship validation

$(document).on("keyup", ".scholarshipnamevalidator", function () {
  $.ajax({
      url: base_url() + "public/ajax/scholarship-validate_scholarshipname",
      data: {
          data: $(this).val(),
      },
      dataType: "json",
      type: "post",
      success: function (data) {
        console.log(data);
          if (data > 0) {
            $('#unique-scholarshipname').removeClass('d-none')
              $(".scholarshipmodalsave").addClass("disabled");
              $('#unique-scholarshipname').attr('status','1')
          }else{
            $('#unique-scholarshipname').addClass('d-none')
              $('#unique-scholarshipname').attr('status','0')
          }
      },
  });
});


$(document).on("keyup", ".addvalidator_scholarship", function () {
    validator_scholarship();
});

function validator_scholarship() {
    if ($('.description').val().length > 0) {
        $("#required-description").addClass("d-none");
    } else {
        $("#required-description").removeClass("d-none");
    }

    if ($("input[name=name]").val().length > 0) {
      $("#required-scholarshipname").addClass("d-none");
  } else {
      $("#required-scholarshipname").removeClass("d-none");
  }

    if ($('#unique-scholarshipname').attr('status') == 0) {
      $.each($(".addvalidator_scholarship"), function () {
              if ($(this).val() == "") {
            $(".scholarshipmodalsave").addClass("disabled");
                  return false;
              } else {
                  $(".scholarshipmodalsave").removeClass("disabled");
              }
      });
    }
  }


$(document).on("click", ".scholarship_insert", function () {
  var data = {};
  $.each($("form").serializeArray(), function (i, field) {
      data[field.name] = field.value;
  });

  var status = $("input[name=status]").is(":checked")
  if (status == true) { data['status'] = 1}
  if (status == false) { data['status'] = 0}


  $.ajax({
      url: base_url() + "public/ajax/scholarship-create",
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
        $("#scholarship_modal").modal("hide");
        setTimeout(function() { 
          reload_scholarships(); 
          Swal.fire(
            'Scholarship',
            'Created Successfully!',
            'success'
          )
        }, 1000);
      },
  });
});

// ==========================================================================

$(document).on("click", "#scholarship_view", function () {
    var id = $(this).data("scholarship_id");
    $(".modal-dialog").addClass("modal-lg");
    $(".scholarshipmodalsave").removeClass("d-none");

    $.ajax({
        url: base_url() + "public/ajax/scholarship-view",
        data: {
            id: id,
        },
        dataType: "json",
        type: "post",
        success: function (data) {

            var tmp_body = `
        <hr>
        <div class="form-row">
              <input type="text" class="form-control scholarshipnamevalidator" value="`+data['0'].name+`" readonly>
            </div>
          <div class="form-row mt-2">
              <textarea class="form-control description" name="description" readonly rows="6">`+data['0'].description+`</textarea>
          </div>

          </div>
        </div>`;

            $("#modal-form").empty();
            $(".modal-title").empty();
            $(".modal-title").append("View Scholarship");
            $("#modal-form").append(tmp_body);
            $("#scholarship_modal").modal("show");
            $(".scholarshipmodalsave").addClass("d-none");
        },
    });
});

// // ======================= EDIT ======================================================

$(document).on("click", "#scholarship_edit", function () {
    var id = $(this).data("scholarship_id");
    $(".modal-dialog").addClass("modal-lg");
    $(".scholarshipmodalsave").text("Save");
    $(".scholarshipmodalsave").removeClass("d-none");

    $.ajax({
      url: base_url() + "public/ajax/scholarship-view",
      data: {
          id: id,
      },
      dataType: "json",
      type: "post",
      success: function (data) {

          var tmp_body = `
      <hr>
      <div class="form-row">
            <input type="text" name="name" class="form-control scholarshipnamevalidatoredit schoupdate" id="`+id+`" value="`+data['0'].name+`" >
            <small id="unique-name" class="d-none" style="color:red">Name Already Exist</small>
            <small id="required-scholarshipname" class="d-none" style="color:red">Name Required</small>
          </div>
        <div class="form-row mt-2">
            <textarea class="form-control description schoupdate" name="description"  rows="6">`+data['0'].description+`</textarea>
        </div>
        </div>
      </div>`;

          $("#modal-form").empty();
          $(".modal-title").empty();
          $(".modal-title").append("Edit Scholarship");
          $("#modal-form").append(tmp_body);
          $(".scholarshipmodalsave").addClass("scholarship_update");
          $(".scholarshipmodalsave").attr("id",id);
          $("#scholarship_modal").modal("show");
      },
  });
});


$(document).on("keyup", ".scholarshipnamevalidatoredit", function () {

  var length = 0;
  var unique = 0;

  if ($("input[name=name]").val().length > 0) {
    $("#required-scholarshipname").addClass("d-none");
    length = 1;
  } else {
      $("#required-scholarshipname").removeClass("d-none");
    length = 0;

  }

  $.ajax({
      url: base_url() + "public/ajax/scholarship-validate_scholarshipname_edit",
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
            $(".scholarshipmodalsave").removeClass("disabled");
          }else{
            $(".scholarshipmodalsave").addClass("disabled");
          }
      },
  });


});


$(document).on("click", ".scholarship_update", function () {
  var data = {};
    data["id"] = $(this).attr("id");
  $.each($("form").serializeArray(), function (i, field) {
      data[field.name] = field.value;
  });

  $.ajax({
      url: base_url() + "public/ajax/scholarship-edit",
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
        $("#scholarship_modal").modal("hide");
        if (data == "success") {
          setTimeout(function() { 
            reload_scholarships(); 
            Swal.fire(
              'Scholarship Update',
              'Updated Successfully!',
              'success'
            )
          }, 1000);
        }else{
          setTimeout(function() { 
            reload_scholarships(); 
            Swal.fire(
              'Scholarship',
              'Updated Failed Successfully!',
              'warning'
            )
          }, 1000);
        }
      },
  });
});



// // ========================= DELETE ======================================================

$(document).on("click", "#scholarship_delete", function () {
    var name = $(this).data("name");
    $(".scholarshipmodalsave").removeClass("d-none");
    $(".scholarshipmodalsave").removeClass("scholarship_recover");

    $(".modal-dialog").removeClass("modal-lg");

    var tmp_body =  `<h4>Are you sure you want to delete <b>` + name +  `</b> ? </h4>`;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Delete User");
    $("#modal-form").append(tmp_body);
    $("#scholarship_modal").modal("show");
    $(".scholarshipmodalsave").addClass("scholarship-delete");
    $(".scholarshipmodalsave").addClass("btn-warning");
    $(".scholarshipmodalsave").removeClass("btn-success");
    $(".scholarshipmodalsave").text("Delete");
    $(".scholarship-delete").attr("id", $(this).data("scholarship_id"));
});

$(document).on("click", ".scholarship-delete", function () {
    var id = $(this).attr("id");
    $.ajax({
        url: base_url() + "public/ajax/scholarship-delete",
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
          $("#scholarship_modal").modal("hide");
          setTimeout(function() { 
            reload_scholarships(); 
            Swal.fire(
              'Scholarship',
              'Deleted Successfully!',
              'success'
            )
          }, 1000);
        },
    });
});

// // ========================= RECOVER ======================================================

$(document).on("click", "#scholarship_recover", function () {
    var name = $(this).data("name");
    $(".scholarshipmodalsave").removeClass("d-none");
    $(".scholarshipmodalsave").removeClass("scholarship_delete");
    $(".modal-dialog").removeClass("modal-lg");

    var tmp_body =
        `
          <h4>Are you sure you want to recover <b>` +name + `</b> ?</h4> `;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Recover User");
    $("#modal-form").append(tmp_body);
    $("#scholarship_modal").modal("show");
    $(".scholarshipmodalsave").addClass("scholarship-recover");
    $(".scholarshipmodalsave").removeClass("btn-success");
    $(".scholarshipmodalsave").addClass("btn-warning");
    $(".scholarshipmodalsave").text("Recover");
    $(".scholarship-recover").attr("id", $(this).data("scholarship_id"));
});

$(document).on("click", ".scholarship-recover", function () {
    var id = $(this).attr("id");
    $.ajax({
        url: base_url() + "public/ajax/scholarship-delete",
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
          $("#scholarship_modal").modal("hide");
          setTimeout(function() { 
            reload_scholarships(); 
            Swal.fire(
              'Scholarship',
              'Recovered Successfully!',
              'success'
            )
          }, 1000);
        },
    });
});

    </script>
@endsection
