<?php

/**
 * @author Olonte Apps
 * @copyright 2014
 */

class DB_Funciones {
 
    private $db;
    
    function __construct() {
        require_once("db_conexion.php");
        $this->db = new DB_CONEXION();
        $this->db->connect();
    }
 
  function __destruct() {        
  }
  
    public function validaUsuario($nick, $password){
  
    $query_user = "SELECT usuario, 
                        passw, 
                        nombre_usuario, 
                        idusuario 
                    FROM usuario 
                    WHERE usuario = '$nick' and passw= '$password'";
    
    $sql_user = mysqli_query( $this->db->connect(), $query_user );
    
    $nro_user = mysqli_num_rows($sql_user);
    
    if( $nro_user > 0 ) 
    {               
        while ( $row_user = mysqli_fetch_assoc( $sql_user ) ) 
        {
            $arreglo_user[]= $row_user;
        }
        return $arreglo_user;
    }else{
        return false;
    } 
    
  }
  
  //---Consulta el listado de configuración de platos
  public function adminConsultaListPlatos(){
  
    $query_adminConsultaListPlatos = "SELECT *
          FROM plato
          ORDER BY idplato";
    
    $sql_adminConsultaListPlatos = mysqli_query( $this->db->connect(), $query_adminConsultaListPlatos );
    
    $nro_adminConsultaListPlatos = mysqli_num_rows($sql_adminConsultaListPlatos);
    
    if( $nro_adminConsultaListPlatos > 0 ) 
    {               
        while ( $row_adminConsultaListPlatos = mysqli_fetch_assoc( $sql_adminConsultaListPlatos ) ) 
        {
            $arreglo_adminConsultaListPlatos[]= $row_adminConsultaListPlatos;
        }
        return $arreglo_adminConsultaListPlatos;
    }else{
        return false;
    } 
    
  }
  
  //---Consulta las categorías
  public function adminCargarTipoCategoria(){
  
    $query_adminTipoCategoria = "SELECT *
          FROM tipocategoria
          ORDER BY nombre_tipocat";
    
    $sql_adminTipoCategoria = mysqli_query( $this->db->connect(), $query_adminTipoCategoria );
    
    $nro_adminTipoCategoria = mysqli_num_rows($sql_adminTipoCategoria);
    
    if( $nro_adminTipoCategoria > 0 ) 
    {               
        while ( $row_adminTipoCategoria = mysqli_fetch_assoc( $sql_adminTipoCategoria ) ) 
        {
            $arreglo_adminTipoCategoria[]= $row_adminTipoCategoria;
        }
        return $arreglo_adminTipoCategoria;
    }else{
        return false;
    } 
    
  }

  //---Consulta las categorías
  public function adminCargarCategoria(){
  
    $query_adminCategoria = "SELECT concat_ws(' - ',c.nombre_categoria, t.nombre_tipocat) as nombre,
          c.nombre_categoria,
          c.idcategoria,
          t.idtipoCategoria
		   		FROM categoria c, tipocategoria t
          WHERE c.idtipoCategoria = t.idtipoCategoria
		   		ORDER BY 4,2";
    
    $sql_adminCategoria = mysqli_query( $this->db->connect(), $query_adminCategoria );
    
    $nro_adminCategoria = mysqli_num_rows($sql_adminCategoria);
    
    if( $nro_adminCategoria > 0 ) 
    {               
        while ( $row_adminCategoria = mysqli_fetch_assoc( $sql_adminCategoria ) ) 
        {
            $arreglo_adminCategoria[]= $row_adminCategoria;
        }
        return $arreglo_adminCategoria;
    }else{
        return false;
    } 
    
  }
  

  //---Consulta las categorías para los platos
  public function adminCargarCategoriaPlato(){
  
    $query_adminCategoria = "SELECT concat_ws(' - ',c.nombre_categoria, t.nombre_tipocat) as nombre,
          c.nombre_categoria,
          c.idcategoria,
          t.idtipoCategoria
          FROM categoria c, tipocategoria t
          WHERE c.idtipoCategoria = t.idtipoCategoria
          AND t.idtipoCategoria = 2
          ORDER BY 4,2";
    
    $sql_adminCategoria = mysqli_query( $this->db->connect(), $query_adminCategoria );
    
    $nro_adminCategoria = mysqli_num_rows($sql_adminCategoria);
    
    if( $nro_adminCategoria > 0 ) 
    {               
        while ( $row_adminCategoria = mysqli_fetch_assoc( $sql_adminCategoria ) ) 
        {
            $arreglo_adminCategoria[]= $row_adminCategoria;
        }
        return $arreglo_adminCategoria;
    }else{
        return false;
    } 
    
  }
  
