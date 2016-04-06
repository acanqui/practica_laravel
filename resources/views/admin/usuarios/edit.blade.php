@extends("master")
@section("contenido")
<div>
	@foreach($errors->all() as $err)
		<p>{{$err}}</p>
	@endforeach
</div>


<form method="POST">
{{csrf_field()}}
{{method_field($metodo)}}<!--Metodo para que sea variable PUT o POST-->
<div class="form-control">
	<label>Nombre</label><input type="text" name="a_nombre" class="form-control" value="{{$usuario->nombre}}"></input>
	<label>Email</label><input type="text" name="a_email" class="form-control" value="{{$usuario->email}}"></input>
	<label>Username</label><input type="text" name="a_username" class="form-control" value="{{$usuario->username}}"></input>
	<label>Password</label><input type="password" name="a_password" class="form-control" value="{{$usuario->password}}"></input>
	<button type="submit">Guardar</button>

</div>
</form>
@stop