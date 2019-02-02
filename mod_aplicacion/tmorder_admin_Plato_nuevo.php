<?php	
	include('../directiva.php');

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

	$query_confplato = "INSERT INTO plato(nombre_plato,impuesto,valor,costo,idcomanda,totalComplementos,idgusto, idcategoria, idsubcategoria)
				VALUES('$nombre','$impuesto','$valor','$costo',$comanda,'$complemento',$gusto,$categoria,$subcat)";

	$sql_confplato  = mysqli_query( $db->connect(), $query_confplato  );
	
		if( $sql_confplato ){
		echo"success";  
		}else{
		echo"error";
		}

?>