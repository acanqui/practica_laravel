@extends('master')

@section('contenido')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="post">
      {{csrf_field()}}
      {{method_field($metodo)}}
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection

