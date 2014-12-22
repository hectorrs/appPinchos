<?php
	require_once("Controller/BaseController.php");
	
	class UsuariosController extends BaseController
	{
		
		public function login(){
			parent::ConectarDB();
			session_start();
			
			if (isset($_REQUEST['login'])){
				$login=$_REQUEST['login'];
			}else{
				$login='NULL';
				header('location: /Error.php');
			}
			
			if (isset($_REQUEST['pass'])){
				$pass=$_REQUEST['pass'];
			}else{
				$pass='NULL';
				header('location: /Error.php');
			}
			
			$resultado = mysql_query("select * from admin where usuario = '$login' and password = '$pass'");
			$resultado = mysql_fetch_array($resultado);
			$resultado = $resultado[0];
			
			if($resultado!=NULL){
				header('location: ./View/Admins/homeAdmin.php');
				$_SESSION["usuario"]=$login;
			}else{
				
				//comprobamos si existe el jurado y recuperamos su tipo
				$resultado = mysql_query("select tipo from jurado where usuario = '$login' and password = '$pass'");
				$resultado = mysql_fetch_array($resultado);
				$tipo = $resultado[0];
				
				
				//Si es tipo 0 es jurado popular, si es 1 profesional.
				if($tipo==NULL){
					header('location: /Error.php');
				}else{
					if($tipo==0){
					header('location: ./View/Jurados/homePopular.php');
					$_SESSION['usuario']=$login;
					}else{
						if($tipo==1){
							header('location: ./View/Jurados/homeProfesional.php');
							$_SESSION["usuario"]=$login;
					}
				}
				}	
			}	
		}
		
		public function logout(){
			session_unset();
			session_destroy();
			header('location: ./index.php');
		}
		
		public function buscar(){
			parent::buscar();

			$pinchos = parent::getPinchos();
			$establecimientos = parent::getEstablecimientos();

			require("./View/Usuarios/buscar.php");
		}

		public function filtrar(){
			parent::conectarDB();
			
			if(isset($_POST['cadenaBusqueda'])){
				$buscar = $_POST['cadenaBusqueda'];
				parent::filtrar($buscar);

				$pinchos = parent::getPinchos();
				$establecimientos = parent::getEstablecimientos();
				
				require("./View/Usuarios/buscar.php");
			}else{
				$this->buscar();
			}
		}
	}
?>