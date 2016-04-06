<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	/**
	* 
	*/
	class Ejemplo1Controller extends Controller
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
		public function inicio()
		{

			return view('welcome');			
		}
		public function inicio()
		{

			return view('welcome');			
		}

public function inicio()
		{

			return view('welcome');			
		}

public function inicio()
		{

			return view('welcome');			
		}

public function inicio()
		{

			return view('welcome');			
		}

public function inicio()
		{

			return view('welcome');			
		}



	}


