<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel</title>
    @include('includes.libreriasCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="" class="brand-link">
                    <img src="{{ asset('images/pv.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Punto de venta</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('images/faces.png') }}" aclass="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">

                            @if (Route::has('login'))
                                @auth
                                    <a href="#" class="d-block">{{ Auth()->user()->firstname }}</a>
                                @endauth
                            @endif
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="{{ route('welcome') }}" class="nav-link active">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Home

                                    </p>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('viewFiltro') }}" class="nav-link">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>
                                        Productos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mayoreo') }}" class="nav-link">
                                    <i class="nav-icon fa fa-tags"></i>
                                    <p>
                                        Mayoreo
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('viewVents') }}" class="nav-link">
                                    <i class="nav-icon fa fa-cart-plus"></i>
                                    <p>
                                        Ventas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('client.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        Clientes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Reportes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('viewReportes') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reporte de Ventas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/flot.html" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reporte de Compras</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/inline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reporte de Inventario</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('allcaja') }}" class="nav-link">
                                    <i class="nav-icon fa fa-boxes"></i>
                                    <p>
                                        Cajas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link entradaEfectiv">
                                    <i class="nav-icon fa fa-hand-holding-usd"></i>
                                    <p>Entradas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="nav-icon fa fa-folder-minus"></i>
                                    <p>Salidas</p>
                                </a>
                            </li>
                            <!-- salir -->
                            <li class="nav-item">
                                <a class="nav-link exit">
                                    <i class="nav-icon fa fa-sign-out-alt" id="exit"></i>
                                    <p>
                                        Salir
                                    </p>
                                </a>

                            </li>
                            <!-- salir -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            @yield('javascript')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <main class="py-4"> @yield('content') </main>
                <!-- MODAL  CAJA -->
                <div class="modal fade" id="cajaModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modelHeading"></h5>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('caja') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <label for="name" class="col-sm-12 control-label text-center">Efectivo Inicial en
                                        Caja</label>

                                    <div class="modal-footer col-sm-6">
                                        <button type="submit" class="btn btn-primary" id="cerrar" name="cerrar"
                                            value="close">Cerrar caja
                                        </button>
                                    </div>

                                    <div class="modal-footer col-sm-6">
                                        <button type="submit" class="btn btn-primary" id="mantener" name="mantener"
                                            value="open">Dejar turno abierto y cerrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN  MODAL   CAJA -->
                <!-- MODAL  entradas-->
                <div class="modal fade" id="entradaModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modelHeading"></h5>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('caja') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <label for="name" class="col-sm-12 control-label text-center">Registro de entradas
                                        efectivo</label>

                                    <div class="modal-footer col-sm-6">
                                        <button type="submit" class="btn btn-primary" id="cerrar" name="cerrar"
                                            value="close">Guardar
                                        </button>
                                    </div>

                                    <div class="modal-footer col-sm-6">
                                        <button type="submit" class="btn btn-primary" id="mantener" name="mantener"
                                            value="open">cancelar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- FIN  MODAL   entradas -->

            </div> <!-- Fin Contains page content -->
            @include('panel.footer')
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </div>
    <!-- ./app -->
    @include('includes.libreriasJs')

    <!-- Caja -->
    <script>
        $(document).ready(function() {
            $('.exit').click(function() {
                $('#cajaModel').modal("show");
                $('#modelHeading').html("Salir de Punto de Venta");
            });
        });

    </script>

    <!-- Entradas -->
    <script>
        $(document).ready(function() {
            $('.entradaEfectiv').click(function() {
                $('#entradaModel').modal("show");
                $('#modelHeading').html("Salir de Punto de Venta");
            });
        });

    </script>
    <!-- Fin -->


    <!--Rellenar Combo -->
    <script>
        $(document).ready(function() {
            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('llenar') }}",
                    type: "GET",
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#precioP').val(data.table_datos);
                        $('#total').text(data.total_datos);
                    }
                })
            }

            $(document).on('change', '#descripcion', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });

    </script>


    <!--precio venta -->
    <script>
        $(document).ready(function() {
            $("#inputGanancia").keyup(function() {
                var Precioc = document.getElementById("inputPrecioc").value;
                Ganancia = $(this).val(); // initialization in an inner scope
                Resultado = (parseFloat(Ganancia) + parseFloat(Precioc));
                $("#inputPreciov").val(Resultado);
            });

            $("#inputPrecioc").change(function() {
                var Ganancia = document.getElementById("inputGanancia").value;
                Precioc = $(this).val(); // initialization in an inner scope
                Resultado = (parseFloat(Precioc) + parseFloat(Ganancia));
                $("#inputPreciov").val(Resultado);
            });
        });

    </script>

    <!-- JS Reportes-->
    <script>
        //Código a ejecutar cuando se carga la página 
        $(document).ready(function() {
            fetch_customer_data();
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy/mm/dd'
                });
                $("#datepicker_2").datepicker({
                    dateFormat: 'yy/mm/dd'
                });
            });

            function fetch_customer_data(date1 = '', date2 = '', sale_by = '') {
                $.ajax({
                    url: "{{ route('reporte') }}",
                    method: 'GET',
                    data: {
                        date1: date1,
                        date2: date2,
                        sale_by: sale_by
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#tbody_re').html(data.table_data);
                        $('#plantilla').html(data.table_data);
                        $('#t_re ').text(data.total_data);
                    }
                })
            }

            $(document).on('change', '#datepicker', function() {
                //referencia al elemento que se le está aplicando el evento.
                //var date1 = $(this).val();
                var sale_by = $("#sale_by").val();
                var date1 = $("#datepicker").val();
                var date2 = $("#datepicker_2").val();
                //pasar parametro a la funcion
                fetch_customer_data(date1, date2, sale_by);
            });

            $(document).on('change', '#datepicker_2', function() {

                var sale_by = $("#sale_by").val();
                var date1 = $("#datepicker").val();
                var date2 = $("#datepicker_2").val();
                //pasar parametro a la funcion
                fetch_customer_data(date1, date2, sale_by);
            });

            $(document).on('change', '#sale_by', function() {
                //referencia al elemento que se le está aplicando el evento.          
                var sale_by = $(this).val();
                var date1 = $("#datepicker").val();
                var date2 = $("#datepicker_2").val();
                //pasar parametro a la funcion
                fetch_customer_data(date1, date2, sale_by);

            });

        });

    </script>

    <!-- Cobrar -->

    <script>
        $(document).ready(function() {
            $('#cobrar').click(function() {
                $('#modalCobro').modal('show');

            });
            fetch_customer_data();

            function fetch_customer_data() {
                $.ajax({
                    url: "{{ route('cobrar') }}",
                    type: "GET",
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        $('#total_pagar').text(data.total_pagar);
                        $('#pago').val(data.total_pagar);
                        $('#articulos').text(data.total_articulos);
                    }
                })
                $("#pago").keyup(function() {
                    var pagoCon = document.getElementById("pago").value;
                    var total = $("#total_pagar").text();
                    Resultado = (parseFloat(pagoCon) - parseFloat(total));
                    $('#cambio').val(Resultado);

                });
            }
        });

    </script>
</body>

</html>
