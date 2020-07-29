<?php
include_once "Usuarios.php";
$usuario = new Usuarios();

if(isset($_POST["eliminar"])){
    $id = $_POST["id"];
    if($usuario->eliminar($id)){
        header("location: mostrarUsuarios.php");
    }else{
        echo "<h3 style='color: red'>No se pudo eliminar</h3>";
    }
}