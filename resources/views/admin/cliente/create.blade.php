@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
<h1>Clientes</h1>
@stop

@section('content')
    <!CONTENIDO************>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Agregar Cliente</h3>
                        </div>
                        <form action="{{route('admin.clientes.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos del Cliente</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Codigo de Persona</label>
                                                    <select class="select2 @error('codigo_persona') is-invalid @enderror col-md-12 form-control" name="codigo_persona" id="post-cod_persona"value="{{old('codigo_persona')}}">
                                                        <option read only value ="">Seleccione una persona</option>
                                                        @foreach ($personas as $persona)
                                                        <option value="{{$persona->cod_persona}}"@if (old('codigo_persona')=="$persona->cod_persona") {{ 'selected' }} @endif>
                                                            {{$persona->cod_persona}}
                                                            |
                                                            {{$persona->primer_nom}}
                                                            |
                                                            {{$persona->primer_apel}}
                                                            |
                                                            {{$persona->rtn_persona}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('codigo_persona')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Seleccione una persona.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Nombre Empresa</label>
                                                    <input type="text" name="nombre_empresa" value="{{old('nombre_empresa')}}" id="post-nombre_empresa" class="@error('nombre_empresa') is-invalid @enderror col-md-12 form-control input-lg" placeholder="Ingresar nombre de la empresa" minlength="5" maxlength="255">
                                                    @error('nombre_empresa')
                                                        <div class="invalid-feedback">
                                                            {{$message}}|solo letras y numeros.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                                    <input type="email" name="correo_electronico" value="{{old('correo_electronico')}}" id="post-correo_electronico" class="@error('correo_electronico') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar correo electrónico">
                                                    @error('correo_electronico')
                                                        <div class="invalid-feedback">
                                                            {{$message}}| no debe llevar espacios.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Descripción de contrato</label>
                                                    <input type="description" name="descripción_contrato" value="{{old('descripción_contrato')}}" id="post-descripción_contrato" class="@error('descripción_contrato') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar descripcion del contrato" minlength="5" maxlength="255">
                                                    @error('descripción_contrato')
                                                        <div class="invalid-feedback">
                                                            {{$message}}| no debe llevar caracteres especiales, comas ni guiones.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Fecha de inicio contrato</label>
                                                    <input type="date" name="fec_ini_contrato" value="{{old('fec_ini_contrato')}}" id="post-fec_ini_contrato" class="@error('fec_ini_contrato') is-invalid @enderror col-sm-12 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                                    @error('fec_ini_contrato')
                                                        <div class="invalid-feedback">
                                                            La fecha no puede ser antes que hoy.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Fecha de fin contrato</label>
                                                    <input type="date" name="fec_fin_contrato" value="{{old('fec_fin_contrato')}}" id="post-fec_fin_contrato" class="@error('fec_fin_contrato')is-invalid @enderror col-sm-12 form-control  input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                                    @error('fec_fin_contrato')
                                                        <div class="invalid-feedback">
                                                            La fecha debe ser despues hoy.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.clientes.index')}}" class="btn btn-danger">Salir</a>
                                <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop
    <!-- TERMINA CONTENIDO************-->
        @section('css')

            <!-- DataTables -->
            <link rel="stylesheet" href="{{  asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{  asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{  asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
            <!-- daterange picker -->
            <link rel="stylesheet" href="{{  asset('vendor/daterangepicker/daterangepicker.css')}}">
            <!-- Select2 -->
            <link rel="stylesheet" href="{{  asset('vendor/select2/css/select2.min.css')}}">
            <!-- SweetAlert2 -->
            <link rel="stylesheet" href="{{  asset('vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
            <!-- Toastr -->
            <link rel="stylesheet" href="{{  asset('vendor/toastr/toastr.min.css')}}">
            <!-- Select2 -->
            <link rel="stylesheet" href="{{  asset('vendor/select2/css/select2.css')}}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

        @stop
    @section('js')
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(document).ready(function() {
                    $('.select2').select2({
                        theme: 'bootstrap4',
                    });
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{  asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/jszip/jszip.min.js')}}"></script>
        <script src="{{  asset('vendor/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{  asset('vendor/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{  asset('vendor/select2/js/select2.full.min.js')}}"></script>
        <!-- InputMask -->
        <script src="{{  asset('vendor/moment/moment.min.js')}}"></script>
        <script src="{{  asset('vendor/inputmask/jquery.inputmask.min.js')}}"></script>
        <!-- date-range-picker -->
        <script src="{{  asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{  asset('vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Bootstrap Switch -->
        <script src="{{  asset('vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <!-- dropzonejs -->
        <script src="{{  asset('vendor/dropzone/min/dropzone.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{  asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- Toastr -->
        <script src="{{  asset('vendor/toastr/toastr.min.js')}}"></script>

        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('yyyy/mm/dd', {
                    'placeholder': 'yyyy/mm/dd'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });

            })
        </script>


        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                $('.toastrDefaultSuccess').click(function() {
                    toastr.success('Registro cliente en proceso.')
                });
                $('.toastrDefaultInfo').click(function() {
                    toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                });
                $('.toastrDefaultError').click(function() {
                    toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                });
                $('.toastrDefaultWarning').click(function() {
                    toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                });
            });
        </script>
    @stop
