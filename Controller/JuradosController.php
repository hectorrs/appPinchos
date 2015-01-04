<?php
	require_once(__DIR__."/BaseController.php");
	require_once(__DIR__."../../Model/Jurado.php");
	require_once(__DIR__."../../Model/JuradoMapper.php");
	require_once(__DIR__."../../Model/Pincho.php");
	require_once(__DIR__."../../Model/PinchoMapper.php");
	
	class JuradosController extends BaseController{
		private $JuradoMapper;
		
		public function registrar() {
			parent::ConectarDB();
			
			$jurado = new Jurado();
			$this->JuradoMapper = new JuradoMapper();
			
			//si ha introducido por teclado todo
			if ($_REQUEST['usuario'] != NULL &&  $_REQUEST['pass'] != NULL && $_REQUEST['email'] != NULL && $_REQUEST['nombre'] != NULL && $_REQUEST['apellidos'] != NULL && $_REQUEST['telefono'] != NULL ){
				$jurado->setUsuario($_REQUEST['usuario']);
				$jurado->setPass($_REQUEST['pass']);
				$jurado->setNombre($_REQUEST['nombre']);
				$jurado->setApellidos($_REQUEST['apellidos']);
				$jurado->setEmail($_REQUEST['email']);
				$jurado->setTelefono($_REQUEST['telefono']);
				
				$resultado=$this->JuradoMapper->saveJurado($jurado);
				
				if($resultado==0){
					echo '<script> alert(" Este usuario ya existe ") </script>';
					echo '<script language="JavaScript"> window.location.href ="./View/Jurados/registrarPopular.php" </script>';
				}else{
					header("location: ./View/Usuarios/inicio.php");
				}
				
			} else {
				echo '<script> alert("Campo Vacio, Todos los campos son obligatorios") </script>';
				echo '<script language="JavaScript"> window.location.href ="./View/Jurados/registrarPopular.php" </script>';
			}
		}
		
		public function visualizarActividadPopular(){
			parent::ConectarDB();
			session_start();
			
			$pinchoMapper = new PinchoMapper();
			$pinchoMapper->visualizarActividadPopular();
			
			$pinchosVotadosArray = $pinchoMapper->getPinchosVotados();
			
			$pinchosIntroducidosArray = $pinchoMapper->getPinchosIntroducidos();
			
			$comentariosArray = $pinchoMapper->getComentarios();			
			
			require_once $_SERVER['DOCUMENT_ROOT'].'/appPinchos/View/Jurados/visualizarActividadPopular.php';
		}
		
		public function visualizarPerfilPopular(){
			parent::ConectarDB();
			session_start();
			
			$juradoMapper = new JuradoMapper();
			$juradoMapper->visualizarPerfilPopular();
			
			$perfil = $juradoMapper->getPerfil();
			
			require_once ($_SERVER['DOCUMENT_ROOT'].'/appPinchos/View/Jurados/visualizarPerfilPopular.php');
		}

		public function buscar(){
			parent::buscar();
			session_start();

			$pinchos = parent::getPinchos();
			$establecimientos = parent::getEstablecimientos();

			$usuario=$_SESSION['usuario'];

			$tipo = mysql_query("SELECT tipo FROM jurado WHERE usuario = '$usuario'");
			$tipo = mysql_fetch_array($tipo);
			$tipo = $tipo[0];

			if($tipo == 0){
				echo "popular";
				require("./View/Jurados/buscarPopular.php");				
			}else{
				if($tipo == 1){
					echo "profesional";
					require("./View/Jurados/buscarProfesional.php");
				}
			}
		}

		public function filtrar(){
			parent::conectarDB();
			session_start();
			
			if(isset($_POST['cadenaBusqueda'])){
				$buscar = $_POST['cadenaBusqueda'];
				parent::filtrar($buscar);

				$pinchos = parent::getPinchos();
				$establecimientos = parent::getEstablecimientos();
				
				$usuario=$_SESSION['usuario'];

				$tipo = mysql_query("SELECT tipo FROM jurado WHERE usuario = '$usuario'");
				$tipo = mysql_fetch_array($tipo);
				$tipo = $tipo[0];

				if($tipo == 0){
					require("./View/Jurados/buscarPopular.php");				
				}else{
					if($tipo == 1){
						require("./View/Jurados/buscarProfesional.php");
					}
				}
			}else{
				$this->buscar();
			}
		}
	}
?>