<?php
	require_once(__DIR__."/../controller/BaseController.php");
	require_once(__DIR__."/../model/Voto.php");
	
	class VotosController extends BaseController{
		private $VotoMapper;
		public function votarPopular(){
			parent::ConectarDB();
			
			$votoPopular = new Voto();
			
			if (isset($_REQUEST['pincho1']) && isset($_REQUEST['pincho2']) && isset($_REQUEST['pincho3'])){
				//Datos referentes al establecimiento
				
				echo "Correcto";
				
				
				
				/*$concursante->setNombre($_REQUEST['nombre']);
				$concursante->setDireccion($_REQUEST['direccion']);
				$concursante->setHorario($_REQUEST['horario']);
				$concursante->setFoto($_REQUEST['foto']);
				$concursante->setWeb($_REQUEST['web']);
				$concursante->setTelefono($_REQUEST['telefono']);*/
			}
		}
	}
	
	
?>