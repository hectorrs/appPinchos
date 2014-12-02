<?php
require_once("BaseModel.php");

class ComentarioMapper extends BaseModel{
	public function saveComentario($comentario){
		parent::ConectarDB();
		
		$idComentario=$comentario->getIdComentario();
		$mensaje=$comentario->getComentario();
		$idPincho=$comentario->getIdPinchos();
		$idJurado=$comentario->getIdJurado();
		
		echo $comentario->getIdComentario();
		echo $comentario->getComentario();
		echo $comentario->getIdJurado();
		echo $comentario->getIdPinchos();
		
		$resultado = mysql_query("INSERT INTO comentario (idComentario, comentario, Jurado_idJurado, Pincho_idPincho) VALUES ($idComentario,'$mensaje',$idPincho,$idJurado)");
		
	}
}
?>