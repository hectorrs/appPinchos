<?php
class Comentario{
	private $idComentario;
	private $comentario;
	private $idJurado;
	private $idPincho;
	
	public function __construct($idComentario=NULL, $comentario=NULL, $idJurado=NULL, $idPincho=NULL) {
			//rellenamos los datos referentes al voto
			$this->idComentario = $idComentario;
			$this->comentario = $comentario;  
			$this->idJurado = $idJurado;    
			$this->idPincho = $idPincho;       
		}
		public function getIdComentario(){
			return $this->idComentario;
		}
		
		public function getComentario(){
			return $this->comentario;
		}
		
		public function getIdJurado(){
			return $this->idJurado;
		}
		
		public function getIdPinchos(){
			return $this->idPincho;
		}
		
		public function setIdComentario($idComentario) {
    		$this->idComentario=$idComentario;
  		}
		
		public function setComentario($comentario) {
    		$this->comentario=$comentario;
  		}
		
		public function setIdJurado($idJurado) {
    		$this->idJurado= $idJurado;
  		}
		
		public function setIdPincho($idPincho) {
    		$this->idPincho=$idPincho;
  		}
	
	}

?>