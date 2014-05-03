<div class="modal fade" id="divShow" tabindex="-1" role="dialog" aria-labelledby="showLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="showLabel">Dados do Grupo</h4>
        </div>
        <form id="showGroup" name="showGroup" class="form-horizontal">
            <div class="modal-body">
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">Nome</label>  
                        <div class="col-md-9">
                            <input id="nameGrupo" name="nameGrupo" type="text" placeholder="" class="form-control input-md" disabled="disabled" />
                        </div>
                    </div>                    
                </fieldset>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
            </div>
        </form>
    </div>
  </div>
</div>