  //---Consulta las categorías a modificar según el idcategoria
  public function adminCargarCatMod($idCategoria){
  
    $query_adminCategoriaMod = "SELECT *
		   		FROM categoria c, tipocategoria t
		   		WHERE c.idtipoCategoria = t.idtipoCategoria
          AND c.idcategoria = $idCategoria
		   		ORDER BY c.nombre_categoria";
    
    $sql_adminCategoriaMod = mysqli_query( $this->db->connect(), $query_adminCategoriaMod );
    
    $nro_adminCategoriaMod = mysqli_num_rows($sql_adminCategoriaMod);
    
    if( $nro_adminCategoriaMod > 0 ) 
    {               
        while ( $row_adminCategoriaMod = mysqli_fetch_assoc( $sql_adminCategoriaMod ) ) 
        {
            $arreglo_adminCategoriaMod[]= $row_adminCategoriaMod;
        }
        return $arreglo_adminCategoriaMod;
    }else{
        return false;
    }
    
  }


//---Consulta las subcategorías
  public function adminCargarSubCategoria(){
  
    $query_adminSubCategoria = "SELECT *
          FROM subcategoria 
          ORDER BY nombre_subcat";
    
    $sql_adminSubCategoria = mysqli_query( $this->db->connect(), $query_adminSubCategoria );
    
    $nro_adminSubCategoria = mysqli_num_rows($sql_adminSubCategoria);
    
    if( $nro_adminSubCategoria > 0 ) 
    {               
        while ( $row_adminSubCategoria = mysqli_fetch_assoc( $sql_adminSubCategoria ) ) 
        {
            $arreglo_adminSubCategoria[]= $row_adminSubCategoria;
        }
        return $arreglo_adminSubCategoria;
    }else{
        return false;
    } 
    
  }


  //---Consulta las subcategorías a modificar según el idsubcategoria
  public function adminCargarSubCatMod($idSubCategoria){
  
    /*$query_adminSubCategoriaMod = "SELECT c.idcategoria,
									c.nombre_categoria,
									s.idsubcategoria,
							        s.nombre_subcat
						   		FROM categoria c, subcategoria s
						   		WHERE s.idcategoria = c.idcategoria
				                AND s.idsubcategoria = $idSubCategoria
						   		ORDER BY s.nombre_subcat";*/

    $query_adminSubCategoriaMod = "SELECT concat_ws(' - ',c.nombre_categoria, t.nombre_tipocat) as nombre,
                  c.idcategoria,
                  c.nombre_categoria,
                  t.nombre_tipocat,
                  s.idsubcategoria,
                      s.nombre_subcat
                  FROM categoria c, subcategoria s, tipocategoria t
                  WHERE s.idcategoria = c.idcategoria
                  AND s.idsubcategoria = $idSubCategoria
                  AND c.idtipoCategoria = t.idtipoCategoria
                  ORDER BY s.nombre_subcat";
    
    $sql_adminSubCategoriaMod = mysqli_query( $this->db->connect(), $query_adminSubCategoriaMod );
    
    $nro_adminSubCategoriaMod = mysqli_num_rows($sql_adminSubCategoriaMod);
    
    if( $nro_adminSubCategoriaMod > 0 ) 
    {               
        while ( $row_adminSubCategoriaMod = mysqli_fetch_assoc( $sql_adminSubCategoriaMod ) ) 
        {
            $arreglo_adminSubCategoriaMod[]= $row_adminSubCategoriaMod;
        }
        return $arreglo_adminSubCategoriaMod;
    }else{
        return false;
    }

  }



//---Consulta las subcategorías
  public function adminCargarSubCatInsumo(){
  
    $query_adminSubCategoria = "SELECT *
          FROM categoria c, tipocategoria t
          WHERE c.idtipoCategoria = t.idtipoCategoria
          AND t.idtipoCategoria = 1
          ORDER BY t.nombre_tipocat";
    
    $sql_adminSubCategoria = mysqli_query( $this->db->connect(), $query_adminSubCategoria );
    
    $nro_adminSubCategoria = mysqli_num_rows($sql_adminSubCategoria);
    
    if( $nro_adminSubCategoria > 0 ) 
    {               
        while ( $row_adminSubCategoria = mysqli_fetch_assoc( $sql_adminSubCategoria ) ) 
        {
            $arreglo_adminSubCategoria[]= $row_adminSubCategoria;
        }
        return $arreglo_adminSubCategoria;
    }else{
        return false;
    } 
    
  }

//---Consulta las comandas
  public function adminCargarComanda(){
  
    $query_adminComanda = "SELECT *
          FROM comanda 
          ORDER BY nombre_comanda";
    
    $sql_adminComanda = mysqli_query( $this->db->connect(), $query_adminComanda );
    
    $nro_adminComanda = mysqli_num_rows($sql_adminComanda);
    
    if( $nro_adminComanda > 0 ) 
    {               
        while ( $row_adminComanda = mysqli_fetch_assoc( $sql_adminComanda ) ) 
        {
            $arreglo_adminComanda[]= $row_adminComanda;
        }
        return $arreglo_adminComanda;
    }else{
        return false;
    } 
    
  }


 //---Consulta las comandas a modificar según el idcomanda
  public function adminCargarComandaMod($idComanda){
  
    $query_adminComandaMod = "SELECT *
		   		FROM comanda
		   		WHERE idcomanda = $idComanda
		   		ORDER BY nombre_comanda";
    
    $sql_adminComandaMod = mysqli_query( $this->db->connect(), $query_adminComandaMod );
    
    $nro_adminComandaMod = mysqli_num_rows($sql_adminComandaMod);
    
    if( $nro_adminComandaMod > 0 ) 
    {               
        while ( $row_adminComandaMod = mysqli_fetch_assoc( $sql_adminComandaMod ) ) 
        {
            $arreglo_adminComandaMod[]= $row_adminComandaMod;
        }
        return $arreglo_adminComandaMod;
    }else{
        return false;
    }
    
  }

//---Consulta los Gustos
  public function adminCargarGusto(){
  
    $query_adminGusto = "SELECT *
          FROM gusto 
          ORDER BY nombre_gusto";
    
    $sql_adminGusto = mysqli_query( $this->db->connect(), $query_adminGusto );
    
    $nro_adminGusto = mysqli_num_rows($sql_adminGusto);
    
    if( $nro_adminGusto > 0 ) 
    {               
        while ( $row_adminGusto = mysqli_fetch_assoc( $sql_adminGusto ) ) 
        {
            $arreglo_adminGusto[]= $row_adminGusto;
        }
        return $arreglo_adminGusto;
    }else{
        return false;
    } 
    
  }


