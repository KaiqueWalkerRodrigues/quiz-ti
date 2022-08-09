<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categorias::all();
        $cat = '';
        return view('categorias.index')
            ->with(compact('categoria','cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = null;
        return view('categorias.form')
            ->with(compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categorias($request->all());
        $categoria->save();

        return redirect()
            ->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $categoria = Categorias::find($id);
        return view('categorias.show')
            ->with(compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $cat = Categorias::find($id);
        $categoria = Categorias::all();
        return view('categorias.index')
            ->with(compact('cat','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $categoria = Categorias::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()
            ->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $categoria = Categorias::find($id);
        $categoria->delete();
        $categoria->save();
        return redirect()
            ->back();
    }

}
