<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="img/logos/LOGO.png" rel="icon">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="usuario/CSS/style.css">
    <link rel="stylesheet" href="css/assets/css/style.css">
    <link rel="stylesheet" href="css/active.css">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <title>Perfil Administrativo</title>
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
                    <a href="perfil_admin.php" class="nav__link active" title="Dashboard">
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
                    <!-- <div class="nav__link collapse" title="Mascotas">
                        <ion-icon name="paw-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Mascotas</span>
                        <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>
                        <ul class="collapse__menu">
                            <a href="Perros/index.php" class="collapse__sublink">Perros</a>
                            <a href="gatos/index.php" class="collapse__sublink">Gatos</a>
                            <a href="conejos/index.php" class="collapse__sublink">Conejos</a>
                            <a href="aves/index.php" class="collapse__sublink">Aves</a>
                        </ul>
                    </div> -->

                    <a href="contacto/index.php" class="nav__link" title="Contactos">
                        <ion-icon name="chatbox-ellipses-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Contactos</span>
                    </a>
                    <a href="solicitudes/index.php" class="nav__link" title="Solicitudes">
                        <ion-icon name="folder-open-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Solicitudes</span>
                    </a>
                    <a href="adopciones/index.php" class="nav__link" title="Adopciones">
                        <ion-icon name="file-tray-stacked-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Adopciones</span>
                    </a>
                    <a href="voluntarios/index.php" class="nav__link" title="Voluntarios">
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


    <!-- Crud -->

    <ul class="breadcrumb">
        <li><a class="si" href="perfin_admin.php">Dashboard</a></li>
    </ul>

    <!-- adopciones -->
    <?php
    // Configuración de la conexión a la base de datos
    // Datos de conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbadopet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para contar el número de clientes registrados
    $sql = "SELECT COUNT(*) AS total_adopciones FROM adopciones";
    $result = $conn->query($sql);

    $total_adopciones = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_adopciones = $row["total_adopciones"];
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <!-- voluntarios -->
        <?php
    // Configuración de la conexión a la base de datos
    // Datos de conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbadopet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para contar el número de clientes registrados
    $sql = "SELECT COUNT(*) AS total_voluntarios FROM voluntarios";
    $result = $conn->query($sql);

    $total_voluntarios = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_voluntarios = $row["total_voluntarios"];
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <!-- usuarios -->
    <?php
    // Configuración de la conexión a la base de datos
    // Datos de conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbadopet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para contar el número de clientes registrados
    $sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
    $result = $conn->query($sql);

    $total_usuarios  = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_usuarios  = $row["total_usuarios"];
    }

    // Cerrar conexión
    $conn->close();
    ?>

        <!-- solicitudes -->
        <?php
    // Configuración de la conexión a la base de datos
    // Datos de conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbadopet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para contar el número de clientes registrados
    $sql = "SELECT COUNT(*) AS total_solicitudes FROM solicitudes";
    $result = $conn->query($sql);

    $total_solicitudes = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_solicitudes = $row["total_solicitudes"];
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <!-- diseño de los datos -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $total_adopciones; ?></h3>

                            <p>Adopciones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <a href="adopciones/index.php" class="small-box-footer">Mas Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $total_voluntarios; ?></h3>

                            <p>Voluntarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding-medical"></i>
                        </div>
                        <a href="voluntarios/index.php" class="small-box-footer">Mas Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $total_usuarios ; ?></h3>

                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="usuarios/index.php" class="small-box-footer">Mas Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $total_solicitudes; ?></h3>

                            <p>Solicitudes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <a href="solicitudes/index.php" class="small-box-footer">Mas Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <style>
                    .centered-image {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <img src="img/AdoPet.png" alt="" width="500" height="450" class="centered-image">
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</body>
<footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="dist/js/adminlte.js"></script>

</footer>

</html>