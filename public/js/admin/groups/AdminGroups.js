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
        },1500);        
    };

    function UpdateGroup()
    {       
        var url = BaseUrl + '/admin/groups/edit';
        $.blockUI({ message: 'Aguarde...' });
        setTimeout(function()
        {
            $.post(
                url,
                $("#editGroup").serialize(),
                function(data)
                {                        
                    if(data.success)
                    { 
                        $.blockUI({ message: 'Cadastro alterado com sucesso.' });
                        setTimeout(function(){ location.href = BaseUrl + "/admin/groups"; }, 3000); 
                    }
                    else
                    { 
                        $.blockUI({ message: 'O cadastro não foi alterado.' });
                        $("#alerts").html('<div id="alerts" class="alert alert-danger">'+data.msg+'</div>');
                        setTimeout($.unblockUI, 2000);
                    }
                },
                'json'
            );
        },1500);        
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

    $("#editGroup").submit(function(event)
    {
        event.preventDefault();
        UpdateGroup();
    });

    $("#btUpdate").click(function(event)
    {
        event.preventDefault();
        UpdateGroup();
    });

    var ShowEdit = function ModalEdit(id)
    { 
        $.ajax({
            url: BaseUrl + '/admin/groups/edit',
            data: {'id':id},
            dataType: 'json',
            tryCount:0,//current retry count
            retryLimit:3,//number of retries on fail
            timeout: 2000,//time before retry on fail
            success: function(data) 
            {
                $("#idEdit").val(data.datas[0].id);
                $("#name").val(data.datas[0].name);
            },
            error: function(xhr, textStatus, errorThrown) 
            {
                if (textStatus == 'timeout') {//if error is 'timeout'
                    this.tryCount++;
                    if (this.tryCount < this.retryLimit) {
                        $.ajax(this);//try again
                        return;
                    }
                }//try 3 times to get a response from server
            }
        }).done(function(){ $('#divEdit').modal(); });        
    };

    var ShowDelete = function ModalDelete(id)
    { 
        $('#divDelete').modal();
        $("#idDelete").val(id);
    };

    Groups = {
        "ShowEdit"   : ShowEdit,
        "ShowDelete" : ShowDelete
    };
}