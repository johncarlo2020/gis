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
        var url = location.origin;
    }
    return url;
}
// ==============================================================================
$(document).ready(function () {
    $("#table_id").DataTable();
});

$(document).on("click", "#user_add", function () {
    $(".modal-dialog").addClass("modal-lg");
    var tmp_body = `
        <h4>Personal Information</h4>
        <hr>
        <div class="form-row">
            <div class="col">
              <input type="text" name="fname" class="form-control addvalidator" placeholder="First name*" required>
              <small id="required-fname" class="d-none" style="color:red">First name required</small>
              </div>
            <div class="col">
              <input type="text" name="lname" class="form-control addvalidator" placeholder="Last name*" required>
              <small id="required-lname" class="d-none" style="color:red">Last name required</small>
              </div>
            <div class="col">
              <input type="text" name="mname" class="form-control " placeholder="Middle name" required>
              </div>
          </div>
          <div class="form-row mt-2">
            <div class="col-8">
              <input type="text" name="address" class="form-control addvalidator" placeholder="Address*" required>
              <small id="required-address" class="d-none" style="color:red">Address required</small>
              </div>
            <div class="col-4">
              <input type="number" name="contact" class="form-control addvalidator" placeholder="Contact Number*" required>
              <small id="required-contact" class="d-none row" style="color:red">contact required</small>
            </div>
          </div>
          <h4 class="mt-2">Account Information</h4>
          <hr>
          <div class="form-row mt-2">
            <div class="col">
                  <input type="text" name="username" class="form-control addvalidator " placeholder="Username*" required>
                  <small id="required-username" class="d-none" style="color:red">Username required</small>
                  <small id="unique-username" class="d-none" style="color:red">Username already exist</small>
                </div>
            <div class="col">
              <input type="email" name="email" class="form-control addvalidator" placeholder="Email address*" required>
              <small id="error-email" class="d-none row" style="color:red">email Invalid </small>
              <small id="required-email" class="d-none row" style="color:red">email required</small>
            </div>
            <div class="col">
              <select name="role" class="form-select addselectvalidator" required>
                  <option value="null" selected disabled>Open this select menu</option>
                  <option value="1">Admin</option>
                  <option value="2">Registrar</option>
                  <option value="3">Encoder</option>
              </select>
              <small id="required-role" class="d-none" style="color:red">Role Required!</small>

            </div>
          </div>`;
    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Add User");
    $("#modal-form").append(tmp_body);
    $(".usermodalsave").addClass("user_insert");
    $(".usermodalsave").addClass("disabled");
    $("#user_modal").modal("show");
});

// add user validation
$(document).on("keyup", ".addvalidator", function () {
    validator();
});
$(document).on("change", ".addselectvalidator", function () {
    validator();
});

$(document).on("keyup", ".addvalidator", function () {
    validator();
});

function validator() {
    var re = /\S+@\S+\.\S+/;

    // email validation
    if (re.test($("input[name=email]").val()) === false) {
        $("#error-email").removeClass("d-none");
    } else {
        $("#error-email").addClass("d-none");
    }

    if ($("input[name=email]").val().length > 0) {
        $("#required-email").addClass("d-none");
    } else {
        $("#required-email").removeClass("d-none");
    }

    if ($("input[name=contact]").val().length > 0) {
        $("#required-contact").addClass("d-none");
    } else {
        $("#required-contact").removeClass("d-none");
    }

    if ($("input[name=fname]").val().length > 0) {
        $("#required-fname").addClass("d-none");
    } else {
        $("#required-fname").removeClass("d-none");
    }

    if ($("input[name=lname]").val().length > 0) {
        $("#required-lname").addClass("d-none");
    } else {
        $("#required-lname").removeClass("d-none");
    }

    if ($("input[name=address]").val().length > 0) {
        $("#required-address").addClass("d-none");
    } else {
        $("#required-address").removeClass("d-none");
    }

    if ($(".addselectvalidator").val() != null) {
        $("#required-role").addClass("d-none");
    } else {
        $("#required-role").removeClass("d-none");
    }

    $.each($(".addvalidator"), function () {
        if ($(".addselectvalidator").val() != null) {
            if ($(this).val() == "") {
                $(".usermodalsave").addClass("disabled");
                return false;
            } else {
                console.log("else " + $(".addselectvalidator").val());
                $(".usermodalsave").removeClass("disabled");
            }
        } else {
            $(".usermodalsave").addClass("disabled");
        }
    });
}

