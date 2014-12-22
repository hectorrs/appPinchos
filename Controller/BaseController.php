<?php
	require_once("Model/BaseModel.php");

	class BaseController {
		private $pinchos;
		private $establecimientos;

		function ConectarDB(){
			mysql_connect("localhost","apppinchos","apppinchos")
			or die ("Fallo en el establecimiento de la conexión");
			mysql_select_db("mydb")
			or die("Error en la selección de la base de datos");
		}

		public function buscar(){
			$this->conectarDB();
			
			$baseModel = new BaseModel();
			
			$this->establecimientos= $baseModel->buscarEstablecimientos("");
			$this->pinchos=$baseModel->buscarPinchos("");
		}

		public function filtrar($cadenaBusqueda){
			$this->conectarDB();
			
			$baseModel = new BaseModel();	
		
			$this->establecimientos = $baseModel->buscarEstablecimientos($cadenaBusqueda);
			$this->pinchos = $baseModel->buscarPinchos($cadenaBusqueda);
		}

		public function getPinchos(){
			return $this->pinchos;
		}

		public function getEstablecimientos(){
			return $this->establecimientos;
		}
	}
?>