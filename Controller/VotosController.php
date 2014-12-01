<?php
	require_once(__DIR__."/../controller/BaseController.php");
	require_once(__DIR__."/../model/Voto.php");
	require_once(__DIR__."/../model/VotoMapper.php");
	
	class VotosController extends BaseController{
		private $VotoMapper;
		
		private function getIdPincho($pincho) {
	 	 	return substr($pincho,0,4);
		}
		
		public function votarPopular(){
			parent::ConectarDB();
			$this->VotoMapper= new VotoMapper();
			session_start();
			$usuario=$_SESSION['usuario'];
			
			if (isset($_REQUEST['pincho1']) && isset($_REQUEST['pincho2']) && isset($_REQUEST['pincho3'])){
				//Datos referentes al establecimiento
				
				
				//El formato introducido por el usuario debe ser 0000_0000 siendo los cuatro primeros el id del pincho y los cuatro ultimos identifican el voto 
				$pincho1=$_REQUEST['pincho1'];
				$pincho2=$_REQUEST['pincho2'];
				$pincho3=$_REQUEST['pincho3'];
				
				
				//Comprobamos que este voto no ha sido registrado hasta el momento
				$comprobacion1=mysql_query("SELECT idVoto FROM voto WHERE idVoto='$pincho1'");
				$comprobacion1=mysql_fetch_array($comprobacion1);
				$comprobacion1=$comprobacion1[0];
				
				//Comprobamos que este voto no ha sido registrado hasta el momento
				$comprobacion2=mysql_query("SELECT idVoto FROM voto WHERE idVoto='$pincho2'");
				$comprobacion2=mysql_fetch_array($comprobacion2);
				$comprobacion2=$comprobacion2[0];
				
				
				//Comprobamos que este voto no ha sido registrado hasta el momento
				$comprobacion3=mysql_query("SELECT idVoto FROM voto WHERE idVoto='$pincho3'");
				$comprobacion3=mysql_fetch_array($comprobacion3);
				$comprobacion3=$comprobacion3[0];
				
				if($comprobacion1==NULL && $comprobacion2==NULL && $comprobacion3==NULL){
					//$votoPopular->setIdVoto($pincho1);
					$voto1 = new Voto();
					$voto2 = new Voto();
					$voto3 = new Voto();
					
					//Recuperamos el id del usuario que esta votando
					$id=mysql_query("SELECT idJurado FROM jurado WHERE usuario='$usuario'");
					$id=mysql_fetch_array($id);
					$id=$id[0];
					
					//Creamos el voto1
					
					$voto1->setIdVoto($pincho1);
					$voto1->setPuntuacion(1);
					$voto1->setIdPincho($this->getIdPincho($pincho1));
					$voto1->setIdJurado($id);
					$voto1->setCategoria("popular");
					
					//Creamos el voto2
					
					$voto2->setIdVoto($pincho2);
					$voto2->setPuntuacion(0);
					$voto2->setIdPincho($this->getIdPincho($pincho2));
					$voto2->setIdJurado($id);
					$voto2->setCategoria("popular");
					
					//Creamos el voto3
					
					$voto3->setIdVoto($pincho3);
					$voto3->setPuntuacion(0);
					$voto3->setIdPincho($this->getIdPincho($pincho3));
					$voto3->setIdJurado($id);
					$voto3->setCategoria("popular");
					
					$this->VotoMapper->saveVotoPopular($voto1);
					$this->VotoMapper->saveVotoPopular($voto2);
					$this->VotoMapper->saveVotoPopular($voto3);
					
					header("location: ./View/Jurados/homePopular.php");
				
				}else{
					echo "Este pincho ya existe";
				}
				
			}
		}
		
		public function votarProfesional(){
			parent::ConectarDB();
			$this->VotoMapper= new VotoMapper();
			session_start();
			
			// Usuario actual
			$usuario=$_SESSION['usuario'];
			
			// Recuperamos el id perteneciente al usuario
			$id = mysql_query("SELECT idJurado FROM jurado WHERE usuario = '$usuario'");
			$id = mysql_fetch_array($id);
			$id = $id[0];
			
			if(isset($_REQUEST['realizarVotacion'])){
				// Pincho introducido
				$pincho = $_POST['codigoPincho'];
				
				// Categoría 1 - ingenio
				$comprobacion1 = mysql_query("SELECT idVoto, categoria FROM voto WHERE idVoto = '$pincho' AND categoria = 'ingenio'");
				$comprobacion1 = mysql_fetch_array($comprobacion1);
				$comprobacion1 = $comprobacion1[0];
				
				if($comprobacion1 == NULL){
					$voto1 = new Voto();
					
					$puntuacion = $_POST['ingenio'];
					
					$voto1->setIdVoto($pincho);
					$voto1->setPuntuacion($puntuacion);
					$voto1->setIdPincho($this->getIdPincho($pincho));
					$voto1->setIdJurado($id);
					$voto1->setCategoria("ingenio");
					
					$this->VotoMapper->saveVotoPopular($voto1);
				}else{
					echo "Ya se ha introducido un voto para la categoría 'ingenio'.";
				}
				
				// Categoría 2 - sabor
				$comprobacion2 = mysql_query("SELECT idVoto, categoria FROM voto WHERE idVoto = '$pincho' AND categoria = 'sabor'");
				$comprobacion2 = mysql_fetch_array($comprobacion2);
				$comprobacion2 = $comprobacion2[0];
				
				if($comprobacion2 == NULL){
					$voto2 = new Voto();
					
					$puntuacion = $_POST['sabor'];
					
					$voto2->setIdVoto($pincho);
					$voto2->setPuntuacion($puntuacion);
					$voto2->setIdPincho($this->getIdPincho($pincho));
					$voto2->setIdJurado($id);
					$voto2->setCategoria("sabor");
					
					$this->VotoMapper->saveVotoPopular($voto2);
				}else{
					echo "Ya se ha introducido un voto para la categoría 'ingenio'.";
				}
				
				// Categoría 3 - presentación
				$comprobacion3 = mysql_query("SELECT idVoto, categoria FROM voto WHERE idVoto = '$pincho' AND categoria = 'presentacion'");
				$comprobacion3 = mysql_fetch_array($comprobacion3);
				$comprobacion3 = $comprobacion3[0];
				
				if($comprobacion3 == NULL){
					$voto3 = new Voto();
					
					$puntuacion = $_POST['presentacion'];
					
					$voto3->setIdVoto($pincho);
					$voto3->setPuntuacion($puntuacion);
					$voto3->setIdPincho($this->getIdPincho($pincho));
					$voto3->setIdJurado($id);
					$voto3->setCategoria("presentacion");
					
					$this->VotoMapper->saveVotoPopular($voto3);
				}else{
					echo "Ya se ha introducido un voto para la categoría 'ingenio'.";
				}
			}
			header("location: ./View/Jurados/homeProfesional.php");
		}
	}
?>