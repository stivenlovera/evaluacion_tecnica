<div id="usuario" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="title_modal_usuario" ></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 > Usuario <small>registro de datos</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="form_usuario" class="form-horizontal form-label-left">
                          @csrf
                            <input type="text" class="form-control" name="usuario_id" id="usuario_id" hidden>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">CI</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="ci" id="ci" placeholder="CI">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nombre</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Apellido</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Nacionalidad</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Edad</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="edad" id="edad" placeholder="Edad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@gmail.com" name="email" data-parsley-trigger="change" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Celular</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dirrecion</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="dirrecion" id="dirrecion" class="form-control"  placeholder="Dirrecion">
                                </div>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="save">Guardar</button>
        </div>

      </div>
    </div>
  </div>