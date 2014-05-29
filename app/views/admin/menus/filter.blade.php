<div class="modal fade" id="divModal" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 350px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="filterLabel">Filtro</h4>
        </div>
        <div id="alerts"></div>
        <form id="filterMenu" name="filterMenu" class="form-horizontal">
            <div class="modal-body" style="margin:3px;">
                <fieldset>
                    <div id="cmpMenu" class="form-group">
                        <label class="control-label col-md-2" for="menu">Menu</label>  
                        <div class="col-md-10">
                            <input id="menu" name="menu" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div id="cmpMenu" class="form-group">
                        <label class="control-label col-md-2" for="menu">Ativo</label>  
                        <div class="col-md-10">
                            <label class="checkbox-inline" for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"> Ativo
                            </label>
                            <label class="checkbox-inline" for="checkboxes-1">
                                <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2"> Inativo
                            </label>
                        </div>
                    </div>
                </fieldset>                
            </div>
            <div class="modal-footer">
                <button type="submit" id="btUpdate" name="btUpdate" class="btn btn-primary" form="filterMenu"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
            </div>
        </form>
    </div>
  </div>
</div>