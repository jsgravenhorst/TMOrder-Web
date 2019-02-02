<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
    $db->connect();

    $lista = $_POST["lista"];
    $data = "";

    if($lista == 0){
        $query_datos = "SELECT *
                        FROM tipocategoria";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione el tipo de Categoria</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idtipoCategoria"];
                $nombre     = $row_datos["nombre_tipocat"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 1){
        $query_datos = "SELECT concat_ws(' - ',c.nombre_categoria, t.nombre_tipocat) as nombre,
                          c.nombre_categoria nombre_categoria,
                          c.idcategoria idcategoria,
                          t.idtipoCategoria
                          FROM categoria c, tipocategoria t
                          WHERE c.idtipoCategoria = t.idtipoCategoria
                          AND t.idtipoCategoria = 2
                          ORDER BY 4,2";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione la categoria</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idcategoria"];
                $nombre     = $row_datos["nombre_categoria"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 2){
        $query_datos = "SELECT concat_ws(' - ',c.nombre_categoria, t.nombre_tipocat) as nombre,
                          c.nombre_categoria,
                          c.idcategoria,
                          t.idtipoCategoria
                		   		FROM categoria c, tipocategoria t
                          WHERE c.idtipoCategoria = t.idtipoCategoria
                		   		ORDER BY 4,2";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione la categoria</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idcategoria"];
                $nombre     = $row_datos["nombre"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 3){
        $query_datos = "SELECT *
                          FROM subcategoria 
                          ORDER BY nombre_subcat";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione la subcategoria</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idsubcategoria"];
                $nombre     = $row_datos["nombre_subcat"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 4){
        $query_datos = "SELECT *
                        FROM complemento";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione el complemento</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idcomplemento"];
                $nombre     = $row_datos["nombre_complemento"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 5){
        $query_datos = "SELECT *
                        FROM comanda";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione la comanda</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idcomanda"];
                $nombre     = $row_datos["nombre_comanda"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }elseif($lista == 6){
        $query_datos = "SELECT *
                        FROM gusto";
        
        $sql_datos = mysqli_query($db->connect(), $query_datos );
        
        $nro_datos = mysqli_num_rows($sql_datos);
        
        if( $nro_datos > 0 ) 
        {   
            $data .= "<option>Seleccione el gusto</option>";
            while ( $row_datos = mysqli_fetch_assoc( $sql_datos ) ) 
            {   
                $id         = $row_datos["idgusto"];
                $nombre     = $row_datos["nombre_gusto"];
    			$data       .= "<option value='$id'>$nombre</option>";
            }
            echo $data;
        }
    }
    
    
?>