<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Questoes,Respostas
};

class QuestoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questao = Questoes::all();
        return view('questoes.index')
            ->with(compact('questao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questao = null;
        return view('questoes.form')
            ->with(compact('questao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questao = new Questoes($request->all());
        $questao->save();

        return redirect()
            ->route('questoes.edit',['id'=>$questao->id_questao]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questoes  $questoes
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $questao = Questoes::find($id);
        return view('questoes.show')
            ->with(compact('questao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questoes  $questoes
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $questao = Questoes::find($id);
        return view('questoes.form')
            ->with(compact('questao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questoes  $questoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $questao = Questoes::find($id);
        $questao->fill($request->all());
        $questao->save();
        return redirect()
            ->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questoes  $questoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $questao = Questoes::find($id);
        $questao->delete();
        $questao->save();
        return redirect()
            ->back();
    }

    public function respostas(int $id)
    {
        $resposta = Respostas::all();
        return view('play')
            ->with(compact('resposta','id'));
    }
}
