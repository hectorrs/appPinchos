<?php
	class Pincho extends BaseModel{
		private $idPincho;
		private $nombre;
		private $descripcion;
		private $ingredientes;
		private $foto;
		private $precio;
		private $nombreConcurso;
		private $estado;
		private $nombreEstablecimiento;

		public function _construct($idPincho = NULL, $nombre = NULL, $descripcion = NULL, $ingredientes = NULL, $foto = NULL, $precio = NULL, $nombreConcurso = NULL, $estado = NULL, $nombreEstablecimiento = NULL){
			$this->idPincho = $idPincho;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->ingredientes = $ingredientes;
			$this->foto = $foto;
			$this->precio = $precio;
			$this->nombreConcurso = $nombreConcurso;
			$this->estado = $estado;
			$this->nombreEstablecimiento = $nombreEstablecimiento;
		}
		
		public function getIdPincho() {
    		return $this->idPincho;
  		}
		
		public function setIdPincho($idPincho) {
    		$this->idPincho=$idPincho;
  		}
		
		public function getNombre() {
    		return $this->nombre;
  		}
		
		public function setNombre($nombre) {
    		$this->nombre=$nombre;
  		}
		
		public function getDescripcion() {
    		return $this->descripcion;
  		}
		
		public function setDescripcion($descripcion) {
    		$this->descripcion=$descripcion;
  		}
		
		public function getIngredientes() {
    		return $this->ingrecientes;
  		}
		
		public function setIngredientes($ingredientes) {
    		$this->ingredientes=$ingredientes;
  		}
		
		public function getFoto() {
    		return $this->foto;
  		}
		
		public function setFoto($foto) {
    		$this->foto=$foto;
  		}
		
		public function getPrecio() {
    		return $this->precio;
  		}
		
		public function setPrecio($precio) {
    		$this->precio=$precio;
  		}
		
		public function getNombreConcurso() {
    		return $this->nombreConcurso;
  		}
		
		public function setNombreConcurso($nombreConcurso) {
    		$this->nombreConcurso=$nombreConcurso;
  		}
		
		public function getEstado() {
    		return $this->estado;
  		}
		
		public function setEstado($estado) {
    		$this->estado=$estado;
  		}
		
		public function getNombreEstablecimiento() {
    		return $this->nombreEstablecimiento;
  		}
		
		public function setNombreEstablecimiento($nombreEstablecimiento) {
    		$this->nombreEstablecimiento=$nombreEstablecimiento;
  		}
	}
?>