<?php

session_start();
if (empty($_SESSION["email"])) {

    header("Location: index.php");

    exit();
}
?>

<?php
include("../gatos/connection.php");
$con = connection();

$sql = "SELECT * FROM gatos WHERE id = 6";
$query = mysqli_query($con, $sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boo</title>

    <link href="../img/logos/LOGO.png" rel="icon">

    <link rel="stylesheet" href="../css/vermas.css">
    <link rel="stylesheet" href="../css/styleindex.css">
    <link rel="stylesheet" href="../css/styleWyM.css">
    <link rel="stylesheet" href="../css/iniciosesion.css">

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</head>

<!--Header - menu-->
<header>

    <div class="header-content">

        <div class="logo">
            <h1>Ado<b>Pet</b></h1>
        </div>

        <div class="menu" id="show-menu">

            <nav>
                <ul>
                    <li><a href="../Adopet.php"> <i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="../iniciosesion/adoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                    <li><a href="../iniciosesion/mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                    <li><a href="../iniciosesion/contacto.php"> <i class="fas fa-file-alt"></i>Contacto</a></li>
                    <!-- <li><a href="../login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ion-icon name="person-outline"></ion-icon></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                                <div class="dropdown-divider"></div>
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

    <div class="container-title">Gatos</div>

    <main>

    <?php while ($row = mysqli_fetch_array($query)): ?>
        <div class="container-img">
            <th><img src="../img/mascotasF/<?php echo $row['imagen']; ?>"></th>
        </div>
        <div class="container-info-product">
            <div class="container-price">
                <span><th><?= $row['nombre'] ?></th></span>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="container-add-cart">
            <button class="btn-add-to-cart"> <a href="../mascotas.php"><i class="fa-solid fa-plus"></i> Ver más </a> </button> 
            <button class="btn-add-to-cart"> <a href="../iniciosesion/formulario.php"><i class="fa-solid fa-heart-circle-plus"></i> Adoptar </a> </button> 
            </div> 

                        <!-- parte del formulario -->
                        
                    
                    <div class="container-description">
                        <div class="title-description">
                            <h4>Descripción</h4>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>    
                        <div class="text-description">
                            <p><th><?= $row['descripcion'] ?></th></p>
                        </div>
                    </div>
                
                    <div class="container-additional-information">
                        <div class="title-additional-information">
                            <h4>Información adicional</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                        </div>
        
                        <div class="text-additional-information hidden">
                            
                            <p>Raza: <th><?= $row['raza'] ?></th></p>
                            <p>Edad: <th><?= $row['edad'] ?></th> años </p>
                            <p>Sexo: <th><?= $row['sexo'] ?></th></p>
                            <p>Temperamento: <th><?= $row['temperamento'] ?></th></p>
                            <p>Salud: <th><?= $row['salud'] ?></th></p>
                        </div>
                    </div>
                                
                    <div class="container-reviews">
                        <div class="title-reviews">
                            <h4>Cuidados especificos</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="text-reviews hidden">
                            <p><th><?= $row['cuidados'] ?></th></p>
                        </div>
                    </div>
                <?php endwhile; ?>


            <div class="container-social">
                <span>Compartir</span>
                <div class="container-buttons-social">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </main>

        <script src="../js/ocultar.js"></script>

    <section class="container-related-products">
        <h2>Mascotas Relacionados</h2>
        <div class="card-list-products">
            <div class="card">
                <div class="card-img">
                    <a href="snow.php"><img src="../img/mascotasF/Snow.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <!-- <a href="login.php"> <h3>Zero - Rottweiler</h3> </a> -->
                        <h3>Snow - Conejo Mini Lop</h3>
                        <p class="category">Cariñoso, Alegre</p>
                    </div>
                    <!-- <div class="price">$85.00</div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                <a href="gatsby.php"><img src="../img/mascotasF/Gatsby.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <h3>Gatsby - miau</h3>
                        <p class="category">Inquieto, Energico</p>
                    </div>
                    <!-- <div class="price">$255.00</div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                <a href="lu.php"><img src="../img/mascotasF/lu.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <h3>Lu - Gato Persa</h3>
                        <p class="category">Obediente, Protector</p>
                    </div>
                    <!-- <div class="price">$105.00</div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                <a href="kiki.php"><img src="../img/mascotasF/Kiki.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <h3>Kiki - Gato British Shorthair</h3>
                        <p class="category">Dormilon</p>
                    </div>
                    <!-- <div class="price">$250.00</div> -->
                </div>
            </div>
        </div>
    </section>

    <script src="../js/vermas.js"></script>
</body>


    <!-- div del contacto de abajo derecha -->
    <div class="container-redes">
        <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">    
            <img src="../img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
        </a>
        
        <a href="http://m.me/themagtimus" target="_blank">
            <img src="../img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
        </a>
    </div>

    <!-- pie de la pagina -->
    <div class="container-footer">	
        <footer>
            <div class="logo-footer">
                <img src="../img/logos/LOGO.png" alt="">
            </div>

            <div class="redes-footer">
                <a href="#"><i class="fab fa-facebook-f icon-redes-footer"></i></a>
                <!-- <a href="#"><i class="fab fa-google icon-redes-footer"></i></a>  -->
                <a href="#"><i class="fab fa-instagram icon-redes-footer"></i></a>
                <a href="#"><i class="fab fa-whatsapp icon-redes-footer"></i></a>
            </div>

            <hr>
            <h4>© 2024 Erick Barahona - Todos los Derechos Reservados</h4>

    </footer>
    </div> <!--fin del footer -->


</html>