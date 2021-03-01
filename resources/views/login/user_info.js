$(document).ready(function(){

    var table = $('.data-table').DataTable();

    //Start Edit Record
    table.on('click', '#edit_user', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        var user_role = $('#user_role_'+data[0]).val();
        
        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#user_role').val(user_role);
        $('#editForm_id').attr('action', 'update_user/'+data[0]);
        $('#editUserModal').modal('show');
    });
    //End Edit Record
    

    
    //Start Delete Record
    table.on('click', '#delete_btn', function(){


        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#id').val(data[0]);

        $('#deleteForm_id').attr('action', 'deleteuser/'+data[0]);
        $('#deleteUser_info').modal('show');
    });
    //End Delete Record
});