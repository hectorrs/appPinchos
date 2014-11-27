<?php
 class Jurado{
	 
	 //datos jurado
 	private $usuario;
	private $pass;
	private $email;
	private $nombre;
	private $apellidos;
	private $telefono;
	
	public function __construct($usuario=NULL, $pass=NULL, $email=NULL, $nombre=NULL, $apellidos=NULL, $telefono=NULL) {
		
    	//rellenamos los datos referentes al jurado
		$this->usuario = $usuario;
    	$this->pass = $pass;  
		$this->email = $email;    
		$this->nombre = $nombre;    
		$this->apellidos = $apellidos;    
		$this->telefono = $telefono;   

  	}
	
	//Funciones get y set de los datos referentes al jurado.
	public function getUsuario() {
    	return $this->usuario;
  	}
	
	public function getPass() {
    	return $this->pass;
  	}
	
	public function getEmail() {
    	return $this->email;
  	}
	
	public function getNombre() {
    	return $this->nombre;
  	}
	
	public function getApellidos() {
    	return $this->apellidos;
  	}
	
	public function getTelefono() {
    	return $this->telefono;
  	}
	
	public function setUsuario($usuario) {
    	$this->usuario = $usuario;
  	}
	
	public function setPass($pass) {
    	$this->pass = $pass;
  	}
	
	public function setEmail($email) {
    	$this->email = $email;
  	}
	
	public function setNombre($nombre) {
    	$this->nombre = $nombre;
  	}
	
	public function setApellidos($apellido) {
    	$this->apellidos = $apellidos;
  	}
	
	public function setTelefono($telefono) {
    	$this->telefono = $telefono;
  	}
	
 }

?>