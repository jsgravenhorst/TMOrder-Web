<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();
	$response = array();
	$telefono = $_POST['telefono'];

	$query_adminClientes = "SELECT telefono, 
                        		nombre_cliente,
								apellidos,
								direccion,
								email,
								empresa								
                    	FROM cliente
                        WHERE telefono = $telefono";
    
    $sql_adminClientes = mysqli_query( $db->connect(), $query_adminClientes );
    
    $nro_adminClientes = mysqli_num_rows($sql_adminClientes);
    
    
    if( $nro_adminClientes > 0 ) 
    {               
        while ( $row_adminClientes = mysqli_fetch_assoc( $sql_adminClientes ) ) 
        {
           $arreglo_datos[]= $row_adminClientes;
        }
        $response['consulta'] = $arreglo_datos;	
        
    }
    
    header('Content-type: text/plain');
    echo json_encode($response);
    
    /*if($nro_adminClientes === false)
    {
    	$response['error'] = 'usuario no encontrado';
    }else{
    	$response['data'] = $nro_adminClientes;
    	$response['error'] = 'ok';
    }
    header('Content-type: text/plain');
    echo json_encode($response);*/
    
    /*if( $nro_adminClientes > 0 ) 
    {               
        while ( $row_adminClientes = mysqli_fetch_assoc( $sql_adminClientes ) ) 
        {
           $nomCliente = $row_adminClientes['nombre'];
        }
        echo $nomCliente;
    }*/

?>