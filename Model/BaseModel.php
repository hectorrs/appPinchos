<?php
	class BaseModel {
		function ConectarDB()
		{
			mysql_connect("localhost","usuario","usuario")
			or die ("Fallo en el establecimiento de la conexión");
			mysql_select_db("mydb")
			or die("Error en la selección de la base de datos");
		}
	}
?>