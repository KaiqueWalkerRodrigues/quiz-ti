<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{
    Quiz,Questoes,Respostas,Categorias,User,QuestoesUsuarios,
    RespostasUsuarios
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
        $user = Auth::user();
        return view('form')
            ->with(compact('quiz','categoria','user'));
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

    // Função para levar o usuario para a view ('play') e leva todas questões e respostas para ela.
    public function play(int $id)
    {
        // $id = ID DO QUIZ

        //Captura o id do usuario logado
        $id_user = Auth::user()->id;

        // retira as questoes e respostas erradas dos usuarios
        $repetidas = new QuestoesUsuarios();
        $repetidas = $repetidas::select('id_questao')->where('id_user',$id_user)->get();
        $respostas_repetidas = new RespostasUsuarios();
        $respostas_repetidas = $respostas_repetidas::select('id_resposta')->where('id_user',$id_user)->get();

        // $repetidas = $repetidas->toArray();

        //Sorteia uma questão com o id do quiz escolhido
        $questoes = Questoes::where('id_quiz',$id)
        ->whereNotIn('id_questao',$repetidas)
        ->inRandomOrder()
        ->first();
        
        if ($questoes == null) {
            $questoes = null;
            return view('play', ['id'=>$id])
                ->with(compact('questoes'));
        }else{

        //Sorteia 4 Respostas Erradas que nunca foram usadas com este usuario
        $respostasErradas = Respostas::select('id_resposta', 'resposta')
                                        ->where('id_questao',$questoes->id_questao)
                                        ->whereNotIn('id_resposta',$respostas_repetidas)
                                        ->where('certa','0')
                                        ->inRandomOrder()
                                        ->limit(4)
                                        ->get();

        //Pega a respsota certa da questão sorteada
       $respostaCerta = Respostas::select('id_resposta', 'resposta')
                                        ->where('id_questao',$questoes->id_questao)
                                        ->where('certa','1')
                                        ->limit(1)
                                        ->get();

       //Junta os arrays
       $todas =  array_merge($respostasErradas->toArray(), $respostaCerta->toArray());

       //transformando os indicies nos id_resposta
       foreach ($todas as $resposta) {
        $ordem[] = $resposta['id_resposta'];
        $respostas[$resposta['id_resposta']] = $resposta['resposta'];
       }

       shuffle($ordem);
        //    echo '<pre>';
        //    echo 'Todas<br>';
        //     print_r( $todas);       
        //     echo '<hr>';
        //     echo 'Respostas<br>';
        //     print_r($respostas);
        //     echo '<hr>';
        //     echo 'Ordem bagunçada<br>';
        //     print_r($ordem);
        //     echo '<hr>';
        //     echo 'Saida para o Quiz<br>';

        return view('play')
            ->with(compact('id','questoes','respostas','ordem'));

        }

    }


    public function corfirma_resposta(request $resposta)
    {   
        //Id do quiz
        $id = $resposta->id_quiz;

        //Id da questão
        $id_questao = $resposta->id_questao;
        
        //Fazendo um Select no banco e retornando a resposta certa da questão
        $certa = Respostas::where('id_questao',$id_questao)
                        ->where('certa',1)
                        ->first()
                        ;

        //Verifica se a resposta está valida
        if($certa->id_resposta == $resposta->flexRadioDefault)
        {
            // Encontra as informações dos usuarios logados e adicionado pontos ao perfil dele
            $user = User::find(Auth::user()->id);
            $user->points += 100;
            $user->save();

            // Cadastra na tabela auxiliar o id_usuario e o id_questao
            $questoesusuarios = new QuestoesUsuarios(Auth::user()->id,$id_questao);
            $questoesusuarios->save();           
            
            return redirect()
                ->route('play', ['id'=>$id])
                ->with('success', 'Você acertou!!! 100 Pontos foram adicionados á sua conta!');
        }
        else{
            // Encontra as informações dos usuarios logados e adicionado pontos ao perfil dele
            $user = User::find(Auth::user()->id);
            $user->points -= 25;
            $user->save();

            $respostausuarios = new RespostasUsuarios(Auth::user()->id,$resposta->flexRadioDefault);
            $respostausuarios->save();

            return redirect()
                ->route('play', ['id'=>$id])
                ->with('danger', 'Você errou!!! 25 pontos foram retirados da sua conta');
        };
    }

}
