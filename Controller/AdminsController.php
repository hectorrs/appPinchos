<?php
	require_once(__DIR__."/../controller/BaseController.php");
	require_once(__DIR__."/../model/AdminMapper.php");
	
	class AdminsController extends BaseController
	{
		public $ganadorIngenio;
		public $ganadorSabor;
		public $ganadorPresentacion;
		
		public function consultarPuntuacion(){
			$ganadorIngenio = "ganador Ingenio!";
			$ganadorSabor;
			$ganadorPresentacion;
			
			require_once(__DIR__."/../View/Admins/consultarPuntuacion.php");
		}
		
		public function validarPincho(){
			parent::ConectarDB();
			session_start();
			
			$adminMapper = new AdminMapper();
			$pinchosPendientes = $adminMapper->validarPincho();
			
			require_once ($_SERVER['DOCUMENT_ROOT'].'/appPinchos/View/Admins/validarPincho.php');
		}
	}
?>