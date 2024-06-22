<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 0) {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil de Usuario</title>
    
    <link href="../img/logos/LOGO.png" rel="icon">

    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="../css/styleWyM.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="../css/styleindex.css">
</head>

<header>

<div class="header-content">

    <div class="logo">
        <h1>Ado<b>Pet</b></h1>
    </div>

    <div class="menu" id="show-menu">

<nav>
    <ul>
        <li><a href="../Adopet.php"> <i class="fas fa-home"></i>Inicio</a></li>
        <li><a href="../iniciosesion/adoptar.php"> <i class="fab fa-adopta"> </i>¿Como adoptar?</a></li>
        <!-- <li class="menu-selected"><a href="mascotas.php" class="text-menu-selected"> 
            <i class="fas fa-file-alt"></i>Mascotas</a></li> -->
            <li><a href="../iniciosesion/mascotas.php"> <i class="fas fa-headset"></i>Mascotas</a></li>    
        <li><a href="../iniciosesion/contacto.php"> <i class="fas fa-headset"></i>Contacto</a></li>
        <!-- <li><a href="login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
        <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <ion-icon name="person-outline"></ion-icon></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item" href="perfil/perfil.php?id=<?php echo $row['id']; ?>">Perfil</a> -->
                <a class="dropdown-item" href="index.php">Perfil</a>
                <a class="dropdown-item" href="../php/cerrar_sesion.php">Salir</a>
            </div>
        </ul>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script> 
    </ul>
</nav>

</div>

</div>

<div id="icon-menu">
    <i class="fas fa-bars"></i>
</div>

</header>


<body>
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <hr>
        <form action="insert_user.php" method="POST" enctype="multipart/form-data">
            <div class="profile-pic">
                <!-- <label for="imagen">Foto de Perfil:</label>
                <input type="file"  name="imagen" > -->
            </div>
            <div class="input-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" id="nombre_completo" name="nombre_completo" required>
            </div>
            <div class="input-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="input-group">
                <label for="genero">Genero:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="input-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="input-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <div class="input-group">
                <label for="horario">Horario para Visitar:</label>
                <input type="text" id="horario" name="horario" required>
            </div>
            <div class="input-group">
                <label for="ocupacion">Ocupación:</label>
                <input type="text" id="ocupacion" name="ocupacion" required>
            </div>
            <div class="input-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            <div class="input-group">
                <label for="direccion1">Segunda Dirección:</label>
                <input type="text" id="direccion1" name="direccion1" required>
            </div>
            <input type="submit" value="Enviar">
            <!-- <a href="perfil.php?id=<?php $row['id']; ?>" class="btn btn-primary">Editar</a> -->
        </form>
    </div>
</body>

    <!--container-redes-sociales-->
    <div class="container-redes">
        <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">    
            <img src="../img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
        </a>

        <a href="" target="_blank">
            <img src="../img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
        </a>
    </div>
    
    <!-- pie de la pagina -->
    <!-- <div class="container-footer">	
        <footer>
            <div class="logo-footer">
                <img src="../img/logos/LOGO.png" alt="">
            </div>

            <div class="redes-footer">
                <a href="#"><i class="fab fa-facebook-f icon-redes-footer"></i></a> -->
                <!-- <a href="#"><i class="fab fa-google icon-redes-footer"></i></a>  -->
                <!-- <a href="#"><i class="fab fa-instagram icon-redes-footer"></i></a>
                <a href="#"><i class="fab fa-whatsapp icon-redes-footer"></i></a>
            </div>

            <hr>
            <h4>© 2024 Erick Barahona - Todos los Derechos Reservados</h4>

    </footer>
    </div>  -->
    <!-- fin del footer -->

</html>
