<?php
	session_start();
	$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concurso de Pinchos</title>

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
                <a class="navbar-brand" href="index.html">Concurso de Pinchos</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Actividad</a>
                        </li>
                        <li class="divider"></li>
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
					<li >
                        <a href="#"><i class="fa fa-fw fa-desktop"></i> Home</a>
                    </li>
					<li >
                        <a href="#"><i class="fa fa-fw fa-table"></i> Pinchos</a>
                    </li>
                    <li class="active">
                        <a href="votarPopular.php"><i class="fa fa-fw fa-edit"></i> Votar</a>
                    </li>
                   				
                    <li>
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Mapa</a>
                    </li>
                    <!--<li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>-->
                    
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Votar Popular
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <form name="registrar" method="post" action="../../controlador.php?controller=votos&amp;action=votarPopular"> 
                    <div class="col-lg-6">   	
                        <div class="panel panel-green">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Introduce aquí tu pincho ganador</h3>
                                </div>
                                <div class="panel-body">
                                    <label>Pincho Nº 1</label>
                                    <input class="form-control" name="pincho1">
                                </div>
                        </div>
                        <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Introduce aquí tus otros dos pinchos</h3>
                                </div>
                                <div class="panel-body">
                                    <label>Pincho Nº 2</label>
                                    <input class="form-control" name="pincho2">
                                    <label>Pincho Nº 3</label>
                                    <input class="form-control" name="pincho3">
                                    
                                </div>
                        </div>
                        <div>*Los Pinchos introducidos no se podrán volver a introducir en posteriores votaciones</div>
                        <button type="submit" class="btn btn-default" onclick="location.href = 'RegistrarPincho.html'" style="float: right">Votar</button>
                    </div>
                  </form>
                
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
