<?php	
	include('../directiva.php');

	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

	$nombre 	 	= $_POST['nombre'];
	$idCategoria    = $_POST['categorianueva'];

	$query_subcategoria = "INSERT INTO subcategoria(nombre_subcat,idcategoria)
				VALUES('$nombre',$idCategoria)";

	$sql_subcategoria  = mysqli_query( $db->connect(), $query_subcategoria  );
	
		if( $sql_subcategoria ){
		echo"success";    
		}else{
		echo"error";
		}
?>