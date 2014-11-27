<?php
require_once("BaseModel.php");

class ConcursanteMapper extends BaseModel{
	public function saveConcursante($concursante){
		parent::ConectarDB();
		
		$nombre=$concursante->getNombre();
		$direccion=$concursante->getDireccion();
		$horario = $concursante->getHorario();
		$foto =$concursante->getFoto();
		$web = $concursante->getWeb();
		$telefono = $concursante->getTelefono();
		$pincho = $concursante->getPincho();
		$descripcion = $concursante->getDescripcion();
		$ingredientes = $concursante->getIngredientes();
		$foto_pincho = $concursante->getFoto_Pincho();
		$precio = $concursante->getPrecio();
		
		//introducimos el establecmiento en la base de datos
		$resultado = mysql_query("INSERT INTO establecimiento (nombre, direccion, horario, foto, pagina_web, telefono) VALUES ('$nombre','$direccion','$horario','$foto','$web',$telefono)");
		
		if(mysql_affected_rows()>0)
    		{	
				//Recogemos el nombre del concurso
				$nombre_concurso=mysql_query("SELECT nombre FROM concurso WHERE 1");
				$nombre_concurso=mysql_fetch_array($nombre_concurso);
				$nombre_concurso=$nombre_concurso[0];
				
				//consultamos el numero de pinchos de la base de datos para asignar el codigo siguiente al pincho
				$codigo= mysql_query("SELECT COUNT(*) FROM pincho");
				$codigo=mysql_fetch_array($codigo);
				$codigo=$codigo[0];
				$codigo=$codigo+1;
				
				//Insertamos el pincho en  la base de datos 
				$resultado = mysql_query("INSERT INTO pincho(idPincho, nombre, descripcion, ingredientes, foto, precio, Concurso_nombre, estado, Establecimiento_nombre) VALUES ($codigo,'$pincho','$descripcion','$ingredientes','$foto_pincho','$precio','$nombre_concurso',0,'$nombre')");
			}else{
				
				$resultado= mysql_query("DELETE FROM establecimiento WHERE nombre='$nombre'");
				
				
			}
	}
}

?>