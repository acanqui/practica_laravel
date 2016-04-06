<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	/**
	* 
	*/
	class Ejemplo2Controller extends Controller
	{
		
		public function ejercicio(Request $r, $nombre, $edad)
		{
			# code...
			$apodo = $r->get('apodo');
			if($apodo != "") 
			{
				return "Hola".$nombre." ".$apodo." - ".$edad."anos";
			}
			return "Chau".$nombre." - ".$edad."anos";
		}
	}

	