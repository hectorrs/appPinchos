<?php
	require_once(__DIR__."/../controller/BaseController.php");
	
	class JuradosController extends BaseController
	{
		private $JuradoMapper;
		function registrar() {
			parent::ConectarBD();
			$jurado = new Jurado();
			$this->JuradoMapper = new JuradoMapper();
			
			//si ha introducido por teclado todo
			if (isset($__REQUEST['usuario']) && isset($__REQUEST['pass']) && isset($__REQUEST['email']) && isset($__REQUEST['nombre']) && isset($__REQUEST['apellidos']) && isset($__REQUEST['telefono'])){
				$jurado->setUsuario($_REQUEST['usuario']);
				$pass->setPass($_REQUEST['pass']);
				$email->setEmail($_REQUEST['email']); 
				$nombre->setNombre($_REQUEST['nombre']); 
				$apellidos->setApellidos($_REQUEST['apellidos']); 
				$telefono->setTelefono($_REQUEST['telefono']);
				
				$this->JuradoMapper->saveJurado($jurado);
				
				header("location: ./View/Jurados/inicio.php");
				
			} else {
				echo "Introduzca los datos";
			}
		}
	}
?>