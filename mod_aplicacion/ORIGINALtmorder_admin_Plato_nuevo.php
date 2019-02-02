<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	if(!isset($_SESSION['auth']) == "yes"){
		header("location:index.php");
	} else {
		if(isset($_POST['cerrar'])){
		session_unset();
		session_destroy();
		header("location:index.php");
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

			$categoria	 = $_POST['categoria'];
			$subcat		 = $_POST['subCat'];
			$nombre 	 = $_POST['nombre'];
			$valor 	 	 = $_POST['valor'];			
			$impuesto 	 = $_POST['impuesto'];
			$costo 	 	 = $_POST['costo'];
			$comanda	 = $_POST['comanda'];
			$complemento = $_POST['complemento'];
			$gusto		 = $_POST['selgusto'];

			$query_cliente = "INSERT INTO plato(nombre_plato,impuesto,valor,costo,idcomanda,totalComplementos,idgusto)
						VALUES('$nombre','$impuesto','$valor','$costo',$comanda,'$complemento',$gusto)";

			$sql_cliente  = mysqli_query( $db->connect(), $query_cliente  );
			
				if( $sql_cliente ){
				echo"
				<div id='page-wrapper'>
					<div class='container-fluid'>
						<div class='row'>
							<div class='panel panel-primary'>
				                            <div class='alert alert-success'>Nuevo Plato</div>
				                            <div class='panel-body'>
				                                <div class='row'>
				                                    <div class='col-md-12'>
									<div class='alert alert-success'>Los datos han sido ingresados con &eacute;xito</div>
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
				                            <div class='alert alert-warning'>Nuevo Plato</div>
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
					<div><a class='btn btn-primary btn-large' style='float:right;' href='../Admin/conf_plato.php'>Continuar</a></div>
				</div>
			";

		?>

	</div>

    <script src="../Admin/js/bootstrap.min.js"></script>
  </body>
</html>