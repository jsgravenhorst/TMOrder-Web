
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form role="form" id="formularionuevacat" method='post'  action='' name='datos'>
                <div id="respuesta"></div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            
                            <label for="ejemplo_email_1">Seleccione el Tipo de Categor&iacute;a</label>
                            <select name='tipocategoria' id='tipocategoria' class="form-control form-control-sm">
                                <option>Seleccione</option>
                            </select>
                        </div>
                              
                        <div class="col-md-12">
                            <label for="ejemplo_email_1">Digite el nombre de la Categoria</label>
                            <input name='nombre' id='nombre' type="text" class="form-control form-control-sm" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese el nombre de la categoria">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info btn-sm" style='float:right;'>Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->