$(document).ready(function(){
	//$("#usuarios").find(".borrar").on("click",function(e)
	$("#usuarios").on("click",".borrar",function(e)
	{
		var el = e.currentTarget;
		var id = el.dataset.id;
		var url = "/admin/usuarios/"+id;
		$.ajax(url,{
			type:"DELETE",
		}).then(function(response){
			window.location="/admin/usuarios2";
		});
		alert(id);
	});
})