<?php
	class AdminMapper extends BaseModel{
		public function validarPincho(){
			parent::ConectarDB();
			
			$pinchosPendientes = mysql_query("SELECT nombre, Establecimiento_nombre, precio FROM pincho WHERE estado = '0'");
			$pinchosPendientes = mysql_fetch_array($pinchosPendientes);
			
			$pinchosPendientesArray = array();
			
			foreach($pinchosPendientes as $pincho){
				array_push($pinchosPendientes);
			}
			
			return $pinchosPendientesArray;
		}
	}
?>