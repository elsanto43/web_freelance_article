


                <?php
session_start();
require_once 'backend/PasswordHash.Class.php';
require_once 'backend/utils.php';
require_once 'backend/projects.php';
//Para redireccionar si es que no se cumple
//el logeo
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
				$uri = 'https://';
			}else{
				$uri = 'http://';
			}
		   $uri .= $_SERVER['HTTP_HOST'];

 if(!empty($_SESSION['INGRESO'])){
  if(count($_SESSION['INGRESO'])>0){
	  	  //Recuperamos datos del arreglo
	  	  $IDusr		=$_SESSION['INGRESO']["Id"];
	  	  $Ipusr		=$_SESSION['INGRESO']["Ip"];
	  	  $Claveusr   =$_SESSION['INGRESO']["Clave"];
	  	  $Nombreusr  =$_SESSION['INGRESO']["Nombre"];
	  	  $HorSesion  =$_SESSION['INGRESO']["hora"];
	      //instancia de la clase PHpass
	      $Contrasena = new PasswordHash(8, FALSE);
	      //se uni los datos para verificar
	      $Ccontrase=$IDusr.$Ipusr.$Nombreusr.$HorSesion;
	      if($Contrasena->CheckPassword($Ccontrase, $Claveusr)){
	       ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create new project</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="btn-group">
        <span class="input-group-text">
          <i class="fas fa-dollar-sign"></i>
        </span>
        <button type="button" class="btn btn-flat btn-default"  ><?php echo userF::get_user_money($IDusr);?></button>
        <a href="buy-entrys.php"  class=""><button type="button" style="height:40px; border-top-left-radius:0px;border-bottom-left-radius:0px;" class="btn btn-info">Add</button></a>
      </div>
      <!-- Navbar Search -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="account.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="support.php" class="nav-link">Support</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="exit.php" class="btn btn-danger">Exit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> 

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link elevation-4">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="account.php" class="d-block"><?php echo $Nombreusr; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            
            <li class="nav-item">
              <a href="account.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                My account
                  
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="projects.php" class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  
                  <p><b>Projects</b></p>
                </a>
              </li>
            <li class="nav-item">
              <a href="buy-entrys.php" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Buy entrys
                  
                </p>
              </a>
            </li>
          </li>
          <li class="nav-item">
              <a href="support.php" class="nav-link">
                <i class="nav-icon fas fa">?</i>
                <p>
                Support
                  
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="exit.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <span class="left badge badge-danger">Close</span>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create project</h1>
          </div>
          <!-- /.container-fluid <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">My proyects</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">New project</h3>

                
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>-->
                  </div>
                </div>
              </div>
<!-- /.card-header -->
            
          <!-- /.card-header -->
          <div class="card-body">
            <form id="newproject" action="newproject.php" method="POST">
              <div class="row">
                <div class="col-sm-6">
                
                  <div class="form-group">
                    <label for="Name">Project Name</label>
                    <input name="name" type="text" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Description">Project Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputStatus">Type</label>
                    <select name="type" id="type" class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected">Small article</option>
                        <option>Medium article</option>
                        <option>Large article</option>
                        <option>Very large article</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Class</label>
                      <select name="class" id="class" class="form-control select2bs4" style="width: 100%;">
                      <?php 
                      
                      echo  userF::list_Classes("1") ; 
                      ?>
                      
                      </select>
                  </div>
                    <div class="form-group">
                      <label for="inputStatus">Number of articles</label>
                      <select name="numberart" id="numberart" class="form-control select2bs4" style="width: 100%;">
                          <option selected>1</option>
                          <option >2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                        </select>
                    </div>
                
                </div>
                
              </div>
              
              <?php 
              if(!empty($_POST['name']) && !empty($_POST['description']) ) {
                    $iniciar=new Project($_POST['name'],$_POST['description'],$_POST['class'],
                                         $_POST['type'],$_POST['numberart']);
                    $iniciar->newProject();
                      //Muestra el mesaje de error al usuario
                    echo $iniciar->MostrarMsg();

              } 

              
              ?>
              <!--<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h6><i class="icon fas fa-ban"></i> Error!</h6>Write a valid password</div>
               /.row -->
               <div class="row">
                <div class="col-12">
                  <a href="account.php" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                </div>
              </div>
            </form>
          </div>
        
        
            
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
       }else{
     //Se redicciona si es que no se cumple
  	//Modificar como en la siguiete linea de codigo
  	//si es que esta en un subdirectorio
  	// header("location: ".$uri."/wp-admin"); 
    header("location: ./login.php");
          }
      }else{
        //Se redicciona si es que no se cumple
        //Modificar como en la siguiete linea de codigo
        //si es que esta en un subdirectorio
        // header("location: ".$uri."/wp-admin"); 
        header("location: ./login.php");
      }

    }else{
      //redirecionado si no existe la variable global
      //Modificar como en la siguiete linea de codigo
        //si es que esta en un subdirectorio
        // header("location: ".$uri."/wp-admin");
        header("location: ./login.php");
    }


 /**
 * Returna el IP de usuario
 * @return [string] [devuel la io del usuario]
 */
function IPuser() {
	$returnar ="";
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
     $returnar=$_SERVER['HTTP_X_FORWARDED_FOR'];}
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
     $returnar=$_SERVER['HTTP_CLIENT_IP'];}
if(!empty($_SERVER['REMOTE_ADDR'])){
	 $returnar=$_SERVER['REMOTE_ADDR'];}
return $returnar;
}
?>