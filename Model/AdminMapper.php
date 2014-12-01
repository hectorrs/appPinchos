<?php
	require_once("BaseModel.php");
	class AdminMapper extends BaseModel{
		//public $pinchosPendientes;
		public function validarPincho(){
			parent::ConectarDB();
			
			$pinchosPendientes = mysql_query("SELECT nombre, Establecimiento_nombre, precio FROM pincho WHERE estado = '0'");
				
			return $pinchosPendientes;
		}
	}
?>