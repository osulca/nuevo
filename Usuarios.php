<?php

include_once "DBConexion.php";
class Usuarios extends DBConexion
{
    private $id;
    private $username;
    private $password;
    private $nombres;
    private $apellidos;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }


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
        $sql = "SELECT * FROM usuarios";
        $resultados = $myConn->query($sql);
        $this->cerrar();

        return $resultados;
    }

    public function mostrarUsuariosPorId(int $id){
        $myConn = $this->conexion();
        $sql = "SELECT * FROM usuarios WHERE id=$id";
        $resultados = $myConn->query($sql);
        $this->cerrar();

        return $resultados;
    }

    public function insertar(){
        $myConn = $this->conexion();
        $sql = "INSERT INTO usuarios(username, password, nombres, apellidos)
                VALUES ('$this->username', '$this->password', '$this->nombres', '$this->apellidos')";
        $resultados = $myConn->query($sql);

        $this->cerrar();

        return $resultados;
    }

    public function actualizar(){
        $myConn = $this->conexion();
        $sql = "UPDATE usuarios
                SET username = '$this->username', password = '$this->password', nombres = '$this->nombres', apellidos = '$this->apellidos'
                WHERE id=$this->id";
        $resultados = $myConn->query($sql);

        $this->cerrar();

        return $resultados;
    }

    public function eliminar(int $id){
        $myConn = $this->conexion();
        $sql = "DELETE FROM usuarios WHERE id=$id";
        $resultados = $myConn->query($sql);

        $this->cerrar();

        return $resultados;
    }
}