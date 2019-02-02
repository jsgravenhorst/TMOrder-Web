<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form id="formulariomodplato" role="form" method='post'  action='' name='datos'>
                <div class="form-group">
                  <div class="form-row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <input name='platomod' id='platomod' type="text" class="platomod form-control form-control-sm" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese el nombre del Plato">
                        <input name="idplatomod" id="idplatomod" type="hidden" class="form-control form-control-sm">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <select name='categoriamod' id='categoriamod' class="form-control form-control-sm"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <select name='subCatmod' id='subCatmod' class="form-control form-control-sm"></select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <input name='valormod' id='valormod' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el valor">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input name='impuestomod' id='impuestomod' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el Impuesto">
                      </div>  
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input name='costomod' id='costomod' type="text" class="form-control form-control-sm" onkeypress="return isNumber(event);" placeholder="Ingrese el Costo">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <select name='complementomod' id='complementomod' class="form-control form-control-sm">
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <select name='comandamod' id='comandamod' class="form-control form-control-sm">
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <select name='selgustomod' id='selgustomod' class="form-control form-control-sm">
                          </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-info btn-sm" style='float:right;'>Guardar</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->