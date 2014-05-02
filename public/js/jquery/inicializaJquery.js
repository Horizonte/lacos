var BaseUrl = 'http://www.lacos.dev';
$(document).ready(function()
{
	$.blockUI.defaults.css = {
		border: 'none', 
        padding: '15px', 
        backgroundColor: '#000000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#ffffff',
        fontSize: '20px',
        width: '40%',		            
        top:            '40%', 
        left:           '30%', 
        textAlign:      'center', 
    }; 

    // Todos os métodos jquery devem ser registrados aqui.
	if(typeof AdminLogin == 'function') { AdminLogin(); } 
	else if(typeof AdminUsers == 'function') { AdminUsers(); } 
	else if(typeof AdminGroups == 'function') { AdminGroups(); } 
});