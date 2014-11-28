<?php
require_once("BaseModel.php");

class JuradoMapper extends BaseModel{
	public function saveJurado($jurado){
		parent::ConectarDB();
		
		$usuario = $jurado->getUsuario();
		$pass = $jurado->getPass();
		$email = $jurado->getEmail();
		$nombre = $jurado->getNombre();
		$apellidos = $jurado->getApellidos();
		$telefono = $jurado->getTelefono();
		
		$codigo= mysql_query("SELECT COUNT(*) FROM jurado");
		$codigo=mysql_fetch_array($codigo);
		$codigo=$codigo[0];
		$codigo=$codigo+1;
		
		$resultado = $mysql_query("INSERT INTO jurado (idJurado, usuario, password, tipo, email, nombre, apellidos, telefono) VALUES ($codigo, '$usuario', '$pass'; 0, '$email', '$nombre', '$apellidos', '$telefono')");
		
	}
}
?>