 //---Consulta los complementos a modificar según el idcomplemento
  public function adminCargarComplementoMod($idComplemento){
  
    $query_adminComplementoMod = "SELECT c.idcomplemento,
                                          c.nombre_complemento,
                                          s.idsubcategoria,
                                          s.nombre_subcat
                                    FROM complemento c, subcategoria s
                                    WHERE c.idcomplemento = $idComplemento
                                    AND c.idsubcategoria = s.idsubcategoria
                                    ORDER BY c.nombre_complemento";
    
    $sql_adminComplementoMod = mysqli_query( $this->db->connect(), $query_adminComplementoMod );
    
    $nro_adminComplementoMod = mysqli_num_rows($sql_adminComplementoMod);
    
    if( $nro_adminComplementoMod > 0 ) 
    {               
        while ( $row_adminComplementoMod = mysqli_fetch_assoc( $sql_adminComplementoMod ) ) 
        {
            $arreglo_adminComplementoMod[]= $row_adminComplementoMod;
        }
        return $arreglo_adminComplementoMod;
    }else{
        return false;
    }
    
  }

//---Consulta los clientes a modificar según el idcliente
  public function adminCargarClienteMod($idCliente){
  
    $query_adminClienteMod = "SELECT *
		   		FROM cliente
		   		WHERE idcliente = $idCliente
		   		ORDER BY nombre_cliente";
    
    $sql_adminClienteMod = mysqli_query( $this->db->connect(), $query_adminClienteMod );
    
    $nro_adminClienteMod = mysqli_num_rows($sql_adminClienteMod);
    
    if( $nro_adminClienteMod > 0 ) 
    {               
        while ( $row_adminClienteMod = mysqli_fetch_assoc( $sql_adminClienteMod ) ) 
        {
            $arreglo_adminClienteMod[]= $row_adminClienteMod;
        }
        return $arreglo_adminClienteMod;
    }else{
        return false;
    }
    
  }

  
  //---Consulta los proveedores a modificar según el idproveedor
  public function adminCargarProveedorMod($idProveedor){
  
    $query_adminProveedorMod = "SELECT *
		   		FROM proveedor
		   		WHERE idproveedor = $idProveedor
		   		ORDER BY nombre_proveedor";
    
    $sql_adminProveedorMod = mysqli_query( $this->db->connect(), $query_adminProveedorMod );
    
    $nro_adminProveedorMod = mysqli_num_rows($sql_adminProveedorMod);
    
    if( $nro_adminProveedorMod > 0 ) 
    {               
        while ( $row_adminProveedorMod = mysqli_fetch_assoc( $sql_adminProveedorMod ) ) 
        {
            $arreglo_adminProveedorMod[]= $row_adminProveedorMod;
        }
        return $arreglo_adminProveedorMod;
    }else{
        return false;
    }
    
  }
  
  
  //---Consulta los usuarios a modificar según el idusuario
  public function adminCargarUsuarioMod($idUsuario){
  
    $query_adminUsuarioMod = "SELECT *
		   		FROM usuario u, tipousuario t
		   		WHERE u.idusuario = $idUsuario
				AND u.idtipo_usuario = t.idtipoUsuario
		   		ORDER BY u.nombre_usuario";
    
    $sql_adminUsuarioMod = mysqli_query( $this->db->connect(), $query_adminUsuarioMod );
    
    $nro_adminUsuarioMod = mysqli_num_rows($sql_adminUsuarioMod);
    
    if( $nro_adminUsuarioMod > 0 ) 
    {               
        while ( $row_adminUsuarioMod = mysqli_fetch_assoc( $sql_adminUsuarioMod ) ) 
        {
            $arreglo_adminUsuarioMod[]= $row_adminUsuarioMod;
        }
        return $arreglo_adminUsuarioMod;
    }else{
        return false;
    }
    
  }
  
  
  //---Consulta los Tipo Usuario
  public function adminCargarTipoUsuario(){
  
    $query_adminTipoUsuario = "SELECT *
		   		FROM tipousuario 
		   		ORDER BY nombre_tipo_usuario";
    
    $sql_adminTipoUsuario = mysqli_query( $this->db->connect(), $query_adminTipoUsuario );
    
    $nro_adminTipoUsuario = mysqli_num_rows($sql_adminTipoUsuario);
    
    if( $nro_adminTipoUsuario > 0 ) 
    {               
        while ( $row_adminTipoUsuario = mysqli_fetch_assoc( $sql_adminTipoUsuario ) ) 
        {
            $arreglo_adminTipoUsuario[]= $row_adminTipoUsuario;
        }
        return $arreglo_adminTipoUsuario;
    }else{
        return false;
    } 
    
  }
  
  
  
