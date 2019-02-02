<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();
  
	$paginaActual = $_POST['partida'];

    $nroProductos= mysqli_num_rows(mysqli_query($db->connect(),"SELECT * FROM categoria"));
    $nroLotes = 2;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($db->connect(),"SELECT * FROM categoria LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table width="100%" align="center">
        <tr>
             <td align="right" height="30">
                <a href="categorias_new.php" style="text-decoration:none; color:#000;"><b>Adicionar Nueva Categor&iacute;a </b><i class="fa fa-plus-square"></i></a>
             </td>
        </tr>
    </table>
    <table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="40">Id</th>
			                <th width="80%">Descripci&oacute;n Categor&iacute;a</th>
			                <th width="40" align="right">Modificar</th>
			                <th width="40"align="right">Eliminar</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_assoc($registro)){
		$tabla = $tabla.'<tr>
					<td align="center" width="40">'.$registro2['idcategoria'].'</td>
					<td align="left" width="80%">'.$registro2['descripcion'].'</td>
					<td align="center" width="20" height="20"><a href="javascript:editarCategoria('.$registro2['idcategoria'].');" class="glyphicon glyphicon-edit"></a></td>
					<td align="center" width="20" height="20"> <a href="javascript:eliminarCategoria('.$registro2['idcategoria'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,1 => $lista);

    echo json_encode($array);
?>