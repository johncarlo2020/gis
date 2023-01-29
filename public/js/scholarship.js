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


// $('#example').DataTable({
//   processing: true,
//   serverSide: true,
//   ajax: '../server_side/scripts/server_processing.php',
// });

$(document).on("click", "#scholarship_add", function () {
    // $(".modal-dialog").addClass("modal-lg");
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
        </div>`;
    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Scholarship");
    $("#modal-form").append(tmp_body);
    $(".scholarshipmodalsave").addClass("scholarship_insert");
    $(".scholarshipmodalsave").addClass("disabled");
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

// $(document).on("keyup", ".scholarshipnamevalidatoredit", function () {
//   $.ajax({
//       url: base_url() + "public/ajax/scholarship-validate_scholarshipname_edit",
//       data: {
//           data: $(this).val(),
//       },
//       dataType: "json",
//       type: "post",
//       success: function (data) {
//           if (data > 0) {
//             $('#unique-scholarshipname').removeClass('d-none')
//               $(".scholarshipmodalsave").addClass("disabled");
//               $('#unique-scholarshipname').attr('status','1')
//           }else{
//             $('#unique-scholarshipname').addClass('d-none')
//             $('#unique-scholarshipname').attr('status','0')
//           }
//       },
//   });
// });

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
            'Scholarship Create',
            'Created Successfully!',
            'success'
          )
        }, 1000);
      },
  });
});

// ==========================================================================

// $(document).on("click", "#scholarship_view", function () {
//     var id = $(this).data("scholarship_id");
//     $(".modal-dialog").addClass("modal-lg");
//     $(".scholarshipmodalsave").removeClass("d-none");

//     $.ajax({
//         url: base_url() + "public/ajax/scholarship-view",
//         data: {
//             id: id,
//         },
//         dataType: "json",
//         type: "post",
//         success: function (data) {

//             var role = "";
//             if (data["0"].role == 1) {
//                 role = "Admin";
//             }
//             if (data["0"].role == 2) {
//                 role = "Registrar";
//             }
//             if (data["0"].role == 3) {
//                 role = "Encoder";
//             }

//             var tmp_body =
//                 `
//             <h4>Personal Information</h4>
//             <hr>
//             <table>
//               <tr>
//                 <th><p><b>Username : </b>` +
//                 data["0"].scholarshipname +
//                 `</p></th>
//               </tr>
//               <tr>
//                 <th><p><b>Name : </b>` +
//                 data["0"].fname +
//                 ` ` +
//                 data["0"].mname +
//                 ` ` +
//                 data["0"].lname +
//                 `</p></th>
//               </tr>
//               <tr>
//                 <th><p><b>Address : </b>` +
//                 data["0"].address +
//                 `</p></th>
//               </tr>
//               <tr>
//                 <th><p><b>Mobile Number : </b>` +
//                 data["0"].mobile_no +
//                 `</p></th>
//               </tr>
//               <tr>
//                 <th><p><b>Email : </b>` +
//                 data["0"].email +
//                 `</p></th>
//               </tr>
//               <tr>
//                 <th><p><b>Role : </b>` +
//                 role +
//                 `</p></th>
//               </tr>
//             </table>`;

//             $("#modal-form").empty();
//             $(".modal-title").empty();
//             $(".modal-title").append("View User");
//             $("#modal-form").append(tmp_body);
//             $("#scholarship_modal").modal("show");
//             $(".scholarshipmodalsave").addClass("d-none");
//         },
//     });
// });

// // ======================= EDIT ======================================================

// $(document).on("click", "#scholarship_edit", function () {
//   $("#modal-form").empty();


//   $(".scholarshipmodalsave").removeClass("disabled");


// });

// $(document).on("click", "#scholarship_edit", function () {
//     var id = $(this).data("scholarship_id");
//     $(".modal-dialog").addClass("modal-lg");
//     $(".scholarshipmodalsave").text("Save");
//     $(".scholarshipmodalsave").removeClass("d-none");

//     $.ajax({
//         url: base_url() + "public/ajax/scholarship-view",
//         data: {
//             id: id,
//         },
//         dataType: "json",
//         type: "post",
//         success: function (data) {


//           if (data["0"].role == 1) {var active = "selected"}
//           else if (data["0"].role == 2) {var active = "selected"}
//           else if (data["0"].role == 3) {var active = "selected"}

//             var tmp_body =
//                 `
//             <h4>Personal Information</h4>
//             <hr>
//             <div class="form-row">
//                 <div class="col">
//                   <input type="text" name="fname" value="` +
//                 data["0"].fname +
//                 `" class="form-control addvalidator " placeholder="First name*" required>
//                   <small id="required-fname" class="d-none" style="color:red">First name required</small>
//                 </div>
//                 <div class="col">
//                   <input type="text" name="lname" value="` +
//                 data["0"].lname +
//                 `" class="form-control addvalidator " placeholder="Last name*" required>
//                   <small id="required-lname" class="d-none" style="color:red">Last name required</small>
//                 </div>
//                 <div class="col">
//                   <input type="text" name="mname" value="` +
//                 data["0"].mname +
//                 `" class="form-control " placeholder="Middle name" required>
//                 </div>
//               </div>
//               <div class="form-row mt-2">
//                 <div class="col-8">
//                   <input type="text" name="address" value="` +
//                 data["0"].address +
//                 `" class="form-control addvalidator updatevalidator" placeholder="Address*" required>
//                   <small id="required-address" class="d-none" style="color:red">Address required</small>
//                   </div>
//                 <div class="col-4">
//                   <input type="number" name="contact" value="` +
//                 data["0"].mobile_no +
//                 `"  class="form-control addvalidator" placeholder="Contact Number*" required>
//                   <small id="required-contact" class="d-none row" style="color:red">contact required</small>
//                 </div>
//               </div>
//               <h4 class="mt-2">Account Information</h4>
//               <hr>
//               <div class="form-row mt-2">
//                 <div class="col">
//                   <input type="text" name="scholarshipname" value="` +
//                 data["0"].scholarshipname +
//                 `" class="form-control addvalidator scholarshipnamevalidatoredit" placeholder="Username*" required>
//                   <small id="required-scholarshipname" class="d-none" style="color:red">Username required</small>
//                   <small id="unique-scholarshipname" class="d-none" style="color:red">Username already exist</small>
//                 </div>
//                 <div class="col">
//                   <input type="email" name="email"  value="` +
//                 data["0"].email +
//                 `" class="form-control addvalidator" placeholder="Email address*" required>
//                   <small id="error-email" class="d-none row" style="color:red">email Invalid </small>
//                   <small id="required-email" class="d-none row" style="color:red">email required</small>
//                 </div>
//                 <div class="col">
//                   <select name="role" class="form-select addselectvalidator" required>
//                       <option value="1">Admin</option>
//                       <option value="2">Registrar</option>
//                       <option value="3">Encoder</option>
//                   </select>
//                   <small id="required-role" class="d-none" style="color:red">Role Required!</small>

//                 </div>
//               </div>`;
//             $("#modal-form").empty();
//             $(".modal-title").empty();
//             $(".modal-title").append("Edit User");
//             $("#modal-form").append(tmp_body);
//             $(".scholarshipmodalsave").addClass("scholarship_update");
//             $("#scholarship_modal").modal("show");
//             $(".scholarship_update").attr("id", id );
//               $('#unique-scholarshipname').attr('status','0')

//             if (data['0'].role == 1) {$("select[name=role]").val('1');}
//             if (data['0'].role == 2) {$("select[name=role]").val('2');}
//             if (data['0'].role == 3) {$("select[name=role]").val('3');}

//         },
//     });
// });


// $(document).on("click", ".scholarship_update", function () {
//   var data = {};
//     data["id"] = $(this).attr("id");
//   $.each($("form").serializeArray(), function (i, field) {
//       data[field.name] = field.value;
//   });

//   $.ajax({
//       url: base_url() + "public/ajax/scholarship-edit",
//       data: {
//           data: data,
//       },
//       dataType: "json",
//       type: "post",
//       beforeSend: function(){
//         Swal.fire({
//           title: 'Uploading...',
//           html: 'Please wait...',
//           allowEscapeKey: false,
//           allowOutsideClick: false,
//           didOpen: () => {
//             Swal.showLoading()
//           }
//         });
//        },success: function (data) {
//         $("#scholarship_modal").modal("hide");
//         if (data == "success") {
//           setTimeout(function() { 
//             reload_scholarships(); 
//             Swal.fire(
//               'User Update!',
//               'Updated Successfully!',
//               'success'
//             )
//           }, 1000);
//         }else{
//           setTimeout(function() { 
//             reload_scholarships(); 
//             Swal.fire(
//               'User Update!',
//               'Updated Failed Successfully!',
//               'warning'
//             )
//           }, 1000);
//         }
//       },
//   });
// });



// // ========================= DELETE ======================================================

// $(document).on("click", "#scholarship_delete", function () {
//     var name = $(this).data("name");
//     $(".scholarshipmodalsave").removeClass("d-none");

//     $(".modal-dialog").removeClass("modal-lg");

//     var tmp_body =
//         `
//           <h4>Are you sure you want to delete <br><b>` +
//         name +
//         `</b> ?</h4>
//           <hr>
//        `;

//     $("#modal-form").empty();
//     $(".modal-title").empty();
//     $(".modal-title").append("Delete User");
//     $("#modal-form").append(tmp_body);
//     $("#scholarship_modal").modal("show");
//     $(".scholarshipmodalsave").addClass("scholarship-delete");
//     $(".scholarshipmodalsave").addClass("btn-warning");
//     $(".scholarshipmodalsave").removeClass("btn-success");
//     $(".scholarshipmodalsave").text("Delete");
//     $(".scholarship-delete").attr("id", $(this).data("scholarship_id"));
// });

// $(document).on("click", ".scholarship-delete", function () {
//     var id = $(this).attr("id");
//     $.ajax({
//         url: base_url() + "public/ajax/scholarship-delete",
//         data: {
//             id: id,
//             status: 0,
//         },
//         dataType: "json",
//         type: "post",
//         beforeSend: function(){
//           Swal.fire({
//             title: 'Uploading...',
//             html: 'Please wait...',
//             allowEscapeKey: false,
//             allowOutsideClick: false,
//             didOpen: () => {
//               Swal.showLoading()
//             }
//           });
//          },success: function (data) {
//           $("#scholarship_modal").modal("hide");
//           setTimeout(function() { 
//             reload_scholarships(); 
//             Swal.fire(
//               'User Delete!',
//               'Deleted Successfully!',
//               'success'
//             )
//           }, 1000);
//         },
//     });
// });

// // ========================= RECOVER ======================================================

// $(document).on("click", "#scholarship_recover", function () {
//     var name = $(this).data("name");
//     $(".scholarshipmodalsave").removeClass("d-none");
//     $(".modal-dialog").removeClass("modal-lg");

//     var tmp_body =
//         `
//           <h4>Are you sure you want to recover <br><b>` +
//         name +
//         `</b> ?</h4>
//           <hr>
//        `;

//     $("#modal-form").empty();
//     $(".modal-title").empty();
//     $(".modal-title").append("Recover User");
//     $("#modal-form").append(tmp_body);
//     $("#scholarship_modal").modal("show");
//     $(".scholarshipmodalsave").addClass("scholarship-recover");
//     $(".scholarshipmodalsave").removeClass("btn-success");
//     $(".scholarshipmodalsave").addClass("btn-warning");
//     $(".scholarshipmodalsave").text("Recover");
//     $(".scholarship-recover").attr("id", $(this).data("scholarship_id"));
// });

// $(document).on("click", ".scholarship-recover", function () {
//     var id = $(this).attr("id");
//     $.ajax({
//         url: base_url() + "public/ajax/scholarship-delete",
//         data: {
//             id: id,
//             status: 1,
//         },
//         dataType: "json",
//         type: "post",
//         beforeSend: function(){
//           Swal.fire({
//             title: 'Uploading...',
//             html: 'Please wait...',
//             allowEscapeKey: false,
//             allowOutsideClick: false,
//             didOpen: () => {
//               Swal.showLoading()
//             }
//           });
//          },
//         success: function (data) {
//           $("#scholarship_modal").modal("hide");
//           setTimeout(function() { 
//             reload_scholarships(); 
//             Swal.fire(
//               'User Recover!',
//               'Recover Successfully!',
//               'success'
//             )
//           }, 1000);
//         },
//     });
// });