  //---Consulta los Gustos a modificar según el idgusto
  public function adminCargarGustoMod($idGusto){
  
    $query_adminGustoMod = "SELECT *
                            FROM gusto
                            WHERE idgusto = $idGusto
                            ORDER BY nombre_gusto";
    
    $sql_adminGustoMod = mysqli_query( $this->db->connect(), $query_adminGustoMod );
    
    $nro_adminGustoMod = mysqli_num_rows($sql_adminGustoMod);
    
    if( $nro_adminGustoMod > 0 ) 
    {               
        while ( $row_adminGustoMod = mysqli_fetch_assoc( $sql_adminGustoMod ) ) 
        {
            $arreglo_adminGustoMod[]= $row_adminGustoMod;
        }
        return $arreglo_adminGustoMod;
    }else{
        return false;
    }
    
  }


//---Consulta las Unidades
  public function adminCargarUnidad(){
  
    $query_adminUnidad = "SELECT *
          FROM unidad 
          ORDER BY nombre_unidad";
    
    $sql_adminUnidad = mysqli_query( $this->db->connect(), $query_adminUnidad );
    
    $nro_adminUnidad = mysqli_num_rows($sql_adminUnidad);
    
    if( $nro_adminUnidad > 0 ) 
    {               
        while ( $row_adminUnidad = mysqli_fetch_assoc( $sql_adminUnidad ) ) 
        {
            $arreglo_adminUnidad[]= $row_adminUnidad;
        }
        return $arreglo_adminUnidad;
    }else{
        return false;
    } 
    
  }

  //---Consulta las unidades a modificar según el idunidad
  public function adminCargarUnidadMod($idUnidad){
  
    $query_adminUnidadMod = "SELECT *
		   		FROM unidad
		   		WHERE idunidad = $idUnidad
		   		ORDER BY nombre_unidad";
    
    $sql_adminUnidadMod = mysqli_query( $this->db->connect(), $query_adminUnidadMod );
    
    $nro_adminUnidadMod = mysqli_num_rows($sql_adminUnidadMod);
    
    if( $nro_adminUnidadMod > 0 ) 
    {               
        while ( $row_adminUnidadMod = mysqli_fetch_assoc( $sql_adminUnidadMod ) ) 
        {
            $arreglo_adminUnidadMod[]= $row_adminUnidadMod;
        }
        return $arreglo_adminUnidadMod;
    }else{
        return false;
    }
    
  }
  
  

  //---Consulta El detalle del pedido
  public function adminVerPedido(){
  
    $query_adminVerPedido = "SELECT *
							FROM producto
							ORDER BY idsubcategoria";
    
    $sql_adminVerPedido = mysqli_query( $this->db->connect(), $query_adminVerPedido );
    
    $nro_adminVerPedido = mysqli_num_rows($sql_adminVerPedido);
    
    if( $nro_adminVerPedido > 0 ) 
    {               
        while ( $row_adminVerPedido = mysqli_fetch_assoc( $sql_adminVerPedido ) ) 
        {
            $arreglo_adminVerPedido[]= $row_adminVerPedido;
        }
        return $arreglo_adminVerPedido;
    }else{
        return false;
    } 
    
  }
  
  
  
  
  public function cargarDatos(){
  	
  	  $arreglo_datos = array();
	  $indice = 0;
	  $query_usuarios ="SELECT idusuario, 
	                   		  usuario,
					   		  nombre, 
					   		  apellido,
					   		  passw 
			   			FROM usuario";
    	 
      $sql_usuarios = mysqli_query( $this->db->connect(), $query_usuarios );
    	   
	  $nro_filas_usuario = mysqli_num_rows( $sql_usuarios );
          
      if( $nro_filas_usuario > 0 ) {    
  	  		while ( $row_usuarios = mysqli_fetch_assoc( $sql_usuarios ) ) {
	 			 $arreglo_usuarios[]= $row_usuarios;
	        }
	        $arreglo_datos[$indice]['usuario'] = $arreglo_usuarios;
 	  		$indice++;
	  		
			$query_categorias ="SELECT idcategoria,
		                  			 descripcion 
				   			  FROM categoria 
				   			  ORDER BY descripcion";
    	 
    	  $sql_categorias = mysqli_query( $this->db->connect(),$query_categorias );
    	    	 
    	  $nro_filas_categoria = mysqli_num_rows( $sql_categorias );
          
          if( $nro_filas_categoria > 0 ) {
          	 			           	 
			 while ( $row_categorias = mysqli_fetch_assoc( $sql_categorias ) ) {
	 			 $arreglo_categorias[]= $row_categorias;
		     }
			 $arreglo_datos[$indice]['categoria'] = $arreglo_categorias;
 	  		 $indice++;
			 
			  $query_subcategorias ="SELECT idsubcategoria,
		                  				idcategoria, 
						  				descripcion 
							    FROM subcategoria 
								ORDER BY descripcion";
    	 
    	     $sql_subcategorias = mysqli_query( $this->db->connect(),$query_subcategorias );
    	    	 
    	     $nro_filas_subcategoria = mysqli_num_rows( $sql_subcategorias );
          
             if( $nro_filas_subcategoria > 0 ) {
          	 			           	 
			    while ( $row_subcategoria = mysqli_fetch_assoc( $sql_subcategorias ) ) {
	 			    $arreglo_subcategorias[]= $row_subcategoria;
		       }
			   	 $arreglo_datos[$indice]['sub_categoria'] = $arreglo_subcategorias;	
				 return	$arreglo_datos;	  	
	        }else{
				return false;
			}
		  }else {
			return false;
		}	      	  
	  }else {
		return false;
	}     
	
}
  
