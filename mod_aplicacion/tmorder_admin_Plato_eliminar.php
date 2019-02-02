<?php	
	include('../directiva.php');

	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

    $idplato	 = $_POST['idplato'];

	$query_delplato = "DELETE 
	                    FROM plato
	                    WHERE idplato = $idplato";

	$sql_delplato  = mysqli_query( $db->connect(), $query_delplato  );
	
		if( $sql_delplato ){
		    echo"success";  
		}else{
		    echo"error";
		}

?>