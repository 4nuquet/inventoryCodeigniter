var baseURL = "http://localhost/inventory/";

$(document).ready(function(){

    $('#form-item').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
			method: "post",
			data: $(this).serialize(),
            success: function(res)
            {
                $("#modal-item").modal('hide');
                $("#form-item")[0].reset();
                showItems("");
            }
        });
    });

    showItems("");

    $('body').on('click', '#item-list a.edit ',function(e){
    
         id = $(this).attr("href");
        
        $.ajax({
            url: baseURL+"Home/find",
            method: "post",
            data: {id:id},
            dataType: "json",
            success: function(res){

                $.each(res, function(val, item){
                    $("#modal-itemEdit input[name=name]").parent().addClass("is-focused is-filled");
                    $("#modal-itemEdit input[name=stock]").parent().addClass("is-focused is-filled");
                    $("#modal-itemEdit input[name=pBuy").parent().addClass("is-focused is-filled");
                    $("#modal-itemEdit input[name=pSell]").parent().addClass("is-focused is-filled");
                    $("#modal-itemEdit input[name=category]").parent().addClass("is-focused is-filled");

                    $("#modal-itemEdit input[name=id]").val(item.item_id);
                    $("#modal-itemEdit input[name=name]").val(item.item_name);
                    $("#modal-itemEdit input[name=stock]").val(item.item_stock);
                    $("#modal-itemEdit input[name=pBuy]").val(item.item_pBuy);
                    $("#modal-itemEdit input[name=pSell]").val(item.item_pSell);
                    $("#modal-itemEdit input[name=category]").val(item.item_category);
                });
            }
        });
        e.preventDefault();
    });

    $('body').on('click', '#item-list a.remove', function(e){
       
        id = $(this).attr("href");

        $.ajax({
            url: baseURL+"Home/find",
            method: "post",
            data: {id:id},
            dataType: "json",
            success: function(res){
                console.log(res);
                $.each(res, function(val, item){
                    $("#modal-itemRemove #nameRemove").text("Articulo: "+item.item_name);
                    $("#modal-itemRemove input[name=id]").val(item.item_id);
                });
            }
        });
        e.preventDefault();
    });

    $('#form-itemRemove').submit(function(e) {
        e.preventDefault();
        id = $('#form-itemRemove input[name=id]').val();
        itemRemove(id);
        //alert(id);
        showItems("");

        $("#modal-itemRemove").modal('hide');
    });    

    $('#form-itemEdit').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: "post",
            data: $(this).serialize(),
            success: function(res)
            {
                $("#modal-itemEdit").modal('hide');
                $("#form-itemEdit")[0].reset();
                showItems("");
            }
        });
    });

    /**Events sidebar */
    

});

 function showNotification(from, aling, color, message) {
    type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

    //colo = Math.floor((Math.random() * 6) + 1);
    
    let colo;
    colo=Number(color);
    console.log(": " + typeof(colo));
    $.notify(
        {
            icon: "add_alert",
            message: message
        }, 
        {
            type: type[colo],
            timer: 3000,
            placement: {
                        from: from,
                        align: aling
                        }
     
    });
}

function itemRemove(id){
    $.ajax({
        url: baseURL+"Home/remove",
        method: "post",
        data: {id:id},
        dataType: "json",
        success: function(res){
            if(!res){
                showNotification('top','center',3,"Error al eliminar");
            }else{
                showNotification('top','center',2,"Eliminado con exito");
            }
        }
    });
}
function showItems(key){

    $.ajax({
        url: baseURL+"Home/show",
        method: "post",
        data:{word:key},
        dataType: "json",
        success: function(res){
                html = '';
            $.each(res, function(val, item){
                html += `
                <div class="col-md-3">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">${item.item_category}</p>
                            <h3 class="card-title">${item.item_name}<br>
                            <small>$ ${item.item_pSell}</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="#pablo">${item.item_stock}</a>
                            </div>
                            <a href="${item.item_id}" rel="tooltip" class="edit btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#modal-itemEdit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div></a>
                            <a href="${item.item_id}" rel="tooltip" class="remove btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#modal-itemRemove">
                                <i class="material-icons">close</i>
                            </a>
                        </div>
                    </div></div>`;
            });
            $("#item-list").html(html)
        }
    });
}