var menu = '';

function AdminMenus()
{
    // ################ Modificação de campos no form. ##################

    function CarregaCamposNivel0()
    {
        var textMenu = '<input id="menu" name="menu" type="text" placeholder="" class="form-control input-md" required="">';
        $("#divMenu").html(textMenu);
        $("#cmpSubmenu").hide();
        $("#cmpSubsubmenu").hide();
    }

    function CarregaCamposNivel1()
    {
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
    }

    function CarregaCamposNivel2()
    {
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
    }

    $(document).on("change", "#nivel-0", function(event){
        CarregaCamposNivel0();
    });

    $(document).on("change", "#nivel-1", function(event){    
        CarregaCamposNivel1();
    });

    $(document).on("change", "#nivel-2", function(event){
        CarregaCamposNivel2();
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

    // ################ Fim da modificação dos campos. ##################

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

    function InicializaFiltros()
    {
        $("#hdNivel").val(0);
        $("#hdMenu").val('');
        $("#hdSubmenu").val('');
        $("#hdSubSubmenu").val('');
        $("#hdIdMenu").val(0);
        $("#hdIdSubmenu").val(0);
        $("#hdIdSubSubmenu").val(0);
        $("#hdPeriodoDe").val('');
        $("#hdPeriodoAte").val('');
        $("#hdStatus").val('');
    }

    $(document).on("click", "#drpMenus", function(event){
        var drpMenus = $("#drpMenus").html();
        InicializaFiltros();
        $("#hdNivel").val(0);
        $("#drpSelect").html(drpMenus+' <span class="caret">');
    });

    $(document).on("click", "#drpSubmenus", function(event){
        var drpSubmenus = $("#drpSubmenus").html();
        InicializaFiltros();
        $("#hdNivel").val(1);
        $("#drpSelect").html(drpSubmenus+' <span class="caret">');
    });

    $(document).on("click", "#drpSubSubmenus", function(event){
        var drpSubSubmenus = $("#drpSubSubmenus").html();
        InicializaFiltros();
        $("#hdNivel").val(2);
        $("#drpSelect").html(drpSubSubmenus+' <span class="caret">');
    });

    $(document).on("click", "#btRefresh", function(event){
        location.reload(true);
    });

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

    var ShowFilter = function ModalFilter()
    {
        href = BaseUrl + '/admin/menus/filter';
        $('#otherViews').load(href, function()
        {
            var nivel = $("#hdNivel").val();
            if(nivel == 0)
            { 
                $('#nivel-0').attr('checked', true); 
                CarregaCamposNivel0();
            }
            else if(nivel == 1)
            { 
                $('#nivel-1').attr('checked', true); 
                CarregaCamposNivel1();
            }
            else if(nivel == 2)
            { 
                $('#nivel-2').attr('checked', true); 
                CarregaCamposNivel2();
            }
            $('#divModal').modal();
        });
    };

    $(document).on('click', "#btClearFilter", function(event)
    {
        var nivel = $("#hdNivel").val();

        try{ $('#menu').val(''); }catch(err){ }
        try{ $('#cbxMenu').val('0'); }catch(err){ }
        try{ $('#submenu').val(''); }catch(err){ }
        try{ $('#cbxSubmenu').val(''); }catch(err){ }
        try{ $('#subsubmenu').val(''); }catch(err){ }
        try{ $('#status').val('-1'); }catch(err){ }
        try{ $('#dir').val('0'); }catch(err){ }
    });

    Menus = {
        "ShowEdit"   : ShowEdit,
        "ShowDelete" : ShowDelete,
        "ShowData"   : ShowData,
        "ShowFilter" : ShowFilter
    };
}