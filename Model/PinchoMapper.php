<?php
	class PinchoMapper extends BaseModel{
		public $pinchosVotados;
		public $pinchosIntroducidos;
		public $comentarios;
		
		public function visualizarActividadPopular(){
			parent::ConectarDB();
			session_start();
			
			if(isset($_SESSION['usuario'])){
				$idJurado = $_SESSION['usuario'];
			}
			
			$pinchosVotados = mysql_query("SELECT p.nombre, p.descripcion FROM pincho p, voto v WHERE v.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = p.idPincho and v.puntuacion = '1'");
			
			// $pinchosVotados = mysql_fetch_array($pinchosVotados);
			
			$pinchosIntroducidos = mysql_query("SELECT p.nombre, p.descripcion FROM pincho p, voto v WHERE v.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = p.idPincho and v.puntuacion = '0'");
			
			$pinchosIntroducidos = mysql_fetch_array($pinchosIntroducidos);
			
			$comentarios = mysql_query("SELECT c.comentario FROM comentario c, voto v WHERE c.Jurado_idJurado = '$idJurado' and v.Pincho_idPincho = c.Pincho_idPincho and v.puntuacion = '1'");
			
			$comentarios = mysql_fetch_array($comentarios);
		}
		
		public function informacionValidarPincho(){
			parent::ConectarDB();
			session_start();
			
			if(isset($_GET['pincho'])){
				$idPincho = $GET['pincho'];
			}
			
			$informacionPincho = mysql_query("SELECT idPincho, nombre, descripcion, ingredientes, foto, precio FROM pincho WHERE estado = '0' and idPincho = '$idPincho'");
			$informacion = mysql_fetch_array($informacionPincho);
			
			$resultadosArray = array();
			
			foreach($informacionPincho as $resultado){
				array_push($informacionPincho);
			}
			
			return $pinchosPendientesArray;
		}
	}
?>