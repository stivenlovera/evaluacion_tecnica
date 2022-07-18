@extends('layout')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Usuarios <small></small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Buscar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de usuarios<small></small></h2>

                    <button class="panel_toolbox btn-secondary btn-sm" id="view_pdf"><i class="fa fa-file-pdf-o"></i>
                        Generar
                        report</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row m-3">
                                <div class="col-md-6 d-flex flex-row">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 col-sm-4 mt-2">Ordenar</label>
                                        <div class="col-md-8 col-sm-8">
                                            <select class="form-control" id="ordenar">
                                                <option value="ci">ci</option>
                                                <option value="nombre">nombre</option>
                                                <option value="apellido">apellido</option>
                                                <option value="nacionalidad">nacionalidad</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-row-reverse">
                                    <div class="form-group row">
                                        <button type="button" id="new"
                                            class="btn btn-secondary btn-sm m-0 d-inline ">Crear usuario
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-box table-responsive">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>CI</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Nacionalidad</th>
                                            <th>Edad</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Dirrrecion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-.usuario.modal />
@endsection
@push('java-script')
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/emodal@1.2.69/dist/eModal.min.js"></script>
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: `${base_url}/usuario/data-table?orden=${$('#ordenar').val()}`, //
            order: [],
            columns: [{
                    data: "ci",
                    name: "ci"
                },
                {
                    data: "nombre",
                    name: "nombre"
                },
                {
                    data: "apellido",
                    name: "apellido"
                },
                {
                    data: "nacionalidad",
                    name: "nacionalidad"
                },
                {
                    data: "edad",
                    name: "edad"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: "celular",
                    name: "celular"
                },
                {
                    data: 'dirrecion',
                    name: 'dirrecion'
                },
                {
                    data: "acciones",
                    name: "acciones"
                },
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    </script>
    <script src="{{ asset('js/usuario/list.js') }}"></script>
    <script src="{{ asset('js/usuario/update.js') }}"></script>
    <script src="{{ asset('js/usuario/store.js') }}"></script>
    <script src="{{ asset('js/usuario/delete.js') }}"></script>
@endpush
