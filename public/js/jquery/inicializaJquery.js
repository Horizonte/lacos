// Todos os métodos jquery devem ser registrados aqui.
var BaseUrl = 'http://www.laravel.dev';
$(document).ready(function()
{
	if(typeof AdminLogin == 'function') { AdminLogin(); } 
	else if(typeof AdminUsers == 'function') { AdminUsers(); } 
});