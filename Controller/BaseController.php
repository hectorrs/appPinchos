<?php
	class BaseController {
		function ConectarDB()
		{
<<<<<<< HEAD
			mysql_connect("localhost","usuario","usuario")
=======
			mysql_connect("localhost","root","root")
>>>>>>> origin/master
			or die ("Fallo en el establecimiento de la conexión");
			mysql_select_db("mydb")
			or die("Error en la selección de la base de datos");
		}
	}
?>