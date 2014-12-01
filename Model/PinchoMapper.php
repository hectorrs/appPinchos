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
	}
?>