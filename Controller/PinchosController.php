<?php
	require_once("BaseController.php");
	require_once("./Model/PinchoMapper.php");
	
	class PinchosController extends BaseController{
		public function informacionValidarPincho(){
			parent::ConectarDB();
			//session_start();
			$idPincho=$_GET['pincho'];
			
			$pinchosMapper = new PinchoMapper();
			$informacion = $pinchosMapper->informacionValidarPincho($idPincho);
			
			require_once ($_SERVER['DOCUMENT_ROOT'].'/appPinchos/View/Pincho/informacionValidarPincho.php');
		}
		
		public function validarPincho(){
			parent::ConectarDB();
			$idPincho=$_GET['pincho'];
			$pinchosMapper = new PinchoMapper();
			$informacion = $pinchosMapper->validarPincho($idPincho);
			
			echo "El pincho ha sido validado correctamente";
			
			
		}
	}
?>