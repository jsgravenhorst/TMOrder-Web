<?php 
    include('../directiva.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TMOrder</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-light sidenav-toggled small" id="page-top">
  <!-- Navigation-->
  <?php
  include("menu.php");
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb alert alert-info">
        <li class="breadcrumb-item">
          Panel Principal
        </li>
        <li class="breadcrumb-item active"></li>
      </ol>
      <div class="row">

        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="conf_cat.php">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calculator"></i>
              </div>
              
            </div>
            
              <span class="float-left">CAJA</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file"></i>
              </div>
              
            </div>
            
              <span class="float-left">FACTURAS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file-excel-o"></i>
              </div>
              
            </div>
            
              <span class="float-left">ANULA FACTURAS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="conf_plato.php">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-flask"></i>
              </div>
              
            </div>
            
              <span class="float-left">F&Oacute;RMULAS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file-text"></i>
              </div>
              
            </div>
            
              <span class="float-left">K&Aacute;RDEX</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-undo"></i>
              </div>
              
            </div>
            
              <span class="float-left">REVERSO</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              
            </div>
            
              <span class="float-left">COMPRAS CAJA</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-bag"></i>
              </div>
              
            </div>
            
              <span class="float-left">COMPRAS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-bar-chart"></i>
              </div>
              
            </div>
            
              <span class="float-left">INFORMES</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-area-chart"></i>
              </div>
              
            </div>
            
              <span class="float-left">INFORMES ESPECIALES</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-check-square-o"></i>
              </div>
              
            </div>
            
              <span class="float-left">VENTAS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              
            </div>
            
              <span class="float-left">N&Oacute;MINA</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              
            </div>
            
              <span class="float-left">USUARIOS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list-alt"></i>
              </div>
              
            </div>
            
              <span class="float-left">INVENTARIO A CEROS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-th"></i>
              </div>
              
            </div>
            
              <span class="float-left">PRODUCCI&Oacute;N</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-gear"></i>
              </div>
              
            </div>
            
              <span class="float-left">REMISIONES</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-minus-square-o"></i>
              </div>
              
            </div>
            
              <span class="float-left">GASTOS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-truck"></i>
              </div>
              
            </div>
            
              <span class="float-left">MATERIA PRIMA</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              
            </div>
            
              <span class="float-left">PRECIOS</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card text-white bg-info o-hidden h-100">
            <a class="card-footer text-white clearfix small z-1" href="#">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-get-pocket"></i>
              </div>
              
            </div>
            
              <span class="float-left">CUADRES</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div>
    </div><!-- /.container-fluid-->
    <?php 
        include("footer.php");
        include("../modal/modalsalir.php");
    ?>
    </div><!-- /.content-wrapper-->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
  
</body>

</html>
