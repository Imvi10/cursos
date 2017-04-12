<?php
class Categoria{

	private $id;
	private $nombre; 

	public function __construct($categoria){
		$this->id = $categoria->id;
		$this->nombre = $categoria->nombre;
	}

	
	if (isset($categoria['id'])) {
            $this->categoria = $propuestaArray['id'];
        }
	
	if (isset($categoria['nombre'])) {
            $this->categoria = $propuestaArray['nombre'];
        }

     public function getId(){
     	return $this->id;
     }

     public function setId($id){
     	$this->id = $id;
     }


     public function getNombre(){
     	return $this->nombre;
     }

     public function($nombre){
     	$this->nombre = $nombre;
     }


     public function add(){
     	 $connection = DBConnection::getConnection();

        $query = "INSERT INTO categorias VALUES( "
                . "null, "
                . "$this->id, "
                . "'$this->nombre',"
                . " );";

        if (mysqli_query($connection, $query)) {
            $this->id = $connection->insert_id;
            return TRUE;
        } else {
            return FALSE;
        }	
     }


     public function getAll(){
     	$connection = DBConnection::getConnection();
     	$query = "SELECT * FROM Categorias c"
        if (@$result = mysqli_query($connection, $query)) {
            $categoria = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($categoria, new Categoria($row));
            }
            return $categoria;
        }
        return NULL;
     }
}

?>
