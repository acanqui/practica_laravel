<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Entrada;
use Auth;
use App\Models\Categoria;

class EntradaController extends Controller
{
	
	public function index(Request $r)
	{
			//return "Hola";
			$cabecera = "Hola mundo";
			$entradas = [
							[	"id"=>"1",
								"titulo"=>"entrada1",
								"contenido"=>"contenido1"
							],
							[	"id"=>"2",
								"titulo"=>"entrada2",
								"contenido"=>"contenido2"
							],
							[	"id"=>"3",
								"titulo"=>"entrada3",
								"contenido"=>"contenido3"
							],
							[	"id"=>"4",
								"titulo"=>"entrada4",
								"contenido"=>"contenido4"
							]
						];
			//return $entradas;
			$entradas = Entrada::all();// select * from entradas;
			return view("entradas.index")->with("entradas",$entradas)->with("cabecera",$cabecera);
	}

	public function entradas(Request $r)
	{
			//return "Hola";
			$cabecera = "Hola mundo";
			/*$entradas = [
							[	"id"=>"1",
								"titulo"=>"entrada1",
								"contenido"=>"contenido1"
							],
							[	"id"=>"2",
								"titulo"=>"entrada2",
								"contenido"=>"contenido2"
							],
							[	"id"=>"3",
								"titulo"=>"entrada3",
								"contenido"=>"contenido3"
							],
							[	"id"=>"4",
								"titulo"=>"entrada4",
								"contenido"=>"contenido4"
							]
						];*/
			//return $entradas;
			$entradas = Entrada::all();// select * from entradas;
			//$entradas = Entrada::get(['titulo','contenido']); // select titulo, contenido from entradas;
			//$entradas = Entrada::where('id','=',1); //select * from entradas where id=1
			//$entradas = Entrada::where ('titulo','=','titulo1'); // and  titulo = 'titulo';
			//$entradas = Entrada::orwhere ('contenido','=',''); // or contenido = ""
			return view("admin.entradas.index")->with("entradas",$entradas)->with("cabecera",$cabecera);
	}

	public function modificar(Request $r, $id)
	{
			$entrada= Entrada::find($id); //devuelde un objeto
			//return view("admin.entradas.edit")->with("id",$id)->with("entrada", $entrada)->with("metodo", "put");
			return view("admin.entradas.edit")->with("entrada", $entrada)->with("metodo", "put")->with("categorias", Categoria:: all());
	}

	public function update(Request $r, $id)
	{
			//$titulo=$r->input("titulo");
			//$contenido=$r->input("contenido");
			//$datos=$r->all();
			$entrada=Entrada::findOrFail($id); //esto reemplaza a $datos=$r->all() 
			//$entrada = new Entrada($datos);
			//$entrada = new Entrada();
			$entrada->titulo=$r->input("c_titulo");
			$entrada->contenido=$r->input("c_contenido");
			$entrada->save();
			$categorias = [];
			foreach($r->input('categoria', []) as $key => $value) {
			    $categorias[] = $key;
			}
			$entrada->categorias()->sync($categorias);
			//return $datos;
			//return view("admin.entradas.edit")->with("id",$id);
			//print_r(\DB::getQueryLog());
			return redirect("/admin/entradas");

	}

	public function nuevo(Request $r)
	{

		return view("admin.entradas.edit")->with("metodo","post")->with("entrada",new Entrada())->with("categorias",Categoria::all());
	}	

	public function save(Request $r)
	{

		$entrada=new Entrada();
		$entrada->titulo=$r->input("c_titulo");
		$entrada->contenido=$r->input("c_contenido");
		$entrada->fk_usuario = Auth::id();
		$entrada->save();
		$categorias = [];
		foreach($r->input('categoria', []) as $key => $value) {
			    $categorias[] = $key;
			}
		$entrada->categorias()->sync($categorias);
		return redirect("/admin/entradas");
	}

	public function destroy(Request $r, $id)
	{
		$entrada=Entrada::findOrFail($id);
		$entrada->delete();
		return response()->json(["status"=>"ok"]);

	}
	//USUARIOS*******************************************************************************************************************
	public function users(Request $r)
	{
		
			$users = User::all();// select * from users;
			return view("admin.usuarios.index")->with("a_usuarios",$users);
	}
}

