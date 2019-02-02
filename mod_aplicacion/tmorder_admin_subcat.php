<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();

	$idcategoria = $_POST['idcategoria'];

	$query_adminSubCat = "SELECT idsubcategoria, 
                        		nombre_subcat
                    	FROM subcategoria
                        WHERE idcategoria = $idcategoria";
    
    $sql_adminSubCat = mysqli_query( $db->connect(), $query_adminSubCat );
    
    $nro_adminSubCat = mysqli_num_rows($sql_adminSubCat);
    
    if( $nro_adminSubCat > 0 ) 
    {               
        while ( $row_adminSubCat = mysqli_fetch_assoc( $sql_adminSubCat ) ) 
        {
            $html .= '<option value="'.$row_adminSubCat['idsubcategoria'].'">'.$row_adminSubCat['nombre_subcat'].'</option>';
        }
        echo $html;
    }

?>