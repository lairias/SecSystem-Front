@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Registro diario</h1>
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
                            <h3 class="card-title">Agregar Registro</h3>
                        </div>
                        <form action = "{{route('admin.registros.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <h5>Datos del Registro</h5>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Codigo Empleado</label>
                                                        <select class = "select2 @error('codigo_empleado') is-invalid @enderror col-sm-12 form-control input-lg"  name="codigo_empleado" id="post-codigo_empleado" required >
                                                            <option selected disabled>Seleccione un empleado</option>
                                                            @foreach ($empleados as $empleado)
                                                                <option value = "{{$empleado->cod_empleado}}" @if (old('codigo_empleado')=="$empleado->cod_empleado") {{ 'selected' }} @endif>
                                                                {{$empleado->cod_empleado}}
                                                                |
                                                                {{$empleado->primer_nom}}
                                                                |
                                                                {{$empleado->primer_apel}}
                                                                |
                                                                {{$empleado->estado_empleado}}
                                                                |
                                                                {{$empleado->tipo_empleado}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('codigo_empleado')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione un empleado.
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Codigo Cliente</label>
                                                        <select class = "select2 @error('codigo_cliente') is-invalid @enderror col-sm-12 form-control input-lg"  name="codigo_cliente" id="post-codigo_cliente" required >
                                                            <option selected disabled>Seleccione un cliente</option>
                                                            @foreach ($clientes as $cliente)
                                                                <option value = "{{$cliente->cod_cliente}}" @if (old('codigo_cliente')=="$cliente->cod_cliente") {{ 'selected' }} @endif>
                                                                {{$cliente->cod_cliente}}
                                                                |
                                                                {{$cliente->nom_empresa}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('codigo_cliente')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione un cliente.
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Codigo Recurso</label>
                                                        <select class = "select2 @error('codigo_recurso') is-invalid @enderror col-sm-12 form-control input-lg"  name="codigo_recurso" id="post-codigo_recurso" required >
                                                            <option selected disabled>Seleccione un recurso</option>
                                                            @foreach ($recursos as $recurso)
                                                                <option value = "{{$recurso->cod_recurso}}"@if (old('codigo_recurso')=="$recurso->cod_recurso") {{ 'selected' }} @endif>
                                                                {{$recurso->cod_recurso}}
                                                                |
                                                                {{$recurso->des_recurso}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('codigo_recurso')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione un recurso.
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
                                                        <label for="inputName" class="col-sm-6 col-form-label">Fecha Asignado</label>
                                                        <input type="date" name="fec_asignado"  value="{{old('fec_asignado')}}" class="@error('fec_asignado') is-invalid @enderror form-control input-lg" placeholder="Ingresar fecha asignada">
                                                        @error('fec_asignado')
                                                            <div class="invalid-feedback">
                                                                La fecha de empleado asignado debe ser despues de ayer.
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Turno Asignado</label>
                                                        <select class="@error('turno_asignado') is-invalid @enderror col-sm-12 form-control input-lg" name="turno_asignado" value="{{old('turno_asignado')}}" id="turno_asignado">
                                                            <option read only value="">Seleccionar tipo</option>
                                                            <option  value="Matutina"@if (old('turno_asignado')=="Matutina") {{ 'selected' }} @endif>Matutina</option>
                                                            <option  value="Vespertina"@if (old('turno_asignado')=="Vespertina") {{ 'selected' }} @endif>Vespertina</option>
                                                            <option  value="Nocturna"@if (old('turno_asignado')=="Nocturna") {{ 'selected' }} @endif>Nocturna</option>
                                                        </select>
                                                        @error('turno_asignado')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.registros.index')}}" class="btn btn-danger">Salir</a>
                                    <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!TERMINA CONTENIDO************>
@stop
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@stop
@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $(document).ready(function() {
                $('.select2').select2({
                    theme: 'bootstrap4',
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page specific script -->
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        });
    </script>

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
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultInfo').click(function() {
            Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultWarning').click(function() {
            Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultQuestion').click(function() {
            Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Registro Creado Exitosamente.')
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

        $('.toastsDefaultDefault').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultTopLeft').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomRight').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomLeft').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultNotFixed').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultFull').click(function() {
            $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
            })
        });
        $('.toastsDefaultFullImage').click(function() {
            $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
            })
        });
        $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultInfo').click(function() {
            $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultWarning').click(function() {
            $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultMaroon').click(function() {
            $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        });
    </script>
@stop




