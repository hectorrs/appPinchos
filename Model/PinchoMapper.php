<?php
	require_once("BaseModel.php");

	class PinchoMapper extends BaseModel{
		public $pinchosVotados;
		public $pinchosIntroducidos;
		public $comentarios;
		
		public function visualizarActividadPopular(){
			parent::ConectarDB();
			
			if(isset($_SESSION['usuario'])){
				$usuario = $_SESSION['usuario'];
			}
			
			$idJurado = mysql_query("SELECT idJurado FROM jurado WHERE usuario='$usuario'");
			$idJurado = mysql_fetch_array($idJurado);
			$idJurado = $idJurado[0];
			echo $idJurado;
			$this->pinchosVotados = mysql_query("SELECT p.nombre, p.descripcion FROM pincho p, voto v WHERE v.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = p.idPincho and v.puntuacion = '$idJurado'");
			
			//$pinchosVotados = mysql_fetch_array($pinchosVotados);
			
			$this->pinchosIntroducidos = mysql_query("SELECT p.nombre, p.descripcion FROM pincho p, voto v WHERE v.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = p.idPincho and v.puntuacion = '0'");
			
			//$pinchosIntroducidos = mysql_fetch_array($pinchosIntroducidos);
			
			$this->comentarios = mysql_query("SELECT c.Pincho_idPincho, c.comentario FROM comentario c, voto v WHERE c.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = c.Pincho_idPincho and v.puntuacion = '1'");
			
			//$comentarios = mysql_fetch_array($comentarios);
		}
		
		public function informacionValidarPincho($idPincho){
			parent::ConectarDB();
			session_start();
			
			$informacionPincho = mysql_query("SELECT idPincho, nombre, descripcion, ingredientes, foto, precio FROM pincho WHERE estado = '0' and idPincho = '$idPincho'");
			$informacion = mysql_fetch_array($informacionPincho);
			
			
			return $informacion;
		}
		
		public function validarPincho($idPincho){
			parent::ConectarDB();
			$update=mysql_query("UPDATE `pincho` SET estado=1 WHERE idPincho='$idPincho'");
		}
		
		public function getPinchosVotados (){
			return $this->pinchosVotados;
		}
		
		public function getPinchosIntroducidos (){
			return $this->pinchosIntroducidos;
		}
		
		public function getComentarios (){
			return $this->comentarios;
		}
	}
?>