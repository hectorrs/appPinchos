<?php
require_once("BaseModel.php");

class VotoMapper extends BaseModel{
	public function saveVotoPopular($voto){
		parent::ConectarDB();
		
		$idVoto=$voto->getIdVoto();
		$puntuacion=$voto->getPuntuacion();
		$idPincho=$voto->getIdPincho();
		$idJurado=$voto->getIdJurado();
		$categoria=$voto->getCategoria();
		
		
		$resultado = mysql_query("INSERT INTO voto(idVoto, puntuacion, Pincho_idPincho, Jurado_idJurado, categoria) VALUES ('$idVoto','$puntuacion','$idPincho','$idJurado','$categoria')");
		
	}
}
?>