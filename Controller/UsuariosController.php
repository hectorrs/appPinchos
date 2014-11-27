<?php
	require_once(__DIR__."/../controller/BaseController.php");
	
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
			
			$resultado = mysql_query("select * from ADMIN where usuario = '$login' and password = '$pass'");
			$resultado = mysql_fetch_array($resultado);
			$resultado = $resultado[0];
			
			if($resultado!=NULL){
				header('location: ./view/Admins/homeAdmin.php');
				$_SESSION["usuario"]=$login;
			}else{
				
				//comprobamos si existe el jurado y recuperamos su tipo
				$resultado = mysql_query("select tipo from JURADO where usuario = '$login' and password = '$pass'");
				$resultado = mysql_fetch_array($resultado);
				$tipo = $resultado[0];
				
				
				//Si es tipo 0 es jurado popular, si es 1 profesional.
				if($tipo==0){
					header('location: /HomePopular.php');
					$_SESSION['usuario']=$login;
				}else{
					if($tipo==1){
						header('location: /HomeProfesional.php');
						$_SESSION["usuario"]=$login;
					}else{
						header('location: /Error.php');
					}
				}
				
					
				
			}	
		}
	
	}
	
	
?>