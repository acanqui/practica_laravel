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
					
				</tbody>
		</table>
	</div>
</div>
@stop
@section("scripts")
<script type="text/javascript" src="/lib/js/usuarios.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#usero').DataTable({
				processing: true,
			      serverSide: true,
			      paging: true,
			      lengthMenu: [5,10,15,20],
			      rowCallback: function(row, data, index) {
			        var urls = '';
			        urls += '<a href="/admin/usuarios/' + data.id + '/editar">Editar</a>';
			        urls += '&nbsp;';
			        urls += '<a href="#" class="borrar" data-id="' + data.id + '">Borrar</a>';

			        row.children[3].innerHTML = urls;
			      },
			      ajax: '/admin/usuarios/ajax',
			      columns: [
			        { data: 'id', orderable: true, },
			        { data: 'nombre', orderable: true, },
			        { data: 'email', orderable: true, },
			        { data: null, orderable: false }
			      ],
			      language: {
			        search: 'Buscar: ',
			        info: 'Mostrando desde _START_ a _END_ de _TOTAL_ registros',
			        infoEmpty: 'No existen registros',
			        processing: 'Procesando ...',
			        emptyTable: 'No existen registros',
			        lengthMenu: 'Mostrar _MENU_ registros',
			        paginate: {
			          first: 'Primero',
			          last: 'Último',
			          next: '»',
			          previous: '«'
			        }
			      }
    	
    	});
	} );
</script>
@endsection