  public function cargarUsuarios(){
  	  	 
  	 $query_usuarios ="SELECT idusuario, 
	                   		  usuario,
					   		  nombre, 
					   		  apellido,
					   		  passw 
			   			FROM usuario";
    	 
      $sql_usuarios = mysqli_query( $this->db->connect(), $query_usuarios );
    	   
	  $nro_filas_usuario = mysqli_num_rows( $sql_usuarios );
          
      if( $nro_filas_usuario > 0 ) {      	      	
          	 			           	 
	     while ( $row_usuarios = mysqli_fetch_assoc( $sql_usuarios ) ) {
	 			 $arreglo_usuarios[]= $row_usuarios;
	    }
	    return $arreglo_usuarios;
	 }else{
		return false;
	} 
	
 }
                     
  public function cargarCategorias() {
    	 
		  $query_categorias ="SELECT idcategoria,
		                  			 descripcion 
				   			  FROM categoria 
				   			  ORDER BY descripcion";
    	 
    	  $sql_categorias = mysqli_query( $this->db->connect(),$query_categorias );
    	    	 
    	  $nro_filas_categoria = mysqli_num_rows( $sql_categorias );
          
          if( $nro_filas_categoria > 0 ) {
          	 			           	 
			 while ( $row_categorias = mysqli_fetch_assoc( $sql_categorias ) ) {
	 			 $arreglo_categorias[]= $row_categorias;
		     }	
 			
		     return $arreglo_categorias;
		 	  
          }else {
             return false; 
          }   
    	
    }
    
    public function cargarSubCategorias() {    
			 
		  $query_subcategorias ="SELECT idsubcategoria,
		                  				idcategoria, 
						  				descripcion 
							    FROM subcategoria 
								ORDER BY descripcion";
    	 
    	  $sql_subcategorias = mysqli_query( $this->db->connect(),$query_subcategorias );
    	    	 
    	  $nro_filas_subcategoria = mysqli_num_rows( $sql_subcategorias );
          
          if( $nro_filas_subcategoria > 0 ) {
          	 			           	 
			 while ( $row_subcategoria = mysqli_fetch_assoc( $sql_subcategorias ) ) {
	 			 $arreglo_subcategorias[]= $row_subcategoria;
		     }	
 			
		     return $arreglo_subcategorias;
		 	  
          }else {
             return false; 
          }   
    	
    }
  
  
  public function cargarAsignaciones($idusuario) {
      		  		         
		  $idestadoOcp = 2;
		  $idestadoPdt = 3;
		  $idventa  = 0;
		  $idpedido = 0;
		  
		  $query_asignaciones = "SELECT idasignacion, 
			               idusuario, 
						   idmesa, 
						   idestado, 
						   '$idventa' idventa,
						   '$idpedido' idpedido
					FROM asignacion 
					WHERE idusuario = '$idusuario' 
					ORDER BY idmesa ASC";
    	 
		  $sql_asignaciones = mysqli_query( $this->db->connect(),$query_asignaciones);
    	    	 
    	  $nro_filas_asignacion = mysqli_num_rows( $sql_asignaciones );
          
          if( $nro_filas_asignacion > 0 ) {    
		  	
			 $datos_asignacion = array();       	 
		
			 while ( $row_asignaciones = mysqli_fetch_assoc( $sql_asignaciones ) ) {
			 	 $arreglo_asignacion[] = $row_asignaciones;
		     }
		    	 		 			 
			 for( $indice = 0; $indice < sizeof($arreglo_asignacion); $indice++ ) { // Inicio for arreglo Asignacion
	 		   
				$idasignacion = $arreglo_asignacion[$indice]['idasignacion'];
				
				$datos_asignacion[$indice]['idasignacion'] = $arreglo_asignacion[$indice]['idasignacion'];
			    $datos_asignacion[$indice]['idusuario']    = $arreglo_asignacion[$indice]['idusuario'];
	 			$datos_asignacion[$indice]['idmesa']       = $arreglo_asignacion[$indice]['idmesa']; 
				$datos_asignacion[$indice]['idestado']     = $arreglo_asignacion[$indice]['idestado'];
				$datos_asignacion[$indice]['idventa']      = $arreglo_asignacion[$indice]['idventa'];
				$datos_asignacion[$indice]['idpedido']     = $arreglo_asignacion[$indice]['idpedido'];
			 	
				 /** Se valida si existe una Asignacion con una Venta creada */
			 	if ( $arreglo_asignacion[$indice]['idestado'] == $idestadoOcp ) { // Inicio If validacion Asignacion 
			 		
			 	 	/** Se valida si ya existe una venta creada con estado Pendiente */
    	         	$query_ventas = "SELECT v.idventa, 
       				   				        ifnull(p.idpedido, 0) idpedido
  										 FROM venta v LEFT JOIN pedido p 
										 ON   p.idventa = v.idventa
 										 WHERE v.idasignacion ='$idasignacion'
 										 AND v.idestado ='$idestadoPdt'";
		  
		  			$sql_ventas = mysqli_query( $this->db->connect(),$query_ventas);		 
    	  			$nro_filas_venta = mysqli_num_rows( $sql_ventas );
    	     	     	 
		  			if( $nro_filas_venta > 0 ) { /** Existe una venta creada con estado Pendiente*/ // Inicio If validacion Venta
		  			  			           		        
				   		$row_ventas = mysqli_fetch_assoc( $sql_ventas ); 
	 			    	$datos_asignacion[$indice]['idventa']  = $row_ventas['idventa'];
	 			    	$datos_asignacion[$indice]['idpedido'] = $row_ventas['idpedido'];
	 			    	
						 $idpedido = $row_ventas['idpedido'];	 			    				    	
				   	    	      
	    	        	if ( $idpedido != 0 ) { /** Existe un pedido creado */  // Inicio If validacion Pedido 	    	          	    	       	   	          	              	    	            						         
					     	/** validar si hay una orden  */
					     	$query_ordenes = "SELECT o.idpedido,
						   				   		     o.idproducto,
											   		 o.cantidad,
											         o.valor,
										       		 o.anotacion,
										       		 p.descripcion										    
								 	    	 FROM orden o,
								      		 	  producto p 
								 			WHERE idpedido ='$idpedido'
								 			AND   o.idproducto = p.idproducto";
								 
					 	   $sql_ordenes     = mysqli_query( $this->db->connect(),$query_ordenes);
					 	   $nro_filas_orden = mysqli_num_rows( $sql_ordenes );	
					 
					 	   if ( $nro_filas_orden > 0 ){/** Existe una orden creada */ // Inicio If validacion Orden
					 						  						  						  
						  		while ( $row_ordenes = mysqli_fetch_assoc( $sql_ordenes ) ) {
	 			               		$arreglo_orden[]= $row_ordenes; 			               		
					      		}
					            
								$datos_asignacion[$indice]['orden'] = $arreglo_orden;														   
				       
					       }  // Fin If validacon Orden   	    			      
				    
					} // Fin If  validacion Pedido 
			      
				  } // Fin If validacion venta 
										
				} // Fin If validacion asignacion 
				 											    
			} // Fin for arreglo Asignacion  	
			
			return $datos_asignacion;
											 	  
         }else { /** No se encontraron registros de Asignacion para el usuario */
             return false; 
         }   
    	
    }	

