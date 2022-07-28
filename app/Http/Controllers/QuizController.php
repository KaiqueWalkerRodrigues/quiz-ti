<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{
    Quiz,Questoes,Respostas,Categorias,User
};

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        $categorias = Categorias::all();
        return view('index')
            ->with(compact('quiz','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz = null;
        $categoria = Categorias::all();
        return view('form')
            ->with(compact('quiz','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = new Quiz($request->all());
        $quiz->save();

        return redirect()
            ->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $quiz = Quiz::find($id);
        return view('show')
            ->with(compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $quiz = Quiz::find($id);
        $id_cat = $quiz->id_categoria;
        $categorias = Categorias::all();
        $categoria = Categorias::find($id_cat);
        return view('form')
            ->with(compact('quiz','categoria','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $quiz = Quiz::find($id);
        $quiz->fill($request->all());
        $quiz->save();
        return redirect()
            ->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        $quiz->save();
        return redirect()
            ->back();
    }

    public function play(int $id)
    {
        $questoes = Questoes::all();
        $respostas = Respostas::all();
        return view('play')
            ->with(compact('questoes','id','respostas'));
    }

    public function corfirma_resposta(request $resposta)
    {   
        $id = $resposta->id_quiz;
        if($resposta->certa == $resposta->flexRadioDefault)
        {
            $user = User::find(Auth::user()->id);
            $user->points += 100;
            $user->save();

            return redirect()
                ->route('play', ['id'=>$id])
                ->with('success', 'Você acertou!');
        }
        else{
            return redirect()
                ->route('play', ['id'=>$id])
                ->with('danger', 'Você errou!');
        };
    }

}
