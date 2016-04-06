<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="/vendor/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

		<meta name="csrf-token" content="{{csrf_token()}}"><!--Genera un token-->
    </head>
    <body>
    <div class="row">
    	<div class="col-md-12" style="background: #FF3A00"><h1><center>CABECERA DE MINION</center></h1>
        {{-- Verifica si el usuario ha iniciado sesion para mostrar el link de logout --}}
                @if(Auth::check())
                  <div class="col-md-1">
                    {{Auth::user()->username}}
                    <a href="/auth/logout">Logout</a>
                  </div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="background: #FCFF00">
            @if(Auth::check())
        	MENU
        	<br/>
			<br/> <a href="/entradas">Entradas</a>
			<br/>
			<br/>
			<br/>
        	ADMIN
        	<br/>
			<br/> <a href="/admin/entradas">Entradas</a>
            <br/> <a href="/admin/categorias">Categoria</a>
			<br/> <a href="/admin/usuarios">Usuario</a>
			<br/> <a href="/admin/notificaciones">Notificacion</a>
            @endif
        </div>
        <div class="col-md-9" style="#4EFF00">@yield("contenido")</div>
    </div>
    <script src="/vendor/js/jquery-1.12.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    			//alert ("cargo");
    			$.ajaxSetup({
    				headers:{
    					"X-CSRF-TOKEN":$('meta[name="csrf-token"]').get(0).content
    				}
    			})
    	});
    </script>
    @yield("scripts")
    </body>
</html>