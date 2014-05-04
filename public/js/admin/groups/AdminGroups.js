/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

var menu = '';

function AdminGroups()
{
    $('.filterable .btn-filter').click(function()
    {
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) 
        {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } 
        else 
        {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e)
    {
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function()
        {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) 
        {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">Nenhum registro foi encontrado</td></tr>'));
        }
    });

    var url_ =  $(location).attr('pathname');
               
    if(url_ == '/admin/groups/create')
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#create").toggleClass( 'active', true );
    }
    else
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#groups").toggleClass( 'active', true );
    }

    function RecordGroup()
    {       
        var url = BaseUrl + '/admin/groups/create';
        $.blockUI({ message: 'Aguarde...' });
        setTimeout(function()
        {
            $.post(
                url,
                $("#addGroup").serialize(),
                function(data)
                {                        
                    if(data.success)
                    { 
                        $.blockUI({ message: 'Cadastro realizado com sucesso.' });
                        setTimeout(function(){ location.href = BaseUrl + "/admin/groups/create"; }, 3000); 
                    }
                    else
                    { 
                        $.blockUI({ message: 'O cadastro não foi realizado.' });
                        $("#alerts").html('<div id="alerts" class="alert alert-danger">'+data.msg+'</div>');
                        setTimeout($.unblockUI, 2000);
                    }
                },
                'json'
            );
        },1000);        
    };

    function UpdateGroup()
    {       
        var url = BaseUrl + '/admin/groups/edit';
        $.post(
            url,
            $("#editGroup").serialize(),
            function(data)
            {                        
                if(data.success)
                { 
                    $("#alertsUpdade").show();
                    $("#alertsUpdade").html('<div class="alert alert-success"><strong>Sucesso!</strong> A atualização foi realizada com sucesso.</div>');
                    setTimeout(function(){ location.href = BaseUrl + "/admin/groups"; }, 1000); 
                }
                else
                { 
                    $("#alertsUpdade").show();
                    $("#alertsUpdade").html('<div class="alert alert-danger">'+data.msg+'</div>');
                }
            },
            'json'
        );
    };

    function DeleteGroup()
    {       
        var url = BaseUrl + '/admin/groups/destroy';
        $.post(
            url,
            $("#deleteGroup").serialize(),
            function(data)
            {
                if(data.success)
                {
                    $("#alertsDelete").show();
                    $("#alertsDelete").html('<div class="alert alert-success"><strong>Sucesso!</strong> A exclusão foi realizada com sucesso.</div>');
                    setTimeout(function(){ location.href = BaseUrl + "/admin/groups"; }, 1000); 
                }
                else
                {
                    $("#alertsDelete").show();
                    $("#alertsDelete").html('<div class="alert alert-danger">'+data.msg+'</div>');
                }
            },
            'json'
        );
    };

    $("#addGroup").submit(function(event)
    {
        event.preventDefault();
        RecordGroup();
    });

    $("#btSave").click(function(event)
    {
        event.preventDefault();
        RecordGroup();
    });

    $("#editGroup").on('submit', function(event)
    {
        event.preventDefault();
        UpdateGroup();
    });

    $("#btUpdate").on('click', function(event)
    {
        console.log(this);
        event.preventDefault();
        UpdateGroup();
    });

    $("#btDelete").click(function(event)
    {
        event.preventDefault();
        DeleteGroup();
    });

    function LoadOtherViewsModal(href)
    {
        $('#otherViews').load(href, function(){
            $('#divModal').modal();
        });
        return false;
    }

    var ShowEdit = function ModalEdit(id)
    { 
        href = BaseUrl + '/admin/groups/edit?id='+id;
        LoadOtherViewsModal(href);
    };

    var ShowDelete = function ModalDelete(id)
    { 
        $("#alertsDelete").hide();
        $('#divDelete').modal();
        $("#idDelete").val(id);
    };

    var ShowData = function ModalShow(id)
    { 
        href = BaseUrl + '/admin/groups/show?id='+id;
        LoadOtherViewsModal(href);
    };

    Groups = {
        "ShowEdit"   : ShowEdit,
        "ShowDelete" : ShowDelete,
        "ShowData"   : ShowData
    };
}