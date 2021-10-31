@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
<h1>Pago Empleado</h1>
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
                            <h3 class="card-title">Agregar Pago</h3>
                        </div>
                        <form action="{{route('admin.planillas.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <h5>Datos del Pago</h5>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Codigo de empleado</label>
                                                        <select class="select2 @error('codigo_empleado') is-invalid @enderror col-sm-12 form-control input-lg" name="codigo_empleado" id="post-codigo_empleado">
                                                            <option selected disabled>Seleccione una persona</option>
                                                            @foreach ($empleados as $empleado)
                                                            <option value="{{$empleado->cod_empleado}}">
                                                                {{$empleado->cod_empleado}}
                                                                |
                                                                {{$empleado->primer_nom}}
                                                                |
                                                                {{$empleado->primer_apel}}
                                                                |
                                                                {{$empleado->rtn_persona}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('codigo_empleado')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Monto de Pago</label>
                                                        <input type="number" id='monto_pago' name="monto_pago" value="{{old('monto_pago')}}" class="@error('monto_pago') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar monto de pago">
                                                        @error('monto_pago')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Pago Horas Extra</label>
                                                        <input type="text" name="pago_horas_extras" value="{{old('pago_horas_extras')}}" class="@error('pago_horas_extras') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar horas extra" onkeypress="return SoloNumeros(event);" minlength="2" maxlength="7">
                                                        @error('pago_horas_extras')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros sin espacios.
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
                                                        <label for="inputName" class="col-sm-6 col-form-label">IHSS</label>
                                                        <input type="text" id='ihss' name="ihss" class="@error('ihss') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar IHSS" onkeypress="return SoloNumeros(event);" readonly >
                                                        @error('ihss')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">RAP</label>
                                                        <input type="text" id='rap' name="rap" class="@error('rap') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar RAP" onkeypress="return SoloNumeros(event);" readonly  >
                                                        @error('rap')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">VALES</label>
                                                        <input type="text" name="vales" value="{{old('vales')}}" class="@error('vales') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar deducciones" onkeypress="return SoloNumeros(event);">
                                                        @error('vales')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
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
                                                        <label for="inputName" class="col-sm-6 col-form-label">Fecha pago de planilla</label>
                                                        <input type="date" name="fec_pago_planilla" value="{{old('fec_pago_planilla')}}" class="@error('fec_pago_planilla') is-invalid @enderror col-sm-8 form-control input-lg">
                                                        @error('fec_pago_planilla')
                                                        <div class="invalid-feedback">
                                                            La fecha pago debe ser despues de ayer.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.planillas.index')}}" class="btn btn-danger">Salir</a>
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
        <script>
            const montopago = document.querySelector('#monto_pago');
            const IHSS = document.querySelector('#ihss');
            const RAP = document.querySelector('#rap');

            montopago.addEventListener('keyup', async (e) => {
                e.preventDefault();

                let respuesta = await fetch(`http://localhost:3000/api/seguridad/7`);
                let dato_issh = await respuesta.json();

                dato_issh.map(async (X) => {
                    IHSS.value = X.dato * e.target.value;
                });

                let respuesta1 = await fetch(`http://localhost:3000/api/seguridad/8`);
                let dato_rap = await respuesta1.json();

                dato_rap.map(async (X) => {
                    RAP.value = X.dato * e.target.value;
                });

            });

            function SoloNumeros(evt) {
                if (window.event) {
                    keynum = evt.keyCode;
                } else {
                    keynum = evt.which;
                }

                if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13) {
                    return true;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Solo puede ingresar numeros!',
                        footer: '<a>No se acepta espacios, letras, ni caracteres especiales</a>'
                    })
                    return false;
                }
            }

            function SoloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";

                especiales = [8, 13];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }


                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Solo puede ingresar letras!',
                        footer: '<a>No se acepta espacios, números, ni caracteres especiales</a>'
                    })
                    return false;
                }
            }

            function Especial(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letraespecial = "$%!@.";

                especiales = [8, 13];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letraespecial.indexOf(tecla) == -1 && !tecla_especial) {
                    alert("Ingresar solo letras especiales");
                    return false;
                }
            }
        </script>
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Page specific script -->
        <script>
            $('.formulario-eliminar').submit(function(e) {
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
                    toastr.success('Registro de pago empleado en proceso.')
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
