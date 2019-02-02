<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();

	$desproducto = $_POST['desproducto'];
    $idcantidad = $_POST['idcantidad'];
    $idmesa = $_POST['idmesa'];

    $query_adminItem = "SELECT idproducto, 
                                descripcion
                        FROM producto
                        WHERE descripcion LIKE '$desproducto'";
    
    $sql_adminItem = mysqli_query( $db->connect(), $query_adminItem );
    
    $nro_adminItem = mysqli_num_rows($sql_adminItem);
    
    if( $nro_adminItem > 0 ) 
    {               
        while ( $row_adminItem = mysqli_fetch_assoc( $sql_adminItem ) ) 
        {
            $idproducto .= $row_adminItem['idproducto'];

        }
    }




	$query_insertItem = "INSERT INTO pedidomesa(plato_idplato,asignacion_idasignacion,asignacion_mesa_idmesa,asignacion_usuario_idusuario,estado_idestado)
    VALUES($idproducto,1,$idmesa,1,1)";
    
    $sql_insertItem = mysqli_query( $db->connect(), $query_insertItem );
    
    

?>