@extends("master")
@section("contenido")

<div class="row">   
	<div class="col-md-1 offset-10">
		<a href="/admin/usuarios/nuevo">Nuevo Usuario</a>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-3">
		<!--<table class="table display" id="usero">-->
		<table class="table display" id="usero">
			<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>
			</thead>
				<tbody id="usuarios">
					@foreach ($a_usuarios as $u)
					<tr>
						<td>{{$u["id"]}}</td>
						<td>{{$u["nombre"]}}</td>
						<td>{{$u["email"]}}</td>
						<td><a href="/admin/usuarios/{{$u["id"]}}/editar">Editar</a></td>
						<td><a href="#" class="borrar" data-id={{$u["id"]}}>Borrar</a></td>
					</tr>
					@endforeach
				</tbody>
		</table>
		<p><b>Total en la página: </b>{{$a_usuarios->count()}}</p>
		<p><b>Total: </b>{{$a_usuarios->total()}}</p>
	</div>
</div>
{!! $a_usuarios->render() !!}
@stop
@section("scripts")
<script type="text/javascript" src="/lib/js/usuarios.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#usero').DataTable();
	} );
</script>
@endsection