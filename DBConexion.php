<?php

class DBConexion{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "prueba";

    protected function conexion(){
        $myConn = new mysqli($this->host, $this->username, $this->password, $this->db);
        return $myConn;
    }

}