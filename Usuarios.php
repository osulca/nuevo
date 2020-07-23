<?php

include_once "DBConexion.php";
class Usuarios extends DBConexion
{
    public function mostrarUsuarios1(){
            //opcion 1: fetch_all()
            $myConn = $this->conexion();
            echo "<h1>Opcion 2</h1>";
            $resultados = $myConn->query("SELECT * FROM usuarios");
            $data = $resultados->fetch_all();

            foreach ($data as $usuario) {
                echo "id:" . $usuario[0] . "<br>" .
                    "Nombres:" . $usuario[3] . "<br>" .
                    "Apellidos:" . $usuario[4] . "<br>";
            }
    }

    public function mostrarUsuarios2(){
        //opcion 2: fetch_assoc()
        $myConn = $this->conexion();
        echo "<h1>Opcion 1</h1>";
        $resultados = $myConn->query("SELECT * FROM usuarios");

        for ($i = 0; $i < $resultados->num_rows; $i++) {
            $data = $resultados->fetch_assoc();
            echo "id:" . $data["id"] . "<br>" .
                "Nombres:" . $data["nombres"] . "<br>" .
                "Apellidos:" . $data["apellidos"] . "<br>";
        }
    }
}