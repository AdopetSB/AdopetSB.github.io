<?php

session_start();

$usuario = $_SESSION['email'];

$estado = false;

if(isset($usuario)){
    $estado = true;
}


