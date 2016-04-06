@extends('master')

@section('contenido')
<a href="/admin/categorias/nuevo">Nueva Categoria</a>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="tbody_categorias">
  @foreach($categorias as $categoria)
    <tr>
      <td>{{$categoria->id}}</td>
      <td>{{$categoria->nombre}}</td>
      <td>
        <a href="/admin/categorias/{{$categoria->id}}/editar">Editar</a>
        &nbsp;
        <a href="#" class="borrar" data-id="{{$categoria->id}}">Borrar</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection


@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $('#tbody_categorias').on('click', '.borrar', function(event) {
    var id = event.currentTarget.dataset.id;
    $.ajax('/admin/categorias/'+id, {
      type: 'DELETE',
    }).then(function(res) {
      window.location = '/admin/categorias';
    })
  })
});
</script>
@endsection
