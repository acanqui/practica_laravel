<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(Request $r)
    {
        $categorias = Categoria::all();

        return view('admin.categorias.index')
            ->with('categorias', $categorias);
    }

    public function create(Request $r)
    {
        return view('admin.categorias.edit')
            ->with('categoria', new Categoria($r->old()))
            ->with('metodo', 'post');
    }

    public function store(Request $r)
    {
        $categoria = new Categoria($r->all());
        $categoria->save();

        return redirect('admin/categorias');
    }

    public function edit(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('admin.categorias.edit')
            ->with('categoria', $categoria)
            ->with('metodo', 'put');
    }

    public function update(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->fill($r->all());
        $categoria->save();

        return redirect('admin/categorias');
    }

    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function destroy(Request $r, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
