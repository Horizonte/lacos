<div class="modal fade" id="divDelete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">Exclusão do Grupo</h4>
            </div>
            <div id="alertsDelete"></div>
            <form id="deleteGroup" name="deleteGroup" class="form-horizontal">
                <div class="modal-body">
                    <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Você tem certeza que deseja apagar esse registro?</div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" id="btDelete" name="btDelete" class="btn btn-warning" form="deleteGroup"><i class="glyphicon glyphicon-ok-sign"></i>  Sim</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
                </div>
                <input type="hidden" id="idDelete" name="idDelete" value="0" />
            </form>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>