$(document).on("click", ".user_insert", function () {
    var data = {};
    $.each($("form").serializeArray(), function (i, field) {
        data[field.name] = field.value;
    });

    $.ajax({
        url: base_url() + "public/ajax/user-create",
        data: {
            data: data,
        },
        dataType: "json",
        type: "post",
        success: function (data) {
            console.log(data);
        },
    });
});

// ==========================================================================

$(document).on("click", "#user_view", function () {
    var id = $(this).data("user_id");
    $(".modal-dialog").addClass("modal-lg");

    $.ajax({
        url: base_url() + "public/ajax/user-view",
        data: {
            id: id,
        },
        dataType: "json",
        type: "post",
        success: function (data) {
            console.log(data);

            var role = "";
            if (data["0"].role == 1) {
                role = "Admin";
            }
            if (data["0"].role == 2) {
                role = "Registrar";
            }
            if (data["0"].role == 3) {
                role = "Encoder";
            }

            var tmp_body =
                `
            <h4>Personal Information</h4>
            <hr>
            <table>
              <tr>
                <th><p><b>Username : </b>` +
                data["0"].username +
                `</p></th>
              </tr>
              <tr>
                <th><p><b>Name : </b>` +
                data["0"].fname +
                ` ` +
                data["0"].mname +
                ` ` +
                data["0"].lname +
                `</p></th>
              </tr>
              <tr>
                <th><p><b>Address : </b>` +
                data["0"].address +
                `</p></th>
              </tr>
              <tr>
                <th><p><b>Mobile Number : </b>` +
                data["0"].mobile_no +
                `</p></th>
              </tr>
              <tr>
                <th><p><b>Email : </b>` +
                data["0"].email +
                `</p></th>
              </tr>
              <tr>
                <th><p><b>Role : </b>` +
                role +
                `</p></th>
              </tr>
            </table>`;

            $("#modal-form").empty();
            $(".modal-title").empty();
            $(".modal-title").append("View User");
            $("#modal-form").append(tmp_body);
            $("#user_modal").modal("show");
            $(".usermodalsave").addClass("d-none");
        },
    });
});

