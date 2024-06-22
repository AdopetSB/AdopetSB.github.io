<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    @media (max-width: 768px) {
        .table-body tr {
            display: flex;
            flex-wrap: wrap;
        }

        .table-body tr td {
            width: 100%;
            display: block;
        }
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="img/logos/LOGO.png">
    
    <title>Reporte de Solicitudes</title>

        <link rel="stylesheet" href="solicitudes/CSS/estilos.css">
        <link rel="stylesheet" href="solicitudes/CSS/reportes.css">
        <link rel="stylesheet" href="css/assets/css/style.css">
        <link rel="stylesheet" href="css/active.css">
        <link rel="stylesheet" href="css/agregar.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-pM4N9Z+jGkjz63xMCs4KvmF9d6pOZ6oTzF2N5zLpxqzJ4lLQ5VIKm+FC0GvaxvtOBeBxvUeBvJ74ftwSZDSO3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="body-pd">

<div class="l-navbar" id="navbar">
    <nav class="nav">
        <div>
            <div class="nav__brand">
                <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                <a href="#" class="nav__logo">Adopet</a>
            </div>
            <div class="nav__list">
                <p class="perfil">
                    <img src="img/logos/LOGO.png" alt="">
                    <span class="nav__name"><?php echo $_SESSION['email']; ?></span>
                </p>
                <a href="perfil_admin.php" class="nav__link" title="Dashboard">
                    <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Dashboard</span>
                </a>
                <a href="usuarios/index.php" class="nav__link" title="Usuarios">
                    <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Usuarios</span>
                </a>
                <a href="lista_mascotas.php" class="nav__link" title="Mascotas">
                <ion-icon name="paw-outline" class="nav__icon"></ion-icon>
                <span class="nav__name">Mascotas</span>
                </a>
                <a href="contacto/index.php" class="nav__link" title="Contactos">
                    <ion-icon name="chatbox-ellipses-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Contactos</span>
                </a>
                <a href="solicitudes/index.php" class="nav__link active" title="Solicitudes">
                    <ion-icon name="folder-open-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Solicitudes</span>
                </a>
                <a href="adopciones/index.php" class="nav__link" title="Adopciones">
                    <ion-icon name="file-tray-stacked-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Adopciones</span>
                </a>
                <a href="voluntarios/index.php" class="nav__link " title="Voluntarios">
                    <ion-icon name="hand-right-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Voluntarios</span>
                </a>
            </div>
        </div>

        <a href="php/cerrar_admin.php" class="nav__link" title="Cerrar Sesion">
            <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Cerrar Sesíon</span>
        </a>
    </nav>
</div>
<!-- ===== IONICONS ===== -->
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

<!-- ===== MAIN JS ===== -->
<script src="css/assets/js/main.js"></script>

    <!-- curd -->

<ul class="breadcrumb">
    <li><a href="perfil_admin.php">Dashboard</a></li>
    <li><a href="solicitudes/index.php">Solicitudes</a></li>
    <li><a class="si" href="#" active>Reporte</a></li>
</ul>
<br>
            <!-- Agrega este código JavaScript al final de tu página HTML -->
            
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" action="generar_reporte.php" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-3">
                                            <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lenguaje" class="form-label">Tipo de Reporte:</label>
                                            <select id="tipo_reporte" class="form-control" name="tipo_reporte" required>
                                                <option value="pdf">PDF</option>
                                                <option value="excel">Excel</option>
                                            </select>
                                        </div>
                                        <div class="col-12" style="padding: 10px;">
                                            <button type="submit" class="btn btn-primary" target="_blank" >Generar Reporte <i class="fas fa-check"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>