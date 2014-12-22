<?php
	session_start();
	$usuario=$_SESSION['usuario'];
    require_once("../../Model/BaseModel.php");
    $model = new BaseModel();
    $nombreConcurso = $model->getNombreConcurso();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $nombreConcurso; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../../webroot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../webroot/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../webroot/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $nombreConcurso; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="col-lg-12">
                                <form name="logout" method="post" action="../../controlador.php?controller=usuarios&amp;action=logout">
                                    <button class="form-control" type="submit" name="Entrar"><i class="fa fa-fw fa-power-off"></i>Salir</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li class="active">
                        <a href="homeProfesional.php"><i class="fa fa-fw fa-desktop"></i> Inicio</a>
                    </li>
					<li>
                        <a href="../../controlador.php?controller=jurados&amp;action=buscar"><i class="fa fa-fw fa-table"></i> Buscar</a>
                    </li>
                   	<li>
                        <a href="../Votos/votarProfesional.php"><i class="fa fa-fw fa-bar-chart-o"></i> Votar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div>
                	<center>
                		<IMG SRC="../../webroot/img/cartel.jpg" WIDTH=35% HEIGHT=35% ALT="Pincho Ejemplo">
                    </center>
                </div>
                
            </div>
            <!-- /.container-fluid -->
			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../webroot/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../webroot/js/bootstrap.min.js"></script>

</body>

</html>