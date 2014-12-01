<?php
	require_once(__DIR__."/../controller/BaseController.php");
	require_once(__DIR__."/../model/Jurado.php");
	require_once(__DIR__."/../model/JuradoMapper.php");
	require_once(__DIR__."/../model/Pincho.php");
	require_once(__DIR__."/../model/PinchoMapper.php");
	
	class JuradosController extends BaseController{
		private $JuradoMapper;
		
		public function registrar() {
			parent::ConectarDB();
			
			$jurado = new Jurado();
			$this->JuradoMapper = new JuradoMapper();
			
			//si ha introducido por teclado todo
			if (isset($_REQUEST['usuario']) && isset($_REQUEST['pass']) && isset($_REQUEST['email']) && isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['telefono'])){
				$jurado->setUsuario($_REQUEST['usuario']);
				$jurado->setPass($_REQUEST['pass']);
				$jurado->setNombre($_REQUEST['nombre']);
				$jurado->setApellidos($_REQUEST['apellidos']);
				$jurado->setEmail($_REQUEST['email']);
				$jurado->setTelefono($_REQUEST['telefono']);
				
				$this->JuradoMapper->saveJurado($jurado);
				
				header("location: ./View/Usuarios/inicio.php");
				
			} else {
				echo "Introduzca los datos";
			}
		}
		
		public function visualizarActividadPopular(){
			parent::ConectarDB();
			session_start();
			
			$pinchoMapper = new PinchoMapper();
			$pinchoMapper->visualizarActividadPopular();
			
			//$pinchosVotadosArray = $pinchoMapper->pinchosVotados;
			$pinchosVotados = $pinchoMapper->pinchosVotados;
			
			$pinchosVotadosArray = array();
			$i = 0;
			while($row = mysql_fetch_array($pinchosVotados)){
				$pinchosVotadosArray[$i] = $row[0];
				$i++;	
			}
			
			require_once $_SERVER['DOCUMENT_ROOT'].'/../View/visualizarActividadPopular.php';
		}
		
		public function visualizarActividadProfesional(){
				
		}
	}
?>