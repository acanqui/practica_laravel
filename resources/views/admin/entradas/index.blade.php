@extends("master")
@section("contenido")

<div class="row">   
	<div class="col-md-1 offset-10">
		<a href="/admin/entradas/nuevo">Nueva Entrada - Modificada para hacer la Prueba con Hithub</a>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-3">
		<table class="table">
			<thead>
				<tbody id="entradas">
					<tr>
					<td>Id</td>
					<td>Titulo</td>
					@foreach ($entradas as $e)
					<tr>
						<td>{{$e["id"]}}</td>
						<td>{{$e["titulo"]}}</td>
						<td><a href="/admin/entradas/{{$e["id"]}}/editar">Editar</a></td>
						<td><a href="#" class="borrar" data-id={{$e["id"]}}>Borrar</a></td>
					</tr>
					</tr>
					@endforeach
				</tbody>
			</thead>
		</table>
	</div>
</div>
@stop
@section("scripts")
<script type="text/javascript" src="/lib/js/entradas.js"></script>
@endsection