// ======================= EDIT ======================================================
$(document).on("click", "#user_edit", function () {
    var id = $(this).data("user_id");
    $(".modal-dialog").addClass("modal-lg");

    $.ajax({
        url: base_url() + "public/ajax/user-view",
        data: {
            id: id,
        },
        dataType: "json",
        type: "post",
        success: function (data) {
            var tmp_body =
                `
            <h4>Personal Information</h4>
            <hr>
            <div class="form-row">
                <div class="col">
                  <input type="text" name="fname" value="` +
                data["0"].fname +
                `" class="form-control addvalidator " placeholder="First name*" required>
                  <small id="required-fname" class="d-none" style="color:red">First name required</small>
                </div>
                <div class="col">
                  <input type="text" name="lname" value="` +
                data["0"].lname +
                `" class="form-control addvalidator " placeholder="Last name*" required>
                  <small id="required-lname" class="d-none" style="color:red">Last name required</small>
                </div>
                <div class="col">
                  <input type="text" name="mname" value="` +
                data["0"].mname +
                `" class="form-control " placeholder="Middle name" required>
                </div>
              </div>
              <div class="form-row mt-2">
                <div class="col-8">
                  <input type="text" name="address" value="` +
                data["0"].address +
                `" class="form-control addvalidator updatevalidator" placeholder="Address*" required>
                  <small id="required-address" class="d-none" style="color:red">Address required</small>
                  </div>
                <div class="col-4">
                  <input type="number" name="contact" value="` +
                data["0"].mobile_no +
                `"  class="form-control addvalidator" placeholder="Contact Number*" required>
                  <small id="required-contact" class="d-none row" style="color:red">contact required</small>
                </div>
              </div>
              <h4 class="mt-2">Account Information</h4>
              <hr>
              <div class="form-row mt-2">
                <div class="col">
                  <input type="text" name="username" value="` +
                data["0"].username +
                `" class="form-control addvalidator " placeholder="Username*" required>
                  <small id="required-username" class="d-none" style="color:red">Username required</small>
                  <small id="unique-username" class="d-none" style="color:red">Username already exist</small>
                </div>
                <div class="col">
                  <input type="email" name="email"  value="` +
                data["0"].email +
                `" class="form-control addvalidator" placeholder="Email address*" required>
                  <small id="error-email" class="d-none row" style="color:red">email Invalid </small>
                  <small id="required-email" class="d-none row" style="color:red">email required</small>
                </div>
                <div class="col">
                  <select name="role" class="form-select addselectvalidator" required>
                      <option value="null" selected disabled>Open this select menu</option>
                      <option value="1">Admin</option>
                      <option value="2">Registrar</option>
                      <option value="3">Encoder</option>
                  </select>
                  <small id="required-role" class="d-none" style="color:red">Role Required!</small>

                </div>
              </div>`;
            $("#modal-form").empty();
            $(".modal-title").empty();
            $(".modal-title").append("Edit User");
            $("#modal-form").append(tmp_body);
            $(".usermodalsave").addClass("user_update");
            $(".usermodalsave").addClass("disabled");
            $("#user_modal").modal("show");
        },
    });
});

// ========================= DELETE ======================================================

$(document).on("click", "#user_delete", function () {
    var name = $(this).data("name");

    $(".modal-dialog").removeClass("modal-lg");

    var tmp_body =
        `
          <h4>Are you sure you want to delete <br><b>` +
        name +
        `</b> ?</h4>
          <hr>
       `;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Delete User");
    $("#modal-form").append(tmp_body);
    $("#user_modal").modal("show");
    $(".usermodalsave").addClass("user-delete");
    $(".usermodalsave").addClass("btn-warning");
    $(".usermodalsave").removeClass("btn-success");
    $(".usermodalsave").text("Delete");
    $(".user-delete").attr("id", $(this).data("user_id"));
});

$(document).on("click", ".user-delete", function () {
    console.log("delete");
    var id = $(this).attr("id");
    $.ajax({
        url: base_url() + "public/ajax/user-delete",
        data: {
            id: id,
            status: 0,
        },
        dataType: "json",
        type: "post",
        success: function (data) {},
    });
});

// ========================= RECOVER ======================================================

$(document).on("click", "#user_recover", function () {
    var name = $(this).data("name");

    $(".modal-dialog").removeClass("modal-lg");

    var tmp_body =
        `
          <h4>Are you sure you want to recover <br><b>` +
        name +
        `</b> ?</h4>
          <hr>
       `;

    $("#modal-form").empty();
    $(".modal-title").empty();
    $(".modal-title").append("Recover User");
    $("#modal-form").append(tmp_body);
    $("#user_modal").modal("show");
    $(".usermodalsave").addClass("user-recover");
    $(".usermodalsave").removeClass("btn-success");
    $(".usermodalsave").text("Recover");
    $(".user-delete").attr("id", $(this).data("user_id"));
});

$(document).on("click", ".user-recover", function () {
    var id = $(this).attr("id");
    console.log(id);
    $.ajax({
        url: base_url() + "public/ajax/user-delete",
        data: {
            id: id,
            status: 1,
        },
        dataType: "json",
        type: "post",
        success: function (data) {
            console.log(data);
        },
    });
});
