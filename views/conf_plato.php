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
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/tmorder_plato.js"></script>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/jquery-ui.css"  rel="stylesheet">
    <link href="../css/style.css"  rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled small" id="page-top">
  <!-- Navigation-->
  <?php
        include('../views/menu.php');
    ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="panel.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>-->
      <div class="row">
        <div class="col-12">
            <div class="card mx-auto mt-1">
              <div class="card-header alert alert-info dropdown-toggle" role="tab" >
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseConfiguracion" aria-expanded="true" aria-controls="collapseOne">
                    Configuraci&oacute;n Nuevo Plato
                  </a>
              </div>
            <div id="collapseConfiguracion" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <div class="card-body">
                    <!--<form role="form" method='post'  action='../../mod_aplicacion/tmorder_admin_Plato_nuevo.php' name='datos'>-->
                    <form id="formulario" role="form" method='post'  action='' name='datos'>
                      
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-3">
                            <select name='categoria' id='categoria' class="form-control form-control-sm">
                            </select>
                          </div>
                          <div class="col-md-3">
                            <a id="modal-cat" href="#modal-container-cat" role="button" class="btn btn-info btn-sm" data-toggle="modal">Crear Categoria</a>
                          </div>
                          <div class="col-md-3">
                            <select name='subCat' id='subCat' class="form-control form-control-sm">
                              <option>Seleccione la subcategor&iacute;a</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <a id="modal-subcat" href="#modal-container-subcat" role="button" class="btn btn-info btn-sm" data-toggle="modal">Crear SubCategoria</a>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-12">
                            <input name='plato' id='plato' type="text" class="plato form-control form-control-sm" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese el nombre del Plato">
                            <input name="idplato" id="idplato" type="hidden" class="form-control form-control-sm">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <input name='valor' id='valor' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el valor">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input name='impuesto' id='impuesto' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el Impuesto">
                            </div>  
                          </div>
                          <!--<div class="col-md-3">
                            <div class="form-group">
                              <input name='costo' id='costo' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el Costo">
                            </div>
                          </div>-->
                          <div class="col-md-3">
                            <div class="form-group">
                                <select name='complemento' id='complemento' class="form-control form-control-sm">
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <select name='comanda' id='comanda' class="form-control form-control-sm">
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <select name='selgusto' id='selgusto' class="form-control form-control-sm">
                                </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-sm" style='float:right;'>Guardar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid-->
      <?php
        include("conf_plato_list.php");
      ?>
    </div> <!-- /.content-wrapper-->
    
    <?php
        include("footer.php");
        //VENTAL MODAL NUEVA CATEGORIA-->
        include("../modal/modalnuevacat.php");
        //VENTAL MODAL NUEVA SUBCATEGORIA-->
        include("../modal/modalnuevasubcat.php");
        //VENTAL MODAL MODIFICAR PLATO-->
        include("../modal/modalmodplato.php");
        //Logout Modal-->
        include("../modal/modalsalir.php");
    ?>

    <script type"javascript">
        cargarDatos();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>