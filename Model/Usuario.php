<?php

namespace Model;

use DB\DBConnection;

class Usuario {

    private $id;
    private $idTipo;
    private $correo;
    private $nombre;
    private $pass;
    private $creditos;
    private $noCuenta;
    private $activo;

    function __construct($userArray) {
        if (isset($userArray['id'])) {
            $this->id = $userArray['id'];
        }

        if (isset($userArray['idTipo'])) {
            $this->idTipo = $userArray['idTipo'];
        }

        if (isset($userArray['correo'])) {
            $this->correo = $userArray['correo'];
        }

        if (isset($userArray['nombre'])) {
            $this->nombre = $userArray['nombre'];
        }

        if (isset($userArray['pass'])) {
            $this->pass = $userArray['pass'];
        }

        if (isset($userArray['creditos'])) {
            $this->creditos = $userArray['creditos'];
        } else {
            $this->creditos = 0;
        }

        if (isset($userArray['noCuenta'])) {
            $this->noCuenta = $userArray['noCuenta'];
        } else {
            $this->noCuenta = null;
        }

        if (isset($userArray['activo'])) {
            $this->activo = $userArray['activo'];
        }
    }

    /* --    Model methods    -- */

    public function add() {
        $connection = DBConnection::getConnection();

        $query = "INSERT INTO usuarios VALUES( "
                . "null, "
                . "$this->idTipo, "
                . "'$this->correo', "
                . "'$this->nombre', "
                . "'$this->pass', "
                . "$this->creditos, "
                . "1,"
                . "'$this->noCuenta' "
                . " );";

        if (mysqli_query($connection, $query)) {
            $this->id = $connection->insert_id;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function getAllTable($search = "", $type = 1) {
        $connection = DBConnection::getConnection();

        $query = "SELECT u.*,tu.nombre as tipo FROM usuarios u "
                . "INNER JOIN tipousuario tu ON u.idTipo=tu.id "
                . "WHERE ";
        $query.="u.nombre like '%$search%' ";
        if ($type != 0) {
            $query.="AND tu.id=$type ";
        }
        $query.="AND activo=1 ";

        if (@$result = mysqli_query($connection, $query)) {
            $users = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($users, ($row));
            }

            return $users;
        }
        return NULL;
    }

    public function validate() {
        $connection = DBConnection::getConnection();
        $user=array();
        
        $query = "SELECT * FROM usuarios "
                . "WHERE activo=1 "
                . "AND correo='$this->correo' "
                . "AND pass='$this->pass' "
                . ";";
        
        if (@$result = mysqli_query($connection, $query)) {

            if ($row = mysqli_fetch_assoc($result)) {
                $user=$row;
            } else{
                $user=null;
            }

        } else{
            $user=null;
        }
        
        return $user;
    }

    /* --    Getters and setters    -- */

    public function getId() {
        return $this->id;
    }

    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function getNoCuenta() {
        return $this->noCuenta;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPass($pass) {
        $this->pass = md5($pass);
    }

    public function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

    public function setNoCuenta($noCuenta) {
        $this->noCuenta = $noCuenta;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

}
