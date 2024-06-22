<?php
// Incluye el archivo de conexión a la base de datos
include("Perros/connection.php");
$con = connection();

$sql = "SELECT * FROM mascotas";

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuestras Mascotas</title>
    <link href="img/logos/LOGO.png" rel="icon">
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleWyM.css">
    <link rel="stylesheet" href="css/cards.css">
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header - menu-->
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>Ado<b>Pet</b></h1>
            </div>
            <div class="menu" id="show-menu">
                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="comoadoptar.php"><i class="fab fa-adopta"></i> ¿Cómo adoptar?</a></li>
                        <li class="menu-selected"><a href="mascotas.php" class="text-menu-selected"><i class="fas fa-file-alt"></i> Mascotas</a></li>
                        <li><a href="contacto.php"><i class="fas fa-headset"></i> Contacto</a></li>
                        <li><a href="login.php"><i class="fas fa-file-alt"></i> Login/Registro</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="icon-menu">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <!-- Portada de inicio -->
    <div class="container__about div__offset">
        <div class="about">
            <div class="text__about">
                <h1>¡Encuentra a tu nuevo mejor amigo!</h1>
                <p>En nuestro refugio, tenemos una variedad de mascotas adorables que están buscando un hogar amoroso. Cada una de estas mascotas tiene una historia única y está ansiosa por encontrar a su compañero humano perfecto. ¡Considera la adopción y sé parte de su historia!</p>
                <a href="comoadoptar.php" class="btn__text-about btn__text" title="¿Cómo adoptar?">Adoptar</a>
            </div>
            <div class="image_about">
                <img src="img/mascotas.png" alt="">
            </div>
        </div>
    </div>

    <!-- Filtro -->
    <div class="container-post">
        <!-- <input type="radio" id="TODOS" name="categories" value="TODOS" checked>
        <input type="radio" id="perros" name="categories" value="perros">
        <input type="radio" id="gatos" name="categories" value="gatos">
        <input type="radio" id="conejos" name="categories" value="conejos">
        <input type="radio" id="aves" name="categories" value="aves">

        <div class="container-category">
            <label for="TODOS">Todos</label>
            <label for="perros">Perros</label>
            <label for="gatos">Gatos</label>
            <label for="conejos">Conejos</label>
            <label for="aves">Aves</label>
        </div> -->

        <div class="posts">
            <?php while ($row = mysqli_fetch_array($query)): ?>
            <div class="post">
                <div class="ctn-img">
                    <img src="img/mascotasF/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
                </div>
                <h2><?php echo $row['nombre']; ?></h2>
                <span>Edad: <?php echo $row['edad']; ?></span>
                <span>Raza: <?php echo $row['raza']; ?></span>
                <span>Sexo: <?php echo $row['sexo']; ?></span>
                <ul class="ctn-tag">
                    <li><?php echo $row['comentario']; ?></li>
                </ul>
                <a href="listamascotas/perfil_mascotas.php?id=<?php echo $row['id']; ?>"><button>Ver Más</button></a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Redes sociales -->
    <div class="container-redes">
        <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">
            <img src="img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
        </a>
        <a href="" target="_blank">
            <img src="img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
        </a>
    </div>
    
    <!-- Pie de la página -->
    <div class="container-footer">
        <footer>
            <div class="logo-footer">
                <img src="img/logos/LOGO.png" alt="">
            </div>
            <div class="redes-footer">
                <a href="https://www.facebook.com/profile.php?id=61560919176195" target="_blank"><i class="fab fa-facebook-f icon-redes-footer"></i></a>
                <!-- <a href="#"><i class="fab fa-google icon-redes-footer"></i></a>  -->
                <a href="https://www.instagram.com/adopet.sb/" target="_blank"><i class="fab fa-instagram icon-redes-footer"></i></a>
                <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank"><i class="fab fa-whatsapp icon-redes-footer"></i></a>
            </div>
            <hr>
            <h4>© 2024 Erick Barahona - Todos los Derechos Reservados</h4>
        </footer>
    </div>
</body>
</html>

