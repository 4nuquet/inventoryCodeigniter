var baseURL = "http://10.0.0.42/inventory/";

$(document).ready(function(){

    showItems("");

/**------------------------------- Event Create Item -------------------------------*/
    $('#form-item').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res)
            {
                $("#modal-item").modal('hide');
                $("#form-item")[0].reset();
                showItems("");
            }
        });
    });
/**------------------------------- End Event Create Item -------------------------------*/

    
/**------------------------------- Event Load Edit Item -------------------------------*/
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
/**------------------------------- End Event Load Edit Item -------------------------------*/


/**------------------------------- Event Remove Item -------------------------------*/
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
    });  
    /**------------------------------- End Event Remove Item -------------------------------*/

    /**------------------------------- Event Edit Item -------------------------------*/
    $('#form-itemEdit').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: $(this).serialize(),
            success: function(res)
            {   
                res = $.parseJSON(res);

                showNotification(res.color, res.msg);

                $("#modal-itemEdit").modal('hide');
                $("#form-itemEdit")[0].reset();
                showItems("");
            }
        });
    });
    /**------------------------------- End Event Edit Item -------------------------------*/
});
/**############    END DOCUMENT.READEY    ############*/


/**------------------------------- Preview Image------------------------------- */

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prevPic')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    $('#prevPic').removeClass().addClass('card-icon');
}
/**------------------------------- End Preview Image------------------------------- */


/**------------------------------- Notifications -------------------------------*/
 function showNotification(color, message) {
    type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

    pos = Number(color);
    console.log("function "+pos+" "+message);
    $.notify(
        {
            icon: "add_alert",
            message: message
        }, 
        {
            type: type[pos],
            timer: 2000,
            placement: {
                        from: 'top',
                        align:'center'
                        }
    });  
}
/**------------------------------- End Notifications -------------------------------*/

/**------------------------------- Remove Items -------------------------------*/

function itemRemove(id){
    $.ajax({
        url: baseURL+"Home/remove",
        method: "post",
        data: {id:id},
        dataType: "json",
        success: function(res){
            if(!res){
                showNotification(res[0], res[1]);
            }else{
                showNotification(res[0], res[1]);
            }
            showItems("");
            $("#modal-itemRemove").modal('hide');
        }
    });
}
/**------------------------------- End Remove Items -------------------------------*/

/**------------------------------- Show Items -------------------------------*/
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
                <div class="col-lg-3 col-md-3">
                    <div class="card card-stats b-primary card-item">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="uploads/images/${item.pic_url}" class="img-fluid"/>
                            </div>
                            <div class="col-md-6">
                                <div class="container text-right">
                                    <p class="card-category">${item.cat_name}</p>
                                    <h3 class="card-title">${item.item_name}</h3>
                                    <h3 class="card-title">$ ${item.item_pSell}</h3>
                                </div>   
                            </div>
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
/**------------------------------- End Show Items -------------------------------*/