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
                alert(res);
            }
        });
    });

    showItems("");


});

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
                            <a href="${item.item_id}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div></a>
                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                    </div></div>`;
            });
            $("#item-list").append(html)
        }
    });

    

}