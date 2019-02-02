<?php	
	include('../directiva.php');

	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

	$nombre 	 	 = $_POST['nombre'];
	$idtipoCategoria = $_POST['tipocategoria'];

	$query_categoria = "INSERT INTO categoria(nombre_categoria,idtipoCategoria)
				VALUES('$nombre',$idtipoCategoria)";

	$sql_categoria  = mysqli_query( $db->connect(), $query_categoria  );
	
		if( $sql_categoria ){
		echo"success";  
		}else{
		echo"error";
		}

?>