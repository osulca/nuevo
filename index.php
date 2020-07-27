<?php
    include_once "Usuarios.php";
    $usuario = new Usuarios();

    if(isset($_POST["actualizar"])){
        $resUsuario = $usuario->mostrarUsuariosPorId($_POST["id"]);
        $datosUsuario = $resUsuario->fetch_assoc();
    }
?>
<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="text" name="username" placeholder="Ingrese nombre de usuario"
        <?php
        if(isset($_POST["actualizar"])){
            echo "value = '".$datosUsuario["username"]."'";
        }
        ?>
    ><br>
    <input type="text" name="password" placeholder="Ingrese contraseña"
        <?php
        if(isset($_POST["actualizar"])){
            echo "value = '".$datosUsuario["password"]."'";
        }
        ?>
    ><br>
    <input type="text" name="nombres" placeholder="Ingrese sus nombres"
        <?php
        if(isset($_POST["actualizar"])){
            echo "value = '".$datosUsuario["nombres"]."'";
        }
        ?>
    ><br>
    <input type="text" name="apellidos" placeholder="Ingrese sus apellidos"
        <?php
        if(isset($_POST["actualizar"])){
            echo "value = '".$datosUsuario["apellidos"]."'";
        }
        ?>
    ><br>
    <input type="submit" name="guardar" value="guardar">
</form>
<?php
echo "<table border='1'>" .
    "<tr>
            <th>#</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>";
$resultados = $usuario->mostrarUsuarios2();
if ($resultados->num_rows != 0) {
    for ($i = 0; $i < $resultados->num_rows; $i++) {
        $data = $resultados->fetch_assoc();
        echo "<tr>
            <td>" . ($i + 1) . "</td>
            <td>" . $data["username"] . "</td>
            <td>" . $data["password"] . "</td>
            <td>" . $data["nombres"] . "</td>
            <td>" . $data["apellidos"] . "</td>
            <td>
                <form method='post' action='index.php'>
                    <input type='hidden' name='id' value='".$data["id"]."'>
                    <input type='submit' name='actualizar' value='actualizar'>
                </form>                
            </td>
            <td>
                <form method='post' action='eliminar.php'>
                    <input type='hidden' name='id' value='".$data["id"]."'>
                    <input type='submit' name='eliminar' value='eliminar'>
                </form>
            </td>
        <tr>";
    }
}else{
    echo "<tr>
            <td colspan='7'>No existen resultados</td>
          </tr>";
}
echo "</table>";

if(isset($_POST["guardar"])){
    $usuario->setUsername($_POST["username"]);
    $usuario->setPassword($_POST["password"]);
    $usuario->setNombres($_POST["nombres"]);
    $usuario->setApellidos($_POST["apellidos"]);
    if($usuario->insertar()){
        header("location: index.php");
    }else{
        echo "<h3 style='color: red'>No se pudo insertar</h3>";
    }
}

