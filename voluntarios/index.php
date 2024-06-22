<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>

<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM voluntarios";
$query = mysqli_query($con, $sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../img/logos/LOGO.png" rel="icon">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="CSS/estil.css">
        <link rel="stylesheet" href="../css/assets/css/styles.css">
        <link rel="stylesheet" href="../css/active.css">
        <link rel="stylesheet" href="../css/agregar.css">
        <link rel="stylesheet" href="CSS/eliminar.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-pM4N9Z+jGkjz63xMCs4KvmF9d6pOZ6oTzF2N5zLpxqzJ4lLQ5VIKm+FC0GvaxvtOBeBxvUeBvJ74ftwSZDSO3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <script>
            function eliminarRegistro(id) {
                if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                    window.location.href = 'delete_user.php?id=' + id;
                }
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Voluntarios</title>
        
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
                            <img src="../img/logos/LOGO.png" alt="">
                            <span class="nav__name"><?php echo $_SESSION['email']; ?></span>
                        </p>
                        <a href="../perfil_admin.php" class="nav__link" title="Dashboard">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="../usuarios/index.php" class="nav__link" title="Usuarios">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Usuarios</span>
                        </a>

                        <a href="../lista_mascotas.php" class="nav__link" title="Mascotas">
                        <ion-icon name="paw-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Mascotas</span>
                        </a>

                        <a href="../contacto/index.php" class="nav__link" title="Contactos">
                            <ion-icon name="chatbox-ellipses-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Contactos</span>
                        </a>

                        <a href="../solicitudes/index.php" class="nav__link" title="Solicitudes">
                            <ion-icon name="folder-open-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Solicitudes</span>
                        </a>
                        <a href="../adopciones/index.php" class="nav__link" title="Adopciones">
                            <ion-icon name="file-tray-stacked-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Adopciones</span>
                        </a>
                        <a href="index.php" class="nav__link active" title="Voluntarios">
                            <ion-icon name="hand-right-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Voluntarios</span>
                        </a>
                    </div>
                </div>

                <a href="../php/cerrar_admin.php" class="nav__link" title="Cerrar Sesion">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Cerrar Sesíon</span>
                </a>
            </nav>
        </div>
        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="../css/assets/js/main.js"></script>


        <!-- Crud -->
        <ul class="breadcrumb">
            <li><a href="../perfil_admin.php">Dashboard</a></li>
            <li><a class="si" href="index.php">Voluntarios</a></li>
        </ul>

        <br>

    <!-- <button class="read-more-btn" title="Agregar Usuarios"> <ion-icon name="person-add-outline" ></ion-icon>  </button>
    <span class="hideText">
        <div class="users-form">
            <h1>Crear registro de voluntarios</h1>
            <form action="insert_user.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="email" name="correo" placeholder="Correo">
                <input type="text" name="telefono" placeholder="Telefono">
                <input type="text" name="experiencia" placeholder="Experiencia">
                <input type="text" name="puesto" placeholder="Puesto">
                
                <input type="submit" value="Agregar">
            </form>
        </div>
    </span>

    <script src="../js/ocultar.js"></script> -->

    <!-- ----------tabla---------- -->
    <div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla de Voluntarios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Experiencia</th>
                                    <th>Puesto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dato = mysqli_fetch_array($query)): ?>
                                        <tr>
                                            <td><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato["nombre"]; ?></td>
                                            <td><?php echo $dato["correo"]; ?></td>
                                            <td><?php echo $dato["telefono"]; ?></td>
                                            <td><?php echo $dato["experiencia"]; ?></td>
                                            <td><?php echo $dato["puesto"]; ?></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $dato['id']; ?>" class="btn btn-primary"><i class='fas fa-edit'></i></a>
                                                <style>
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <a href="#" class="btn btn-danger" onclick="confirmDelete(<?php echo $dato['id']; ?>)"><i class='fas fa-trash-alt'></i></a>

    <!-- Modal -->
    <div id="confirmModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Eliminación</h5>
          <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que quieres eliminar este registro?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
          <button class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
        </div>
      </div>
    </div>

    <script>
        function confirmDelete(id) {
            document.getElementById('confirmModal').style.display = 'block';
            document.getElementById('confirmDeleteBtn').onclick = function () {
                window.location.href = 'delete_user.php?id=' + id;
            };
        }

        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        // Cerrar el modal si se hace clic fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
                                            </td>
                                        </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Experiencia</th>
                                    <th>Puesto</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
</div>

</body>

<footer>

    
<!-- Bootstrap 4 -->

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</footer>

</html>