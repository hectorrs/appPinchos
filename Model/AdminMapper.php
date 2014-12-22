<?php
	require_once("BaseModel.php");
	class AdminMapper extends BaseModel{
		//public $pinchosPendientes;
		public function validarPincho(){
			parent::ConectarDB();
			
			$pinchosPendientes = mysql_query("SELECT nombre, Establecimiento_nombre, precio , idPincho FROM pincho WHERE estado = '0'");
				
			return $pinchosPendientes;
		}

		public function gestionarConcurso(){
			parent::ConectarDB();
		
			$datos = mysql_query("SELECT nombre, fecha_creacion, bases, premios, patrocinadores, logo FROM concurso");
			
			if(isset($_POST['editarConcurso'])){
				$fecha = $_POST['fecha'];
				$bases = $_POST['bases'];
				$premios = $_POST['premios'];
				$patrocinadores = $_POST['patrocinadores'];
				$logo = $_POST['logo'];
				
				$update = mysql_query("UPDATE concurso SET fecha_creacion = '$fecha', bases = '$bases', premios = '$premios', patrocinadores = '$patrocinadores', logo = '$logo'");
				
				$datos = mysql_query("SELECT nombre, fecha_creacion, bases, premios, patrocinadores, logo FROM concurso");
			}

			return $datos;
		}
	}
?>