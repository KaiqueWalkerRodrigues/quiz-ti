<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Respostas};

class RespostasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resposta = Respostas::all();
        return view('index')
            ->with(compact('resposta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resposta = null;
        return view('form')
            ->with(compact('resposta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resposta = new Respostas($request->all());
        $resposta->save();

        return redirect()
            ->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $resposta = Respostas::find($id);
        return view('show')
            ->with(compact('resposta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $resposta = Respostas::find($id);
        return view('form')
            ->with(compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $resposta = Respostas::find($id);
        $resposta->fill($request->all());
        $resposta->save();
        return redirect()
            ->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $resposta = Respostas::find($id);
        $resposta->delete();
        $resposta->save();
        return redirect()
            ->back();
    }
}
