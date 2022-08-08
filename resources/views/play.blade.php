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
                <h4>{{ $questoes->titulo }}</h4>

                <br>
                @php
                    $n = 1
                @endphp

                @foreach($ordem as $indice)
<<<<<<< Updated upstream
                        <input type="radio" class="btn-check" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $indice }}">
                        <label class="btn btn-outline-dark col-2" for="flexRadioDefault{{ $n }}">{{ $respostas[$indice] }}</label>
=======
                    <div class="form-check d-grid gap-2 col-4 mx-auto">
                        <input class="form-check-input d-none" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $indice }}">
                        <label class="form-check-label btn btn-outline-primary" for="flexRadioDefault{{ $n }}">
                            {{ $respostas[$indice] }}
                        </label>
                    </div>
                    @php
                        $n++
                    @endphp
                     {{-- echo $indice .' - '.$respostas[$indice].'<br>'; --}}

                {{-- @foreach($respostas->where('id_questao',$q->id_questao)->where('certa','0')->random(4) as $res)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $res->id_resposta }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $n }}">
                            {{$res->resposta}}
                        </label>
                    </div>
>>>>>>> Stashed changes
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