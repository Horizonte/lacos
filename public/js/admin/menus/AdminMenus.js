/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

var menu = '';

function AdminMenus()
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
               
    if(url_ == '/admin/menus/create')
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#create").toggleClass( 'active', true );
    }
    else
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#menus").toggleClass( 'active', true );
    }

    function RecordGroup()
    {       
        var url = BaseUrl + '/admin/menus/create';
        var menu = $("#menu").val();
        var route = $("#route").val();
        var active = $("#active").val();
        var dir = $("#dir").val();
        $.blockUI({ message: 'Aguarde...' });
        if(menu != '' && dir != '0')
        {
            setTimeout(function()
            {
                $.post(
                    url,
                    $("#addMenu").serialize(),
                    function(data)
                    {                        
                        if(data.success)
                        { 
                            $.blockUI({ message: 'Cadastro realizado com sucesso.' });
                            setTimeout(function(){ location.href = BaseUrl + "/admin/menus/create"; }, 2000); 
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
        }
        else
        {
            $.blockUI({ message: 'O cadastro não foi realizado.' });
            if(menu == ''){ $("#alerts").html('<div id="alerts" class="alert alert-danger">Informe o menu</div>'); }
            else if(dir == '0'){ $("#alerts").html('<div id="alerts" class="alert alert-danger">Informe o diretório</div>'); }            
            setTimeout($.unblockUI, 2000);
        }
    };

    function UpdateGroup()
    {       
        var url = BaseUrl + '/admin/menus/edit';
        $("#divModal").block({ message: 'Aguarde...' });
        $.post(
            url,
            $("#editGroup").serialize(),
            function(data)
            {                        
                if(data.success)
                { 
                    $("#alertsUpdade").show();
                    $("#divModal").block({ message: 'A atualização foi realizada com sucesso.' });
                    setTimeout(function(){ location.href = BaseUrl + "/admin/menus"; }, 2000); 
                }
                else
                { 
                    $("#divModal").block({ message: 'O cadastro não foi realizado.' });
                    $("#alertsUpdade").show();
                    $("#alertsUpdade").html('<div class="alert alert-danger">'+data.msg+'</div>');
                    setTimeout(function(){ $("#divModal").unblock();}, 2000);
                }
            },
            'json'
        );
    };

    function DeleteGroup()
    {       
        var url = BaseUrl + '/admin/menus/destroy';
        $("#divModal").block({ message: 'Aguarde...' });
        $.post(
            url,
            $("#deleteGroup").serialize(),
            function(data)
            {
                if(data.success)
                {
                    $("#alertsDelete").show();
                    $("#divModal").block({ message: 'A exclusão foi realizada com sucesso.' });
                    setTimeout(function(){ location.href = BaseUrl + "/admin/menus"; }, 1000); 
                }
                else
                {
                    $("#divModal").block({ message: 'A exclusão não foi realizada.' });
                    $("#alertsDelete").show();
                    $("#alertsDelete").html('<div class="alert alert-danger">'+data.msg+'</div>');
                    setTimeout(function(){ $("#divModal").unblock();}, 2000);
                }
            },
            'json'
        );
    };

    function ListMenus()
    {
        var url = BaseUrl + '/admin/menus';
        $.blockUI({ message: 'Aguarde...' });
        $('body').load(url, $("#listMenus").serialize(), function(){ $.unblockUI(); });
        return false;
    }

    $(document).on("submit", "#addGroup", function(event)
    {
        event.preventDefault();
        RecordGroup();
    });

    $(document).on("click", "#btSave", function(event)
    {
        event.preventDefault();
        RecordGroup();
    });

    $(document).on('submit', "#editMenu", function(event)
    {
        event.preventDefault();
        UpdateGroup();
    });

    $(document).on('click', "#btDelete", function(event)
    {
        event.preventDefault();
        DeleteGroup();
    });

    $("#listMenu").submit(function(event)
    {
        event.preventDefault();
        ListMenus();
    });

    $("#btSearch").click(function(event)
    {
        event.preventDefault();
        ListMenus();
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
        href = BaseUrl + '/admin/menus/edit?id='+id;
        LoadOtherViewsModal(href);
    };

    var ShowDelete = function ModalDelete(id)
    { 
        href = BaseUrl + '/admin/menus/destroy?id='+id;
        LoadOtherViewsModal(href);
    };

    var ShowData = function ModalShow(id)
    { 
        href = BaseUrl + '/admin/menus/show?id='+id;
        LoadOtherViewsModal(href);
    };

    Menus = {
        "ShowEdit"   : ShowEdit,
        "ShowDelete" : ShowDelete,
        "ShowData"   : ShowData
    };
}