<?php
	class BaseController {
		function ConectarDB(){
			mysql_connect("localhost","root","root")
			or die ("Fallo en el establecimiento de la conexión");
			mysql_select_db("mydb")
			or die("Error en la selección de la base de datos");
		}
	}
?>