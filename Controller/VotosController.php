<?php
	require_once(__DIR__."/../controller/BaseController.php");
	require_once(__DIR__."/../model/Voto.php");
	
	
	
	class VotosController extends BaseController{
		private $VotoMapper;
		public function votarPopular(){
			parent::ConectarDB();
			session_start();
			$usuario=$_SESSION['usuario'];
			echo $usuario;
			
			if (isset($_REQUEST['pincho1']) && isset($_REQUEST['pincho2']) && isset($_REQUEST['pincho3'])){
				//Datos referentes al establecimiento
				
				
				//El formato introducido por el usuario debe ser 0000_0000 siendo los cuatro primeros el id del pincho y los cuatro ultimos identifican el voto 
				$pincho1=$_REQUEST['pincho1'];
				$pincho2=$_REQUEST['pincho2'];
				$pincho3=$_REQUEST['pincho3'];
				$nombrepincho=$this->getIdPincho($pincho1);
				echo $nombrepincho;
				
				
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
					echo $id;
					$voto1->setIdVoto($pincho1);
					$voto1->setPuntuacion(1);
					$voto1->setIdPincho($this->getIdPincho($pincho1));
					$voto1->setIdJurado($id);
					$voto1->setCategoria("popular");
					
					/*echo "idvoto=";
					echo $voto1->getIdVoto();
					echo "puntucaion=";
					echo $voto1->getPuntuacion();
					echo "idpincho=";
					echo $voto1->getIdPincho();
					echo "idjurado=";
					echo $voto1->getIdJurado();
					echo "categoria=";
					echo $voto1->getCategoria();*/
					
				}else{
					echo "Este pincho ya existe";
				}
				
				
				
				
				
				
				/*$concursante->setNombre($_REQUEST['nombre']);
				$concursante->setDireccion($_REQUEST['direccion']);
				$concursante->setHorario($_REQUEST['horario']);
				$concursante->setFoto($_REQUEST['foto']);
				$concursante->setWeb($_REQUEST['web']);
				$concursante->setTelefono($_REQUEST['telefono']);*/
			}
		}
		
		private function getIdPincho($pincho) {
	 	 	return substr($pincho,0,4);
		}
	}
	
	
?>