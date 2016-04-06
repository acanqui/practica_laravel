@extends("master")
@section("contenido")
<form method="POST">
{{csrf_field()}}
{{method_field($metodo)}}
<div class="form-control">
	<label>Titulo</label><input type="text" name="c_titulo" class="form-control" value="{{$entrada->titulo}}"></input>
	<label>Contenido</label><textarea name="c_contenido" class="form-control">{{$entrada->contenido}}</textarea>
	<div class="form-group">
        <div class="checkbox-list">
          @foreach($categorias as $categoria)
            <?php
              $checked = '';
              foreach($entrada->categorias as $ent_cat) {
                if ($categoria->id == $ent_cat->id) {
                  $checked = 'checked';
                  break;
                }
              }
            ?>
            <label>
              <input
                type="checkbox" name="categoria[{{$categoria->id}}]"
                {{$checked}}
                />
              {{$categoria->nombre}}
            </label>
          @endforeach
        </div>
      </div>
	<button type="submit">Guardar</button>

</div>
</form>
@stop