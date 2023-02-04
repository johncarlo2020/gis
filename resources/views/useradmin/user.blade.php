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


@section('scripts')
@parent
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

        function reload_users(){
        $('#table_id').DataTable().clear().destroy();

        $(".usermodalsave").removeClass("user-recover");
        $(".usermodalsave").removeClass("btn-delete");
        $(".usermodalsave").removeClass("btn-warning");
        $(".usermodalsave").addClass("btn-success");
        $(".usermodalsave").text("Save");
        $(".usermodalsave").removeClass("disabled");


        $('#table_id').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: base_url() + "public/ajax/user-reload",
                type: 'POST',
            },
        });
        }



        $(document).on("click", "#user_add", function () {
            $(".modal-dialog").addClass("modal-lg");
            var tmp_body = `
                <h4 class="mb-2">Personal Information</h4>
                <div class="form-row">
                    <div class="col">
                    <label for="fname" class="form-label">First name*</label>
                    <input type="text" name="fname" class="form-control addvalidator" placeholder="First name*" required>
                    <small id="required-fname" class="d-none" style="color:red">First name required</small>
                    </div>
                    <div class="col">
                    <label for="lname" class="form-label">Last name*</label>
                    <input type="text" name="lname" class="form-control addvalidator" placeholder="Last name*" required>
                    <small id="required-lname" class="d-none" style="color:red">Last name required</small>
                    </div>
                    <div class="col">
                    <label for="mname" class="form-label">Middle name</label>
                    <input type="text" name="mname" class="form-control " placeholder="Middle name" required>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-8">
                    <label for="address" class="form-label">Address*</label>
                    <input type="text" name="address" class="form-control addvalidator" placeholder="Address*" required>
                    <small id="required-address" class="d-none" style="color:red">Address required</small>
                    </div>
                    <div class="col-4">
                    <label for="contact" class="form-label">Contact Number*</label>
                    <input type="number" name="contact" class="form-control addvalidator" placeholder="Contact Number*" required>
                    <small id="required-contact" class="d-none" style="color:red">contact required</small>
                    </div>
                </div>
                <h4 class="mt-3">Account Information</h4>
                <div class="form-row mt-2">
                    <div class="col">
                    <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control addvalidator usernamevalidator" placeholder="Username*" required>
                        <small id="required-username" class="d-none" style="color:red">Username required</small>
                        <small id="min-username" class="d-none" style="color:red">Minimum 8 Character</small>
                        <small id="unique-username" class="d-none" style="color:red" status="0">Username already exist</small>
                        </div>
                    <div class="col">
                    <label for="email" class="form-label">Email address*</label>
                    <input type="email" name="email" class="form-control addvalidator" placeholder="Email address*" required>
                    <small id="error-email" class="d-none" style="color:red">email Invalid </small>
                    <small id="required-email" class="d-none " style="color:red">email required</small>
                    </div>
                    <div class="col">
                    <label for="role" class="form-label">Role*</label>
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

        $(document).on("keyup", ".usernamevalidator", function () {
        $.ajax({
            url: base_url() + "public/ajax/user-validate_username",
            data: {
                data: $(this).val(),
            },
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data > 0) {
                    $('#unique-username').removeClass('d-none')
                    $(".usermodalsave").addClass("disabled");
                    $('#unique-username').attr('status','1')
                }else{
                    $('#unique-username').addClass('d-none')
                    $('#unique-username').attr('status','0')
                }
            },
        });
        });

        $(document).on("keyup", ".usernamevalidatoredit", function () {
        $.ajax({
            url: base_url() + "public/ajax/user-validate_username_edit",
            data: {
                data: $(this).val(),
            },
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data > 0) {
                    $('#unique-username').removeClass('d-none')
                    $(".usermodalsave").addClass("disabled");
                    $('#unique-username').attr('status','1')
                }else{
                    $('#unique-username').addClass('d-none')
                    $('#unique-username').attr('status','0')
                }
            },
        });
        });




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

            if ($("input[name=username]").val().length > 0) {
            $("#required-username").addClass("d-none");
        } else {
            $("#required-username").removeClass("d-none");
        }

            if ($("input[name=username]").val().length > 7) {
            $("#min-username").addClass("d-none");
        } else {
            $("#min-username").removeClass("d-none");
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

            if (re.test($("input[name=email]").val()) === true) {
            if ($('#unique-username').attr('status') == 0) {
                $.each($(".addvalidator"), function () {
                if ($(".addselectvalidator").val() != null) {
                        if ($(this).val() == "") {
                $(".usermodalsave").addClass("disabled");
                            return false;
                        } else {
                            if ($("input[name=username]").val().length > 7) {
                            console.log('cge')
                                $(".usermodalsave").removeClass("disabled");
                            }else{
                            $(".usermodalsave").addClass("disabled");

                            }
                        }
                    } else {
                        $(".usermodalsave").addClass("disabled");
                    }
                });
            }
            } else {
            $(".usermodalsave").addClass("disabled");

        }
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
                $("#user_modal").modal("hide");
                setTimeout(function() {
                reload_users();
                Swal.fire(
                    'User Create!',
                    'Created Successfully!',
                    'success'
                )
                }, 1000);
            },
        });
        });

        // ==========================================================================

        $(document).on("click", "#user_view", function () {
            var id = $(this).data("user_id");
            $(".modal-dialog").addClass("modal-lg");
            $(".usermodalsave").removeClass("d-none");

            $.ajax({
                url: base_url() + "public/ajax/user-view",
                data: {
                    id: id,
                },
                dataType: "json",
                type: "post",
                success: function (data) {

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
        $("#modal-form").empty();


        $(".usermodalsave").removeClass("disabled");


        });

        $(document).on("click", "#user_edit", function () {
            var id = $(this).data("user_id");
            $(".modal-dialog").addClass("modal-lg");
            $(".usermodalsave").text("Save");
            $(".usermodalsave").removeClass("d-none");

            $.ajax({
                url: base_url() + "public/ajax/user-view",
                data: {
                    id: id,
                },
                dataType: "json",
                type: "post",
                success: function (data) {


                if (data["0"].role == 1) {var active = "selected"}
                else if (data["0"].role == 2) {var active = "selected"}
                else if (data["0"].role == 3) {var active = "selected"}

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
                        `" class="form-control addvalidator usernamevalidatoredit" placeholder="Username*" required>
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
                    $("#user_modal").modal("show");
                    $(".user_update").attr("id", id );
                    $('#unique-username').attr('status','0')

                    if (data['0'].role == 1) {$("select[name=role]").val('1');}
                    if (data['0'].role == 2) {$("select[name=role]").val('2');}
                    if (data['0'].role == 3) {$("select[name=role]").val('3');}

                },
            });
        });


        $(document).on("click", ".user_update", function () {
        var data = {};
            data["id"] = $(this).attr("id");
        $.each($("form").serializeArray(), function (i, field) {
            data[field.name] = field.value;
        });

        $.ajax({
            url: base_url() + "public/ajax/user-edit",
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
                $("#user_modal").modal("hide");
                if (data == "success") {
                setTimeout(function() {
                    reload_users();
                    Swal.fire(
                    'User Update!',
                    'Updated Successfully!',
                    'success'
                    )
                }, 1000);
                }else{
                setTimeout(function() {
                    reload_users();
                    Swal.fire(
                    'User Update!',
                    'Updated Failed Successfully!',
                    'warning'
                    )
                }, 1000);
                }
            },
        });
        });



        // ========================= DELETE ======================================================

        $(document).on("click", "#user_delete", function () {
            var name = $(this).data("name");
            $(".usermodalsave").removeClass("d-none");

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
            var id = $(this).attr("id");
            $.ajax({
                url: base_url() + "public/ajax/user-delete",
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
                $("#user_modal").modal("hide");
                setTimeout(function() {
                    reload_users();
                    Swal.fire(
                    'User Delete!',
                    'Deleted Successfully!',
                    'success'
                    )
                }, 1000);
                },
            });
        });

        // ========================= RECOVER ======================================================

        $(document).on("click", "#user_recover", function () {
            var name = $(this).data("name");
            $(".usermodalsave").removeClass("d-none");
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
            $(".usermodalsave").addClass("btn-warning");
            $(".usermodalsave").text("Recover");
            $(".user-recover").attr("id", $(this).data("user_id"));
        });

        $(document).on("click", ".user-recover", function () {
            var id = $(this).attr("id");
            $.ajax({
                url: base_url() + "public/ajax/user-delete",
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
                $("#user_modal").modal("hide");
                setTimeout(function() {
                    reload_users();
                    Swal.fire(
                    'User Recover!',
                    'Recover Successfully!',
                    'success'
                    )
                }, 1000);
                },
            });
        });

    </script>
@endsection
