<?php
    if (isset($_GET['term'])){

        error_reporting(E_ALL ^ E_NOTICE);
    	require_once("../mod_conexion/db_conexion.php");
        $db = new DB_CONEXION();
        $db->connect();

        $return_arr = array();
    	$query_adminItem = "SELECT *
                        	FROM producto
                            WHERE descripcion LIKE '%" . mysqli_real_escape_string( $db->connect(),($_GET['term'])) . "%' LIMIT 0 ,50"; 
        
        $fetch = mysqli_query( $db->connect(), $query_adminItem );
          
        while ( $row = mysqli_fetch_array( $fetch )) 
        {
            $row_array['value']         = $row['descripcion'];
            $row_array['idproducto']    = $row['idproducto'];
            $row_array['descripcion']   = $row['descripcion'];

            array_push($return_arr, $row_array);
        }
        echo json_encode($return_arr);

    }
?>