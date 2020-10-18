<?php

class DBConexion{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "otraudh";

    private $myConn = null;

    public function conexion(){
        $this->myConn = new mysqli($this->host, $this->username, $this->password, $this->db);
        return $this->myConn;
    }

    public function cerrar(): void{
        if($this->myConn != null){
            $this->myConn->close();
        }
    }

}