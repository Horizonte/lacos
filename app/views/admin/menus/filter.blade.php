<div class="modal fade" id="divModal" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 450px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="filterLabel">Filtro</h4>
        </div>
        <div id="alerts"></div>
        <form id="filterMenu" name="filterMenu" class="form-horizontal">
            <div class="modal-body" style="margin:3px;">
                <fieldset id="cmpFilters">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="menu">N&iacute;vel</label>  
                        <div class="col-md-9">
                            <label class="radio-inline" for="nivel-0">
                                <input type="radio" name="nivel" id="nivel-0" value="1">Menu
                            </label>
                            <label class="radio-inline" for="nivel-1">
                                <input type="radio" name="nivel" id="nivel-1" value="2">Submenu
                            </label>
                            <label class="radio-inline" for="nivel-2">
                                <input type="radio" name="nivel" id="nivel-2" value="2">Sub-submenu
                            </label>
                        </div>
                    </div>
                    <div id="cmpMenu" class="form-group">
                        <label class="control-label col-md-3" for="menu">Menu</label>  
                        <div id="divMenu" class="col-md-9">
                            <input id="menu" name="menu" type="text" class="form-control input-md" />
                        </div>
                    </div>
                    <div id="cmpSubmenu" class="form-group">
                        <label class="control-label col-md-3" for="name">Submenu</label>  
                        <div id="divSubmenu" class="col-md-9">
                            <input id="submenu" name="submenu" type="text" class="form-control input-md" />
                        </div>
                    </div>
                    <div id="cmpSubsubmenu" class="form-group">
                        <label class="control-label col-md-3" for="name">Sub-Submenu</label>  
                        <div id="divSubsubmenu" class="col-md-9">
                            <input id="subsubmenu" name="subsubmenu" type="text" class="form-control input-md" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="menu">Status</label>  
                        <div class="col-md-9">
                            <select id="status" name="dir" class="form-control">
                                <option value="-1">Todos</option>
                                <option value="0">Ativo</option>
                                <option value="1">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="menu">Diret&oacute;rio</label>  
                        <div class="col-md-9">
                            <select id="dir" name="dir" class="form-control">
                                <option value="0">Todos</option>
                                <option value="admin">Admin</option>
                                <option value="public">Public</option>
                            </select>
                        </div>
                    </div>
                </fieldset>                
            </div>
            <div class="modal-footer">
                <button type="submit" id="btFilter" name="btFilter" class="btn btn-sm btn-primary" form="filterMenu"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>
                <button type="button" id="btClearFilter" name="btClearFilter" class="btn btn-sm btn-warning" form="filterMenu"><i class="glyphicon glyphicon-refresh"></i> Limpar</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
            </div>
        </form>
    </div>
  </div>
</div>