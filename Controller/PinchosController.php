<?php
	require_once("BaseController.php");
	require_once("./Model/PinchoMapper.php");
	
	class PinchosController extends BaseController{
		public function informacionValidarPincho(){
			parent::ConectarDB();
			//session_start();
			
			$pinchosMapper = new PinchoMapper();
			$informacion = $pinchosMapper->informacionValidarPincho();
			
			//require_once $_SERVER['DOCUMENT_ROOT'].'/../View/Pincho/informacionValidarPincho.php';
		}
	}
?>