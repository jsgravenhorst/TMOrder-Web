<?php	
	include('../directiva.php');

	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

    $idplato	 = $_POST['idplatomod'];
	$categoria	 = $_POST['categoriamod'];
	$subcat		 = $_POST['subCatmod'];
	$nombre 	 = $_POST['nombremod'];
	$valor 	 	 = $_POST['valormod'];			
	$impuesto 	 = $_POST['impuestomod'];
	$costo 	 	 = $_POST['costomod'];
	$comanda	 = $_POST['comandamod'];
	$complemento = $_POST['complementomod'];
	$gusto		 = $_POST['selgustomod'];

	$query_modplato = "UPDATE plato
	                    SET nombre_plato        = '$nombre',
	                        impuesto            = $impuesto,
	                        valor               = $valor,
	                        costo               = $costo,
	                        idcomanda           = $comanda,
	                        totalComplementos   = '$complemento',
	                        idgusto             = $gusto,
	                        idcategoria         = $categoria,
	                        idsubcategoria      = $subcat
	                    WHERE idplato           = $idplato";

	$sql_modplato  = mysqli_query( $db->connect(), $query_modplato  );
	
		if( $sql_modplato ){
		echo"success";  
		}else{
		echo"error";
		}

?>