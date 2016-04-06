<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
	protected $reglas=[
		"a_username"=>"required|alpha|max:16|min:3",
		"a_email"=>"email|required",
		"a_password"=>"required"
		];

	protected $mensajes=[
		"required"=>":attribute es un campo necesario", "alpha"=>"El campo :attribute solo debe tener letras",
		"ini2"=>"no debe comenzar con el numero 2"
		];
	


	//USUARIOS*******************************************************************************************************************
	//MUESTRA LOS USUARIOS
	public function users(Request $r)
	{
		
			//$users = User::all();// select * from users;
			$users = User::paginate(3);
			//print_r(\DB::getQueryLog()); debuguear querys
			return view("admin.usuarios.index")->with("a_usuarios",$users);
	}
	//CREA UN NUEVO USUARIO
	public function nuevo(Request $r)
	{

		//return view("admin.usuarios.edit")->with("metodo","post")->with("usuario",new User());
		$user=new User();
		$user->email=$r->old("a_email");
		$user->nombre=$r->old("a_nombre");
		$user->username=$r->old("a_username");
		return view("admin.usuarios.edit")->with("metodo","post")->with("usuario", $user);
	}
	//GRABA EL NUEVO USUARIO
	public function save(Request $r)
	{
		//VALIDADORES
		//$validador=\Validator::make($r->all(),$this->reglas,$this->mensajes);//[ //crean o una accion (constructor para un validaror)
			//"a_username"=>"required|alpha|max:16|min:3",
			//"a_email"=>"email|required|ini2",
			//"a_email"=>"email|required",
			//"a_password"=>"required"
		//],[
		//	"required"=>":attribute es un campo necesario", "alpha"=>"El campo :attribute solo debe tener letras",
		//	"ini2"=>"no debe comenzar con el numero 2",
		//	]);

		/*if ($validador->fails())
		{
			//return $validador->errors();
			//return view("admin.usuarios.edit")->with("metodo","post")->with("usuario",new User())->with("errors",$validador->errors());
			return redirect("/admin/usuarios/nuevo")->withInput()->with("errors",$validador->errors());
		}*/
		$this->validate($r, $this->reglas, $this->mensajes);
		////////////////////
		$users=new User();
		$users->nombre=$r->input("a_nombre");
		$users->email=$r->input("a_email");
		$users->username=$r->input("a_username");
		$users->password=bcrypt($r->input("a_password"));
		$users->save();
		return redirect("/admin/usuarios");
	}
	//EDITAR EL USUARIO CREADO
	public function modificar(Request $r, $id)
	{
			$users= User::find($id); //devuelde un objeto
			return view("admin.usuarios.edit")->with("usuario", $users)->with("metodo", "put");
	}

	public function update(Request $r, $id)
	{
			$validador=\Validator::make($r->all(),$this->reglas,$this->mensajes);
			if ($validador->fails())
			{	
				return redirect("/admin/usuarios/nuevo")->withInput()->with("errors",$validador->errors());
			}
			$users=User::findOrFail($id); //esto reemplaza a $datos=$r->all() 
			$users->nombre=$r->input("a_nombre");
			$users->email=$r->input("a_email");
			$users->username=$r->input("a_username");
			$users->password=bcrypt($r->input("a_password"));
			$users->save();
			return redirect("/admin/usuarios");

	}
	//BORRAR EL USUARIO
	public function destroy(Request $r, $id)
	{
		$users=User::findOrFail($id);
		$users->delete();
		return response()->json(["status"=>"ok"]);

	}

	//MOSTRAR EL LISTADO DE USUARIO CON AJAX
	public function usersajax(Request $r){
		 // Para saber que variables llegan por parte
        // del control DataTable ver:
        // https://datatables.net/manual/server-side
        $length = $r->input('length', 10);
        $page = ($r->input('start') / $length) + 1;

        $column = $r->input('order')[0]['column'];
        $column = $r->input('columns')[$column]['data'];
        $direction = $r->input('order')[0]['dir'];

        $pattern = $r->input('search')['value'];

        // select *
        // from users
        // where email like '%algunapatron%'
        // order by [columna] asc|desc
        $users = User::orderBy($column, $direction)
            ->where('nombre', 'like', "%$pattern%")
            ->orWhere('email', 'like', "%$pattern%")
            ->paginate($length, ['*'], 'start', $page);

        $result = [
            'draw' => $r->input('draw'),
            'recordsTotal' => $users->total(),
            'recordsFiltered' => $users->total(),
            'data' => $users->all()
        ];

        return response()->json($result);	
	}
	public function users2()
    {
        return view('admin.usuarios.ajax');
    }
}