  public function cargarProductos( $idsubcategoria ) {
    	 
		  $query ="SELECT idproducto, 
		                  descripcion, 
						  valor, 
						  cantidad 
				   FROM producto 
				   WHERE idsubcategoria = '$idsubcategoria' 
				   AND cantidad >0";
    	 
    	  $sql = mysqli_query( $this->db->connect(),$query );
    	    	 
    	  $nro_de_filas = mysqli_num_rows( $sql );
          
          if( $nro_de_filas > 0 ) {
          	 			           	 
			 while ( $row = mysqli_fetch_assoc( $sql ) ) {
	 			 $output[]= $row;
		     }	
 			
		     return $output;
		 	  
          }else {
             return false; 
          }   
    	
    }
	
    public function generaVenta($idasignacion) {
		  $idestado = 2;
		  $_idestado = 3;
		  
		  $query = "UPDATE asignacion 
		            SET idestado = '$idestado'
					WHERE idasignacion ='$idasignacion'";
		  $sql = mysqli_query( $this->db->connect(), $query );
    	  
    	  if($sql){
		  		 
			  $_query ="INSERT INTO venta ( fecha, idestado, idasignacion ) VALUES (CURDATE(), '$_idestado', '$idasignacion')";
			  $_sql = mysqli_query( $this->db->connect(), $_query );
					  
			   if ($_sql) {
			   	   
				   $__query ="SELECT idventa FROM venta WHERE idasignacion = '$idasignacion' and idestado='$_idestado'";
				   $__sql = mysqli_query( $this->db->connect(),$__query);
	 				
	 				if ($__sql ) {
					   $row  = mysqli_fetch_assoc( $__sql );
			           return $row['idventa'];
					}else {
					   return false;
					}	
			   } else {
			   	 return false;
			   }
		   }else{
			 return false;
		}
    }
	
    
   public function generaPedido( $jsonPedido ){
     
	 	$json_pedido   = json_decode($jsonPedido);
		$idventa       = $json_pedido->{'idventa'};
		$assoc         = true;         
	    $array_orden   = json_decode( stripslashes( json_encode($json_pedido->{'orden'}) ),$assoc );
	  	$idestado      = 3;	  	
   	    
   	    /** Se valida si existe un pedido ya creado para la venta */
		$query = "SELECT idpedido 
		          FROM pedido 
				  WHERE idventa ='$idventa' 
				  AND idestado = '$idestado'";
		$sql = mysqli_query( $this->db->connect(),$query );
		$num_rows = mysqli_num_rows( $sql );						
				
		if( $num_rows == 0 ) { /** No existe un pedido para la venta. Se crea uno nuevo */ // Inicio if 1
		
			  $query ="INSERT INTO pedido ( idventa
			                               ,idestado ) 
					    VALUES ('$idventa', 
						        '$idestado')";
		      $sql = mysqli_query( $this->db->connect(),$query);	
			   
			   if ($sql) {/** Se obtiene el idpedido creado con anterioridad */		
			   	    			
					$_query   = "SELECT idpedido 
					             FROM pedido 
								 WHERE idventa = '$idventa' 
								 AND idestado='$idestado'";
			    	$_sql     = mysqli_query( $this->db->connect(),$_query);
										
					if( $_sql  ) { /** Se valida si llegase a ocurrir un error obteniendo el id del pedido creado */
					
					 	$row = mysqli_fetch_assoc( $_sql );
					 	
					 	$band = true; /** Bandera que valida que las orden se ha creado correctamente */
					 	
					    /** id del pedido nuevo */ 
					 	$idpedido = $row['idpedido'];
					 
					 	for( $indice = 0; $indice < sizeof($array_orden); $indice++ ) { // Inicio for 
								        
							$idproducto = $array_orden[$indice]['idproducto'];
							$cantidad  = $array_orden[$indice]['cantidad'];
				        	$valor     = $array_orden[$indice]['valor'];
				        	$anotacion = $array_orden[$indice]['anotacion'];
				            
				            /** Se guarda la orden del pedido creado con anterioridad  */
				        	$__query ="INSERT INTO orden ( idpedido, 
							                               idproducto, 
														   valor, 
														   cantidad, 
														   anotacion, 
														   idestado ) 
									    VALUES ( '$idpedido', 
										         '$idproducto',
												 ('$cantidad'*'$valor'),
												 '$cantidad',
												 '$anotacion', 
												 '$idestado')";
							$__sql = mysqli_query( $this->db->connect(),$__query);
							
					  		if (!$__sql) {
					   	    	$band = false; 
						    }        		                
				    	} // Fin for   	
						if ($band){ /** Se creo la orden correctamente, se retorna el id del pedido creado */							
							return $idpedido;
						}else{ /** Ocurrio un error creando la orden */						 	
							return false;
						}
						 			 			
			  	}else{ /** Ocurrio un error obteniendo el id del pedido */			    	
					return false;
			  	}
			}else {/** Ocurrio un error obteniendo el id del producto creado */			 	
				return false;
	        }							 
			
/*Fin if 1*/} else { /** Ya existe un pedido para la venta. Se actualiza  */   			
			 
			 $row = mysqli_fetch_assoc( $sql );
			 $idpedido = $row['idpedido'];
			 
			 for( $indice = 0; $indice < sizeof($array_orden); $indice++ ) { /** Se obtienen los datos de la orden */
			 	
				$idproducto = $array_orden[$indice]['idproducto'];
				$cantidad   = $array_orden[$indice]['cantidad'];
				$valor      = $array_orden[$indice]['valor'];
				$anotacion  = $array_orden[$indice]['anotacion'];
				
				/** Se valida si ya existe un producto en la orden  */
				$_query = "SELECT idproducto 
				           FROM orden 
						   WHERE idpedido='$idpedido' 
						   AND idproducto='$idproducto'";
				$_sql = mysqli_query( $this->db->connect(),$_query );
				$_num_rows = mysqli_num_rows( $_sql );
				
				
		  	    if( $_num_rows > 0 ){ /** Si ya existe el producto en la orden se actualiza con los nuevos valores */
				   	$__query = "UPDATE orden 
					            SET cantidad = '$cantidad', 
								    valor = ('$cantidad' * '$valor'), 
								    anotacion =CONCAT(anotacion, ' ', '$anotacion') 
								WHERE idpedido ='$idpedido' 
								AND idproducto = '$idproducto'";
					$__sql = mysqli_query( $this->db->connect(),$__query);	
					
				    if(!$__sql)	{ /** Ocurrio un error actualizando los datos del producto existente */						
						return false;	
					}		
				}else { /** Si no existe el producto en la orden se crea uno nuevo */							
					 $___query = "INSERT INTO orden ( idpedido, 
					                                  idproducto, 
													  valor, 
													  cantidad, 
													  anotacion, 
													  idestado ) 
								   VALUES ( '$idpedido', 
								            '$idproducto',
											('$cantidad'*'$valor'),
											'$cantidad',
											'$anotacion',
											'$idestado')";
					 $___sql = mysqli_query( $this->db->connect(),$___query);
					 				 	
					 if (!$___sql) { /** Ocurrio un error guardando el producto */					    
						return false;
					}  					 
				}
			 } // end for
	 
			 /** Si no ocurrio un error se retorna el id del pedido*/
    		  return $idpedido;
		}			    
  }
  
  
  public function generaModPedido( $jsonPedido ){
			
		$json_pedido   = json_decode($jsonPedido);
		$idventa       = $json_pedido->{'idventa'};
		$idpedido      = $json_pedido->{'idpedido'};
		$idpedido_df   = 0;
		$assoc         = true;         
	    $array_orden   = json_decode( stripslashes( json_encode($json_pedido->{'orden'}) ),$assoc );
	    $idestado      = 3;
	    
	    /** Se valida si el pedido ya existe */ 
	    if ( $idpedido != 0 ) {	    		 
	    	
	    	/** Se elimina la orden anterior con el id del pedido obtenido */
			$query = "DELETE FROM orden 
			          WHERE idpedido='$idpedido'";
			          
	    	$sql = mysqli_query($this->db->connect(),$query);
		    		    
		    if($sql){	
												    			    	
				/** Se insertan los nuevos datos en la tabla orden */		 				  
				for( $indice = 0; $indice < sizeof($array_orden); $indice++ ) {
					 
					$idproducto = $array_orden[$indice]['idproducto'];
					$cantidad   = $array_orden[$indice]['cantidad'];
					$valor      = $array_orden[$indice]['valor'];
					$anotacion  = $array_orden[$indice]['anotacion'];									
						
		    		$___query ="INSERT INTO orden ( idpedido, 
					                                idproducto, 
													valor, 
													cantidad, 
													anotacion, 
													idestado ) 
							    VALUES ( '$idpedido', 
								         '$idproducto',
										 ('$cantidad'*'$valor'),
										  '$cantidad',
										  '$anotacion',
										  '$idestado')";
										  
					 $___sql = mysqli_query( $this->db->connect(),$___query);					 					  							 
										
					 if (!$___sql) { /** Ocurrió un error insertando la orden */														 			
					 	return false;
					} 					 						
			    } // end for 	
				return $idpedido_df; /** Se retorna id por defecto del pedido si ya existe un pedido creado con anterioridad  $idpedido_df*/
			} else{ /** Ocurrió un error borrando la orden anterior */								
				return false;
			}
		} else { /** Se debe crear un nuevo pedido si el usuario genera la creación del pedido desde la opción de modificar*/			  			  
			  $_query ="INSERT INTO pedido ( idventa,
			                                 idestado ) 
					    VALUES ('$idventa', 
						        '$idestado')";
		      $_sql = mysqli_query( $this->db->connect(),$_query);	
		
		      if($_sql) { /** El pedido se creó correctamente  */
		      	
		      	   $__query ="SELECT idpedido 
					          FROM pedido 
							  WHERE idventa = '$idventa' 
							  AND idestado='$idestado'";
		           $__sql = mysqli_query( $this->db->connect(),$__query);
		      	    
		      	    if($__sql) { /** Se obtiene el id del pedido creado con anterioridad   */
		      	    	
						  $row = mysqli_fetch_assoc( $__sql );
			              $idpedido = $row['idpedido'];
			              
			           	  /** Se insertan los nuevos datos en la tabla orden */		 				  
						   for( $indice = 0; $indice < sizeof($array_orden); $indice++ ) {
					 
							 $idproducto = $array_orden[$indice]['idproducto'];
							 $cantidad   = $array_orden[$indice]['cantidad'];
							 $valor      = $array_orden[$indice]['valor'];
							 $anotacion  = $array_orden[$indice]['anotacion'];
						
		    				 $___query ="INSERT INTO orden ( idpedido, 
							                                 idproducto, 
															 valor, 
															 cantidad, 
															 anotacion, 
															 idestado ) 
										 VALUES ( '$idpedido', 
										          '$idproducto',
												  ('$cantidad'*'$valor'),
												  '$cantidad',
												  '$anotacion',
												  '$idestado')";
							 $___sql = mysqli_query( $this->db->connect(),$___query);
										
							 if (!$___sql) { /** Ocurrió un error insertando la orden */														 					  					return false;
							 }  					 						
			    		  } // end for
						  return $idpedido; /** Se retorna el id del nuevo pedido creado  */
					} else { /** Ocurrió un error insertando el nuevo pedido */									
						return false;
					}		      	    	      	
			} else { /** Ocurrió un error insertando el nuevo pedido */				 
				return false;
			}      					 			
		}				
	}
   
  /*
  *  Valida se existe alguna orden lista para el mesero
  *
  */
  
 public function cargarOrdenLista ( $idusuario ){
  	
  	$estado = 4;
 
  	$query = "SELECT a.idmesa 
	  		  FROM orden o, 
				   pedido p, 
				   venta v, 
				   asignacion a, 
				   usuario u				    
			  WHERE u.idusuario = '$idusuario' 
			  AND u.idusuario = a.idusuario 
			  AND a.idasignacion = v.idasignacion 
			  AND v.idventa = p.idventa 
			  AND p.idpedido = o.idpedido 
			  AND o.idestado ='$estado'
			  GROUP BY a.idmesa";
  	
  	$sql = mysqli_query( $this->db->connect(),$query);
  	
  	if ($sql) {
  		
  		$nro_de_filas = mysqli_num_rows( $sql );
	          
		if( $nro_de_filas > 0 ) {
			
		    while ( $row = mysqli_fetch_assoc( $sql ) ) {
		 		 $output[]= $row;
		  	}	
	 	}else {
    		$output = " ";     
		}   
	}else {
		$output = " ";
	} 
	
	return $output;
 
  }
  
  public function generaFactura( $idventa ){
		
		$idestado = 5;
		$band = true;
		
		$query = "UPDATE orden o
		          SET o.idestado='$idestado'
				  WHERE EXISTS ( SELECT * 
				                 FROM pedido p
							     WHERE p.idpedido = o.idpedido 
								 AND p.idventa ='$idventa')";
									
	    $sql = mysqli_query( $this->db->connect(),$query);	
	    
	    if( $sql ) {
			
			$_query = "UPDATE pedido 
			           SET idestado = '$idestado'
					   WHERE idventa = '$idventa'";
					   
			$_sql = mysqli_query( $this->db->connect(),$_query);
			
			if($_sql) {
				$__query = "UPDATE venta 
			                SET idestado = '$idestado'
					        WHERE idventa = '$idventa'";
					        
				$__sql = mysqli_query( $this->db->connect(),$__query);
				
				if(!$__sql){
					$band = false;
				}
				
			}else {
				$band = false;
			}
		}else {
			$band = false;
		}
		
		return $band;							
					
	}
	
   
	public function error( $tipoError )  {
    	
		$error = array();
    	$message;
    	
		/**
    	* Tipo Error   Descripcion
    	*     1        Error session
    	*     2        No existen datos en la tabla
    	*     3        Usuario incorrecto
    	*     4        El usuario no tiene mesasa asignadas
    	*     5        Error insertando los registros en la tabla
    	*/
		switch($tipoError) {
			case 0:
			      $message = "Error carga inicial de datos";
			      break;
    		case 1: 
    		       $message = "Error en session";  
    		       break;
			case 2:	  
				   $message = "No existen datos en la tabla";
				   break;
            case 3:
                   $message = "Error cargando datos Usuario";
                   break;
            case 4:
		           $message = "El usuario no tiene mesas asignadas";  
				   break;      
            case 5:
                   $message = "Error insertando datos en la tabla";
                   break;
            case 6:
                   $message = "Error actualizando datos en la tabla";
                   break;
            case 7:
                   $message = "Error leyendo datos de la tabla";
                   break;
    	}
    	
    	$error['success'] = "0";
    	$error['error']   = $message;
    	
    	return $error;
    }
          
}

?>