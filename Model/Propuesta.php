<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Propuesta{
	private id;
	private idUsuario; 
	private idCategoria; 
	private nombre; 
	private descripcion;
	private status; 

	function __construct($propuestaArray) {
        if (isset($propuestaArray['id'])) {
            $this->id = $propuestaArray['id'];
        }

        if (isset($propuestaArray['idUsuario'])) {
            $this->idUsuario = $propuestaArray['idUsuario'];
        }

        if (isset($propuestaArray['idCategoria'])) {
            $this->idCategoria = $propuestaArray['idCategoria'];
        }

        if (isset($propuestaArray['nombre'])) {
            $this->nombre = $propuestaArray['nombre'];
        }

        if (isset($propuestaArray['descripcion'])) {
            $this->descripcion = $propuestaArray['descripcion'];
        }

        if (isset($propuestaArray['status'])) {
            $this->status = $propuestaArray['status'];
        } 
    }

    public function add() {
        $connection = DBConnection::getConnection();

        $query = "INSERT INTO propuesta VALUES( "
                . "null, "
                . "$this->idUsuario, "
                . "'$this->idCategoria', "
                . "'$this->nombre', "
                . "'$this->descripcion', "
                . "1"
                . " );";

        if (mysqli_query($connection, $query)) {
            $this->id = $connection->insert_id;
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public static function getAll() {
        $connection = DBConnection::getConnection();

        $query = "SELECT p.* FROM propuesta p  "
                . "WHERE ";
        $query.="p.status = 1 ";
        if (@$result = mysqli_query($connection, $query)) {
            $propuestas = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($propuestas, new Propuesta($row));
            }
            return $propuestas;
        }
        return NULL;
    }
    
    public function validar($id , $action){
    	$connection = DBConnection::getConnection();
    	if($action === "aprobar"){
    	$query = "UPDATE Propuesta set status = 2 where id = $id";
		}else if($action === "rechazar"){
    	$query = "UPDATE Propuesta set status = 0 where id = $id";
		}
    	if(mysql_query($connection,$query)){
    		 return TRUE;
        } else {
            return FALSE;
    	}
    }

    public function getId(){
    	return $this->id;
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getIdUsuario(){
    	return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
    	$this->idUsuario = $idUsuario;
    }

    public function getIdCategoria(){
    	return $this->idCategoria;
    }

   public function setIdCategoria($idCategoria){
   		$this->idCategoria = $idCategoria
   }

   public function getNombre(){
   		$this->nombre = $nombre;
   }

   public function setNombre($nombre){
   		$this->nombre = $nombre;
   }

   public function getDescripcion(){
   		return $this->descripcion;
   }
   public function setDescription($descripcion){
   		$this->descripcion = $descripcion;
   }

   public function getStatus(){
   		return $this->status;
   }

   public function setStatus($status){
   		$this->status;
   }

}

