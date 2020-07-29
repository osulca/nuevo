<?php
include_once "Usuarios.php";
include_once "menu.php";
echo "<h1>Crear Usuarios</h1>";
?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="username" placeholder="Ingrese nombre de usuario"><br>
        <input type="text" name="password" placeholder="Ingrese contraseña"><br>
        <input type="text" name="nombres" placeholder="Ingrese sus nombres"><br>
        <input type="text" name="apellidos" placeholder="Ingrese sus apellidos"><br>
        <input type="submit" name='guardar' value='guardar'>
    </form>
<?php
if (isset($_POST["guardar"])) {
    $usuario = new Usuarios();
    $usuario->setUsername($_POST["username"]);
    $usuario->setPassword($_POST["password"]);
    $usuario->setNombres($_POST["nombres"]);
    $usuario->setApellidos($_POST["apellidos"]);
    if($usuario->insertar()){
        echo "Se creo el usuario";
    }else{
        echo "Error, el usuario no pudo ser creado";
    }
}