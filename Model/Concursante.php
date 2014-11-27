<?php
 class Concursante{
	 
	 //datos referentes al establecimiento
 	private $nombre;
	private $direccion;
	private $horario;
	private $foto;
	private $web;
	private $telefono;
	
	//datos referentes al pincho que se propone
	
	private $pincho;
	private $descripcion;
	private $ingredientes;
	private $foto_pincho;
	private $precio;
	
	public function __construct($nombre=NULL, $direccion=NULL, $horario=NULL, $foto=NULL, $web=NULL, $telefono=NULL,$pincho=NULL,$descripcion=NULL,$ingredientes=NULL,$foto_pincho=NULL,$precio=NULL) {
    	//rellenamos los datos referentes al establecimiento
		$this->nombre = $nombre;
    	$this->direccion = $direccion;  
		$this->horario = $horario;    
		$this->foto = $foto;    
		$this->web = $web;    
		$this->telefono = $telefono;   
		
		//rellenamos los datos referentes al pincho
		$this->pincho = $pincho;
    	$this->descripcion = $descripcion;  
		$this->ingredientes = $ingredientes;    
		$this->foto_pincho = $foto_pincho;    
		$this->precio = $precio; 
  	}
	
	//Funciones get y set de los datos referentes al establecimiento.
	public function getNombre() {
    	return $this->nombre;
  	}
	
	public function getDireccion() {
    	return $this->direccion;
  	}
	
	public function getHorario() {
    	return $this->horario;
  	}
	
	public function getFoto() {
    	return $this->foto;
  	}
	
	public function getWeb() {
    	return $this->web;
  	}
	
	public function getTelefono() {
    	return $this->telefono;
  	}
	
	public function setNombre($nombre) {
    	$this->nombre=$nombre;
  	}
	
	public function setDireccion($direccion) {
    	$this->direccion=$direccion;
  	}
	
	public function setHorario($horario) {
    	$this->horario=$horario;
  	}
	
	public function setFoto($foto) {
    	$this->foto=$foto;
  	}
	
	public function setWeb($web) {
    	$this->web=$web;
  	}
	
	public function setTelefono($telefono) {
    	$this->telefono=$telefono;
  	}
	
	
	//Funciones get y set de los datos referentes al pincho.
	public function getPincho() {
    	return $this->pincho;
  	}
	
	public function getDescripcion() {
    	return $this->descripcion;
  	}
	
	public function getIngredientes() {
    	return $this->ingredientes;
  	}
	
	public function getFoto_Pincho() {
    	return $this->foto_pincho;
  	}
	
	public function getPrecio() {
    	return $this->precio;
  	}
	
	public function setPincho($pincho) {
    	$this->pincho=$pincho;
  	}
	
	public function setDescripcion($descripcion) {
    	$this->descripcion=$descripcion;
  	}
	
	public function setIngredientes($ingredientes) {
    	$this->ingredientes=$ingredientes;
  	}
	
	public function setFoto_Pincho($foto_pincho) {
    	$this->foto_pincho=$foto_pincho;
  	}
	
	public function setPrecio($precio) {
    	$this->precio=$precio;
  	}
	
 }

?>