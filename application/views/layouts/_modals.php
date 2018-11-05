

<div id="modal-item" class="modal" tabindex="-1" role="dialog">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <div class="card">
        <div class="card-header card-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
            </button>
            <h4 class="card-title">Registrar Producto</h4>
            <!--<p class="card-category">Complete your profile</p>-->
        </div>
        <div class="card-body">
            <form id="form-item" method="post" action="<?=base_url();?>Home/create">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Cod Barras</label>
                    <input type="text" class="form-control" name="cod">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="name">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Cantidad</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Precio Compra</label>
                    <input type="text" class="form-control" name="pBuy">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Precio Venta</label>
                    <input type="text" class="form-control" name="pSell">
                </div>
                </div>
            </div>
            <div class="row">
                <!--
                    <div class="col-md-12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <input type="file" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Categoria</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-itemEdit" class="modal" tabindex="-1" role="dialog">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <div class="card">
        <div class="card-header card-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
            </button>
            <h4 class="card-title">Editar Producto</h4>
            <!--<p class="card-category">Complete your profile</p>-->
        </div>
        <div class="card-body">
            <form id="form-itemEdit" method="post" action="<?=base_url();?>Home/edit">
            <input type="text" name="id" class="d-none">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Cod Barras</label>
                    <input type="text" class="form-control" name="cod">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="name">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Cantidad</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Precio Compra</label>
                    <input type="text" class="form-control" name="pBuy">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Precio Venta</label>
                    <input type="text" class="form-control" name="pSell">
                </div>
                </div>
            </div>
            <div class="row">
                <!--
                    <div class="col-md-12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <input type="file" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Categoria</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-itemRemove" class="modal" tabindex="-1" role="dialog">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <div class="card">
            <div class="card-header card-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
                <h4 class="card-title">Eliminar Producto</h4>
                <!--<p class="card-category">Complete your profile</p>-->
            </div>
            <div class="card-body">
                <form id="form-itemRemove" method="post" action="<?=base_url();?>Home/remove">
                <input type="text" name="id" class="d-none">
                <h4 id="nameRemove" class="card-title"></h4>
            </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
                </form>
        </div>
    </div>
</div>
</div>





