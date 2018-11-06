     
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Listado de usuarios</h4>
                  <p class="card-category"> Usuarios activos e inactivos del sistema</p>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-user">
<i class="material-icons">add</i>Agregar Usuario<div class="ripple-container"></div>
</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Identificacion
                          </th>
                          <th>
                            Rol
                          </th>
                          <th>
                            Estado
                          </th>
                          <th>
                            Acciones
                          </th>
                        </tr>
                      </thead>
                      <tbody id="showUsers">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>




<!-- Modal -->
<div id="modal-user" class="modal" tabindex="-1" role="dialog">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <div class="card">
        <div class="card-header card-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
            </button>
            <h4 class="card-title">Crear Usuario</h4>
            <!--<p class="card-category">Complete your profile</p>-->
        </div>
        <div class="card-body">
            <form id="form-user" method="post" action="<?=base_url();?>User/create">
            <input type="text" class="d-none">
            <div class="row" style="">
              <img src="assets/img/new_logo.png" style="border-radius: 50%;margin-left: 35%; min-height: 130px;"/>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nameuser">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Identificacion</label>
                      <input type="text" class="form-control" name="identificacionuser">
                  </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 26px;">
                <div class="col-md-6">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input type="text" class="form-control" name="passuser">
                </div>
                </div>
                <div class="col-md-6" >
                  <div class="form-group bmd-form-group" style="padding-bottom: 0px !important;">
                      <label class="bmd-label-floating" style="top: -34%;webkit-appearance: noe !important;">Rol</label>
                      <select class="form-control" name="roluser" style="padding-left: 10px;padding-right: 10px; border-radius: 8% !important;">
                        <option value="admin">Administrador</option>
                        <option value="super">Supervisor</option>
                        <option value="guest">Cajero</option>
                      </select>
                      <!--<input type="text" class="form-control" name="roluser">-->
                  </div>
                </div>
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


<!-- Modal Editar usuario-->
<div id="modal-userEdit" class="modal" tabindex="-1" role="dialog">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <div class="card">
        <div class="card-header card-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
            </button>
            <h4 class="card-title">Editar Usuario</h4>
            <!--<p class="card-category">Complete your profile</p>-->
        </div>
        <div class="card-body">
            <form id="form-useredit" method="post" action="<?=base_url();?>User/edit">
            <input id="id-user-edit" type="text" name="id-user-edit" class="d-none">
            <input type="text" class="d-none">
            <div class="row" style="">
              <img src="assets/img/new_logo.png" style="border-radius: 50%;margin-left: 35%; min-height: 130px;"/>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nameuser">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Identificacion</label>
                      <input type="text" class="form-control" name="identificacionuser">
                  </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 26px;">
                
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" style="top: -24%;">Rol</label>
                      <select class="form-control" name="roluser" style="">
                        <option value="admin">Administrador</option>
                        <option value="super">Supervisor</option>
                        <option value="guest">Cajero</option>
                      </select>
                      <!--<input type="text" class="form-control" name="roluser">-->
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating" style="top: -24%;">Estado</label>
                      <select name="stateUser" class="form-control">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                      </select>
                      <!--<input type="text" class="form-control" name="roluser">-->
                  </div>
                </div>
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


<div id="modal-userRemove" class="modal" tabindex="-1" role="dialog">
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
                <form id="form-userRemove" method="post" action="<?=base_url();?>Home/remove" style="padding: 7%;">
                <input type="text" name="id-user-rev" class="d-none">
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
