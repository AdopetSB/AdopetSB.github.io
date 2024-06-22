<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>

<?php 
    include("connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM mascotas WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../img/logos/LOGO.png" rel="icon">
        <!-- ===== CSS ===== -->
        <!-- <link rel="stylesheet" href="CSS/estil.css"> -->
        <link rel="stylesheet" href="CSS/update.css">
        <link rel="stylesheet" href="../css/assets/css/styles.css">
        <link rel="stylesheet" href="../css/active.css">
        <title> Editar Mascotas</title>
        
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

                        <a href="../lista_mascotas.php" class="nav__link active" title="Mascotas">
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
            <li><a href="">Mascotas</a></li>
            <li><a href="index.php">Perros</a></li>
            <li><a class="si" href="#">Editar</a></li>
        </ul>
        <br>
        <br>
</head>
<body>
    <div class="users-form">
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']?>">

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control-file" id="imagen" value="<?= $row['imagen']?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>">
            </div>
            <div class="form-group">
                <label for="raza">Raza</label>
                <input type="text" name="raza" class="form-control" id="raza" placeholder="Raza" value="<?= $row['raza']?>">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" name="edad" class="form-control" id="edad" placeholder="Edad" value="<?= $row['edad']?>">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" name="sexo" class="form-control" id="sexo" placeholder="Sexo" value="<?= $row['sexo']?>">
            </div>
            <div class="form-group">
                <label for="temperamento">Temperamento</label>
                <input type="text" name="temperamento" class="form-control" id="temperamento" placeholder="Temperamento" value="<?= $row['temperamento']?>">
            </div>
            <div class="form-group">
                <label for="salud">Salud</label>
                <input type="text" name="salud" class="form-control" id="salud" placeholder="Salud" value="<?= $row['salud']?>">
            </div>
            <div class="form-group">
                <label for="cuidados">Cuidados</label>
                <input type="text" name="cuidados" class="form-control" id="cuidados" placeholder="Cuidados" value="<?= $row['cuidados']?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="<?= $row['descripcion']?>">
            </div>
            <div class="form-group">
                <label for="comentario">Comentario</label>
                <input type="text" name="comentario" class="form-control" id="comentario" placeholder="Comentario" value="<?= $row['comentario']?>">
            </div>

            <input type="submit" class="btn btn-primary" value="Actualizar">
            <input type="button" class="btn btn-secondary" onclick="history.back()" name="volver atrás" value="Volver atrás">
        </form>
    </div>
</html>