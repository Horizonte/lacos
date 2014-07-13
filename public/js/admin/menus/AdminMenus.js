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

    // ################ Modificação de campos no form index. ##################

    $(document).on("change", "#nivelSearch-0", function(event){
        console.log('search 0');
        event.preventDefault();
        ListMenus();
    });

    $(document).on("change", "#nivelSearch-1", function(event){    
        console.log('search 1');
        event.preventDefault();
        //ListMenus();
    });

    $(document).on("change", "#nivelSearch-2", function(event){
        console.log('search 2');
        event.preventDefault();
        //ListMenus();
    });

    // #################### Fim da modificação dos campos. #####################

    // ################ Modificação de campos no form create. ##################

    $(document).on("change", "#nivel-0", function(event){
        var textMenu = '<input id="menu" name="menu" type="text" placeholder="" class="form-control input-md" required="">';
        $("#divMenu").html(textMenu);
        $("#cmpSubmenu").hide();
        $("#cmpSubsubmenu").hide();
    });

    $(document).on("change", "#nivel-1", function(event){    
        var url = BaseUrl + '/admin/menus/cbxMenus';
        $.post(
            url,
            function(data)
            {
                var menus = data.datas;
                var cbx;

                cbx = '<select id="cbxMenu" name="cbxMenu" class="form-control">';
                cbx+= ' <option value="0">Selecione o Menu</option>';
                for (i=0; i<menus.length; i++) 
                {
                    cbx+= ' <option value="'+menus[i].id+'">'+menus[i].menu+'</option>';
                };
                cbx+= '</select>';

                $("#divMenu").html(cbx);
            },
            'json'
        ).done(function(){
            var textSubmenu = '<input id="submenu" name="submenu" type="text" placeholder="" class="form-control input-md" required="">';
            $("#divSubmenu").html(textSubmenu);
            $("#cmpSubmenu").show();
            $("#cmpSubsubmenu").hide();    
        }).fail(function(){
            var alert;
            alert = '<div id="alerts" class="alert alert-warning">';
            alert+= '<strong><i class="glyphicon glyphicon-info-sign"></i> Atenção!</strong> ';
            alert+= 'Houve falha ao listar os menus.';
            alert+= '</div>';
            $("#alerts").html(alert);
            $("#cmpSubmenu").hide();
            $("#cmpSubsubmenu").hide();
            setTimeout(function(){
                $("#alerts").hide("slow");
                $("#alerts").html("");
                $("#alerts").show();
            }, 3000);
            location.href = '/admin/menus/create';
        });
    });

    $(document).on("change", "#nivel-2", function(event){
        var url = BaseUrl + '/admin/menus/cbxMenus';
        $.post(
            url,
            function(data)
            {
                var menus = data.datas;
                var cbx;

                cbx = '<select id="cbxMenu" name="cbxMenu" class="form-control">';
                cbx+= ' <option value="0">Selecione o Menu</option>';
                for (i=0; i<menus.length; i++) 
                {
                    cbx+= ' <option value="'+menus[i].id+'">'+menus[i].menu+'</option>';
                };
                cbx+= '</select>';

                $("#divMenu").html(cbx);
            },
            'json'
        ).fail(function(){
            var alert;
            alert = '<div id="alerts" class="alert alert-warning">';
            alert+= '<strong><i class="glyphicon glyphicon-info-sign"></i> Atenção!</strong> ';
            alert+= 'Houve falha ao listar os menus.';
            alert+= '</div>';
            $("#alerts").html(alert);
            $("#cmpSubmenu").hide();
            $("#cmpSubsubmenu").hide();
            setTimeout(function(){
                $("#alerts").hide("slow");
                $("#alerts").html("");
                $("#alerts").show();
            }, 3000);
            location.href = '/admin/menus/create';
        });


        url = BaseUrl + '/admin/menus/cbxSubmenus';
        $.post(
            url,
            {"idMenu" : $("#menu").val()},
            function(data)
            {
                var submenu = data.datas;
                var cbx;

                cbx = '<select id="cbxSubmenu" name="cbxSubmenu" class="form-control">';
                cbx+= ' <option value="0">Selecione o Submenu</option>';
                for (i=0; i<submenu.length; i++) 
                {
                    cbx+= ' <option value="'+submenu[i].id+'">'+submenu[i].submenu+'</option>';
                };
                cbx+= '</select>';

                $("#divSubmenu").html(cbx);
            },
            'json'
        ).done(function(){
            $("#cmpSubmenu").show();
            $("#cmpSubsubmenu").show();    
        }).fail(function(){
            var alert;
            alert = '<div id="alerts" class="alert alert-warning">';
            alert+= '<strong><i class="glyphicon glyphicon-info-sign"></i> Atenção!</strong> ';
            alert+= 'Houve falha ao listar os submenus.';
            alert+= '</div>';
            $("#alerts").html(alert);
            $("#cmpSubmenu").hide();
            $("#cmpSubsubmenu").hide();
            setTimeout(function(){
                $("#alerts").hide("slow");
                $("#alerts").html("");
                $("#alerts").show();
            }, 3000);
            location.href = '/admin/menus/create';
        });
    });

    $(document).on("change", "#cbxMenu", function(event){
        var nivel2 = $("#nivel-2").prop("checked");

        if(nivel2)
        {
            var url = BaseUrl + '/admin/menus/cbxSubmenus';
            $.post(
                url,
                {"idMenu" : $("#cbxMenu").val()},
                function(data)
                {
                    var submenu = data.datas;
                    var cbx;

                    cbx = '<select id="cbxSubmenu" name="cbxSubmenu" class="form-control">';
                    cbx+= ' <option value="0">Selecione o Submenu</option>';
                    for (i=0; i<submenu.length; i++) 
                    {
                        cbx+= ' <option value="'+submenu[i].id+'">'+submenu[i].submenu+'</option>';
                    };
                    cbx+= '</select>';

                    $("#divSubmenu").html(cbx);
                },
                'json'
            ).fail(function(){
                var alert;
                alert = '<div id="alerts" class="alert alert-warning">';
                alert+= '<strong><i class="glyphicon glyphicon-info-sign"></i> Atenção!</strong> ';
                alert+= 'Houve falha ao listar os submenus.';
                alert+= '</div>';
                $("#alerts").html(alert);
                setTimeout(function(){
                    $("#alerts").hide("slow");
                    $("#alerts").html("");
                    $("#alerts").show();
                }, 3000);
            });
        }
    });

    // #################### Fim da modificação dos campos. #####################

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

    function RecordMenu()
    {       
        var url = BaseUrl + '/admin/menus/create';
        var dir = $("#dir").val();
        $.blockUI({ message: 'Aguarde...' });
        if(dir != '0')
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
            var alert;
            alert = '<div id="alerts" class="alert alert-danger">';
            alert+= '<strong><i class="glyphicon glyphicon-remove-sign"></i> Atenção!</strong> ';
            alert+= 'Informe o diretório.';
            alert+= '</div>';
            $("#alerts").html(alert);          
            setTimeout($.unblockUI, 2000);
        }
    };

    function UpdateMenu()
    {       
        var url = BaseUrl + '/admin/menus/edit';
        $("#divModal").block({ message: 'Aguarde...' });
        $.post(
            url,
            $("#editMenu").serialize(),
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

    function DeleteMenu()
    {       
        var url = BaseUrl + '/admin/menus/destroy';
        $("#divModal").block({ message: 'Aguarde...' });
        $.post(
            url,
            $("#deleteMenu").serialize(),
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

    $(document).on("submit", "#addMenu", function(event)
    {
        event.preventDefault();
        RecordMenu();
    });

    $(document).on("click", "#btSave", function(event)
    {
        event.preventDefault();
        RecordMenu();
    });

    $(document).on('submit', "#editMenu", function(event)
    {
        event.preventDefault();
        UpdateMenu();
    });

    $(document).on('click', "#btDelete", function(event)
    {
        event.preventDefault();
        DeleteMenu();
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