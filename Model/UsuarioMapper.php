<?php
	require_once("BaseModel.php");
	class UsuarioMapper extends BaseModel{
		//public $pinchosPendientes;
		public function buscarEstablecimientos($cadena){
			parent::ConectarDB();
			
			$establecimientos = mysql_query("SELECT `nombre`, `direccion`, `telefono`, `pagina_web` FROM `establecimiento` WHERE nombre like '%".$cadena."%'");
			echo "estoy en establecimento";
			return $establecimientos;
		}
		
		public function buscarPinchos($cadena){
			parent::ConectarDB();
			
			$pinchos = mysql_query("SELECT `nombre`, `Establecimiento_nombre`, `descripcion`, `ingredientes`, `precio` FROM `pincho` WHERE nombre like '%".$cadena."%' OR descripcion like '%".$cadena."%' OR ingredientes like '%".$cadena."%'");
			echo "estoy en pinchos";
			return $pinchos;
		}
	}
?>