@extends("master")
@section("contenido")
<form action="/auth/login" method="post">
	{{csrf_field()}}
	<div class="form-control">
	<label>Usuario</label><input name="username" class="form-control"></input>
	<label>Contrasena</label><input type="password" name="password" class="form-control"></input>
	<button type="submit">Login</button>
	</div>
</form>
@endsection