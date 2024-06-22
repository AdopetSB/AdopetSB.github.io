<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>

<?php
include ("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM contacto WHERE id='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../img/logos/LOGO.png" rel="icon">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="CSS/update.css">
    <link rel="stylesheet" href="../css/assets/css/styles.css">
    <link rel="stylesheet" href="../css/active.css">

    <title>Editar Contactos</title>

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

                    <a href="index.php" class="nav__link active" title="Contactos">
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
                    <a href="../voluntarios/index.php" class="nav__link " title="Voluntarios">
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

    <!-- crud -->
    <ul class="breadcrumb">
        <li><a href="../perfil_admin">Dashboard</a></li>
        <li><a href="index.php">Contactos</a></li>
        <li><a class="si" href="#">Editar</a></li>
    </ul>
    <br>
    <br>

    <body>
        <div class="users-form">
            <br>
            <h1>Editar Contactos</h1>
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="nombre" value="<?= $row['nombre'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email" value="<?= $row['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="telefono"
                        value="<?= $row['telefono'] ?>">
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <input type="text" id="mensaje" name="mensaje" placeholder="mensaje" value="<?= $row['mensaje'] ?>">
                </div>


                <input type="submit" value="Actualizar">
                <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
            </form>
        </div>
    </body>

</html>