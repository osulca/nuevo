<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="text" name="username" placeholder="Ingrese nombre de usuario"><br>
    <input type="text" name="password" placeholder="Ingrese contraseña"><br>
    <input type="text" name="nombres" placeholder="Ingrese sus nombres"><br>
    <input type="text" name="apellidos" placeholder="Ingrese sus apellidos"><br>
    <input type="submit" name="guardar" value="guardar">
</form>
<?php
include_once "Usuarios.php";
$usuario = new Usuarios();
//$usuario->mostrarUsuarios1();
//$usuario->mostrarUsuarios2();
echo "<table border='1'>" .
    "<tr>
            <th>#</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>" .
    "<tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
                <input type='submit' name='actualizar' value='actualizar'>
            </td>
            <td>
                <input type='submit' name='eliminar' value='eliminar'>
            </td>
        <tr>" .
    "</table>";