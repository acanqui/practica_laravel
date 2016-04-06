@extends("master")
@section("contenido")
@foreach ($entradas as $e)
<div>
	<h1>{{$e["titulo"]}}</h1>
	<p>
		{{$e["contenido"]}}
	</p>
</div>
@endforeach
@stop