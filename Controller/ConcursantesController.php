<?php
	require_once(__DIR__."/BaseController.php");
	require_once(__DIR__."../../Model/Concursante.php");
	require_once(__DIR__."../../Model/ConcursanteMapper.php");
	
	
	class ConcursantesController extends BaseController
	{
		private $ConcursanteMapper;
		public function registrar (){
			parent::ConectarDB();
			
			$concursante = new Concursante();
			$this->ConcursanteMapper = new ConcursanteMapper();
			
			if ($_REQUEST['nombre'] != NULL && $_REQUEST['direccion'] != NULL && $_REQUEST['horario'] != NULL && $_REQUEST['foto'] != NULL && $_REQUEST['web']!= NULL && $_REQUEST['telefono'] != NULL
				&& $_REQUEST['pincho'] != NULL && $_REQUEST['descripcion'] != NULL && $_REQUEST['ingredientes'] != NULL && $_REQUEST['foto_pincho'] != NULL && $_REQUEST['precio'] != NULL ){
				//Datos referentes al establecimiento
				$concursante->setNombre($_REQUEST['nombre']);
				$concursante->setDireccion($_REQUEST['direccion']);
				$concursante->setHorario($_REQUEST['horario']);
				$concursante->setFoto($_REQUEST['foto']);
				$concursante->setWeb($_REQUEST['web']);
				$concursante->setTelefono($_REQUEST['telefono']);
				//Datos referentes al pincho
				$concursante->setPincho($_REQUEST['pincho']);
				$concursante->setDescripcion($_REQUEST['descripcion']);
				$concursante->setIngredientes($_REQUEST['ingredientes']);
				$concursante->setFoto_Pincho($_REQUEST['foto_pincho']);
				$concursante->setPrecio($_REQUEST['precio']);
				
				
				$resultado=$this->ConcursanteMapper->saveConcursante($concursante);
				
				if($resultado=="vacio"){
					echo '<script> alert(" Este usuario ya existe ") </script>';
					echo '<script language="JavaScript"> window.location.href ="./View/Concursantes/registrar.php" </script>';
				}else{
					header("location: ./View/Concursantes/registrar.php");//Hay que cambiarlo si se cambia el nombre de la carpeta
				}
				
			}else{
				echo '<script> alert("Campo Vacio, Todos los campos son obligatorios") </script>';
				echo '<script language="JavaScript"> window.location.href ="./View/Concursantes/registrar.php" </script>';
			}			/*
			Esta es la otra forma de hacerlo
			
			if (isset($_REQUEST['nombre']) && isset($_REQUEST['direccion']) && isset($_REQUEST['horario']) && isset($_REQUEST['foto']) && isset($_REQUEST['web']) && isset($_REQUEST['telefono'])){
				$nombre=$_REQUEST['nombre'];
				$direccion=$_REQUEST['direccion'];
				$horario=$_REQUEST['horario'];
				$foto=$_REQUEST['foto'];
				$web=$_REQUEST['web'];
				$telefono=$_REQUEST['telefono'];
				
			}else{
				$nombre=NULL;
				$direccion=NULL;
				$horario=NULL;
				$foto=NULL;
				$web=NULL;
				$telefono=NULL;
				
			}
			$concursante = new Concursante($nombre, $direccion, $horario, $foto, $web, $telefono);
			*/
			
			/*$resultado = mysql_query("INSERT INTO establecimiento(nombre, direccion, horario, foto, pagina_web, telefono) VALUES ('$nombre','$direccion','$horario','$foto','$web',$telefono)");*/
	
		}
	}
?>