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
                                <form name="logout" method="post" action="controlador.php?controller=usuarios&amp;action=logout">
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
                        <a href="controlador.php?controller=usuarios&amp;action=buscar"><i class="fa fa-fw fa-edit"></i> Buscar</a>
                    </li>
                    <li>
                        <a href="controlador.php?controller=admins&amp;action=validarPincho"><i class="fa fa-fw fa-table"></i> Validar Pinchos</a>
                    </li>
                    <li>
                        <a href="controlador.php?controller=admins&amp;action=consultarPuntuacion"><i class="fa fa-fw fa-edit"></i> Consultar Puntuación</a>
                    </li>
                    <li class="active">
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
                        <h1 class="page-header">Gestionar concurso</h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- Lo que hace el action es llamar al index.php que esta en directorio principal. Este index lo que hace es: con la variable controller que le pasamos por url compone una nueva url haciendo que la primera letra del controller que le pasamos sea mayuscula y concatenandole Controller quedando ConcursantesController y ademas compone la URL completa ya que sabe que esta en la carpeta /Controller -->
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                    <form method="post" action="../appPinchos/controlador.php?controller=admins&amp;action=gestionarConcurso">
						<?php $p = mysql_fetch_array($datos); ?>                                                 
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" name="nombre" disabled value="<?php echo $p[0]; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" name="fecha" value="<?php echo $p[1]; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Bases</label>
                            <input class="form-control" name="bases" value="<?php echo $p[2]; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Premios</label>
                            <input class="form-control" name="premios" value="<?php echo $p[3]; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Patrocinadores</label>
                            <input class="form-control" name="patrocinadores" value="<?php echo $p[4]; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input class="form-control" name="logo" value="<?php echo $p[5]; ?>"/>
                        </div>                                             
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-default" style="float: right" name="editarConcurso">Modificar</button>
                        </div>
                    </form>
                    </div>
                    <div class="col-lg-3">
               		</div>
            </div>
            <!-- /.container-fluid -->
			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="$_SERVER['DOCUMENT_ROOT']./../webroot/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="$_SERVER['DOCUMENT_ROOT']./../webroot/js/bootstrap.min.js"></script>

</body>

</html>
