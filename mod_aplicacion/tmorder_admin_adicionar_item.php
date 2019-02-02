<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();

	$idproducto = $_POST['idproducto'];

	$query_adminItem = "SELECT idproducto, 
                        		descripcion
                    	FROM producto
                        WHERE descripcion LIKE '$idproducto'";
    
    $sql_adminItem = mysqli_query( $db->connect(), $query_adminItem );
    
    $nro_adminItem = mysqli_num_rows($sql_adminItem);
    
    if( $nro_adminItem > 0 ) 
    {               
        while ( $row_adminItem = mysqli_fetch_assoc( $sql_adminItem ) ) 
        {
            //$html .= $row_adminItem['descripcion'];
            $detpedido .= '<div class="col-md-8">
                                <input id="detpedido" name="detpedido" type ="text" value="'.$row_adminItem['descripcion'].'" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input id="cantpedido" name="cantpedido" type ="text" value="'.$idproducto.'" class="form-control">
                            </div>';
        }
        echo $detpedido;
    }

?>