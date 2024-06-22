<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reportes</title>

    <link href="img/logos/LOGO.png" rel="icon">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="usuario/CSS/style.css">
    <link rel="stylesheet" href="css/assets/css/style.css">
    <link rel="stylesheet" href="css/active.css">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
        .report-container {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            margin-top: 20px;
        }
    </style>
</head>

<body>
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
                    <a href="perfil_admin.php" class="nav__link " title="Dashboard">
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
                    <a href="solicitudes/index.php" class="nav__link" title="Solicitudes">
                        <ion-icon name="folder-open-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Solicitudes</span>
                    </a>
                    <a href="adopciones/index.php" class="nav__link active" title="Adopciones">
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
        <li><a href="perfin_admin.php">Dashboard</a></li>
        <li><a href="adopciones/index.php">Adopciones</a></li>
        <li><a class="si" href="reporte_generado.php" active>Reportes</a></li>

    </ul>

    <div class="container">
        <h2 class="mt-5">Generar Reportes</h2>

        <!-- Reporte General -->
        <div class="report-container">
            <h4>Reporte General</h4>
            <div class="form-group">
                <a href="fpdf/Reportes.php" class="btn btn-primary" target="_blank">Reporte <i class="fa-solid fa-file-pdf"></i></a>
                <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
            </div>
        </div>

        <!-- Reporte por Tipo de Mascota -->
        <div class="report-container">
            <h4>Reporte por Tipo de Mascota</h4>
            <form action="fpdf/ReporteT.php" method="post" class="mt-3">
                <div class="form-group">
                    <label for="mascota">Tipo de Mascota</label>
                    <select class="form-control" id="mascota" name="mascota" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                        <option value="conejo">Conejo</option>
                        <option value="aves">Aves</option>
                        <!-- <option value="otros">Otros</option> -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" target="_blank">Generar Reporte <i class="fa-solid fa-file-pdf"></i></button>
            </form>
        </div>

        <!-- Reporte por Dirección -->
        <div class="report-container">
    <h4>Reporte por Dirección</h4>
    <form action="fpdf/ReporteD.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="address">Dirección</label>
            <input list="address-options" type="text" class="form-control" id="address" name="address" required>
            <datalist id="address-options">
                <option value="galeras">
                <option value="col. rosario">
                <option value="san nicolas">
                <option value="trinidad">
                <option value="ilama">
            </datalist>
        </div>
        <button type="submit" class="btn btn-primary" target="_blank">Generar Reporte <i class="fa-solid fa-file-pdf"></i></button>
    </form>
</div>



        <!-- Reporte por Mes -->
        <div class="report-container">
            <h4>Reporte por Mes</h4>
            <form action="fpdf/Reporte_mes.php" method="post" class="mt-3">
                <div class="form-group">
                    <label for="month">Mes</label>
                    <input type="month" class="form-control" id="month" name="month" required>
                </div>
                <button type="submit" class="btn btn-primary" target="_blank">Generar Reporte <i class="fa-solid fa-file-pdf"></i></button>
            </form>
        </div>
        <br>
        <br>
        <br>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
