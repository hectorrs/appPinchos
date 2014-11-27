<?php
	class Voto extends BaseModel{
		// Atributos
		private $idVoto;
		private $idPincho;
		private $idJurado;
		private $puntuacion;
		private $categoria;
		
		// Constructor
		public function __construct($idVoto = NULL, $idPincho = NULL, $idJurado = NULL, $puntuacion = NULL, $categoria = NULL){
			$this->idVoto = $idVoto;
			$this->idPincho = $idPincho;
			$this->idJurado = $idJurado;
			$this->puntuacion = $puntuacion;
			$this->categoria = $categoria;
		}
		
		// Getters and setters
		public function getIdVoto(){
			return $this->idVoto;
		}
		
		public function getIdPincho(){
			return $this->idPincho;
		}
		
		public function getIdJurado(){
			return $this->idJurado;
		}
		
		public function getPuntuacion(){
			return $this->puntuacion;
		}
		
		public function getCategoria(){
			return $this->categoria;
		}
		
		public function setIdVoto($idVoto){
			$this->idVoto = $idVoto;
		}
		
		public function setIdPincho($idPincho){
			$this->idVoto = $idPincho;
		}
		
		public function setIdJurado($idJurado){
			$this->idVoto = $idJurado;
		}
		
		public function setPuntuacion($puntuacion){
			$this->idVoto = $puntuacion;
		}
		
		public function setCategoria($categoria){
			$this->idVoto = $categoria;
		}
	}
?>