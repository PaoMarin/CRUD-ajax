$(document).ready(function(){

var Client = {
	delete: function(client_id){
    return $.getJSON('/client/'+client_id+'/delete');
  },

    success: function (result) {
      result = JSON.parse(result);
      jQuery("#welcome-message").html(`Cedula: ${result.cedula}`+ `Nombre: ${result.nombre}`+ `Nombre: ${result.apellido}`+ `Nombre: ${result.telefono}`);
    },
  
}

$('.a_delete').on("click",function(){
	
    var confirmLeave = confirm('¿Seguro que desea eliminar este cliente?');
	if (confirmLeave==true)
	{
  		var client_id = $(this).attr("id");
  		Client.delete(client_id).done(function(json){
  			if (json.code == 200) {
  				location.reload();
  			}
  		});
	}
});