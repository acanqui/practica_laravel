<?php 

namespace App\Models;
	//use Illuminate\Database\Eloquent\Model;
	//Copiando desde User.php por defecto (A)
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


	//class User extends Model
class User extends Model implements AuthenticatableContract, //(A)
AuthorizableContract, //(A)
CanResetPasswordContract //(A)
{
	use Authenticatable, Authorizable, CanResetPassword;//(A)

	protected $table='users';
	protected $guarded=['id','created_at']; //siempre se debe asignar

	public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'fk_usuario');
    }
}


