<?php
include_once "DBConexion.php";
$DBConexion = new DBConexion();

$myConn = $DBConexion->conexion();
$sql = "SELECT * FROM estudiantes";
$resultados = $myConn->query($sql);
$DBConexion->cerrar();

while($estudiante = $resultados->fetch_assoc()){
    echo $estudiante["nombres"]." | ".$estudiante["apellidos"]." | ";

    $myConn = $DBConexion->conexion();
    $sql = "SELECT nombre FROM pa WHERE id=".$estudiante['id_pa'];
    $resultados2 = $myConn->query($sql);
    $DBConexion->cerrar();

    $nombre_pa="";
    while($pa = $resultados2->fetch_assoc()){
        $nombre_pa = $pa["nombre"];
    }

    echo $nombre_pa."<br>";
}

echo "<p></p><p></p>";

$myConn = $DBConexion->conexion();
$sql = "SELECT e.nombres, e.apellidos, pa.nombre 
        FROM estudiantes as e
        INNER JOIN pa as pa
        ON e.id_pa = pa.id
        ORDER BY e.id_pa ASC";
$resultados3 = $myConn->query($sql);
$DBConexion->cerrar();

while($estudiante2 = $resultados3->fetch_assoc()){
    echo $estudiante2["nombres"]." | ".$estudiante2["apellidos"]." | ".$estudiante2["nombre"]."<br>";
}