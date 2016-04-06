$(document).ready(function(){
	$("#entradas").find(".borrar").on("click",function(e)
	{
		var el = e.currentTarget;
		var id = el.dataset.id;
		var url = "/admin/entradas/"+id;
		$.ajax(url,{
			type:"DELETE",
		}).then(function(response){
			window.location="/admin/entradas";
		});
		alert(id);
		//alert ($(el).html());
		//alert (el.innerHTML);
	});
})