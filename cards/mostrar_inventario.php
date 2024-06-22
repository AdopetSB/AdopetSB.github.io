<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sitio de para Rosquilleria">
    <meta name="author" content="Ing. Eliezer Izaguirre">
    <link rel="icon" href="../img/logos/LOGO.png">
    <title>Mascotas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-pM4N9Z+jGkjz63xMCs4KvmF9d6pOZ6oTzF2N5zLpxqzJ4lLQ5VIKm+FC0GvaxvtOBeBxvUeBvJ74ftwSZDSO3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Visualizacion del Inventario</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../db/salir.php">Cerrar Sesión</a></li>
                                <li class="breadcrumb-item active">Inventario</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <style>
                    #productos {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        /* Ajusta el espacio entre las columnas */
                    }

                    .card img {
                        width: 100%;
                        height: auto;
                        border-radius: 5px;
                    }

                    .card {
                        width: calc(30% - 80px);
                        /* 25% para cada columna, menos el espacio entre ellas */
                        margin-bottom: 80px;
                        /* Espacio entre las filas */
                        background-color: #4d84e2;
                        /* Color de fondo primario */
                        color: #white;
                        /* Color del texto */
                        border-radius: 5px;
                        /* Bordes redondeados */
                        padding: 10px;
                        /* Espaciado interno */
                    }

                    .card.danger {
                        background-color: #dc3545;
                        /* Color de fondo para estado de peligro */
                    }

                    @media screen and (max-width: 768px) {
                        .card {
                            width: calc(50% - 20px);
                            /* Dos columnas en dispositivos más pequeños */
                        }
                    }

                    @media screen and (max-width: 480px) {
                        .card {
                            width: 100%;
                            /* Una columna en dispositivos muy pequeños */
                        }
                    }
                </style>
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="col-lg-12">
                        <div id="productos">
                            <!-- Aquí se agregarán dinámicamente las tarjetas de productos -->
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <script>
                    fetch('obtener_inventario.php')
                    .then(response => response.json())
                    .then(data => {
                        const contenedorMascotas = document.getElementById('productos');
                        data.forEach(mascota => {
                    const card = document.createElement('div');
                    card.classList.add('card');

                    if (mascota.imagen) {
                        const img = document.createElement('img');
                        img.src = mascota.imagen;
                        card.appendChild(img);
                    }

                    const cardHeader = document.createElement('h2');
                    cardHeader.textContent = mascota.nombre;
                    card.appendChild(cardHeader);

                    const cardBody = document.createElement('div');
                    const info = `
                        <p>Raza: ${mascota.raza}</p>
                        <p>Edad: ${mascota.edad}</p>
                        <p>Sexo: ${mascota.sexo}</p>
                        <p>Comentario: ${mascota.comentario}</p>
                    `;
                    cardBody.innerHTML = info;
                    card.appendChild(cardBody);

                    contenedorMascotas.appendChild(card);
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- <<footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2024 <a href="">Eliezer Izaguirre</a>.</strong> All rights reserved.
        </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>