/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

var menu = '';

function AdminUsers()
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

    /*$('#submenu a').click(function(event){
        var href = $(this).attr('href');
        menu = $(this).attr('menu');
        $('#divContent').load(href, function(){
            $("#submenu li").toggleClass( 'active', false );
            $("#"+menu).toggleClass( 'active', true );
            $("#"+menu).toggleClass( 'active', true );
        });
        return false;
    });*/

    if(url_ == '/admin/users/create')
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#create").toggleClass( 'active', true );
    }
    else
    {  
        $("#submenu li").toggleClass( 'active', false );
        $("#users").toggleClass( 'active', true );
    }


    var RecordUser = function(){
        $('li').removeClass('.active');
        alert('ops');
        console.log(this);
        $.ajax({
            url: BaseUrl+"/admin/users/create",
            context: document.body
        }).done(function() {
            
            //$( this ).addClass( "active" );
        });
    };

    var ListUser = function(){
    };

    var UpdateUser = function(){
    };

    AdminUsersActions = {
        "RecordUser"    : RecordUser,
        "ListUser"      : ListUser,
        "UpdateUser"    : UpdateUser
    };
}