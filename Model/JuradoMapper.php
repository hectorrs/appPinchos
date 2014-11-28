<?php
require_once("BaseModel.php");

class JuradoMapper extends BaseModel{
	public function saveJurado($jurado){
		parent::ConectarDB();
		
		$usuario = $jurado->getUsuario();
		$pass = $jurado->getPass();
		$nombre = $jurado->getNombre();
		$apellidos = $jurado->getApellidos();
		$email = $jurado->getEmail();
		$telefono = $jurado->getTelefono();
		
		$codigo = mysql_query("SELECT COUNT(*) FROM jurado");
		$codigo = mysql_fetch_array($codigo);
		$codigo = $codigo[0];
		$codigo = $codigo+1;
		
		$existsUsuario = mysql_query("SELECT usuario FROM jurado where usuario = '$usuario'");
		$existsUsuario = mysql_fetch_array($existsUsuario);
		$existsUsuario = $existsUsuario[0];
		
		if($existsUsuario == NULL){
			$resultado = mysql_query("INSERT INTO jurado (idJurado, usuario, password, tipo, email, nombre, apellidos, telefono) VALUES ($codigo, '$usuario', '$pass', 0, '$email', '$nombre', '$apellidos', '$telefono')");
		} else {
			echo "Este usuario ya existe";
		}
		
	}
}
?>