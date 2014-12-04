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
			$resultado = mysql_query("INSERT INTO jurado(idJurado, usuario, password, tipo, email, nombre, apellidos, telefono) VALUES ($codigo, '$usuario', '$pass', 0, '$email', '$nombre', '$apellidos', '$telefono')");
		}else {
			echo "Este usuario ya existe";
		}
		
	}
	
	/*public function visualizarJurado(){
		parent::ConectarDB();
		session_start();
		if(isset($_SESSION['usuario'])){
			$idJurado = $_SESSION['usuario'];
		}
		$resultado = mysql_query("SELECT nombre, descripcion FROM pincho WHERE ");
		
		$nombre = $pincho->getNombre();
		$descripcion = $pincho->getDescripcion();
	}*/
	
	public function visualizarPerfilPopular(){
		parent::ConectarDB();
		
		if(isset($_SESSION['usuario'])){
			$usuario = $_SESSION['usuario'];
		}
		
		$this->perfil = mysql_query("SELECT nombre, apellidos, password, email, telefono FROM jurado WHERE usuario = '$usuario'");
		
		if(isset($_POST['editarPerfil'])){
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			
			$update = mysql_query("UPDATE jurado SET nombre = '$nombre', apellidos = '$apellidos', password = '$password', email = '$email', telefono = '$telefono' WHERE usuario = '$usuario'");
			
			$this->perfil = mysql_query("SELECT nombre, apellidos, password, email, telefono FROM jurado WHERE usuario = '$usuario'");
		}
	}
	
	public function getPerfil(){
		return $this->perfil;
	}
		
}
?>