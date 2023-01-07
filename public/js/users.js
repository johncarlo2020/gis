

     $(document).ready(function() {
        $('#table_id').DataTable();
    });

    $(document).on("click" , '#user_view' , function () {
        $('#user_modal').modal('show');
    });
    function base_url() {
        var pathparts = location.pathname.split('/');
        if (location.host == 'localhost') {
            var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
        }else{
            var url = location.origin; // http://stackoverflow.com
        }
        return url;
    }


    $(document).on("click" , '.usermodalsave' , function () {

        var url = base_url();
        var ajaxurl = url + "public/ajax/save"
        var csrf = document.querySelector('meta[name="csrf-token"]').content;

    
        $.ajax({
            url: ajaxurl,
            data: {
                "_token": csrf
            },
            dataType: "json",
            type: "post",
            success: function(data) {

            }
           });
        
        });


















    $(document).on("click" , '#user_edit' , function () {
        
    });
        
    $(document).on("click" , '#user_delete' , function () {
        
    });


    