<div class="modal fade" id="divEdit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="editLabel">Atualização dos Dados</h4>
        </div>
        <div id="alertsUpdade"></div>
        <form id="editGroup" name="editGroup" class="form-horizontal">
            <div class="modal-body">
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">Nome</label>  
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="Informe o nome do grupo.">
                        </div>
                    </div>                    
                </fieldset>                
            </div>
            <div class="modal-footer">
                <button type="submit" id="btUpdate" name="btUpdate" class="btn btn-warning" form="editGroup"><i class="glyphicon glyphicon-ok-sign"></i> Salvar Mudancas</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
            </div>
            <input type="hidden" id="idEdit" name="idEdit" value="0" />
        </form>
    </div>
  </div>
</div>