var baseURL = "http://localhost/inventory/";

$(document).ready(function(){


    showUsers();

    $('#form-user').submit(function(e){
        e.preventDefault();    
          $.ajax({
            url: $(this).attr("action"),
			method: "post",
			data: $(this).serialize(),
            success: function(res)
            {
                $("#modal-user").modal('hide');
                $("#form-user")[0].reset();
               showUsers();
            }
        });
    });


    $('body').on('click', '.user-list a.remove', function(e){
       
        id = $(this).attr("href");

        $.ajax({
            url: baseURL+"User/find",
            method: "post",
            data: {id:id},
            dataType: "json",
            success: function(res){
                console.log(res);

                $.each(res, function(val, item){
                    $("#modal-userRemove #nameRemove").text("Usuario: "+item.user_name);
                    $("#form-userRemove input[name=id]").text(item.user_id);
                    
                });

                
                $("#modal-userRemove").modal();
            }
        });

        e.preventDefault();
    });

    $('body').on('click', '.user-list a.edit', function(e){
       
        id = $(this).attr("href");

        
        $.ajax({
            url: baseURL+"User/find",
            method: "post",
            data: {id:id},
            dataType: "json",
            success: function(res){
                //console.log(res);
                res=res[0];
                nombre=res.user_name;
                identificacion=res.user_nid;
                rol=res.user_rol;
                idUser=res.user_id;
                //console.log(res.user_name);

                $('input[name="nameuser"]').val(nombre);
                $('input[name="nameuser"]').parent().addClass('is-focused');
                
                $('input[name="identificacionuser"]').val(identificacion);
                $('input[name="identificacionuser"]').parent().addClass('is-focused');

                $('input[name="roluser"]').val(rol);
                $('input[name="roluser"]').parent().addClass('is-focused');

                //alert(idUser);
                $('input[name="id-user-edit"]').text(idUser);
                $('#id-user-edit').val(idUser);
                
                $("#modal-userEdit").modal();
            }
        });
    });

    $('#form-useredit').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: "post",
            data: $(this).serialize(),
            success: function(res)
            {
                $("#modal-userEdit").modal('hide');
                $("#form-useredit")[0].reset();
                showUsers("");
            }
        });
    });

    $('#modal-userRemove').submit(function(e) {
        e.preventDefault();
        id = $('#form-userRemove input[name=id]').text();
        userRemove(id);
        showUsers("");
        $("#modal-userRemove").modal('hide');
    });    


    function userRemove(id){
        $.ajax({
            url: baseURL+"User/remove",
            method: "post",
            data: {id:id},
            dataType: "json",
            success: function(res){
                if(!res){
                    showNotification('top','center',3,"Error al eliminar");
                }else{
                    showNotification('top','center',2,"Eliminado con exito");
                }

                showUsers("");
            }
        });
    }

    

});

function showUsers(){
    $.ajax({
        url: baseURL+'User/show',
        method: "post",
        data: $(this).serialize(),
        success: function(res)
        {

            res=JSON.parse(res);
            //console.log(res);
            html='';

            $.each(res,function(val,item){
                

                if(item.user_state==1){
                   state='Activo';
                }else{
                    state='Inactivo';
                }
                html += `<tr class="user-list">  
                
                    <td>${item.user_name}</td> 
                    <td>${item.user_nid}</td> 
                    <td>${item.user_rol}</td> 
                    <td>${state}</td> 
                    <td>
                    <a  href="${item.user_id}" rel="tooltip" class="edit btn btn-primary btn-link btn-sm" data-toggle="modal" >
                          <i class="material-icons">edit</i>
                    <div class="ripple-container"></div></a>

                    <a  href="${item.user_id}" rel="tooltip" class="remove btn btn-danger btn-link btn-sm" data-toggle="modal" >
                          <i class="material-icons">close</i>
                      </a>
                    
                    </td> 
                
                
                </tr>`;

            });

            $('#showUsers').html(html);

            
        }
    });
}