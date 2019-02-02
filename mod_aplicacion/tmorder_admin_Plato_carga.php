<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
    $db->connect();

    $return_arr = array();
	$idplato = $_POST['idplato'];

	$query_plato = "SELECT *
                    	FROM plato
                        WHERE idplato = $idplato";
    
    $sql_plato = mysqli_query($db->connect(), $query_plato );
    
    $nro_plato = mysqli_num_rows($sql_plato);
    
    if( $nro_plato > 0 ) 
    {               
        while ( $row_plato = mysqli_fetch_assoc( $sql_plato ) ) 
        {
			$row_array['nombre']        =$row_plato['nombre_plato'];
    		$row_array['id']            =$row_plato['idplato'];
    		$row_array['valor']         =$row_plato['valor'];
    		$row_array['impuesto']      =$row_plato['impuesto'];
    		$row_array['costo']         =$row_plato['costo'];
    		$row_array['idcomanda']     =$row_plato['idcomanda'];
    		$row_array['complemento']   =$row_plato['totalComplementos'];
            $row_array['idgusto']       =$row_plato['idgusto'];
            $row_array['idcategoria']   =$row_plato['idcategoria'];
            $row_array['idsubcategoria']=$row_plato['idsubcategoria'];
            
    		array_push($return_arr,$row_array);
        }
        
        echo json_encode($return_arr);
    
    }
?>