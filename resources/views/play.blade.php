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

        <form method="POST" action="{{ route('corfirma_resposta') }}">
            @csrf

            @foreach( $questoes->where('id_quiz',$id)->random(1) as $q)

                <input type="hidden" name="id_quiz" id="id_quiz" value="{{ $q->id_quiz }}">
                <h4>{{ $q->titulo }}</h4>

                <br>
                @php
                    $n = 1
                @endphp

                @foreach($respostas->where('id_questao',$q->id_questao)->where('certa','0')->random(4) as $res)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $res->id_resposta }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $n }}">
                            {{$res->resposta}}
                        </label>
                    </div>
                    @php
                        $n++
                    @endphp
                @endforeach

                @foreach($respostas->where('id_questao',$q->id_questao)->where('certa','1') as $res)
                    <div class="form-check">
                        <input type="hidden" name="certa" id="certa" value="{{ $res->id_resposta }}">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $res->id_resposta }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $n }}">
                                {{$res->resposta}}
                        </label>
                    </div>
                @endforeach

                <br>
                
                <div class="col-md-2 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        Proximo >
                    </button>
                </div>

            @endforeach

        </form>

    </div>

@endsection