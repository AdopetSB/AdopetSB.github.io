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

$sql = "SELECT * FROM solicitudes WHERE id='$id'";
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
    <!-- <link rel="stylesheet" href="CSS/estilos.css"> -->
    <link rel="stylesheet" href="CSS/update.css">
    <link rel="stylesheet" href="../css/assets/css/styles.css">
    <link rel="stylesheet" href="../css/active.css">
    <title> Editar Solicitudes</title>

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

                    <a href="index.php" class="nav__link active" title="Solicitudes">
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
        <li><a href="../perfil_admin.php">Dashboard</a></li>
        <li><a href="index.php">Solicitudes</a></li>
        <li><a class="si" href="#">Editar</a></li>
    </ul>
    <br>
    <br>

    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="form-group">
                    <label for="nombre_mascota">Nombre Mascota</label>
                    <input type="text" id="nombre_mascota" name="nombre_mascota" placeholder="nombre_mascota"
                        value="<?= $row['nombre_mascota'] ?>">
                </div>

                <div class="form-group">
                    <label for="raza">Raza</label>
                    <input type="text" id="raza" name="raza" placeholder="Raza" value="<?= $row['raza'] ?>">
                </div>

                <div class="form-group">
                    <label for="tipo_mascota">Tipo Mascota</label>
                    <input type="text" id="tipo_mascota" name="tipo_mascota" placeholder="tipo_mascota"
                        value="<?= $row['tipo_mascota'] ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="nombre" value="<?= $row['nombre'] ?>">
                </div>

                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" placeholder="correo" value="<?= $row['correo'] ?>">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="telefono"
                        value="<?= $row['telefono'] ?>">
                </div>

                <div class="form-group">
                    <label for="nacimiento">Nacimiento</label>
                    <input type="text" id="nacimiento" name="nacimiento" placeholder="nacimiento"
                        value="<?= $row['nacimiento'] ?>">
                </div>

                <div class="form-group">
                    <label for="ocupacion">Ocupación</label>
                    <input type="text" id="ocupacion" name="ocupacion" placeholder="ocupacion"
                        value="<?= $row['ocupacion'] ?>">
                </div>

                <div class="form-group">
                    <label for="horario">Horario</label>
                    <input type="text" id="horario" name="horario" placeholder="horario" value="<?= $row['horario'] ?>">
                </div>

                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" id="genero" name="genero" placeholder="genero" value="<?= $row['genero'] ?>">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="direccion"
                        value="<?= $row['direccion'] ?>">
                </div>

                <div class="form-group">
                    <label for="direccion1">Dirección Alternativa</label>
                    <input type="text" id="direccion1" name="direccion1" placeholder="direccion1"
                        value="<?= $row['direccion1'] ?>">
                </div>

                <div class="form-group">
                    <label for="familia">Familia</label>
                    <input type="text" id="familia" name="familia" placeholder="familia" value="<?= $row['familia'] ?>">
                </div>

                <div class="form-group">
                    <label for="porque">Porqué</label>
                    <input type="text" id="porque" name="porque" placeholder="porque" value="<?= $row['porque'] ?>">
                </div>

                <div class="form-group">
                    <label for="mas_mascotas">Más Mascotas</label>
                    <input type="text" id="mas_mascotas" name="mas_mascotas" placeholder="mas_mascotas"
                        value="<?= $row['mas_mascotas'] ?>">
                </div>

                <div class="form-group">
                    <label for="pasaria">Pasaría</label>
                    <input type="text" id="pasaria" name="pasaria" placeholder="pasaria" value="<?= $row['pasaria'] ?>">
                </div>

                <div class="form-group">
                    <label for="situacion_casa">Situación Casa</label>
                    <input type="text" id="situacion_casa" name="situacion_casa" placeholder="situacion_casa"
                        value="<?= $row['situacion_casa'] ?>">
                </div>

                <div class="form-group">
                    <label for="hobbies">Hobbies</label>
                    <input type="text" id="hobbies" name="hobbies" placeholder="hobbies" value="<?= $row['hobbies'] ?>">
                </div>

                <div class="form-group">
                    <label for="consideras">Consideras</label>
                    <input type="text" id="consideras" name="consideras" placeholder="consideras"
                        value="<?= $row['consideras'] ?>">
                </div>

                <div class="form-group">
                    <label for="mas_personas">Más Personas</label>
                    <input type="text" id="mas_personas" name="mas_personas" placeholder="mas_personas"
                        value="<?= $row['mas_personas'] ?>">
                </div>

                <div class="form-group">
                    <label for="vacaciones">Vacaciones</label>
                    <input type="text" id="vacaciones" name="vacaciones" placeholder="vacaciones"
                        value="<?= $row['vacaciones'] ?>">
                </div>

                <div class="form-group">
                    <label for="espacio">Espacio</label>
                    <input type="text" id="espacio" name="espacio" placeholder="espacio" value="<?= $row['espacio'] ?>">
                </div>

                <div class="form-group">
                    <label for="con_quien">Con Quién</label>
                    <input type="text" id="con_quien" name="con_quien" placeholder="con_quien"
                        value="<?= $row['con_quien'] ?>">
                </div>

                <div class="form-group">
                    <label for="adoptar">Adoptar</label>
                    <input type="text" id="adoptar" name="adoptar" placeholder="adoptar" value="<?= $row['adoptar'] ?>">
                </div>

                <div class="form-group">
                    <label for="elegiste">Elegiste</label>
                    <input type="text" id="elegiste" name="elegiste" placeholder="elegiste"
                        value="<?= $row['elegiste'] ?>">
                </div>

                <div class="form-group">
                    <label for="amigo">Amigo</label>
                    <input type="text" id="amigo" name="amigo" placeholder="amigo" value="<?= $row['amigo'] ?>">
                </div>


                <input type="submit" value="Actualizar">
                <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
            </form>
        </div>
    </body>

</html>