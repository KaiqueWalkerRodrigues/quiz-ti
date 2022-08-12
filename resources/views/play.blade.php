@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

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

        <br><br>


        {{-- <h1 class="text-light text-end">30</h1> --}}

        @if($questoes)

        <form method="POST" action="{{ route('corfirma_resposta') }}">
            @csrf
            <div class="p-3 bg-light border border-black rounded-end">
              
                <input type="hidden" name="id_quiz" id="id_quiz" value="{{ $questoes->id_quiz }}">
                <input type="hidden" name="id_questao" id="id_questao" value="{{ $questoes->id_questao }}">
                <a href="{{ route('index') }}" class="btn btn-info col-md-1"><i class="fa-solid fa-backward"></i></a>
                <b id="segundos" class="col-md-1 offset-md-10 text-end fs-3">00:15</b>
                <h2 class="text-dark text-center mb-5 col-md-12">{{ $questoes->titulo }}</h2>

                <br>
                @php
                    $n = 1
                @endphp

                @foreach($ordem as $indice)
                    <div class="text-center mb-2">
                        <input type="radio" class="btn-check" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $indice }}">
                        <label class="btn btn-outline-secondary btn-lg col-md-6" for="flexRadioDefault{{ $n }}">{{ $respostas[$indice] }}</label>
                    </div>
                    @php
                        $n++
                    @endphp
                @endforeach

                <br>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg mb-3">
                        Confirmar</i>
                    </button>
                </div>
            </div>
        </form>

        @else
            <div class="alert alert-success">
                PARABÉNS VOCÊ FINALIZOU ESTE QUIZ!!!
                <br>
                Estamos te levando de volta!
            </div>
            <script>
            setTimeout(function(){
               window.location.href = 'http://localhost:8000/';
            }, 8000);
            </script>
        @endif

    </div>

@endsection
@section('script')
    <script>
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            window.location = location.href;
        }
        if (timer < 5) {
            $('#segundos').addClass('text-danger');
        }
        }, 1000);
        }
        window.onload = function () {
            var duration = 60 / 4 - 1; // Converter para segundos
                display = document.querySelector('#segundos'); // selecionando o timer
            startTimer(duration, display); // iniciando o timer
        };
    </script>
@endsection