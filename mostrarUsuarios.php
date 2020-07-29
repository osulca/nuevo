<?php
include_once "Usuarios.php";
include_once "menu.php";
$usuario = new Usuarios();
$resultados = $usuario->mostrarUsuarios2();
$numero_filas = $resultados->num_rows;

echo "<h1>Mostrar Usuarios</h1>";
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
if ($numero_filas != 0) {
    for ($i = 0; $i < $numero_filas; $i++) {
        $user = $resultados->fetch_assoc();
        echo "<tr>
            <td>" . ($i + 1) . "</td>
            <td>" . $user["username"] . "</td>
            <td>" . $user["password"] . "</td>
            <td>" . $user["nombres"] . "</td>
            <td>" . $user["apellidos"] . "</td>
            <td>
                <form method='post' action='actualizarUsuarios.php'>
                    <input type='hidden' name='id' value='".$user["id"]."'>
                    <input type='submit' name='actualizar' value='actualizar'>
                </form>                
            </td>
            <td>
                <form method='post' action='eliminarUsuarios.php'>
                    <input type='hidden' name='id' value='".$user["id"]."'>
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