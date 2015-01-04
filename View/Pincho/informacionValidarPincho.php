<?php
	$usuario=$_SESSION['usuario'];
    require_once("Model/BaseModel.php");
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
    <link href="$_SERVER['DOCUMENT_ROOT']./../webroot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="$_SERVER['DOCUMENT_ROOT']./../webroot/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="$_SERVER['DOCUMENT_ROOT']./../webroot/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">



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
                <a class="navbar-brand"><?php echo $nombreConcurso; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li>
                            <div class="col-lg-12">
                                <form name="logout" method="post" action="$_SERVER['DOCUMENT_ROOT']./../controlador.php?controller=usuarios&amp;action=logout">
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
					<li>
                        <a href="./View/Admins/homeAdmin.php"><i class="fa fa-fw fa-desktop"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="controlador.php?controller=admins&amp;action=buscar"><i class="fa fa-fw fa-edit"></i> Buscar</a>
                    </li>
					
					<li class="active">
                        <a href="controlador.php?controller=admins&amp;action=validarPincho"><i class="fa fa-fw fa-table"></i>  Validar Pinchos</a>
                    </li>
                    <li>
                        <a href="controlador.php?controller=admins&amp;action=consultarPuntuacion"><i class="fa fa-fw fa-edit"></i> Consultar Puntuación</a>
                    </li>
                    <li>
                        <a href="controlador.php?controller=admins&amp;action=gestionarConcurso"><i class="fa fa-fw fa-edit"></i> Gestionar Concurso</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="page-header">
                        	<span style="font-size:30px"><strong> Validar Pinchos </strong></span>
                        </div>
                      
                            <div class="page-header">
                                <span style="font-size:18px"> Pincho </span>
                            </div>                    
                            <div>
                                <center>
                                	<IMG SRC="$_SERVER['DOCUMENT_ROOT']./../webroot/img/<?php echo $informacion[4] ?>" WIDTH=200 HEIGHT=200 ALT="Pincho Ejemplo">
                                </center>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Descripción: </label> <?php echo $informacion[2]; ?> <br>
                                    <label>Ingredientes: </label> <?php echo $informacion[3]; ?> <br>
                                    <label>Precio: </label> <?php echo $informacion[5]; ?> <br>
                       
                                </div>
                            <div>
                            <div class="col-lg-3">
                                <form name="validar" method="post" action="$_SERVER['DOCUMENT_ROOT']./../controlador.php?controller=pinchos&amp;action=validarPincho&amp;pincho=<?php echo $informacion[0] ?>">
                                        <button class="form-control" type="submit" name="Validar"><i class="fa fa-fw fa-power-off"></i>Validar</button>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <form name="rechazar" method="post" action="$_SERVER['DOCUMENT_ROOT']./../controlador.php?controller=pinchos&amp;action=rechazarPincho&amp;pincho=<?php echo $informacion[0] ?>">
                                        <button class="form-control" type="submit" name="Entrar"><i class="fa fa-fw fa-power-off"></i>Rechazar</button>
                                </form>
                            </div>
						</div>
<p style="display: none;">&nbsp;</p></div></div>                     
                    </div>
                 </div>
            </div>
        </div>
                <!-- /.row -->

            
            <!-- /.container-fluid -->

        
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="$_SERVER['DOCUMENT_ROOT']./../webroot/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="$_SERVER['DOCUMENT_ROOT']./../webroot/js/bootstrap.min.js"></script>


</body>

</html>
