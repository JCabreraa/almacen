<?php
//conexion a la base de datos
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";
$bdname = "almacen";
$conn = new mysqli ($servername, $username, $password, $bdname);

//verificar conexion
if ($conn->connect_error){
    die("Conexion Fallida: " . $conn->connect_error);
}
?>