<?php
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

	$paginaActual = $_GET['partida'];

    $nroProductos= mysqli_num_rows(mysqli_query($db->connect(),"SELECT * FROM comanda"));
    $nroLotes = 10;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

 if($paginaActual < 1){
 	$paginaActual = 1;
 }

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="comanda.php?partida='.($paginaActual-1).'">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="comanda.php?partida='.$i.'">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="comanda.php?partida='.$i.'">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="comanda.php?partida='.($paginaActual+1).'">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($db->connect(),"SELECT * FROM comanda LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table width="100%" align="center">
        <tr>
             <td align="right" height="30">
                <a href="comanda_nueva.php" style="text-decoration:none; color:#000;"><b>Adicionar Nueva Comanda </b><i class="fa fa-plus-square"></i></a>
             </td>
        </tr>
    </table>
    <table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="40">Id</th>
			                <th width="80%">Descripci&oacute;n Comanda</th>
			                <th width="40" align="right">Modificar</th>
			                <th width="40"align="right">Eliminar</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_assoc($registro)){
		$tabla = $tabla.'<tr>
					<td align="center" width="40">'.$registro2['idcomanda'].'</td>
					<td align="left" width="80%">'.$registro2['nombre_comanda'].'</td>
					<td align="center" width="20" height="20"><a href="comanda_mod.php?var='.$registro2['idcomanda'].'" class="glyphicon glyphicon-edit"></a></td>
					<td align="center" width="20" height="20"> <a href="javascript:eliminarComanda('.$registro2['idcomanda'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';		
	}
        

    $tabla = $tabla.'</table>';
?>