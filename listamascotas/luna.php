<?php
include("../aves/connection.php");
$con = connection();

$sql = "SELECT * FROM aves WHERE id = 2";
$query = mysqli_query($con, $sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna</title>

    <link href="../img/logos/LOGO.png" rel="icon">

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/vermas.css">
    <link rel="stylesheet" href="../css/styleindex.css">
    <link rel="stylesheet" href="../css/styleWyM.css">
    <link rel="stylesheet" href="../css/alert.css">
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
                    <li><a href="../index.php"> <i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="../comoadoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                    <li><a href="../mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                    <li><a href="../contacto.php"> <i class="fas fa-file-alt"></i>Contacto</a></li>
                    <li><a href="../login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li>
                </ul>
            </nav>
            
        </div>

    </div>

    <div id="icon-menu">
        <i class="fas fa-bars"></i>
    </div>

</header>

    
    <div class="container-title">Aves</div>

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
        <div class="boton-modal">
            <label class="btn-add-to-cart" for="btn-modal"> <a href="../mascotas.php"><i class="fa-solid fa-plus"></i> Ver más </a> </la> 
            </div>
            <div class="boton-modal">
                <label class="btn-add-to-cart" for="btn-modal"> <i class="fa-solid fa-heart-circle-plus"></i> Adoptar </l> 
            </div>
        </div>
        <input type="checkbox" id="btn-modal">
        <div class="container-modal">
            <div class="content-modal">
                    <h2>¡Aviso!</h2>
                    <p>Debes iniciar sesión para poder adoptar.</p>
                <div class="btn-cerrar">
                    <label for="btn-modal">Cerrar</label>
                    <label for="btn-modal"><a href="../login.php">Iniciar Sesion</a></label>
                </div>
            </div>
                <label for="btn-modal" class="cerrar-modal"></label>
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
                            <p>Edad: <th><?= $row['edad'] ?></th> año</p>
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

    <section class="container-related-products">
        <h2>Mascotas Relacionados</h2>
        <div class="card-list-products">
            <div class="card">
                <div class="card-img">
                    <a href="../listamascotas/snow.php"><img src="../img/mascotasF/snow.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <!-- <a href="login.php"> <h3>Zero - Rottweiler</h3> </a> -->
                        <h3>Snow - Mini Lop</h3>
                        <p class="category">Cariñoso, Alegre</p>
                    </div>
                    <!-- <div class="price">$85.00</div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                <a href="../listamascotas/gatsby.php"><img src="../img/mascotasF/Gatsby.jpg" alt="producto-1" title="Ver más"/></a>
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
                <a href="../listamascotas/plumita.php"><img src="../img/mascotasF/Plumita.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <h3>Plumita - Guacamaya</h3>
                        <p class="category">Obediente, Protector</p>
                    </div>
                    <!-- <div class="price">$105.00</div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                <a href="../listamascotas/boo.php"><img src="../img/mascotasF/Boo.jpg" alt="producto-1" title="Ver más"/></a>
                </div>
                <div class="info-card">
                    <div class="text-product">
                        <h3>Boo - Gato British Shorthair</h3>
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