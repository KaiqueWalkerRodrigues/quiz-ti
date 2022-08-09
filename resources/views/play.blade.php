@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')
        <br>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <br>
            <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br><br>

        @if($questoes)

        <form method="POST" action="{{ route('corfirma_resposta') }}">
            @csrf

                <input type="hidden" name="id_quiz" id="id_quiz" value="{{ $questoes->id_quiz }}">
                <input type="hidden" name="id_questao" id="id_questao" value="{{ $questoes->id_questao }}">
                <h4 class="text-light">{{ $questoes->titulo }}</h4>

                <br>
                @php
                    $n = 1
                @endphp

                @foreach($ordem as $indice)
                        <input type="radio" class="btn-check" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $indice }}">
                        <label class="btn btn-outline-light col-2" for="flexRadioDefault{{ $n }}">{{ $respostas[$indice] }}</label>
                    @php
                        $n++
                    @endphp
                @endforeach

                <br>
                <br>
                <div class="col-md-2 offset-md-10">
                    <button type="submit" class="btn btn-success">
                        Confirmar</i>
                    </button>
                </div>

        </form>

        @else
            <div class="alert alert-success">
                PARABÉNS VOCÊ FINALIZOU O QUIZ!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>

@endsection