<?php
	class Voto{
		private $idVoto;
		private $puntuacion;
		private $idPincho;
		private $idJurado;
		private $categoria;
		
		public function __construct($idVoto=NULL, $puntuacion=NULL, $idPincho=NULL, $idJurado=NULL, $categoria=NULL) {
			//rellenamos los datos referentes al voto
			$this->idVoto = $idVoto;
			$this->puntuacion = $puntuacion;  
			$this->idPincho = $idPincho;    
			$this->idJurado = $idJurado;    
			$this->categoria = $categoria;    
		}
		
		
		public function getIdVoto() {
    		return $this->idVoto;
  		}
		
		public function getPuntuacion() {
    		return $this->puntuacion;
  		}
		
		public function getIdPincho() {
    		return $this->idPincho;
  		}
		
		public function getIdJurado() {
    		return $this->idJurado;
  		}
		
		public function getCategoria() {
    		return $this->categoria;
  		}
		
		
		public function setIdVoto($idVoto) {
    		$this->idVoto=$idVoto;
  		}
		
		public function setPuntuacion($puntuacion) {
    		$this->puntuacion=$puntuacion;
  		}
		
		public function setIdPincho($idPincho) {
    		$this->idPincho=$idPincho;
  		}
		
		public function setIdJurado($idJurado) {
    		$this->idJurado=$idJurado;
  		}
		
		public function setCategoria($categoria) {
    		$this->categoria=$categoria;
  		}
		
	}
?>