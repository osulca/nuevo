<?php
include_once "Usuarios.php";
include_once "menu.php";
$usuario = new Usuarios();
$id = $_POST["id"];
$resultados = $usuario->mostrarUsuariosPorId($id);
$datos = $resultados->fetch_assoc();

    echo "<h1>Actualizar Usuarios</h1>";
    ?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="username" placeholder="Ingrese nombre de usuario" value="<?= $datos["username"] ?>"><br>
        <input type="text" name="password" placeholder="Ingrese contraseña" value="<?= $datos["password"] ?>"><br>
        <input type="text" name="nombres" placeholder="Ingrese sus nombres" value="<?= $datos["nombres"] ?>"><br>
        <input type="text" name="apellidos" placeholder="Ingrese sus apellidos" value="<?= $datos["apellidos"] ?>"><br>
        <input type="hidden" name="id" value="<?= $datos["id"] ?>"><br>
        <input type="submit" name='actualizar2' value='Actualizar'>
    </form>
<?php
if(isset($_POST["actualizar2"])){
    $usuario->setId($_POST["id"]);
    $usuario->setUsername($_POST["username"]);
    $usuario->setPassword($_POST["password"]);
    $usuario->setNombres($_POST["nombres"]);
    $usuario->setApellidos($_POST["apellidos"]);
    if($usuario->actualizar()){
        header("location: mostrarUsuarios.php");
    }else{
        echo "<h3 style='color: red'>No se pudo actualizar</h3>";
    }
}
