<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	if(!isset($_SESSION['auth']) == "yes"){
		header("location:admin.php");
	} else {
		if(isset($_POST['cerrar'])){
		session_unset();
		session_destroy();
		header("location:admin.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> TMOrder </title>

    <link rel="stylesheet" href="../Admin/css/jquery-ui.css">
    <script src="../Admin/js/bootstrap.min.js"></script>
    <script src="../Admin/js/jquery.js"></script>
    <script src="../Admin/js/jquery-1.10.2.js"></script>
    <script src="../Admin/js/jquery-ui.js"></script>
    <link href="../Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Admin/css/sb-admin.css" rel="stylesheet">
    <link href="../Admin/css/plugins/morris.css" rel="stylesheet">
    <link href="../Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>

	<div id='wrapper'>

		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			require_once("../mod_conexion/db_conexion.php");
			$db = new DB_CONEXION();
			$db->connect();

			$idunidad	 = $_GET['var'];

			$query_unidad = "DELETE FROM unidad
								WHERE idunidad = $idunidad";

			$sql_unidad = mysqli_query( $db->connect(), $query_unidad  );
			
			include('../Admin/menu.php');
			
				if( $sql_unidad ){
				echo"
				<div id='page-wrapper'>
					<div class='container-fluid'>
						<div class='row'>
							<div class='panel panel-primary'>
				                            <div class='alert alert-success'>Eliminar Unidad</div>
				                            <div class='panel-body'>
				                                <div class='row'>
				                                    <div class='col-md-12'>
									<div class='alert alert-success'>Los datos han sido eliminados con &eacute;xito</div>
									</div>
								</div>
							    </div>
							</div>
						</div>
					</div>
				</div>";  
				}else{
				echo"<div id='page-wrapper'>
					<div class='container-fluid'>
						<div class='row'>
						<div class='panel panel-primary'>
				                            <div class='alert alert-warning'>Eliminar Unidad</div>
				                            <div class='panel-body'>
				                                <div class='row'>
				                                    <div class='col-md-12'>
									<div class='alert alert-warning'>Datos errados o el registro ya existe</div>
									</div>
								</div>
							    </div>
							</div>
						
							
						</div>
					</div>
				</div>";
				}
			echo"
				<br>
				<br>
				<div class='col-md-12'>
					<div><a class='btn btn-primary btn-large' style='float:right;' href='../Admin/conf_unidad.php'>Continuar</a></div>
				</div>
			";

		?>

	</div>

    <script src="../Admin/js/bootstrap.min.js"></script>
  </body>
</html>