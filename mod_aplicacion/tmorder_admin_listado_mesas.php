<?php
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

    $tabla = '';

  	$registro = mysqli_query($db->connect(),"SELECT * FROM mesa");
	
	while($registro2 = mysqli_fetch_assoc($registro)){
		$tabla = $tabla.'<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                        <div class="panel panel-primary">
                            <a href="gestion_pedido.php?var='.$registro2['idmesa'].'">
                                <div class="panel-heading text-center">
                                    '.$registro2['nombre_mesa'].'
                                </div>
                            
                                <div class="panel-footer text-center">
                                    <span>'.$registro2['idmesa'].'</span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                      </div>';		
	}
        

        

    $tabla = $tabla.'</table>';
?>