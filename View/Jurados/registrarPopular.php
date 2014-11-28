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
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Registrar <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li>
                        	 <a href="../Concursantes/registrar.php">Concursante</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          	<a href="../Jurados/registrarPopular.php">Jurado</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Iniciar Sesión <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <form name="login" method="post" action="../../controlador.php?controller=usuarios&amp;action=login">
                            <li>
                                <div class="col-lg-12">
                                    <input class="form-control" placeholder="Login" name="login" style="margin-bottom: 4px;" />
                                </div>
                            </li>
                            <li>
                                <div class="col-lg-12">              
                                    <input class="form-control" placeholder="Password" name="pass" style="margin-bottom: 4px;" />
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="col-lg-12">
                                <button class="form-control" type="submit" name="Entrar"><i class="fa fa-fw fa-power-off"></i>Entrar</button>
                                </div>
                            </li>
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li class="active">
                        <a href="#"><i class="fa fa-fw fa-desktop"></i> Home</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> Pinchos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-edit"></i> Votar</a>
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
                            Registrar Jurado
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <form name="registrar" method="post" action="../../controlador.php?controller=jurados&amp;action=registrar"> 
                <!-- Lo que hace el action es llamar al index.php que esta en directorio principal. Este index lo que hace es: con la variable controller que le pasamos por url compone una nueva url haciendo que la primera letra del controller que le pasamos sea mayuscula y concatenandole Controller quedando ConcursantesController y ademas compone la URL completa ya que sabe que esta en la carpeta /Controller -->
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">Introduzca los datos del Jurado</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input class="form-control" name="nombre">
                                    </div>
                                </div>
                            </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-default" style="float: right">Registrarse</button>
                    </div>
                    </div>
                    <div class="col-lg-3">
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
