<?php

class DBConexion{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "prueba";

    private $myConn = null;

    protected function conexion(){
        $this->myConn = new mysqli($this->host, $this->username, $this->password, $this->db);
        return $this->myConn;
    }

    protected function cerrar(): void{
        if($this->myConn != null){
            $this->myConn->close();
        }
    }

}