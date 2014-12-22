<?php
	class BaseModel {
		function ConectarDB()
		{
			mysql_connect("localhost","apppinchos","apppinchos")
			or die ("Fallo en el establecimiento de la conexión");
			mysql_select_db("mydb")
			or die("Error en la selección de la base de datos");
		}

		public function getNombreConcurso(){
			$this->ConectarDB();
			
			$nombreConcurso = mysql_query("SELECT nombre FROM concurso");
			$nombreConcurso = mysql_fetch_array($nombreConcurso);
			
			return $nombreConcurso[0];
		}

		public function buscarEstablecimientos($cadena){
			$this->ConectarDB();
			
			$establecimientos = mysql_query("SELECT `nombre`, `direccion`, `telefono`, `pagina_web` FROM `establecimiento` WHERE nombre like '%".$cadena."%'");
			return $establecimientos;
		}
		
		public function buscarPinchos($cadena){
			$this->ConectarDB();
			
			$pinchos = mysql_query("SELECT `nombre`, `Establecimiento_nombre`, `descripcion`, `ingredientes`, `precio` FROM `pincho` WHERE nombre like '%".$cadena."%' OR descripcion like '%".$cadena."%' OR ingredientes like '%".$cadena."%'");
			return $pinchos;
		}
	}
?>