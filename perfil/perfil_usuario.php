<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM perfilusuario";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfil Usuario</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="css/custom.css">
    <link rel=icon href="img/logos/LOGO.png">
</head>

<body>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <form method="post" id="perfil">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">

                    <div class="panel panel-success"><br>
                        <h2 class="panel-title">
                            <center>
                                <font size="5"><i class='glyphicon glyphicon-user'></i>PERFIL</font>
                            </center>
                        </h2>

                        <div class="panel-body">
                            <div class="row">

                            <?php while ($row = mysqli_fetch_array($query)): ?>
                                <div class="col-md-3 col-lg-3 " align="center">
                                    <div id="load_img">
                                        <img class="img-responsive" src="<?php echo $row['logo_url']; ?>" alt="Logo">

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class='filestyle' data-buttonText="Logo" type="file"
                                                    name="imagefile" id="imagefile" onchange="upload_image();">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td class='col-md-3'>Nombres Completo:</td>
                                                <td><input type="text" class="form-control input-sm"
                                                        name="nombre_completo"
                                                        value="<?php echo $row['nombre_completo'] ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td>Correo electrónico:</td>
                                                <td><input type="email" class="form-control input-sm" name="correo"
                                                        value="<?php echo $row['correo'] ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td>Telefono:</td>
                                                <td><input type="tel" class="form-control input-sm" name="telefono"
                                                        value="<?php echo $row['telefono'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha de nacimiento:</td>
                                                <td><input type="date" class="form-control input-sm" required
                                                        name="fecha_nacimineto" value="<?php echo $row['fecha_nacimineto'] ?>"></td>
                                            </tr>

                                            <tr>
                                                <td>Ocupacion:</td>
                                                <td><input type="text" class="form-control input-sm" required
                                                        name="ocupacion" value="<?php echo $row['ocupacion'] ?>"></td>
                                            </tr>

                                            <tr>
                                                <td>Horiario:</td>
                                                <td><input type="text" class="form-control input-sm" name="horario"
                                                        value="<?php echo $row["horario"]; ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td>Genero:</td>
                                                <td><input type="text" class="form-control input-sm" name="genero"
                                                        value="<?php echo $row["genero"]; ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td>Direccion:</td>
                                                <td><input type="text" class="form-control input-sm"
                                                        name="direccion"
                                                        value="<?php echo $row["direccion"]; ?>"></td>
                                                <td><input type="text" class="form-control input-sm"
                                                        name="direccion1"
                                                        value="<?php echo $row["direccion1"]; ?>"></td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Expectativas</td>
                                                <td><input type="text" class="form-control input-sm" name="expectativa"
                                                        value="<?php echo $row["expectativa"]; ?>"></td>
                                            </tr> -->

                                        </tbody>
                                    </table>

                                </div>
                                <?php endwhile; ?>
                                <div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
                            </div>
                        </div>
                        <div class="panel-footer text-center">

                            <button type="submit" class="btn btn-sm btn-success"><i
                                    class="glyphicon glyphicon-refresh"></i> Actualizar hoja de vida</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>